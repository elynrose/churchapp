<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyQotdRequest;
use App\Http\Requests\StoreQotdRequest;
use App\Http\Requests\UpdateQotdRequest;
use App\Models\Qotd;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class QotdController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('qotd_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qotds = Qotd::with(['media'])->get();

        return view('frontend.qotds.index', compact('qotds'));
    }

    public function create()
    {
        abort_if(Gate::denies('qotd_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.qotds.create');
    }

    public function store(StoreQotdRequest $request)
    {
        $qotd = Qotd::create($request->all());

        if ($request->input('video_file', false)) {
            $qotd->addMedia(storage_path('tmp/uploads/' . basename($request->input('video_file'))))->toMediaCollection('video_file');
        }

        if ($request->input('audio_file', false)) {
            $qotd->addMedia(storage_path('tmp/uploads/' . basename($request->input('audio_file'))))->toMediaCollection('audio_file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $qotd->id]);
        }

        return redirect()->route('frontend.qotds.index');
    }

    public function edit(Qotd $qotd)
    {
        abort_if(Gate::denies('qotd_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.qotds.edit', compact('qotd'));
    }

    public function update(UpdateQotdRequest $request, Qotd $qotd)
    {
        $qotd->update($request->all());

        if ($request->input('video_file', false)) {
            if (!$qotd->video_file || $request->input('video_file') !== $qotd->video_file->file_name) {
                if ($qotd->video_file) {
                    $qotd->video_file->delete();
                }
                $qotd->addMedia(storage_path('tmp/uploads/' . basename($request->input('video_file'))))->toMediaCollection('video_file');
            }
        } elseif ($qotd->video_file) {
            $qotd->video_file->delete();
        }

        if ($request->input('audio_file', false)) {
            if (!$qotd->audio_file || $request->input('audio_file') !== $qotd->audio_file->file_name) {
                if ($qotd->audio_file) {
                    $qotd->audio_file->delete();
                }
                $qotd->addMedia(storage_path('tmp/uploads/' . basename($request->input('audio_file'))))->toMediaCollection('audio_file');
            }
        } elseif ($qotd->audio_file) {
            $qotd->audio_file->delete();
        }

        return redirect()->route('frontend.qotds.index');
    }

    public function show(Qotd $qotd)
    {
        abort_if(Gate::denies('qotd_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.qotds.show', compact('qotd'));
    }

    public function destroy(Qotd $qotd)
    {
        abort_if(Gate::denies('qotd_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qotd->delete();

        return back();
    }

    public function massDestroy(MassDestroyQotdRequest $request)
    {
        Qotd::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('qotd_create') && Gate::denies('qotd_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Qotd();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
