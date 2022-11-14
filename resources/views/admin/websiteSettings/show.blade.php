@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.websiteSetting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.website-settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.websiteSetting.fields.id') }}
                        </th>
                        <td>
                            {{ $websiteSetting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.websiteSetting.fields.site_name') }}
                        </th>
                        <td>
                            {{ $websiteSetting->site_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.websiteSetting.fields.logo') }}
                        </th>
                        <td>
                            @if($websiteSetting->logo)
                                <a href="{{ $websiteSetting->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $websiteSetting->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.websiteSetting.fields.favicon') }}
                        </th>
                        <td>
                            @if($websiteSetting->favicon)
                                <a href="{{ $websiteSetting->favicon->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.websiteSetting.fields.meta_content') }}
                        </th>
                        <td>
                            {{ $websiteSetting->meta_content }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.websiteSetting.fields.keywords') }}
                        </th>
                        <td>
                            {{ $websiteSetting->keywords }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.websiteSetting.fields.global_css') }}
                        </th>
                        <td>
                            {{ $websiteSetting->global_css }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.websiteSetting.fields.global_js') }}
                        </th>
                        <td>
                            {{ $websiteSetting->global_js }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.websiteSetting.fields.maintainance_mode') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $websiteSetting->maintainance_mode ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.websiteSetting.fields.maintainance_message') }}
                        </th>
                        <td>
                            {{ $websiteSetting->maintainance_message }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.website-settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection