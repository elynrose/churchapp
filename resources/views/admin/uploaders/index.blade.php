@extends('layouts.admin')
@section('content')
@can('uploader_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.uploaders.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.uploader.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Uploader', 'route' => 'admin.uploaders.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.uploader.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Uploader">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.uploader.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.uploader.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.uploader.fields.date_preached') }}
                        </th>
                        <th>
                            {{ trans('cruds.uploader.fields.preached_by') }}
                        </th>
                        <th>
                            {{ trans('cruds.uploader.fields.location') }}
                        </th>
                        <th>
                            {{ trans('cruds.uploader.fields.file_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.uploader.fields.ftp_path') }}
                        </th>
                        <th>
                            {{ trans('cruds.uploader.fields.coconut_job_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.uploader.fields.processed') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($uploaders as $key => $uploader)
                        <tr data-entry-id="{{ $uploader->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $uploader->id ?? '' }}
                            </td>
                            <td>
                                {{ $uploader->title ?? '' }}
                            </td>
                            <td>
                                {{ $uploader->date_preached ?? '' }}
                            </td>
                            <td>
                                {{ $uploader->preached_by ?? '' }}
                            </td>
                            <td>
                                {{ $uploader->location ?? '' }}
                            </td>
                            <td>
                                {{ $uploader->file_code ?? '' }}
                            </td>
                            <td>
                                @if($uploader->ftp_path)
                                    <a href="{{ $uploader->ftp_path->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $uploader->coconut_job_code ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $uploader->processed ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $uploader->processed ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('uploader_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.uploaders.show', $uploader->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('uploader_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.uploaders.edit', $uploader->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('uploader_delete')
                                    <form action="{{ route('admin.uploaders.destroy', $uploader->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('uploader_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.uploaders.massDestroy') }}",
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
  let table = $('.datatable-Uploader:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection