@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sisterChurch.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sister-churches.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sisterChurch.fields.id') }}
                        </th>
                        <td>
                            {{ $sisterChurch->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sisterChurch.fields.title') }}
                        </th>
                        <td>
                            {{ $sisterChurch->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sisterChurch.fields.link_to') }}
                        </th>
                        <td>
                            {{ $sisterChurch->link_to }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sisterChurch.fields.photo') }}
                        </th>
                        <td>
                            @if($sisterChurch->photo)
                                <a href="{{ $sisterChurch->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $sisterChurch->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sister-churches.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection