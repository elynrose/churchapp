@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.praiseprayer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.praiseprayers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.praiseprayer.fields.select_type') }}</label>
                <select class="form-control {{ $errors->has('select_type') ? 'is-invalid' : '' }}" name="select_type" id="select_type" required>
                    <option value disabled {{ old('select_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Praiseprayer::SELECT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('select_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('select_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('select_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.praiseprayer.fields.select_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="full_name">{{ trans('cruds.praiseprayer.fields.full_name') }}</label>
                <input class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}" type="text" name="full_name" id="full_name" value="{{ old('full_name', '') }}" required>
                @if($errors->has('full_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('full_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.praiseprayer.fields.full_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="on_behalf_of">{{ trans('cruds.praiseprayer.fields.on_behalf_of') }}</label>
                <input class="form-control {{ $errors->has('on_behalf_of') ? 'is-invalid' : '' }}" type="text" name="on_behalf_of" id="on_behalf_of" value="{{ old('on_behalf_of', '') }}">
                @if($errors->has('on_behalf_of'))
                    <div class="invalid-feedback">
                        {{ $errors->first('on_behalf_of') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.praiseprayer.fields.on_behalf_of_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="details">{{ trans('cruds.praiseprayer.fields.details') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('details') ? 'is-invalid' : '' }}" name="details" id="details">{!! old('details') !!}</textarea>
                @if($errors->has('details'))
                    <div class="invalid-feedback">
                        {{ $errors->first('details') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.praiseprayer.fields.details_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_submitted">{{ trans('cruds.praiseprayer.fields.date_submitted') }}</label>
                <input class="form-control date {{ $errors->has('date_submitted') ? 'is-invalid' : '' }}" type="text" name="date_submitted" id="date_submitted" value="{{ old('date_submitted') }}" required>
                @if($errors->has('date_submitted'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_submitted') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.praiseprayer.fields.date_submitted_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('closed') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="closed" value="0">
                    <input class="form-check-input" type="checkbox" name="closed" id="closed" value="1" {{ old('closed', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="closed">{{ trans('cruds.praiseprayer.fields.closed') }}</label>
                </div>
                @if($errors->has('closed'))
                    <div class="invalid-feedback">
                        {{ $errors->first('closed') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.praiseprayer.fields.closed_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.praiseprayers.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $praiseprayer->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection