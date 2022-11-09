@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('archive_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.archives.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.archive.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'Archive', 'route' => 'admin.archives.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.archive.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Archive">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.archive.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.archive.fields.location') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.archive.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.archive.fields.date_preached') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.archive.fields.video_url') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.archive.fields.audio_url') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.archive.fields.pdf_file') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($archives as $key => $archive)
                                    <tr data-entry-id="{{ $archive->id }}">
                                        <td>
                                            {{ $archive->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $archive->location ?? '' }}
                                        </td>
                                        <td>
                                            {{ $archive->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $archive->date_preached ?? '' }}
                                        </td>
                                        <td>
                                            {{ $archive->video_url ?? '' }}
                                        </td>
                                        <td>
                                            {{ $archive->audio_url ?? '' }}
                                        </td>
                                        <td>
                                            {{ $archive->pdf_file ?? '' }}
                                        </td>
                                        <td>
                                            @can('archive_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.archives.show', $archive->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('archive_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.archives.edit', $archive->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('archive_delete')
                                                <form action="{{ route('frontend.archives.destroy', $archive->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('archive_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.archives.massDestroy') }}",
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
  let table = $('.datatable-Archive:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection