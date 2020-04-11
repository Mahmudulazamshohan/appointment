@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.frontendSetting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.frontend-settings.update", [$frontendSetting->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="logo">{{ trans('cruds.frontendSetting.fields.logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <span class="text-danger">{{ $errors->first('logo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.frontendSetting.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="currency">{{ trans('cruds.frontendSetting.fields.currency') }}</label>
                <input class="form-control {{ $errors->has('currency') ? 'is-invalid' : '' }}" type="text" name="currency" id="currency" value="{{ old('currency', $frontendSetting->currency) }}">
                @if($errors->has('currency'))
                    <span class="text-danger">{{ $errors->first('currency') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.frontendSetting.fields.currency_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="site_title">{{ trans('cruds.frontendSetting.fields.site_title') }}</label>
                <input class="form-control {{ $errors->has('site_title') ? 'is-invalid' : '' }}" type="text" name="site_title" id="site_title" value="{{ old('site_title', $frontendSetting->site_title) }}">
                @if($errors->has('site_title'))
                    <span class="text-danger">{{ $errors->first('site_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.frontendSetting.fields.site_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="site_email">{{ trans('cruds.frontendSetting.fields.site_email') }}</label>
                <input class="form-control {{ $errors->has('site_email') ? 'is-invalid' : '' }}" type="text" name="site_email" id="site_email" value="{{ old('site_email', $frontendSetting->site_email) }}">
                @if($errors->has('site_email'))
                    <span class="text-danger">{{ $errors->first('site_email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.frontendSetting.fields.site_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="site_address">{{ trans('cruds.frontendSetting.fields.site_address') }}</label>
                <input class="form-control {{ $errors->has('site_address') ? 'is-invalid' : '' }}" type="text" name="site_address" id="site_address" value="{{ old('site_address', $frontendSetting->site_address) }}">
                @if($errors->has('site_address'))
                    <span class="text-danger">{{ $errors->first('site_address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.frontendSetting.fields.site_address_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.frontend-settings.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($frontendSetting) && $frontendSetting->logo)
      var file = {!! json_encode($frontendSetting->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $frontendSetting->logo->getUrl('thumb') }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection