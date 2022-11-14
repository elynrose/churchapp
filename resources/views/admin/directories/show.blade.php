@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.directory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.directories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.directory.fields.id') }}
                        </th>
                        <td>
                            {{ $directory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.directory.fields.first_name') }}
                        </th>
                        <td>
                            {{ $directory->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.directory.fields.last_name') }}
                        </th>
                        <td>
                            {{ $directory->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.directory.fields.birthday') }}
                        </th>
                        <td>
                            {{ $directory->birthday }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.directory.fields.email') }}
                        </th>
                        <td>
                            {{ $directory->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.directory.fields.phone') }}
                        </th>
                        <td>
                            {{ $directory->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.directory.fields.address') }}
                        </th>
                        <td>
                            {{ $directory->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.directory.fields.photo') }}
                        </th>
                        <td>
                            @if($directory->photo)
                                <a href="{{ $directory->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $directory->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.directories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection