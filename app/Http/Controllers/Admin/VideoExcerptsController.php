<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyVideoExcerptRequest;
use App\Http\Requests\StoreVideoExcerptRequest;
use App\Http\Requests\UpdateVideoExcerptRequest;
use App\Models\VideoExcerpt;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class VideoExcerptsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('video_excerpt_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $videoExcerpts = VideoExcerpt::with(['media'])->get();

        return view('admin.videoExcerpts.index', compact('videoExcerpts'));
    }

    public function create()
    {
        abort_if(Gate::denies('video_excerpt_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.videoExcerpts.create');
    }

    public function store(StoreVideoExcerptRequest $request)
    {
        $videoExcerpt = VideoExcerpt::create($request->all());

        if ($request->input('video_file', false)) {
            $videoExcerpt->addMedia(storage_path('tmp/uploads/' . basename($request->input('video_file'))))->toMediaCollection('video_file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $videoExcerpt->id]);
        }

        return redirect()->route('admin.video-excerpts.index');
    }

    public function edit(VideoExcerpt $videoExcerpt)
    {
        abort_if(Gate::denies('video_excerpt_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.videoExcerpts.edit', compact('videoExcerpt'));
    }

    public function update(UpdateVideoExcerptRequest $request, VideoExcerpt $videoExcerpt)
    {
        $videoExcerpt->update($request->all());

        if ($request->input('video_file', false)) {
            if (!$videoExcerpt->video_file || $request->input('video_file') !== $videoExcerpt->video_file->file_name) {
                if ($videoExcerpt->video_file) {
                    $videoExcerpt->video_file->delete();
                }
                $videoExcerpt->addMedia(storage_path('tmp/uploads/' . basename($request->input('video_file'))))->toMediaCollection('video_file');
            }
        } elseif ($videoExcerpt->video_file) {
            $videoExcerpt->video_file->delete();
        }

        return redirect()->route('admin.video-excerpts.index');
    }

    public function show(VideoExcerpt $videoExcerpt)
    {
        abort_if(Gate::denies('video_excerpt_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.videoExcerpts.show', compact('videoExcerpt'));
    }

    public function destroy(VideoExcerpt $videoExcerpt)
    {
        abort_if(Gate::denies('video_excerpt_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $videoExcerpt->delete();

        return back();
    }

    public function massDestroy(MassDestroyVideoExcerptRequest $request)
    {
        VideoExcerpt::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('video_excerpt_create') && Gate::denies('video_excerpt_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new VideoExcerpt();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
