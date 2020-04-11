@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.frontendSetting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.frontend-settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.frontendSetting.fields.id') }}
                        </th>
                        <td>
                            {{ $frontendSetting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.frontendSetting.fields.logo') }}
                        </th>
                        <td>
                            @if($frontendSetting->logo)
                                <a href="{{ $frontendSetting->logo->getUrl() }}" target="_blank">
                                    <img src="{{ $frontendSetting->logo->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.frontendSetting.fields.currency') }}
                        </th>
                        <td>
                            {{ $frontendSetting->currency }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.frontendSetting.fields.site_title') }}
                        </th>
                        <td>
                            {{ $frontendSetting->site_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.frontendSetting.fields.site_email') }}
                        </th>
                        <td>
                            {{ $frontendSetting->site_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.frontendSetting.fields.site_address') }}
                        </th>
                        <td>
                            {{ $frontendSetting->site_address }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.frontend-settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection