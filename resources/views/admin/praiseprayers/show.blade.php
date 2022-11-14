@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.praiseprayer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.praiseprayers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.praiseprayer.fields.id') }}
                        </th>
                        <td>
                            {{ $praiseprayer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.praiseprayer.fields.select_type') }}
                        </th>
                        <td>
                            {{ App\Models\Praiseprayer::SELECT_TYPE_SELECT[$praiseprayer->select_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.praiseprayer.fields.full_name') }}
                        </th>
                        <td>
                            {{ $praiseprayer->full_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.praiseprayer.fields.on_behalf_of') }}
                        </th>
                        <td>
                            {{ $praiseprayer->on_behalf_of }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.praiseprayer.fields.details') }}
                        </th>
                        <td>
                            {!! $praiseprayer->details !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.praiseprayer.fields.date_submitted') }}
                        </th>
                        <td>
                            {{ $praiseprayer->date_submitted }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.praiseprayer.fields.closed') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $praiseprayer->closed ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.praiseprayers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection