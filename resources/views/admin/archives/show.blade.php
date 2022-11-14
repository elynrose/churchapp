@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.archive.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.archives.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.archive.fields.id') }}
                        </th>
                        <td>
                            {{ $archive->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.archive.fields.title') }}
                        </th>
                        <td>
                            {{ $archive->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.archive.fields.location') }}
                        </th>
                        <td>
                            {{ $archive->location }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.archive.fields.language') }}
                        </th>
                        <td>
                            {{ App\Models\Archive::LANGUAGE_SELECT[$archive->language] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.archive.fields.name') }}
                        </th>
                        <td>
                            {{ $archive->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.archive.fields.date_preached') }}
                        </th>
                        <td>
                            {{ $archive->date_preached }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.archive.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $archive->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.archive.fields.video_url') }}
                        </th>
                        <td>
                            {{ $archive->video_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.archive.fields.audio_url') }}
                        </th>
                        <td>
                            {{ $archive->audio_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.archive.fields.pdf_file') }}
                        </th>
                        <td>
                            {{ $archive->pdf_file }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.archives.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection