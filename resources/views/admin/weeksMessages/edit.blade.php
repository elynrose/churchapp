@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.weeksMessage.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.weeks-messages.update", [$weeksMessage->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="week_of">{{ trans('cruds.weeksMessage.fields.week_of') }}</label>
                <input class="form-control date {{ $errors->has('week_of') ? 'is-invalid' : '' }}" type="text" name="week_of" id="week_of" value="{{ old('week_of', $weeksMessage->week_of) }}" required>
                @if($errors->has('week_of'))
                    <div class="invalid-feedback">
                        {{ $errors->first('week_of') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.weeksMessage.fields.week_of_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="message_titles">{{ trans('cruds.weeksMessage.fields.message_titles') }}</label>
                <textarea class="form-control {{ $errors->has('message_titles') ? 'is-invalid' : '' }}" name="message_titles" id="message_titles" required>{{ old('message_titles', $weeksMessage->message_titles) }}</textarea>
                @if($errors->has('message_titles'))
                    <div class="invalid-feedback">
                        {{ $errors->first('message_titles') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.weeksMessage.fields.message_titles_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="files">{{ trans('cruds.weeksMessage.fields.files') }}</label>
                <div class="needsclick dropzone {{ $errors->has('files') ? 'is-invalid' : '' }}" id="files-dropzone">
                </div>
                @if($errors->has('files'))
                    <div class="invalid-feedback">
                        {{ $errors->first('files') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.weeksMessage.fields.files_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="active" value="0">
                    <input class="form-check-input" type="checkbox" name="active" id="active" value="1" {{ $weeksMessage->active || old('active', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="active">{{ trans('cruds.weeksMessage.fields.active') }}</label>
                </div>
                @if($errors->has('active'))
                    <div class="invalid-feedback">
                        {{ $errors->first('active') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.weeksMessage.fields.active_helper') }}</span>
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
    var uploadedFilesMap = {}
Dropzone.options.filesDropzone = {
    url: '{{ route('admin.weeks-messages.storeMedia') }}',
    maxFilesize: 1000, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 1000
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="files[]" value="' + response.name + '">')
      uploadedFilesMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedFilesMap[file.name]
      }
      $('form').find('input[name="files[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($weeksMessage) && $weeksMessage->files)
          var files =
            {!! json_encode($weeksMessage->files) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="files[]" value="' + file.file_name + '">')
            }
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