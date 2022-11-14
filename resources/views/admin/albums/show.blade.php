@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.album.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.albums.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.album.fields.id') }}
                        </th>
                        <td>
                            {{ $album->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.album.fields.name') }}
                        </th>
                        <td>
                            {{ $album->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.album.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $album->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.album.fields.cover_photo') }}
                        </th>
                        <td>
                            @if($album->cover_photo)
                                <a href="{{ $album->cover_photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $album->cover_photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.albums.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection