<div class="row justify-content-sm-center">
	<div class="col-sm-12 text-left"><button class="btn btn-xs btn-default arrow-btn mb-2 specialist-undo-btn"><i class="fa fa-undo" aria-hidden="true"></i></button></div>
	@forelse ($specialistCategories as $specialistCategory)
	<div class="col-sm-6 text-center mb-2">
		<div class="card" id="specialist-card">
			{{-- @if ($specialist->photo)
			<a href="{{ asset('images/specialist/'.$specialist->photo) }}" target="_blank">
			    <img class="card-img-top img-responsive mx-auto mt-2" src="{{ asset('images/specialist/'.$specialist->photo) }}" alt="Card image cap">
			</a>
			@else
			<a href="{{ asset('images/specialist/avatar.png') }}" target="_blank">
			    <img class="card-img-top img-responsive mx-auto mt-2" src="{{ asset('images/specialist/avatar.png') }}" alt="Card image cap">
			</a>
			@endif --}}
			<div class="card-body">
				<h5 class="card-title">{{ $specialistCategory->specialist->user->name }}</h5>
			    <div class="card-text">
			    	<div class="row">
			    		<div class="col-sm-12"><p class="text-center">Cena - {{ $specialistCategory->category->amount  }} <span>Kč</span></p></div>
			    	</div>
			    	<p>{{ $specialistCategory->specialist->description }}</p>
			    	<p></p>
			    </div>
			</div>
			@if ($specialistCategory->specialist->availability == 1)
				<div class="card-footer bg-transparent"><button class="btn btn-primary hvr-wobble-vertical book-app-btn" value="{{ $specialistCategory->specialist->id }}">objednat se</button></div>
			@else
				<div class="card-footer bg-transparent"><button class="btn btn-danger hvr-icon-pulse-grow"> Na dovolené <i class="fa fa-plane hvr-icon"></i></button></div>
			@endif

		</div>
	</div>
	@empty
		<div class="col-sm-6 text-center mb-2">
			<h4>Litujeme, nenalezeno!</h4>
		</div>
	@endforelse
	<div class="clearfix"></div>
</div>
