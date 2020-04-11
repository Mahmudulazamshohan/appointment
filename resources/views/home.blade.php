@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="{{asset('css')}}/zabuto_calendar.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (count(Auth::user()->roles) > 0)
                        @if (Auth::user()->roles[0]->id ==2)
                            @php
                                $specialist = App\Specialist::where('user_id', Auth::user()->id)->pluck('id')->first();
                            @endphp
                            <input type="hidden" name="specialist" id="specialist" value="{{ $specialist }}">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div id="book-appointment-calendar">
                                      <div id="date-popover" class="popover top" style="">
                                        <div id="date-popover-content" class="popover-content"></div>
                                      </div>
                                      <div id="demo"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div id="available-times-html"></div>
                                </div>
                            </div>
                        @endif

                        @if (Auth::user()->roles[0]->id == 1)
                            <div class="row">
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                        <h3>{{ App\Specialist::count() }}</h3>
                                        <p>Total Specialists</p>
                                        </div>
                                        <div class="icon">
                                        <i class="fa fa-user-md" aria-hidden="true"></i>
                                        </div>
                                        <a href="{{ route('admin.specialists.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                        <h3>{{ App\Appointment::where('status', 1)->where('created_at', date('Y-m-d'))->count() }}</h3>
                                        <p>Today's Appointments</p>
                                        </div>
                                        <div class="icon">
                                        <i class="fa fa-clock" aria-hidden="true"></i>
                                        </div>
                                        <a href="{{ route('admin.appointments.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                        <h3>{{ App\Appointment::where('status', 0)->count() }}</h3>
                                        <p>Pending Appointments</p>
                                        </div>
                                        <div class="icon">
                                        <i class="fa fa-low-vision" aria-hidden="true"></i>
                                        </div>
                                        <a href="{{ route('admin.appointments.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-danger">
                                        <div class="inner">
                                        <h3>{{ App\Category::count() }}</h3>
                                        <p>Total Categories</p>
                                        </div>
                                        <div class="icon">
                                        <i class="fa fa-stethoscope" aria-hidden="true"></i>
                                        </div>
                                        <a href="{{ route('admin.categories.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


<!-- The Available Times Modal -->
<div class="modal fade" id="availableTimesModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Available Times</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div id="specialist-available-time-html" class="text-center"></div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">&times; Close</button>
      </div>

    </div>
  </div>
</div>

<!-- The Set Available Times Modal -->
<div class="modal fade" id="setAvailableTimesModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Available Times</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
    
        <form action="javascript:void(0)" id="setTimeForm">
            <!-- Modal body -->
            <div class="modal-body">
              <div class="select2-purple">
                <input type="hidden" name="availabledayid" id="availabledayid">
                <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;" data-select2-id="15" tabindex="-1" aria-hidden="true" name="available_times[]" id="available_times">
                    @foreach ($times as $element)
                        <option value="{{ $element->time }}">{{ $element->time }}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-window-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-sm save-btn"><i class="fa fa-check"></i> Save</button>
            </div>
        </form>
    </div>
  </div>
</div>


<!-- The Edit Available Times Modal -->
<div class="modal fade" id="editAvailableTimesModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Available Times</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
    
        <form action="javascript:void(0)" id="editTimeForm">
            <!-- Modal body -->
            <div class="modal-body">
              <div class="select2-purple">
                <input type="hidden" name="availabledayidedit" id="availabledayidedit">
                <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;" data-select2-id="15" tabindex="-1" aria-hidden="true" name="available_times_edit[]" id="available_times_edit">
                    @foreach ($times as $element)
                        <option value="{{ $element->time }}">{{ $element->time }}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-window-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-sm update-btn"><i class="fa fa-check"></i> Save</button>
            </div>
        </form>
    </div>
  </div>
</div>
@endsection
@section('scripts')
@parent
<script src="{{asset('js')}}/zabuto_calendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
    let eventdata = [];
    let date;
    let specialistid = $("#specialist").val();
    $(document).ready(function(){
        $.ajax({
            url: '{{ route('get-specialist-available-days') }}',
            type: 'GET',
            data: {specialistid:specialistid},
            beforeSend: function (request) {
              return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success: function (response) {
                loadAvailableDatesCalendar(response);
            },
            error: function (xhr) {
              $.each(xhr.responseJSON.errors, function(key,value) {
                alert(value[0]);
              });
            }
        });
        specialistAvailableTimes();
    });
    function loadAvailableDatesCalendar(eventdata){
        let arr = [];
        $.each(eventdata, function(k,v){
          arr.push({"date":v, "badge":true});
        });

        $("#demo").zabuto_calendar({
          language: "nl",
          // show_previous: false,
          // show_next: {{ $appdefault->no_of_months_for_cal }},
          // data: arr,
        });
    }

    $(document).on('click', '.event', function(e){
      e.preventDefault();
      let id = this.id;
      date = $("#" + id).data("date");
      let weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
      let a = new Date(date);
      let dayname = weekday[a.getDay()];

      $.ajax({
          url: '{{ route('get-specialist-available-times') }}',
          type: 'GET',
          data: {specialistid:specialistid, dayname:dayname, date:date},
          beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
          },
          success: function (response) {
            showModalData(response);
            // $(".specialist-calendar").addClass("hide").css("display", "none");
            // $(".specialist-available-time").fadeIn('slow').removeClass('hide');
            $("#specialist-available-time-html").html(response);
          },
          error: function (xhr) {
            $.each(xhr.responseJSON.errors, function(key,value) {
              alert(value[0]);
            });
          }
      });
    });

    function showModalData(response){
        $("#availableTimesModal").modal('show');
    }
    
    function specialistAvailableTimes(){
        $.ajax({
            url: '{{ route('admin.specialists-available-times-ajax') }}',
            type: 'GET',
            data: {specialistid:specialistid},
            beforeSend: function (request) {
              return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success: function (response) {
                $("#available-times-html").html(response);
            },
            error: function (xhr) {
              $.each(xhr.responseJSON.errors, function(key,value) {
                alert(value[0]);
              });
            }
        });
    }
    $('#setAvailableTimesModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget); // Button that triggered the modal
        let modal = $(this);
        let id = button.data('id');
        modal.find('input[name=availabledayid]').val(id);
    });

    $(document).on('click', '.save-btn', function(){
        if ($("#available_times").val() == '') {
            alert("Available times required!");
            return false;
        }

       let data = $('#setTimeForm').serialize();
       let cn = confirm("Are you sure?");
       if (cn == true) {
        $.ajax({
            url: '{{ route('admin.specialists-available-times-ajax') }}',
            type: 'POST',
            data: data,
            beforeSend: function (request) {
              return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success: function (response) {
                toastr.success(response.success);
                setTimeout(function(){
                    window.location.reload()
                } , 1000);
            },
            error: function (xhr) {
              $.each(xhr.responseJSON.errors, function(key,value) {
                alert(value[0]);
              });
            }
        });
       }
    });

    $('#editAvailableTimesModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget); // Button that triggered the modal
        let modal = $(this);
        let id = button.data('id');
        modal.find('input[name=availabledayidedit]').val(id);
    });

    $(document).on('click', '.update-btn', function(){
        if ($("#available_times_edit").val() == '') {
            alert("Available times required!");
            return false;
        }

       let data = $('#editTimeForm').serialize();
       let cn = confirm("Are you sure?");
       if (cn == true) {
        $.ajax({
            url: '{{ route('admin.specialists-available-times-ajax') }}',
            type: 'PUT',
            data: data,
            beforeSend: function (request) {
              return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success: function (response) {
                toastr.success(response.success);
                setTimeout(function(){
                    window.location.reload()
                } , 1000);
            },
            error: function (xhr) {
              $.each(xhr.responseJSON.errors, function(key,value) {
                alert(value[0]);
              });
            }
        });
       }
    });


    $(document).on('click', '.time-btn', function(){
      let data = {
        time:$(this).val(),
        date: $("#appointmentdate").val()
      }
      let cn = confirm("Marked as occupied!");
      if (cn == true) {
       $.ajax({
           url: '{{ route('admin.marked-as-occupied') }}',
           type: 'POST',
           data: data,
           beforeSend: function (request) {
             return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
           },
           success: function (response) {
              toastr.success(response.success);
              setTimeout(function(){
                window.location.reload()
              }, 1000);
           },
           error: function (xhr) {
             $.each(xhr.responseJSON.errors, function(key,value) {
               alert(value[0]);
             });
           }
       });
      }
    });
</script>
@endsection