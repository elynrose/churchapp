@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.uploader.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.uploaders.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.uploader.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.uploader.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_preached">{{ trans('cruds.uploader.fields.date_preached') }}</label>
                <input class="form-control date {{ $errors->has('date_preached') ? 'is-invalid' : '' }}" type="text" name="date_preached" id="date_preached" value="{{ old('date_preached') }}" required>
                @if($errors->has('date_preached'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_preached') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.uploader.fields.date_preached_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="preached_by">{{ trans('cruds.uploader.fields.preached_by') }}</label>
                <input class="form-control {{ $errors->has('preached_by') ? 'is-invalid' : '' }}" type="text" name="preached_by" id="preached_by" value="{{ old('preached_by', '') }}" required>
                @if($errors->has('preached_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('preached_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.uploader.fields.preached_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="location">{{ trans('cruds.uploader.fields.location') }}</label>
                <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" type="text" name="location" id="location" value="{{ old('location', '') }}">
                @if($errors->has('location'))
                    <div class="invalid-feedback">
                        {{ $errors->first('location') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.uploader.fields.location_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="file_code">{{ trans('cruds.uploader.fields.file_code') }}</label>
                <input class="form-control {{ $errors->has('file_code') ? 'is-invalid' : '' }}" type="text" name="file_code" id="file_code" value="{{ old('file_code', '') }}" required>
                @if($errors->has('file_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('file_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.uploader.fields.file_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ftp_path">{{ trans('cruds.uploader.fields.ftp_path') }}</label>
                <div class="needsclick dropzone {{ $errors->has('ftp_path') ? 'is-invalid' : '' }}" id="ftp_path-dropzone">
                </div>
                @if($errors->has('ftp_path'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ftp_path') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.uploader.fields.ftp_path_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="coconut_job_code">{{ trans('cruds.uploader.fields.coconut_job_code') }}</label>
                <input class="form-control {{ $errors->has('coconut_job_code') ? 'is-invalid' : '' }}" type="text" name="coconut_job_code" id="coconut_job_code" value="{{ old('coconut_job_code', '') }}">
                @if($errors->has('coconut_job_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('coconut_job_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.uploader.fields.coconut_job_code_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('processed') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="processed" value="0">
                    <input class="form-check-input" type="checkbox" name="processed" id="processed" value="1" {{ old('processed', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="processed">{{ trans('cruds.uploader.fields.processed') }}</label>
                </div>
                @if($errors->has('processed'))
                    <div class="invalid-feedback">
                        {{ $errors->first('processed') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.uploader.fields.processed_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.ftpPathDropzone = {
    url: '{{ route('admin.uploaders.storeMedia') }}',
    maxFilesize: 10000, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10000
    },
    success: function (file, response) {
      $('form').find('input[name="ftp_path"]').remove()
      $('form').append('<input type="hidden" name="ftp_path" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="ftp_path"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($uploader) && $uploader->ftp_path)
      var file = {!! json_encode($uploader->ftp_path) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="ftp_path" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection