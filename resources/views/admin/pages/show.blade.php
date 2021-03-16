@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.page.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.id') }}
                        </th>
                        <td>
                            {{ $page->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.app') }}
                        </th>
                        <td>
                            @foreach($page->apps as $key => $app)
                                <span class="label label-info">{{ $app->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.name') }}
                        </th>
                        <td>
                            {{ $page->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.cover_image') }}
                        </th>
                        <td>
                            @if($page->cover_image)
                                <a href="{{ $page->cover_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $page->cover_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $page->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pages.index') }}">
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
            <a class="nav-link" href="#page_page_layouts" role="tab" data-toggle="tab">
                {{ trans('cruds.pageLayout.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="page_page_layouts">
            @includeIf('admin.pages.relationships.pagePageLayouts', ['pageLayouts' => $page->pagePageLayouts])
        </div>
    </div>
</div>

@endsection