@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">{{ trans('cruds.no_of_months_show_appointment_calendar.title') }}</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Times</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">MENU B</a>
          </div>
        </nav>
    </div>

    <div class="card-body">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <form action="javascript:void()" id="noOfMonthForm">
                    <div class="input-group input-group-md mt-3">
                        <label for="no_of_months_show_appointment_calendar" class="mt-1 mr-1">{{ trans('cruds.no_of_months_show_appointment_calendar.fields.months') }}: </label>
                        <input type="text" class="form-control" name="number_of_month" id="number_of_month" oninput="this.value=(parseInt(this.value)||0)">
                        <span class="input-group-append">
                            <button type="button" class="btn btn-info btn-flat month-change-btn">Save Changes!</button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#addTimeModal"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Time</button>
            <hr>

              <div class="table-responsive">
                  <table class=" table table-bordered table-striped table-hover datatable datatable-Appointment">
                      <thead>
                          <tr>
                              <th width="10">

                              </th>
                              <th>
                                  #
                              </th>
                              <th>
                                  Time
                              </th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($timesettings as $time)
                              <tr>
                                  <td></td>
                                  <td>{{ $loop->index + 1 }}</td>
                                  <td>{{ $time->time }}</td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">Menu B</div>
        </div>
    </div>
    <div class="card-footer"></div>
</div>


<!-- The Add Time Modal -->
<div class="modal fade" id="addTimeModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Time</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form action="{{ route('admin.add-times.store') }}" method="POST" onsubmit = 'return ConfirmSubmission()'>
        @csrf
          <!-- Modal body -->
          <div class="modal-body">
            <div class="form-group">
                <label class="required" for="time">Time</label>
                <input class="form-control timepicker {{ $errors->has('time') ? 'is-invalid' : '' }}" type="text" name="time" id="time" value="{{ old('time') }}" required>
                @if($errors->has('time'))
                    <span class="text-danger">{{ $errors->first('time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.specialist.fields.opening_time_helper') }}</span>
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-window-close"></i> Close</button>
            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Save</button>
          </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@parent
<script type="text/javascript">
    $(function () {
      $('.datatable-Appointment:not(.ajaxTable)').DataTable({})
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    });
loadAppDefaultSettings();
function loadAppDefaultSettings(){
    $.ajax({
        url: '{{ route('admin.get-app-default-settings') }}',
        type: 'GET',
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success: function (response) {
            $("#number_of_month").val(response.no_of_months_for_cal);
            $(".month-change-btn").val(response.id);
        },
        error: function (xhr) {
            $.each(xhr.responseJSON.errors, function(key,value) {
                alert(value[0]);
            });
        }
    });
}
$(document).on('click','.month-change-btn', function(e){
    e.preventDefault();
    let id = $(this).val();
    let data = $("#noOfMonthForm").serialize();
    let con = confirm("Are you sure to save changes!");
    if (con == true) {
        $.ajax({
            url: '{{ URL::to('admin/app-default-settings') }}/' + id,
            type: 'PUT',
            data: data,
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success: function (response) {
                loadAppDefaultSettings();
                toastr.success(response.success);
            },
            error: function (xhr) {
                $.each(xhr.responseJSON.errors, function(key,value) {
                    toastr.error(value[0]);
                });
            }
        });
    }
});
function ConfirmSubmission()
{
    return confirm('Are you sure you want to save?');
}
</script>
@endsection