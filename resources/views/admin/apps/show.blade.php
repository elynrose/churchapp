@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.app.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.apps.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.app.fields.id') }}
                        </th>
                        <td>
                            {{ $app->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.app.fields.name') }}
                        </th>
                        <td>
                            {{ $app->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.app.fields.description') }}
                        </th>
                        <td>
                            {{ $app->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.app.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $app->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.apps.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection