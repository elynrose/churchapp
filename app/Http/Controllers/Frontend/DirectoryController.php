<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDirectoryRequest;
use App\Http\Requests\StoreDirectoryRequest;
use App\Http\Requests\UpdateDirectoryRequest;
use App\Models\Directory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DirectoryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('directory_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $directories = Directory::with(['media'])->get();

        return view('frontend.directories.index', compact('directories'));
    }

    public function create()
    {
        abort_if(Gate::denies('directory_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.directories.create');
    }

    public function store(StoreDirectoryRequest $request)
    {
        $directory = Directory::create($request->all());

        if ($request->input('photo', false)) {
            $directory->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $directory->id]);
        }

        return redirect()->route('frontend.directories.index');
    }

    public function edit(Directory $directory)
    {
        abort_if(Gate::denies('directory_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.directories.edit', compact('directory'));
    }

    public function update(UpdateDirectoryRequest $request, Directory $directory)
    {
        $directory->update($request->all());

        if ($request->input('photo', false)) {
            if (!$directory->photo || $request->input('photo') !== $directory->photo->file_name) {
                if ($directory->photo) {
                    $directory->photo->delete();
                }
                $directory->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($directory->photo) {
            $directory->photo->delete();
        }

        return redirect()->route('frontend.directories.index');
    }

    public function show(Directory $directory)
    {
        abort_if(Gate::denies('directory_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.directories.show', compact('directory'));
    }

    public function destroy(Directory $directory)
    {
        abort_if(Gate::denies('directory_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $directory->delete();

        return back();
    }

    public function massDestroy(MassDestroyDirectoryRequest $request)
    {
        Directory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('directory_create') && Gate::denies('directory_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Directory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
