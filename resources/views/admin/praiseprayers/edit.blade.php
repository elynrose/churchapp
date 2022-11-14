@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.praiseprayer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.praiseprayers.update", [$praiseprayer->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.praiseprayer.fields.select_type') }}</label>
                <select class="form-control {{ $errors->has('select_type') ? 'is-invalid' : '' }}" name="select_type" id="select_type" required>
                    <option value disabled {{ old('select_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Praiseprayer::SELECT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('select_type', $praiseprayer->select_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
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
                <input class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}" type="text" name="full_name" id="full_name" value="{{ old('full_name', $praiseprayer->full_name) }}" required>
                @if($errors->has('full_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('full_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.praiseprayer.fields.full_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="on_behalf_of">{{ trans('cruds.praiseprayer.fields.on_behalf_of') }}</label>
                <input class="form-control {{ $errors->has('on_behalf_of') ? 'is-invalid' : '' }}" type="text" name="on_behalf_of" id="on_behalf_of" value="{{ old('on_behalf_of', $praiseprayer->on_behalf_of) }}">
                @if($errors->has('on_behalf_of'))
                    <div class="invalid-feedback">
                        {{ $errors->first('on_behalf_of') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.praiseprayer.fields.on_behalf_of_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_submitted">{{ trans('cruds.praiseprayer.fields.date_submitted') }}</label>
                <input class="form-control date {{ $errors->has('date_submitted') ? 'is-invalid' : '' }}" type="text" name="date_submitted" id="date_submitted" value="{{ old('date_submitted', $praiseprayer->date_submitted) }}" required>
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
                    <input class="form-check-input" type="checkbox" name="closed" id="closed" value="1" {{ $praiseprayer->closed || old('closed', 0) === 1 ? 'checked' : '' }}>
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