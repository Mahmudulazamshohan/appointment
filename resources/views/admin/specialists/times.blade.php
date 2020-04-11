@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h5>{{ $specialist->user->name ?? '' }}</h5>
    </div>

    <div class="card-body">
        <p><strong>Available Days:</strong></p>
        @foreach ($specialist->availabledays as $availableday)
            <div class="row mb-2">
                <div class="col-sm-2"><strong>{{ $availableday->dayname->name ?? '' }}</strong></div>

                <div class="col-sm-8 form-group">
                    @if ($availableday->status == 0)
                        <form action="{{ route('admin.available-times') }}" method="POST" onsubmit = 'return ConfirmSubmission()'>
                            @csrf
                            <div class="row">
                                <div class="col-sm-10">
                                    <input type="hidden" name="available_day_id" value="{{ $availableday->id }}">
                                    <select class="select2 select2-hidden-accessible form-control" multiple="" data-placeholder="Select Time" data-dropdown-css-class="select2-purple" style="width: 100%;" data-select2-id="15" tabindex="-1" aria-hidden="true" name="available_times[]">
                                        <option value="09:00:00">09:00:00</option>
                                        <option value="10:00:00">10:00:00</option>
                                        <option value="11:00:00">11:00:00</option>
                                        <option value="12:00:00">12:00:00</option>
                                        <option value="13:00:00">13:00:00</option>
                                        <option value="14:00:00">14:00:00</option>
                                        <option value="15:00:00">15:00:00</option>
                                        <option value="16:00:00">16:00:00</option>
                                        <option value="17:00:00">17:00:00</option>
                                        <option value="18:00:00">18:00:00</option>
                                        <option value="19:00:00">19:00:00</option>
                                        <option value="20:00:00">20:00:00</option>
                                        <option value="21:00:00">21:00:00</option>
                                        <option value="22:00:00">22:00:00</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-sm btn-info mt-1" type="submit"><i class="fas fa-check"></i> Save</button>
                                </div>
                            </div>
                        </form>
                    @elseif($availableday->availabletime)
                        @foreach ($availableday->availabletime as $element)
                            <span class="badge badge-info time-badge">{{ $element->available_time }}</span>
                        @endforeach
                    @else
                        <p>Not Found!</p>
                    @endif
                    
                </div>
                
            </div>
        @endforeach
    </div>
    <div class="card-footer"></div>
</div>



@endsection
@section('scripts')
@parent
<script>
    function ConfirmSubmission()
    {
        return confirm('Are you sure you want to save?');
    }
    
</script>
@endsection