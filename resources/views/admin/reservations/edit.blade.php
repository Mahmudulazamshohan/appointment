@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.reservation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.reservations.update", [$reservation->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.reservation.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $reservation->title) }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reservation.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="amount">{{ trans('cruds.reservation.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $reservation->amount) }}" step="0.01">
                @if($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reservation.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="footer_note">{{ trans('cruds.reservation.fields.footer_note') }}</label>
                <input class="form-control {{ $errors->has('footer_note') ? 'is-invalid' : '' }}" type="text" name="footer_note" id="footer_note" value="{{ old('footer_note', $reservation->footer_note) }}">
                @if($errors->has('footer_note'))
                    <span class="text-danger">{{ $errors->first('footer_note') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reservation.fields.footer_note_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection