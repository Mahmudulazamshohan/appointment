@extends('layouts.admin')
@section('styles')
<link href="{{ asset('css/bootstrap-colorpicker.min.css') }}" rel="stylesheet" />
@endsection
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.category.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.categories.update", [$category->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.category.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $category->name) }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="amount">{{ trans('cruds.category.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $category->amount) }}" step="0.01">
                @if($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="category_color">{{ trans('cruds.category.fields.category_color') }}</label>
                <input class="form-control {{ $errors->has('category_color') ? 'is-invalid' : '' }} my-colorpicker1" type="text" name="category_color" id="category_color" value="{{ old('category_color', $category->category_color) }}" step="1">
                @if($errors->has('category_color'))
                    <span class="text-danger">{{ $errors->first('category_color') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.category_color_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.category.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Category::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $category->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.status_helper') }}</span>
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
<script src="{{ asset('js/bootstrap-colorpicker.min.js') }}"></script>
<script type="text/javascript">
    $('.my-colorpicker1').colorpicker();
</script>
@endsection