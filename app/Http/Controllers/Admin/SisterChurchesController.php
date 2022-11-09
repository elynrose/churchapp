<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySisterChurchRequest;
use App\Http\Requests\StoreSisterChurchRequest;
use App\Http\Requests\UpdateSisterChurchRequest;
use App\Models\SisterChurch;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SisterChurchesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('sister_church_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sisterChurches = SisterChurch::with(['media'])->get();

        return view('admin.sisterChurches.index', compact('sisterChurches'));
    }

    public function create()
    {
        abort_if(Gate::denies('sister_church_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sisterChurches.create');
    }

    public function store(StoreSisterChurchRequest $request)
    {
        $sisterChurch = SisterChurch::create($request->all());

        if ($request->input('photo', false)) {
            $sisterChurch->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $sisterChurch->id]);
        }

        return redirect()->route('admin.sister-churches.index');
    }

    public function edit(SisterChurch $sisterChurch)
    {
        abort_if(Gate::denies('sister_church_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sisterChurches.edit', compact('sisterChurch'));
    }

    public function update(UpdateSisterChurchRequest $request, SisterChurch $sisterChurch)
    {
        $sisterChurch->update($request->all());

        if ($request->input('photo', false)) {
            if (!$sisterChurch->photo || $request->input('photo') !== $sisterChurch->photo->file_name) {
                if ($sisterChurch->photo) {
                    $sisterChurch->photo->delete();
                }
                $sisterChurch->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($sisterChurch->photo) {
            $sisterChurch->photo->delete();
        }

        return redirect()->route('admin.sister-churches.index');
    }

    public function show(SisterChurch $sisterChurch)
    {
        abort_if(Gate::denies('sister_church_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sisterChurches.show', compact('sisterChurch'));
    }

    public function destroy(SisterChurch $sisterChurch)
    {
        abort_if(Gate::denies('sister_church_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sisterChurch->delete();

        return back();
    }

    public function massDestroy(MassDestroySisterChurchRequest $request)
    {
        SisterChurch::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('sister_church_create') && Gate::denies('sister_church_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SisterChurch();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
