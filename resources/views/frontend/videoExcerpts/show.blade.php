@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.videoExcerpt.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.video-excerpts.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.videoExcerpt.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $videoExcerpt->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.videoExcerpt.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $videoExcerpt->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.videoExcerpt.fields.preached_by') }}
                                    </th>
                                    <td>
                                        {{ $videoExcerpt->preached_by }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.videoExcerpt.fields.date_preached') }}
                                    </th>
                                    <td>
                                        {{ $videoExcerpt->date_preached }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.videoExcerpt.fields.location') }}
                                    </th>
                                    <td>
                                        {{ $videoExcerpt->location }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.videoExcerpt.fields.video_file') }}
                                    </th>
                                    <td>
                                        @if($videoExcerpt->video_file)
                                            <a href="{{ $videoExcerpt->video_file->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.videoExcerpt.fields.ordering') }}
                                    </th>
                                    <td>
                                        {{ $videoExcerpt->ordering }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.videoExcerpt.fields.active') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $videoExcerpt->active ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.video-excerpts.index') }}">
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