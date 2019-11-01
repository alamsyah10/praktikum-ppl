@extends('layouts.app')

@section('content')

<div class="container">
	@if(isset($wakeup_time))
		{{ $wakeup_time }}
	@endif
	<div class = "card-body">
		<form method="POST" action = "{{ url('profile') }}">
			{{ csrf_field() }}
			<fieldset class="form-group">
			    <div class="row">
			      <legend class="col-form-label col-sm-2 pt-10">Wakeup Time</legend>
			      <div class="col-sm-10">
			        <div class="form-check">
			          <input class="form-check-input" type="radio" name="wakeup_time" id="gridRadios1" value="05:00" checked>
			          <label class="form-check-label" for="gridRadios1">
			            Before 05:00 AM
			          </label>
			        </div>
			        <div class="form-check">
			          <input class="form-check-input" type="radio" name="wakeup_time" id="gridRadios2" value="06:00">
			          <label class="form-check-label" for="gridRadios2">
			            Between 07:00 AM - 05:00 AM
			          </label>
			        </div>
			        <div class="form-check">
			          <input class="form-check-input" type="radio" name="wakeup_time" id="gridRadios3" value="07:00">
			          <label class="form-check-label" for="gridRadios3">
			            After 07:00 AM
			          </label>
			        </div>
			      </div>
			    </div>
			  </fieldset>
			  <div class="form-group row mb-0">
	                <div class="col-md-6 offset-md-4">
	                    <button type="submit" class="btn btn-primary">
	                        Submit
	                    </button>
	                </div>
	            </div>
			
		</form>
		
	</div>	
   
</div>
@endsection
