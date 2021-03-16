@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pageLayout.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.page-layouts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pageLayout.fields.id') }}
                        </th>
                        <td>
                            {{ $pageLayout->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pageLayout.fields.page') }}
                        </th>
                        <td>
                            {{ $pageLayout->page->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pageLayout.fields.module') }}
                        </th>
                        <td>
                            {{ $pageLayout->module->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pageLayout.fields.ordering') }}
                        </th>
                        <td>
                            {{ $pageLayout->ordering }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.page-layouts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection