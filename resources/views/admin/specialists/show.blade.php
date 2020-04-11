@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.specialist.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.specialists.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.specialist.fields.id') }}
                        </th>
                        <td>
                            {{ $specialist->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.specialist.fields.specialist') }}
                        </th>
                        <td>
                            {{ $specialist->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.specialist.fields.category') }}
                        </th>
                        <td>
                            @foreach($specialist->speciallistcategories as $specialistcategory)
                                <p>{{ $specialistcategory->category->name ?? '' }}</p>
                            @endforeach
                        </td>
                    </tr>
                   {{--  <tr>
                        <th>
                            {{ trans('cruds.specialist.fields.image') }}
                        </th>
                        <td>
                            @if($specialist->photo)
                                <a href="{{ asset('images/specialist/'.$specialist->photo) }}" target="_blank">
                                    <img src="{{ asset('images/specialist/'.$specialist->photo) }}" width="150px" height="150px">
                                </a>
                            @endif
                        </td>
                    </tr> --}}
                    <tr>
                        <th>
                            {{ trans('cruds.specialist.fields.description') }}
                        </th>
                        <td>
                            {{ $specialist->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.specialist.fields.opening_time') }}
                        </th>
                        <td>
                            {{ $specialist->opening_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.specialist.fields.closing_time') }}
                        </th>
                        <td>
                            {{ $specialist->closing_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.specialist.fields.availability') }}
                        </th>
                        <td>
                            {{ App\Specialist::AVAILABILITY_SELECT[$specialist->availability] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.specialist.fields.specific_day') }}
                        </th>
                        <td>
                            {{ App\Specialist::SPECIFIC_DAY_SELECT[$specialist->specific_day] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.specialists.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
