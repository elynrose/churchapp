<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyWebsiteSettingRequest;
use App\Http\Requests\StoreWebsiteSettingRequest;
use App\Http\Requests\UpdateWebsiteSettingRequest;
use App\Models\WebsiteSetting;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class WebsiteSettingsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('website_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $websiteSettings = WebsiteSetting::with(['media'])->get();

        return view('admin.websiteSettings.index', compact('websiteSettings'));
    }

    public function create()
    {
        abort_if(Gate::denies('website_setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.websiteSettings.create');
    }

    public function store(StoreWebsiteSettingRequest $request)
    {
        $websiteSetting = WebsiteSetting::create($request->all());

        if ($request->input('logo', false)) {
            $websiteSetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($request->input('favicon', false)) {
            $websiteSetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('favicon'))))->toMediaCollection('favicon');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $websiteSetting->id]);
        }

        return redirect()->route('admin.website-settings.index');
    }

    public function edit(WebsiteSetting $websiteSetting)
    {
        abort_if(Gate::denies('website_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.websiteSettings.edit', compact('websiteSetting'));
    }

    public function update(UpdateWebsiteSettingRequest $request, WebsiteSetting $websiteSetting)
    {
        $websiteSetting->update($request->all());

        if ($request->input('logo', false)) {
            if (!$websiteSetting->logo || $request->input('logo') !== $websiteSetting->logo->file_name) {
                if ($websiteSetting->logo) {
                    $websiteSetting->logo->delete();
                }
                $websiteSetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($websiteSetting->logo) {
            $websiteSetting->logo->delete();
        }

        if ($request->input('favicon', false)) {
            if (!$websiteSetting->favicon || $request->input('favicon') !== $websiteSetting->favicon->file_name) {
                if ($websiteSetting->favicon) {
                    $websiteSetting->favicon->delete();
                }
                $websiteSetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('favicon'))))->toMediaCollection('favicon');
            }
        } elseif ($websiteSetting->favicon) {
            $websiteSetting->favicon->delete();
        }

        return redirect()->route('admin.website-settings.index');
    }

    public function show(WebsiteSetting $websiteSetting)
    {
        abort_if(Gate::denies('website_setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.websiteSettings.show', compact('websiteSetting'));
    }

    public function destroy(WebsiteSetting $websiteSetting)
    {
        abort_if(Gate::denies('website_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $websiteSetting->delete();

        return back();
    }

    public function massDestroy(MassDestroyWebsiteSettingRequest $request)
    {
        WebsiteSetting::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('website_setting_create') && Gate::denies('website_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new WebsiteSetting();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
