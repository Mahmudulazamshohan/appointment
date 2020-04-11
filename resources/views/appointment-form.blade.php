<div class="card card-primary">
    <div class="card-header">
    	<h3 class="card-title"><button class="btn btn-xs btn-default arrow-btn mb-2 form-undo-btn pull-left"><i class="fa fa-undo" aria-hidden="true"></i></button>Potvrdit termín</h3>
    </div>
    <form class="form-horizontal text-left" id="appointmentForm">
        <div class="card-body">
         	<div class="form-group row">
            	<label for="categor" class="col-sm-2 col-form-label">Služba</label>
            	<div class="col-sm-10">
            		<p class="mt-2">{{ ucwords($specialistcategories->category->name) ?? '' }}</p>
            	</div>
          </div>
          <div class="form-group row">
              <label for="categor" class="col-sm-2 col-form-label">Cena</label>
              <div class="col-sm-10">
                <p class="mt-2">{{ $specialistcategories->category->amount ?? '' }} Kč</p>
              </div>
          </div>
         	<div class="form-group row">
            	<label for="categor" class="col-sm-2 col-form-label">Specialista</label>
            	<div class="col-sm-10">
            		<p class="mt-2">{{ ucwords($specialistcategories->specialist->user->name) ?? '' }}</p>
            		<input type="hidden" name="specialist" id="specialist" value="{{ $specialistcategories->specialist->id }}">
            	</div>
          </div>
         	<div class="form-group row">
            	<label for="categor" class="col-sm-2 col-form-label">Datum</label>
            	<div class="col-sm-10">
            		<p class="mt-2">{{\Carbon\Carbon::parse($date)->format('d/m/Y') }}</p>
            		<input type="hidden" name="date" id="date" value="{{ $date }}">
            	</div>
          </div>
         	<div class="form-group row">
            	<label for="categor" class="col-sm-2 col-form-label">Čas</label>
            	<div class="col-sm-10">
            		<p class="mt-2">{{ $time }}</p>
            		<input type="hidden" name="time" id="time" value="{{ $time }}">
            	</div>
          </div>
         	<div class="form-group row">
            	<label for="categor" class="col-sm-2 col-form-label">Vaše Jméno</label>
            	<div class="col-sm-10">
            		<input type="text" class="form-control" name="patient_name" id="patient_name" placeholder="">
            	</div>
          </div>
         	<div class="form-group row">
            	<label for="categor" class="col-sm-2 col-form-label">Vaš E-mail</label>
            	<div class="col-sm-10">
            		<input type="text" class="form-control" name="patient_email" id="patient_email" placeholder="">
            	</div>
          </div>
         	<div class="form-group row">
            	<label for="categor" class="col-sm-2 col-form-label">Telefon</label>
            	<div class="col-sm-10">
            		<input type="text" class="form-control" name="patient_phone" id="patient_phone" placeholder="">
            	</div>
          </div>
        </div>
        <div class="card-footer">
        	<button type="submit" class="btn btn-default appointment-submit-btn">Potvrdit</button>
        	<a href="{{ URL::to('/') }}" class="btn btn-danger float-right">Zrušit</a>
        </div>
    </form>
</div>
