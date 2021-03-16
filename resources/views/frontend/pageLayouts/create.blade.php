@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.pageLayout.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.page-layouts.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="page_id">{{ trans('cruds.pageLayout.fields.page') }}</label>
                            <select class="form-control select2" name="page_id" id="page_id" required>
                                @foreach($pages as $id => $page)
                                    <option value="{{ $id }}" {{ old('page_id') == $id ? 'selected' : '' }}>{{ $page }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('page'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('page') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pageLayout.fields.page_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="module_id">{{ trans('cruds.pageLayout.fields.module') }}</label>
                            <select class="form-control select2" name="module_id" id="module_id" required>
                                @foreach($modules as $id => $module)
                                    <option value="{{ $id }}" {{ old('module_id') == $id ? 'selected' : '' }}>{{ $module }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('module'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('module') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pageLayout.fields.module_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="ordering">{{ trans('cruds.pageLayout.fields.ordering') }}</label>
                            <input class="form-control" type="number" name="ordering" id="ordering" value="{{ old('ordering', '') }}" step="1">
                            @if($errors->has('ordering'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('ordering') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pageLayout.fields.ordering_helper') }}</span>
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