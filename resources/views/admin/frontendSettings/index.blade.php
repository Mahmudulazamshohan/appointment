@extends('layouts.admin')
@section('content')
{{-- @can('frontend_setting_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.frontend-settings.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.frontendSetting.title_singular') }}
            </a>
        </div>
    </div>
@endcan --}}
<div class="card">
    <div class="card-header">
        {{ trans('cruds.frontendSetting.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-FrontendSetting">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.frontendSetting.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.frontendSetting.fields.logo') }}
                        </th>
                        <th>
                            {{ trans('cruds.frontendSetting.fields.currency') }}
                        </th>
                        <th>
                            {{ trans('cruds.frontendSetting.fields.site_title') }}
                        </th>
                        <th>
                            {{ trans('cruds.frontendSetting.fields.site_email') }}
                        </th>
                        <th>
                            {{ trans('cruds.frontendSetting.fields.site_address') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($frontendSettings as $key => $frontendSetting)
                        <tr data-entry-id="{{ $frontendSetting->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $frontendSetting->id ?? '' }}
                            </td>
                            <td>
                                @if($frontendSetting->logo)
                                    <a href="{{ $frontendSetting->logo->getUrl() }}" target="_blank">
                                        <img src="{{ $frontendSetting->logo->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $frontendSetting->currency ?? '' }}
                            </td>
                            <td>
                                {{ $frontendSetting->site_title ?? '' }}
                            </td>
                            <td>
                                {{ $frontendSetting->site_email ?? '' }}
                            </td>
                            <td>
                                {{ $frontendSetting->site_address ?? '' }}
                            </td>
                            <td>
                                @can('frontend_setting_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.frontend-settings.show', $frontendSetting->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('frontend_setting_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.frontend-settings.edit', $frontendSetting->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

{{--                                 @can('frontend_setting_delete')
                                    <form action="{{ route('admin.frontend-settings.destroy', $frontendSetting->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan --}}

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
  // let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('frontend_setting_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.frontend-settings.massDestroy') }}",
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
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-FrontendSetting:not(.ajaxTable)').DataTable()
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection