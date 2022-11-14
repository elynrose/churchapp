@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.websiteSetting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.website-settings.update", [$websiteSetting->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="site_name">{{ trans('cruds.websiteSetting.fields.site_name') }}</label>
                <input class="form-control {{ $errors->has('site_name') ? 'is-invalid' : '' }}" type="text" name="site_name" id="site_name" value="{{ old('site_name', $websiteSetting->site_name) }}" required>
                @if($errors->has('site_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.websiteSetting.fields.site_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logo">{{ trans('cruds.websiteSetting.fields.logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.websiteSetting.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="favicon">{{ trans('cruds.websiteSetting.fields.favicon') }}</label>
                <div class="needsclick dropzone {{ $errors->has('favicon') ? 'is-invalid' : '' }}" id="favicon-dropzone">
                </div>
                @if($errors->has('favicon'))
                    <div class="invalid-feedback">
                        {{ $errors->first('favicon') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.websiteSetting.fields.favicon_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="meta_content">{{ trans('cruds.websiteSetting.fields.meta_content') }}</label>
                <textarea class="form-control {{ $errors->has('meta_content') ? 'is-invalid' : '' }}" name="meta_content" id="meta_content">{{ old('meta_content', $websiteSetting->meta_content) }}</textarea>
                @if($errors->has('meta_content'))
                    <div class="invalid-feedback">
                        {{ $errors->first('meta_content') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.websiteSetting.fields.meta_content_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keywords">{{ trans('cruds.websiteSetting.fields.keywords') }}</label>
                <textarea class="form-control {{ $errors->has('keywords') ? 'is-invalid' : '' }}" name="keywords" id="keywords">{{ old('keywords', $websiteSetting->keywords) }}</textarea>
                @if($errors->has('keywords'))
                    <div class="invalid-feedback">
                        {{ $errors->first('keywords') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.websiteSetting.fields.keywords_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="global_css">{{ trans('cruds.websiteSetting.fields.global_css') }}</label>
                <textarea class="form-control {{ $errors->has('global_css') ? 'is-invalid' : '' }}" name="global_css" id="global_css">{{ old('global_css', $websiteSetting->global_css) }}</textarea>
                @if($errors->has('global_css'))
                    <div class="invalid-feedback">
                        {{ $errors->first('global_css') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.websiteSetting.fields.global_css_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="global_js">{{ trans('cruds.websiteSetting.fields.global_js') }}</label>
                <textarea class="form-control {{ $errors->has('global_js') ? 'is-invalid' : '' }}" name="global_js" id="global_js">{{ old('global_js', $websiteSetting->global_js) }}</textarea>
                @if($errors->has('global_js'))
                    <div class="invalid-feedback">
                        {{ $errors->first('global_js') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.websiteSetting.fields.global_js_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('maintainance_mode') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="maintainance_mode" value="0">
                    <input class="form-check-input" type="checkbox" name="maintainance_mode" id="maintainance_mode" value="1" {{ $websiteSetting->maintainance_mode || old('maintainance_mode', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="maintainance_mode">{{ trans('cruds.websiteSetting.fields.maintainance_mode') }}</label>
                </div>
                @if($errors->has('maintainance_mode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('maintainance_mode') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.websiteSetting.fields.maintainance_mode_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="maintainance_message">{{ trans('cruds.websiteSetting.fields.maintainance_message') }}</label>
                <textarea class="form-control {{ $errors->has('maintainance_message') ? 'is-invalid' : '' }}" name="maintainance_message" id="maintainance_message">{{ old('maintainance_message', $websiteSetting->maintainance_message) }}</textarea>
                @if($errors->has('maintainance_message'))
                    <div class="invalid-feedback">
                        {{ $errors->first('maintainance_message') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.websiteSetting.fields.maintainance_message_helper') }}</span>
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
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.website-settings.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($websiteSetting) && $websiteSetting->logo)
      var file = {!! json_encode($websiteSetting->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
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
    Dropzone.options.faviconDropzone = {
    url: '{{ route('admin.website-settings.storeMedia') }}',
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
      $('form').find('input[name="favicon"]').remove()
      $('form').append('<input type="hidden" name="favicon" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="favicon"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($websiteSetting) && $websiteSetting->favicon)
      var file = {!! json_encode($websiteSetting->favicon) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="favicon" value="' + file.file_name + '">')
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