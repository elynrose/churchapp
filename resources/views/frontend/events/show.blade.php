@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.event.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.events.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.event.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $event->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.event.fields.event_cover_img') }}
                                    </th>
                                    <td>
                                        @if($event->event_cover_img)
                                            <a href="{{ $event->event_cover_img->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $event->event_cover_img->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.event.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $event->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.event.fields.description') }}
                                    </th>
                                    <td>
                                        {{ $event->description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.event.fields.event_date') }}
                                    </th>
                                    <td>
                                        {{ $event->event_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.event.fields.event_time') }}
                                    </th>
                                    <td>
                                        {{ $event->event_time }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.event.fields.event_address') }}
                                    </th>
                                    <td>
                                        {{ $event->event_address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.event.fields.published') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $event->published ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.event.fields.app') }}
                                    </th>
                                    <td>
                                        {{ $event->app->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.event.fields.created_by') }}
                                    </th>
                                    <td>
                                        {{ $event->created_by->name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.events.index') }}">
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