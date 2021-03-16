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
                            {{ trans('cruds.app.fields.roles') }}
                        </th>
                        <td>
                            @foreach($app->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
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

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#app_pages" role="tab" data-toggle="tab">
                {{ trans('cruds.page.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="app_pages">
            @includeIf('admin.apps.relationships.appPages', ['pages' => $app->appPages])
        </div>
    </div>
</div>

@endsection