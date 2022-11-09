@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.weeksMessage.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.weeks-messages.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.weeksMessage.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $weeksMessage->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.weeksMessage.fields.week_of') }}
                                    </th>
                                    <td>
                                        {{ $weeksMessage->week_of }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.weeksMessage.fields.message_titles') }}
                                    </th>
                                    <td>
                                        {{ $weeksMessage->message_titles }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.weeksMessage.fields.files') }}
                                    </th>
                                    <td>
                                        @foreach($weeksMessage->files as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.weeksMessage.fields.active') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $weeksMessage->active ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.weeks-messages.index') }}">
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