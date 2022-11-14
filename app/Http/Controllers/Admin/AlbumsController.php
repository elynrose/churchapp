<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAlbumRequest;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Models\Album;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AlbumsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('album_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $albums = Album::with(['media'])->get();

        return view('admin.albums.index', compact('albums'));
    }

    public function create()
    {
        abort_if(Gate::denies('album_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.albums.create');
    }

    public function store(StoreAlbumRequest $request)
    {
        $album = Album::create($request->all());

        if ($request->input('cover_photo', false)) {
            $album->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover_photo'))))->toMediaCollection('cover_photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $album->id]);
        }

        return redirect()->route('admin.albums.index');
    }

    public function edit(Album $album)
    {
        abort_if(Gate::denies('album_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.albums.edit', compact('album'));
    }

    public function update(UpdateAlbumRequest $request, Album $album)
    {
        $album->update($request->all());

        if ($request->input('cover_photo', false)) {
            if (!$album->cover_photo || $request->input('cover_photo') !== $album->cover_photo->file_name) {
                if ($album->cover_photo) {
                    $album->cover_photo->delete();
                }
                $album->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover_photo'))))->toMediaCollection('cover_photo');
            }
        } elseif ($album->cover_photo) {
            $album->cover_photo->delete();
        }

        return redirect()->route('admin.albums.index');
    }

    public function show(Album $album)
    {
        abort_if(Gate::denies('album_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.albums.show', compact('album'));
    }

    public function destroy(Album $album)
    {
        abort_if(Gate::denies('album_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $album->delete();

        return back();
    }

    public function massDestroy(MassDestroyAlbumRequest $request)
    {
        Album::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('album_create') && Gate::denies('album_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Album();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
