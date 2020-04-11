@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection
@section('content')
<div id="spinner-overlay">
    <div class="w-100 d-flex justify-content-center align-items-center">
      <span><small style="color: #fff;">Please Wait</small></span>
      <div class="spinner"></div>
    </div>
</div>
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
                            {{ trans('cruds.customer.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.booking_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.booking_time') }}
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
                                @if($appointment->specialist && $appointment->specialist->speciallistcategories)
                                    @foreach($appointment->specialist->speciallistcategories as $speciallistcategory)
                                          {{ $speciallistcategory->category ? ucwords($speciallistcategory->category->name) : '' }}
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                {{ $appointment->specialist->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $appointment->customer->name ?? '' }}
                            </td>
                            <td>
                                {{ $appointment->customer->phone ?? '' }}
                            </td>
                            <td>
                                {{ $appointment->customer->email ?? '' }}
                            </td>
                            <td>
                                {{ $appointment->booking_date ?? '' }}
                            </td>
                            <td>
                                {{ $appointment->booking_time ?? '' }}
                            </td>
                            <td class="status">
                                @if ($appointment->status == 0)
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-xs btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pending</button>
                                      <div class="dropdown-menu">
                                        <button class="dropdown-item status-btn" data-id="{{ $appointment->id }}" value="1">Approve</button>
                                        <button class="dropdown-item status-btn" data-id="{{ $appointment->id }}" value="2">Hold</button>
                                        <button class="dropdown-item status-btn" data-id="{{ $appointment->id }}" value="3">Cancel</button>
                                      </div>
                                    </div>
                                @endif
                                @if ($appointment->status == 1)
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-xs btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Approved</button>
                                      <div class="dropdown-menu">
                                        <button class="dropdown-item status-btn" data-id="{{ $appointment->id }}" value="2">Hold</button>
                                        <button class="dropdown-item status-btn" data-id="{{ $appointment->id }}" value="3">Cancel</button>
                                      </div>
                                    </div>
                                @endif
                                @if ($appointment->status == 2)
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-xs btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hold</button>
                                      <div class="dropdown-menu">
                                        <button class="dropdown-item status-btn" data-id="{{ $appointment->id }}" value="3">Cancel</button>
                                      </div>
                                    </div>
                                @endif
                                @if ($appointment->status == 3)
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-xs btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cancelled</button>
                                      <div class="dropdown-menu">
                                        <button class="dropdown-item status-btn" data-id="{{ $appointment->id }}" value="0">Undo</button>
                                      </div>
                                    </div>
                                @endif
                                @if ($appointment->status == 5)
                                    <span class="text-danger"><strong>Occupied</strong></span>
                                @endif
                            </td>
                            <td>
                                @if ($appointment->status == 5)
                                    @can('appointment_delete')
                                        <form action="{{ route('admin.appointments.destroy', $appointment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan
                                @else
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
                                @endif


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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    function spinnerOverlayShow() {
      document.getElementById("spinner-overlay").style.display = "flex";
    }

    function spinnerOverlayHide() {
      document.getElementById("spinner-overlay").style.display = "none";
    }
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

$(document).on('click', '.status-btn', function(e){
    e.preventDefault();
    let data = {
        appointmentid: $(this).data("id"),
        status: $(this).val(),
    };
    let cn = confirm("You are going to change status. Are you sure?");
    if (cn == true) {
        spinnerOverlayShow();
        $.ajax({
            url: '{{ route('admin.change-appointment-status') }}',
            type: 'POST',
            data: data,
            beforeSend: function (request) {
              return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success: function (response) {
                spinnerOverlayHide();
                toastr.success(response.success);
                setTimeout(function(){
                    window.location.reload()
                } , 2000);
            },
            error: function (xhr) {
              $.each(xhr.responseJSON.errors, function(key,value) {
                toastr.error(value[0]);
              });
            }
        });
    }

});
</script>
@endsection
