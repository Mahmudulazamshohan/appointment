@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.reference.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.references.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.reference.fields.id') }}
                        </th>
                        <td>
                            {{ $reference->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reference.fields.name') }}
                        </th>
                        <td>
                            {{ $reference->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reference.fields.designation') }}
                        </th>
                        <td>
                            {{ $reference->designation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reference.fields.image') }}
                        </th>
                        <td>
                            @if($reference->image)
                                <a href="{{ $reference->image->getUrl() }}" target="_blank">
                                    <img src="{{ $reference->image->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reference.fields.description') }}
                        </th>
                        <td>
                            {{ $reference->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.references.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection