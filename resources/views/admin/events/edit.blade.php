@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.event.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.events.update", [$event->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="event_cover_img">{{ trans('cruds.event.fields.event_cover_img') }}</label>
                <div class="needsclick dropzone {{ $errors->has('event_cover_img') ? 'is-invalid' : '' }}" id="event_cover_img-dropzone">
                </div>
                @if($errors->has('event_cover_img'))
                    <div class="invalid-feedback">
                        {{ $errors->first('event_cover_img') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.event_cover_img_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.event.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $event->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.event.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $event->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="event_date">{{ trans('cruds.event.fields.event_date') }}</label>
                <input class="form-control date {{ $errors->has('event_date') ? 'is-invalid' : '' }}" type="text" name="event_date" id="event_date" value="{{ old('event_date', $event->event_date) }}">
                @if($errors->has('event_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('event_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.event_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="event_time">{{ trans('cruds.event.fields.event_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('event_time') ? 'is-invalid' : '' }}" type="text" name="event_time" id="event_time" value="{{ old('event_time', $event->event_time) }}" required>
                @if($errors->has('event_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('event_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.event_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="event_address">{{ trans('cruds.event.fields.event_address') }}</label>
                <input class="form-control {{ $errors->has('event_address') ? 'is-invalid' : '' }}" type="text" name="event_address" id="event_address" value="{{ old('event_address', $event->event_address) }}">
                @if($errors->has('event_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('event_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.event_address_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('published') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="published" id="published" value="1" {{ $event->published || old('published', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="published">{{ trans('cruds.event.fields.published') }}</label>
                </div>
                @if($errors->has('published'))
                    <div class="invalid-feedback">
                        {{ $errors->first('published') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.published_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="app_id">{{ trans('cruds.event.fields.app') }}</label>
                <select class="form-control select2 {{ $errors->has('app') ? 'is-invalid' : '' }}" name="app_id" id="app_id" required>
                    @foreach($apps as $id => $app)
                        <option value="{{ $id }}" {{ (old('app_id') ? old('app_id') : $event->app->id ?? '') == $id ? 'selected' : '' }}>{{ $app }}</option>
                    @endforeach
                </select>
                @if($errors->has('app'))
                    <div class="invalid-feedback">
                        {{ $errors->first('app') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.app_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="created_by_id">{{ trans('cruds.event.fields.created_by') }}</label>
                <select class="form-control select2 {{ $errors->has('created_by') ? 'is-invalid' : '' }}" name="created_by_id" id="created_by_id">
                    @foreach($created_bies as $id => $created_by)
                        <option value="{{ $id }}" {{ (old('created_by_id') ? old('created_by_id') : $event->created_by->id ?? '') == $id ? 'selected' : '' }}>{{ $created_by }}</option>
                    @endforeach
                </select>
                @if($errors->has('created_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('created_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.created_by_helper') }}</span>
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
    Dropzone.options.eventCoverImgDropzone = {
    url: '{{ route('admin.events.storeMedia') }}',
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
      $('form').find('input[name="event_cover_img"]').remove()
      $('form').append('<input type="hidden" name="event_cover_img" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="event_cover_img"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($event) && $event->event_cover_img)
      var file = {!! json_encode($event->event_cover_img) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="event_cover_img" value="' + file.file_name + '">')
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