<div class="m-3">
    @can('appointment_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.appointments.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.appointment.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.appointment.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Appointment">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.appointment.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.appointment.fields.title') }}
                            </th>
                            <th>
                                {{ trans('cruds.appointment.fields.category') }}
                            </th>
                            <th>
                                {{ trans('cruds.appointment.fields.specialist') }}
                            </th>
                            <th>
                                {{ trans('cruds.appointment.fields.customer') }}
                            </th>
                            <th>
                                {{ trans('cruds.customer.fields.phone') }}
                            </th>
                            <th>
                                {{ trans('cruds.appointment.fields.booking_date') }}
                            </th>
                            <th>
                                {{ trans('cruds.appointment.fields.email_reminder') }}
                            </th>
                            <th>
                                {{ trans('cruds.appointment.fields.status') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($appointments as $key => $appointment)
                            <tr data-entry-id="{{ $appointment->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $appointment->id ?? '' }}
                                </td>
                                <td>
                                    {{ $appointment->title ?? '' }}
                                </td>
                                <td>
                                    {{ $appointment->category->name ?? '' }}
                                </td>
                                <td>
                                    {{ $appointment->specialist->name ?? '' }}
                                </td>
                                <td>
                                    {{ $appointment->customer->name ?? '' }}
                                </td>
                                <td>
                                    {{ $appointment->customer->phone ?? '' }}
                                </td>
                                <td>
                                    {{ $appointment->booking_date ?? '' }}
                                </td>
                                <td>
                                    {{ App\Appointment::EMAIL_REMINDER_SELECT[$appointment->email_reminder] ?? '' }}
                                </td>
                                <td>
                                    {{ App\Appointment::STATUS_SELECT[$appointment->status] ?? '' }}
                                </td>
                                <td>
                                    @can('appointment_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.appointments.show', $appointment->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('appointment_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.appointments.edit', $appointment->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('appointment_delete')
                                        <form action="{{ route('admin.appointments.destroy', $appointment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('appointment_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.appointments.massDestroy') }}",
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
  $('.datatable-Appointment:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection