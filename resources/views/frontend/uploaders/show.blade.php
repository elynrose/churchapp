@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.uploader.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.uploaders.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.uploader.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $uploader->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.uploader.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $uploader->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.uploader.fields.date_preached') }}
                                    </th>
                                    <td>
                                        {{ $uploader->date_preached }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.uploader.fields.preached_by') }}
                                    </th>
                                    <td>
                                        {{ $uploader->preached_by }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.uploader.fields.location') }}
                                    </th>
                                    <td>
                                        {{ $uploader->location }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.uploader.fields.file_code') }}
                                    </th>
                                    <td>
                                        {{ $uploader->file_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.uploader.fields.ftp_path') }}
                                    </th>
                                    <td>
                                        @if($uploader->ftp_path)
                                            <a href="{{ $uploader->ftp_path->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.uploader.fields.coconut_job_code') }}
                                    </th>
                                    <td>
                                        {{ $uploader->coconut_job_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.uploader.fields.processed') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $uploader->processed ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.uploaders.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection