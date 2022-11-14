@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.videoExcerpt.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.video-excerpts.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.videoExcerpt.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.videoExcerpt.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="preached_by">{{ trans('cruds.videoExcerpt.fields.preached_by') }}</label>
                            <input class="form-control" type="text" name="preached_by" id="preached_by" value="{{ old('preached_by', '') }}" required>
                            @if($errors->has('preached_by'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('preached_by') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.videoExcerpt.fields.preached_by_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="date_preached">{{ trans('cruds.videoExcerpt.fields.date_preached') }}</label>
                            <input class="form-control date" type="text" name="date_preached" id="date_preached" value="{{ old('date_preached') }}" required>
                            @if($errors->has('date_preached'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date_preached') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.videoExcerpt.fields.date_preached_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="location">{{ trans('cruds.videoExcerpt.fields.location') }}</label>
                            <input class="form-control" type="text" name="location" id="location" value="{{ old('location', '') }}">
                            @if($errors->has('location'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('location') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.videoExcerpt.fields.location_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="video_file">{{ trans('cruds.videoExcerpt.fields.video_file') }}</label>
                            <div class="needsclick dropzone" id="video_file-dropzone">
                            </div>
                            @if($errors->has('video_file'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('video_file') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.videoExcerpt.fields.video_file_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="ordering">{{ trans('cruds.videoExcerpt.fields.ordering') }}</label>
                            <input class="form-control" type="number" name="ordering" id="ordering" value="{{ old('ordering', '') }}" step="1">
                            @if($errors->has('ordering'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('ordering') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.videoExcerpt.fields.ordering_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="active" value="0">
                                <input type="checkbox" name="active" id="active" value="1" {{ old('active', 0) == 1 ? 'checked' : '' }}>
                                <label for="active">{{ trans('cruds.videoExcerpt.fields.active') }}</label>
                            </div>
                            @if($errors->has('active'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('active') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.videoExcerpt.fields.active_helper') }}</span>
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
    Dropzone.options.videoFileDropzone = {
    url: '{{ route('frontend.video-excerpts.storeMedia') }}',
    maxFilesize: 400, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 400
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
@if(isset($videoExcerpt) && $videoExcerpt->video_file)
      var file = {!! json_encode($videoExcerpt->video_file) !!}
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
@endsection