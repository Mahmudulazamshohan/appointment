<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Days</th>
				<th>Times</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($availabledays as $availableday)
				<tr>
					<td>
						<span class="mt-1">{{ $availableday->dayname->name }}</span>
					</td>
					<td>
						@if ($availableday->availabletime)
							@foreach ($availableday->availabletime as $element)
							<span class="badge badge-info time-badge mt-1">{{ $element->available_time }}</span>
							@endforeach
						@endif
					</td>
					<td class="text-right">
						@if (count($availableday->availabletime) >0)
							<button class="btn btn-danger btn-sm edit-btn" title="Edit" type="button" data-toggle="modal" data-target="#editAvailableTimesModal" data-id="{{ $availableday->id }}"><i class="fa fa-edit" aria-hidden="true"></i></button>
						@else
							<button class="btn btn-primary btn-sm set-btn" title="Set" type="button" data-toggle="modal" data-target="#setAvailableTimesModal" data-id="{{ $availableday->id }}"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>