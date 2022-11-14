@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('homepage_carousel_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.homepage-carousels.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.homepageCarousel.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.homepageCarousel.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-HomepageCarousel">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.homepageCarousel.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.homepageCarousel.fields.photo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.homepageCarousel.fields.order') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.homepageCarousel.fields.primary') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.homepageCarousel.fields.active') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($homepageCarousels as $key => $homepageCarousel)
                                    <tr data-entry-id="{{ $homepageCarousel->id }}">
                                        <td>
                                            {{ $homepageCarousel->id ?? '' }}
                                        </td>
                                        <td>
                                            @if($homepageCarousel->photo)
                                                <a href="{{ $homepageCarousel->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $homepageCarousel->photo->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $homepageCarousel->order ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $homepageCarousel->primary ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $homepageCarousel->primary ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $homepageCarousel->active ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $homepageCarousel->active ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            @can('homepage_carousel_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.homepage-carousels.show', $homepageCarousel->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('homepage_carousel_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.homepage-carousels.edit', $homepageCarousel->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('homepage_carousel_delete')
                                                <form action="{{ route('frontend.homepage-carousels.destroy', $homepageCarousel->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('homepage_carousel_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.homepage-carousels.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-HomepageCarousel:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection