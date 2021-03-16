@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.blog.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.blogs.update", [$blog->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="blog_cover_image">{{ trans('cruds.blog.fields.blog_cover_image') }}</label>
                            <div class="needsclick dropzone" id="blog_cover_image-dropzone">
                            </div>
                            @if($errors->has('blog_cover_image'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('blog_cover_image') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.blog.fields.blog_cover_image_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.blog.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $blog->title) }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.blog.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="excerpt">{{ trans('cruds.blog.fields.excerpt') }}</label>
                            <textarea class="form-control" name="excerpt" id="excerpt">{{ old('excerpt', $blog->excerpt) }}</textarea>
                            @if($errors->has('excerpt'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('excerpt') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.blog.fields.excerpt_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ trans('cruds.blog.fields.description') }}</label>
                            <textarea class="form-control" name="description" id="description">{{ old('description', $blog->description) }}</textarea>
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.blog.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="published" value="0">
                                <input type="checkbox" name="published" id="published" value="1" {{ $blog->published || old('published', 0) === 1 ? 'checked' : '' }}>
                                <label for="published">{{ trans('cruds.blog.fields.published') }}</label>
                            </div>
                            @if($errors->has('published'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('published') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.blog.fields.published_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="created_by_id">{{ trans('cruds.blog.fields.created_by') }}</label>
                            <select class="form-control select2" name="created_by_id" id="created_by_id" required>
                                @foreach($created_bies as $id => $created_by)
                                    <option value="{{ $id }}" {{ (old('created_by_id') ? old('created_by_id') : $blog->created_by->id ?? '') == $id ? 'selected' : '' }}>{{ $created_by }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('created_by'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('created_by') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.blog.fields.created_by_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="app_id">{{ trans('cruds.blog.fields.app') }}</label>
                            <select class="form-control select2" name="app_id" id="app_id" required>
                                @foreach($apps as $id => $app)
                                    <option value="{{ $id }}" {{ (old('app_id') ? old('app_id') : $blog->app->id ?? '') == $id ? 'selected' : '' }}>{{ $app }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('app'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('app') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.blog.fields.app_helper') }}</span>
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
    Dropzone.options.blogCoverImageDropzone = {
    url: '{{ route('frontend.blogs.storeMedia') }}',
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
      $('form').find('input[name="blog_cover_image"]').remove()
      $('form').append('<input type="hidden" name="blog_cover_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="blog_cover_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($blog) && $blog->blog_cover_image)
      var file = {!! json_encode($blog->blog_cover_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="blog_cover_image" value="' + file.file_name + '">')
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