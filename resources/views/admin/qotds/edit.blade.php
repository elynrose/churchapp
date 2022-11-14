@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.qotd.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.qotds.update", [$qotd->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.qotd.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $qotd->title) }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.qotd.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quote">{{ trans('cruds.qotd.fields.quote') }}</label>
                <textarea class="form-control {{ $errors->has('quote') ? 'is-invalid' : '' }}" name="quote" id="quote">{{ old('quote', $qotd->quote) }}</textarea>
                @if($errors->has('quote'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quote') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.qotd.fields.quote_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="video_file">{{ trans('cruds.qotd.fields.video_file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('video_file') ? 'is-invalid' : '' }}" id="video_file-dropzone">
                </div>
                @if($errors->has('video_file'))
                    <div class="invalid-feedback">
                        {{ $errors->first('video_file') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.qotd.fields.video_file_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="audio_file">{{ trans('cruds.qotd.fields.audio_file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('audio_file') ? 'is-invalid' : '' }}" id="audio_file-dropzone">
                </div>
                @if($errors->has('audio_file'))
                    <div class="invalid-feedback">
                        {{ $errors->first('audio_file') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.qotd.fields.audio_file_helper') }}</span>
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
    Dropzone.options.videoFileDropzone = {
    url: '{{ route('admin.qotds.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="video_file"]').remove()
      $('form').append('<input type="hidden" name="video_file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="video_file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($qotd) && $qotd->video_file)
      var file = {!! json_encode($qotd->video_file) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="video_file" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.audioFileDropzone = {
    url: '{{ route('admin.qotds.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="audio_file"]').remove()
      $('form').append('<input type="hidden" name="audio_file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="audio_file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($qotd) && $qotd->audio_file)
      var file = {!! json_encode($qotd->audio_file) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="audio_file" value="' + file.file_name + '">')
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