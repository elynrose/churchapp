@extends('layouts.admin')
@section('content')
@can('weeks_message_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.weeks-messages.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.weeksMessage.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.weeksMessage.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-WeeksMessage">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.weeksMessage.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.weeksMessage.fields.week_of') }}
                        </th>
                        <th>
                            {{ trans('cruds.weeksMessage.fields.active') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($weeksMessages as $key => $weeksMessage)
                        <tr data-entry-id="{{ $weeksMessage->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $weeksMessage->id ?? '' }}
                            </td>
                            <td>
                                {{ $weeksMessage->week_of ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $weeksMessage->active ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $weeksMessage->active ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('weeks_message_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.weeks-messages.show', $weeksMessage->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('weeks_message_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.weeks-messages.edit', $weeksMessage->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('weeks_message_delete')
                                    <form action="{{ route('admin.weeks-messages.destroy', $weeksMessage->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('weeks_message_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.weeks-messages.massDestroy') }}",
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
  let table = $('.datatable-WeeksMessage:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection