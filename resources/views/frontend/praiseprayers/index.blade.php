@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('praiseprayer_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.praiseprayers.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.praiseprayer.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.praiseprayer.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Praiseprayer">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.praiseprayer.fields.select_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.praiseprayer.fields.full_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.praiseprayer.fields.date_submitted') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.praiseprayer.fields.closed') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.praiseprayer.fields.created_at') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($praiseprayers as $key => $praiseprayer)
                                    <tr data-entry-id="{{ $praiseprayer->id }}">
                                        <td>
                                            {{ App\Models\Praiseprayer::SELECT_TYPE_SELECT[$praiseprayer->select_type] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $praiseprayer->full_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $praiseprayer->date_submitted ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $praiseprayer->closed ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $praiseprayer->closed ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $praiseprayer->created_at ?? '' }}
                                        </td>
                                        <td>
                                            @can('praiseprayer_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.praiseprayers.show', $praiseprayer->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('praiseprayer_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.praiseprayers.edit', $praiseprayer->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('praiseprayer_delete')
                                                <form action="{{ route('frontend.praiseprayers.destroy', $praiseprayer->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('praiseprayer_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.praiseprayers.massDestroy') }}",
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
  let table = $('.datatable-Praiseprayer:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection