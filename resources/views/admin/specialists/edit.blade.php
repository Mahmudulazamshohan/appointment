@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.specialist.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.specialists.update", [$specialist->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="specialist_id">{{ trans('cruds.specialist.fields.specialist') }}</label>
                <select class="form-control select2 {{ $errors->has('specialist') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $user)
                        {{-- <option value="{{ $user->id }}" {{ ($user->id ? $user->id : old('user_id')) == $id ? 'selected' : '' }}>{{ $user }}</option> --}}
                        <option value="{{ $id }}" {{ $specialist->user_id == $id ? 'selected' : ''  }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user_id'))
                    <span class="text-danger">{{ $errors->first('user_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.specialist.fields.specialist_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="category_id">{{ trans('cruds.specialist.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id[]" id="category_ids" required multiple>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ ($specialist->category ? $specialist->category->id : old('category_id')) == $id ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('category_id'))
                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.specialist.fields.category_helper') }}</span>
            </div>
            {{-- <div class="form-group">
                <label for="photo">{{ trans('cruds.specialist.fields.image') }}</label>
                <input type="file" class="form-control" name="photo" id="photo">
                @if($errors->has('photo'))
                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.specialist.fields.image_helper') }}</span>
            </div> --}}
            <div class="form-group">
                <label for="description">{{ trans('cruds.specialist.fields.description') }}</label>
                <textarea name="description" id="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}">{{ old('description', $specialist->description) }}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.specialist.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="opening_time">{{ trans('cruds.specialist.fields.opening_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('opening_time') ? 'is-invalid' : '' }}" type="text" name="opening_time" id="opening_time" value="{{ old('opening_time', $specialist->opening_time) }}" required>
                @if($errors->has('opening_time'))
                    <span class="text-danger">{{ $errors->first('opening_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.specialist.fields.opening_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="closing_time">{{ trans('cruds.specialist.fields.closing_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('closing_time') ? 'is-invalid' : '' }}" type="text" name="closing_time" id="closing_time" value="{{ old('closing_time', $specialist->closing_time) }}">
                @if($errors->has('closing_time'))
                    <span class="text-danger">{{ $errors->first('closing_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.specialist.fields.closing_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.specialist.fields.availability') }}</label>
                <select class="form-control {{ $errors->has('availability') ? 'is-invalid' : '' }}" name="availability" id="availability">
                    <option value disabled {{ old('availability', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Specialist::AVAILABILITY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('availability', $specialist->availability) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('availability'))
                    <span class="text-danger">{{ $errors->first('availability') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.specialist.fields.availability_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.specialist.fields.specific_day') }}</label>
                <select multiple class="form-control {{ $errors->has('specific_day') ? 'is-invalid' : '' }}" name="specific_day[]" id="specific_day">
                    {{-- @foreach($days as $day)
                        <option value="{{ $day->id }}" {{ old('specific_day', $specialist->availabledays[0]->day_name_id) == $day->id ? 'selected' : '' }}>{{ $day->name }}</option>
                    @endforeach --}}

                    @foreach ($days as $index => $element)
                        <option value="{{ $element->id }}" {{ in_array($element->id,$daysArr) ? 'selected' : '' }}>{{ $element->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('specific_day'))
                    <span class="text-danger">{{ $errors->first('specific_day') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.specialist.fields.specific_day_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit"><i class="fa fa-check"></i> {{ trans('global.save') }}</button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    $('#category_ids').val({!! json_encode($specialist->speciallistcategories->map(function ($c){return $c->category->id;})) !!})
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.specialists.storeMedia') }}',
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
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($specialist) && $specialist->image)
      var file = {!! json_encode($specialist->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $specialist->image->getUrl('thumb') }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
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
