@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.qotd.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.qotds.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.qotd.fields.id') }}
                        </th>
                        <td>
                            {{ $qotd->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qotd.fields.title') }}
                        </th>
                        <td>
                            {{ $qotd->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qotd.fields.quote') }}
                        </th>
                        <td>
                            {{ $qotd->quote }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qotd.fields.video_file') }}
                        </th>
                        <td>
                            @if($qotd->video_file)
                                <a href="{{ $qotd->video_file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qotd.fields.audio_file') }}
                        </th>
                        <td>
                            @if($qotd->audio_file)
                                <a href="{{ $qotd->audio_file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.qotds.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection