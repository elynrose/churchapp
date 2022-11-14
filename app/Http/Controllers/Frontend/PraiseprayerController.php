<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPraiseprayerRequest;
use App\Http\Requests\StorePraiseprayerRequest;
use App\Http\Requests\UpdatePraiseprayerRequest;
use App\Models\Praiseprayer;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PraiseprayerController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('praiseprayer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $praiseprayers = Praiseprayer::all();

        return view('frontend.praiseprayers.index', compact('praiseprayers'));
    }

    public function create()
    {
        abort_if(Gate::denies('praiseprayer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.praiseprayers.create');
    }

    public function store(StorePraiseprayerRequest $request)
    {
        $praiseprayer = Praiseprayer::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $praiseprayer->id]);
        }

        return redirect()->route('frontend.praiseprayers.index');
    }

    public function edit(Praiseprayer $praiseprayer)
    {
        abort_if(Gate::denies('praiseprayer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.praiseprayers.edit', compact('praiseprayer'));
    }

    public function update(UpdatePraiseprayerRequest $request, Praiseprayer $praiseprayer)
    {
        $praiseprayer->update($request->all());

        return redirect()->route('frontend.praiseprayers.index');
    }

    public function show(Praiseprayer $praiseprayer)
    {
        abort_if(Gate::denies('praiseprayer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.praiseprayers.show', compact('praiseprayer'));
    }

    public function destroy(Praiseprayer $praiseprayer)
    {
        abort_if(Gate::denies('praiseprayer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $praiseprayer->delete();

        return back();
    }

    public function massDestroy(MassDestroyPraiseprayerRequest $request)
    {
        Praiseprayer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('praiseprayer_create') && Gate::denies('praiseprayer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Praiseprayer();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
