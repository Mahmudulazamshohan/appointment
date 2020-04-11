<div class="row">
	<div class="col-sm-12 text-left"><button class="btn btn-xs btn-default arrow-btn mb-2 times-undo-btn"><i class="fa fa-undo" aria-hidden="true"></i></button></div>
</div>
<form action="javascript:void(0)">
	<div><input type="hidden" name="appointmentdate" id="appointmentdate" value="{{ $date }}"></div>


    <div>
        @forelse ($availabletimes as $index => $element)
{{--            @if($index == 0)--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-4"></div>--}}
{{--                <div class="col-md-4">--}}
{{--                    <select name="" id="category_id" class="form-control my-2" required>--}}
{{--                        @foreach($specialistcategories as $specialistcategory)--}}
{{--                            <option value="{{$specialistcategory->category->id}}">{{$specialistcategory->category->name ?? ''}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="col-md-4"></div>--}}
{{--            </div>--}}
{{--            @endif--}}
            @if (in_array($element->available_time,$bookingtimes))
                <button class="btn btn-grey occupied" title="Occupied">{{ $element->available_time }}</button>
            @else
                <button class="btn btn-success time-btn" value="{{ $element->available_time }}">{{ $element->available_time }}</button>
            @endif
        @empty
            <h4>Litujeme, nenalezeno!</h4>
        @endforelse
    </div>

</form>
