@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.file.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.files.update", [$file->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="section_id">{{ trans('cruds.file.fields.section') }}</label>
                            <select class="form-control select2" name="section_id" id="section_id" required>
                                @foreach($sections as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('section_id') ? old('section_id') : $file->section->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('section'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('section') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.file.fields.section_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="file_name">{{ trans('cruds.file.fields.file_name') }}</label>
                            <input class="form-control" type="text" name="file_name" id="file_name" value="{{ old('file_name', $file->file_name) }}" required>
                            @if($errors->has('file_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('file_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.file.fields.file_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="file">{{ trans('cruds.file.fields.file') }}</label>
                            <div class="needsclick dropzone" id="file-dropzone">
                            </div>
                            @if($errors->has('file'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('file') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.file.fields.file_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.file.fields.file_type') }}</label>
                            <select class="form-control" name="file_type" id="file_type" required>
                                <option value disabled {{ old('file_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\File::FILE_TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('file_type', $file->file_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('file_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('file_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.file.fields.file_type_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.fileDropzone = {
    url: '{{ route('frontend.files.storeMedia') }}',
    maxFilesize: 200, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 200
    },
    success: function (file, response) {
      $('form').find('input[name="file"]').remove()
      $('form').append('<input type="hidden" name="file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($file) && $file->file)
      var file = {!! json_encode($file->file) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="file" value="' + file.file_name + '">')
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