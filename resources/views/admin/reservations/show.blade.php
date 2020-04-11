@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.reservation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reservations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.id') }}
                        </th>
                        <td>
                            {{ $reservation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.title') }}
                        </th>
                        <td>
                            {{ $reservation->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.amount') }}
                        </th>
                        <td>
                            {{ $reservation->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.footer_note') }}
                        </th>
                        <td>
                            {{ $reservation->footer_note }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reservations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection