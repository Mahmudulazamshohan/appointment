@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.appointment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.appointments.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                @if (count(Auth::user()->roles) > 0)
                    @if(Auth::user()->roles[0]->id == 2)
                        @php
                            $specialistid = App\Specialist::where('user_id', Auth::user()->id)->pluck('id')->first();
                        @endphp
                        <input type="hidden" name="specialist_id" id="specialist_id" value="{{ $specialistid }}">
                    @else
                        <label for="specialist_id">{{ trans('cruds.appointment.fields.specialist') }}</label>
                        <select class="form-control select2 {{ $errors->has('specialist') ? 'is-invalid' : '' }}" name="specialist_id" id="specialist_id">
                            @foreach($specialists as $id => $specialist)
                                <option value="{{ $id }}" {{ old('specialist_id') == $id ? 'selected' : '' }}>{{ $specialist }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('specialist_id'))
                            <span class="text-danger">{{ $errors->first('specialist_id') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.appointment.fields.specialist_helper') }}</span>
                    @endif
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="booking_date">{{ trans('cruds.appointment.fields.booking_date') }}</label>
                <input class="form-control datetime {{ $errors->has('booking_date') ? 'is-invalid' : '' }}" type="text" name="booking_date" id="booking_date" value="{{ old('booking_date') }}" required>
                @if($errors->has('booking_date'))
                    <span class="text-danger">{{ $errors->first('booking_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.booking_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.customer.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.booking_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.customer.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.booking_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.customer.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone') }}" required>
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.booking_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.appointment.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Appointment::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                   <i class="fa fa-check"></i> {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection