<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyUploaderRequest;
use App\Http\Requests\StoreUploaderRequest;
use App\Http\Requests\UpdateUploaderRequest;
use App\Models\Uploader;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class UploaderController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('uploader_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $uploaders = Uploader::with(['media'])->get();

        return view('frontend.uploaders.index', compact('uploaders'));
    }

    public function create()
    {
        abort_if(Gate::denies('uploader_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.uploaders.create');
    }

    public function store(StoreUploaderRequest $request)
    {
        $uploader = Uploader::create($request->all());

        if ($request->input('ftp_path', false)) {
            $uploader->addMedia(storage_path('tmp/uploads/' . basename($request->input('ftp_path'))))->toMediaCollection('ftp_path');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $uploader->id]);
        }

        return redirect()->route('frontend.uploaders.index');
    }

    public function edit(Uploader $uploader)
    {
        abort_if(Gate::denies('uploader_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.uploaders.edit', compact('uploader'));
    }

    public function update(UpdateUploaderRequest $request, Uploader $uploader)
    {
        $uploader->update($request->all());

        if ($request->input('ftp_path', false)) {
            if (!$uploader->ftp_path || $request->input('ftp_path') !== $uploader->ftp_path->file_name) {
                if ($uploader->ftp_path) {
                    $uploader->ftp_path->delete();
                }
                $uploader->addMedia(storage_path('tmp/uploads/' . basename($request->input('ftp_path'))))->toMediaCollection('ftp_path');
            }
        } elseif ($uploader->ftp_path) {
            $uploader->ftp_path->delete();
        }

        return redirect()->route('frontend.uploaders.index');
    }

    public function show(Uploader $uploader)
    {
        abort_if(Gate::denies('uploader_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.uploaders.show', compact('uploader'));
    }

    public function destroy(Uploader $uploader)
    {
        abort_if(Gate::denies('uploader_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $uploader->delete();

        return back();
    }

    public function massDestroy(MassDestroyUploaderRequest $request)
    {
        Uploader::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('uploader_create') && Gate::denies('uploader_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Uploader();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
