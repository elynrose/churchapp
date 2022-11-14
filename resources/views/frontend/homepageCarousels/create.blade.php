@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.homepageCarousel.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.homepage-carousels.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="photo">{{ trans('cruds.homepageCarousel.fields.photo') }}</label>
                            <div class="needsclick dropzone" id="photo-dropzone">
                            </div>
                            @if($errors->has('photo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('photo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.homepageCarousel.fields.photo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="headline">{{ trans('cruds.homepageCarousel.fields.headline') }}</label>
                            <input class="form-control" type="text" name="headline" id="headline" value="{{ old('headline', '') }}">
                            @if($errors->has('headline'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('headline') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.homepageCarousel.fields.headline_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sub_heading">{{ trans('cruds.homepageCarousel.fields.sub_heading') }}</label>
                            <input class="form-control" type="text" name="sub_heading" id="sub_heading" value="{{ old('sub_heading', '') }}">
                            @if($errors->has('sub_heading'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sub_heading') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.homepageCarousel.fields.sub_heading_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="link_to">{{ trans('cruds.homepageCarousel.fields.link_to') }}</label>
                            <input class="form-control" type="text" name="link_to" id="link_to" value="{{ old('link_to', '') }}">
                            @if($errors->has('link_to'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('link_to') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.homepageCarousel.fields.link_to_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="order">{{ trans('cruds.homepageCarousel.fields.order') }}</label>
                            <input class="form-control" type="number" name="order" id="order" value="{{ old('order', '') }}" step="1" required>
                            @if($errors->has('order'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('order') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.homepageCarousel.fields.order_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="primary" value="0">
                                <input type="checkbox" name="primary" id="primary" value="1" {{ old('primary', 0) == 1 ? 'checked' : '' }}>
                                <label for="primary">{{ trans('cruds.homepageCarousel.fields.primary') }}</label>
                            </div>
                            @if($errors->has('primary'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('primary') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.homepageCarousel.fields.primary_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="active" value="0">
                                <input type="checkbox" name="active" id="active" value="1" {{ old('active', 0) == 1 ? 'checked' : '' }}>
                                <label for="active">{{ trans('cruds.homepageCarousel.fields.active') }}</label>
                            </div>
                            @if($errors->has('active'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('active') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.homepageCarousel.fields.active_helper') }}</span>
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
    Dropzone.options.photoDropzone = {
    url: '{{ route('frontend.homepage-carousels.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 1024,
      height: 550
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($homepageCarousel) && $homepageCarousel->photo)
      var file = {!! json_encode($homepageCarousel->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
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