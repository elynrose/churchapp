@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.archive.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.archives.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.archive.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.archive.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="location">{{ trans('cruds.archive.fields.location') }}</label>
                            <input class="form-control" type="text" name="location" id="location" value="{{ old('location', '') }}">
                            @if($errors->has('location'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('location') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.archive.fields.location_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.archive.fields.language') }}</label>
                            <select class="form-control" name="language" id="language" required>
                                <option value disabled {{ old('language', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Archive::LANGUAGE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('language', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('language'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('language') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.archive.fields.language_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.archive.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.archive.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="date_preached">{{ trans('cruds.archive.fields.date_preached') }}</label>
                            <input class="form-control date" type="text" name="date_preached" id="date_preached" value="{{ old('date_preached') }}" required>
                            @if($errors->has('date_preached'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date_preached') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.archive.fields.date_preached_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="published" value="0">
                                <input type="checkbox" name="published" id="published" value="1" {{ old('published', 0) == 1 || old('published') === null ? 'checked' : '' }}>
                                <label for="published">{{ trans('cruds.archive.fields.published') }}</label>
                            </div>
                            @if($errors->has('published'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('published') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.archive.fields.published_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="video_url">{{ trans('cruds.archive.fields.video_url') }}</label>
                            <input class="form-control" type="text" name="video_url" id="video_url" value="{{ old('video_url', '') }}">
                            @if($errors->has('video_url'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('video_url') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.archive.fields.video_url_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="audio_url">{{ trans('cruds.archive.fields.audio_url') }}</label>
                            <input class="form-control" type="text" name="audio_url" id="audio_url" value="{{ old('audio_url', '') }}">
                            @if($errors->has('audio_url'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('audio_url') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.archive.fields.audio_url_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="pdf_file">{{ trans('cruds.archive.fields.pdf_file') }}</label>
                            <input class="form-control" type="text" name="pdf_file" id="pdf_file" value="{{ old('pdf_file', '') }}">
                            @if($errors->has('pdf_file'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pdf_file') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.archive.fields.pdf_file_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection