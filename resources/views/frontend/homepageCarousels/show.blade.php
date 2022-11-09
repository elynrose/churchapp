@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.homepageCarousel.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.homepage-carousels.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.homepageCarousel.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $homepageCarousel->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.homepageCarousel.fields.photo') }}
                                    </th>
                                    <td>
                                        @if($homepageCarousel->photo)
                                            <a href="{{ $homepageCarousel->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $homepageCarousel->photo->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.homepageCarousel.fields.headline') }}
                                    </th>
                                    <td>
                                        {{ $homepageCarousel->headline }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.homepageCarousel.fields.sub_heading') }}
                                    </th>
                                    <td>
                                        {{ $homepageCarousel->sub_heading }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.homepageCarousel.fields.link_to') }}
                                    </th>
                                    <td>
                                        {{ $homepageCarousel->link_to }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.homepageCarousel.fields.order') }}
                                    </th>
                                    <td>
                                        {{ $homepageCarousel->order }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.homepageCarousel.fields.primary') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $homepageCarousel->primary ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.homepageCarousel.fields.active') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $homepageCarousel->active ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.homepage-carousels.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection