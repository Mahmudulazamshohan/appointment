@extends('layouts.admin')
@section('content')
@can('specialist_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.specialists.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.specialist.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.specialist.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Specialist">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.specialist.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.specialist.fields.specialist') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.specialist.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.category.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.specialist.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.specialist.fields.opening_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.specialist.fields.closing_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.specialist.fields.availability') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($specialists as $specialist)
                        <tr data-entry-id="{{ $specialist->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $specialist->id ?? '' }}
                            </td>
                            <td>
                                {{ $specialist->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $specialist->user->email ?? '' }}
                            </td>
                            <td>
                                @foreach($specialist->speciallistcategories as $specialistcategory)
                                <p>{{ $specialistcategory->category->name ?? '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach($specialist->speciallistcategories as $specialistcategory)
                                    {{ $specialistcategory->category->amount ?? '' }}
                                @endforeach
                            </td>
                            <td>
                                @if($specialist->photo)
                                    {{-- <a href="{{ $specialist->image->getPath() }}" target="_blank">
                                        <img src="{{ $specialist->image->getPath('thumb') }}" width="50px" height="50px">
                                    </a> --}}
                                    <a href="{{ asset('images/specialist/'.$specialist->photo) }}" target="_blank">
                                        <img src="{{ asset('images/specialist/'.$specialist->photo) }}" width="50px" height="50px">
                                    </a>
                                @else
                                    <p>Not Found</p>
                                @endif
                            </td>
                            <td>
                                {{ $specialist->opening_time ?? '' }}
                            </td>
                            <td>
                                {{ $specialist->closing_time ?? '' }}
                            </td>
                            <td>
                                {{ App\Specialist::AVAILABILITY_SELECT[$specialist->availability] ?? '' }}
                            </td>
                            <td>
                                @can('specialist_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.specialists.show', $specialist->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('specialist_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.specialists.edit', $specialist->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('specialist_delete')
                                    <form action="{{ route('admin.specialists.destroy', $specialist->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                                <a class="btn btn-xs btn-info" href="{{ URL::to('admin/specialists-available-times', $specialist->id) }}">
                                    Times
                                </a>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('specialist_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.specialists.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Specialist:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
