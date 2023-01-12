
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($job)->name) }}" minlength="1" maxlength="255" required="true" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('company') ? 'has-error' : '' }}">
    <label for="company" class="col-md-2 control-label">Address</label>
    <div class="col-md-10">
        <input class="form-control" name="company" type="text" id="company" value="{{ old('company', optional($job)->company) }}" minlength="1" maxlength="200" required="true" placeholder="Enter Company Name here...">
        {!! $errors->first('company', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('emirates') ? 'has-error' : '' }}">
    <label for="emirates" class="col-md-2 control-label">Emirates</label>
    <div class="col-md-10">
        <select class="form-control" id="emirates" name="emirates" required="true">
                <option value="" style="display: none;" {{ old('emirates', optional(optional($job)->emirates)->key ?: '') == '' ? 'selected' : '' }} disabled selected>Select job type</option>
            @foreach (App\Enums\Emirates::array() as $key=>$value)
                <option value="{{ $key }}" {{ old('emirates', optional(optional($job)->emirates)->key) == $key ? 'selected' : '' }}>
                    {{ $value }}
                </option>
            @endforeach
        </select>
        {!! $errors->first('emirates', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
    <label for="address" class="col-md-2 control-label">Address</label>
    <div class="col-md-10">
        <input class="form-control" name="address" type="text" id="address" value="{{ old('address', optional($job)->address) }}" minlength="1" maxlength="2147483647" required="true" placeholder="Enter address here...">
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('job_type_id') ? 'has-error' : '' }}">
    <label for="job_type_id" class="col-md-2 control-label">Job Type</label>
    <div class="col-md-10">
        <select class="form-control" id="job_type_id" name="job_type_id" required="true">
        	    <option value="" style="display: none;" {{ old('job_type_id', optional($job)->job_type_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select job type</option>
        	@foreach ($jobTypes as $key => $jobType)
			    <option value="{{ $key }}" {{ old('job_type_id', optional($job)->job_type_id) == $key ? 'selected' : '' }}>
			    	{{ $jobType }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('job_type_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('job_status_id') ? 'has-error' : '' }}">
    <label for="job_status_id" class="col-md-2 control-label">Job Status</label>
    <div class="col-md-10">
        <select class="form-control" id="job_status_id" name="job_status_id" required="true">
        	    <option value="" style="display: none;" {{ old('job_status_id', optional($job)->job_status_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select job status</option>
        	@foreach ($jobStatuses as $key => $jobStatus)
			    <option value="{{ $key }}" {{ old('job_status_id', optional($job)->job_status_id) == $key ? 'selected' : '' }}>
			    	{{ $jobStatus }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('job_status_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <input class="form-control" name="description" type="text" id="description" value="{{ old('description', optional($job)->description) }}" minlength="1" maxlength="2147483647" required="true">
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('expiration_date') ? 'has-error' : '' }}">
    <label for="expiration_date" class="col-md-2 control-label">Expiration Date</label>
    <div class="col-md-10">
        {{-- <input class="form-control" name="expiration_date" type="date-local" id="expiration_date" value="{{ old('expiration_date', optional($job)->expiration_date) }}" required="true" placeholder="Enter expiration date here..."> --}}
        <x-flatpickr id="expiration_date" name="expiration_date" value="{{ old('expiration_date', optional($job)->expiration_date) }}" required="true" date-format="d/m/Y" />
        {!! $errors->first('expiration_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

{{-- <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id" required="true">
        	    <option value="" style="display: none;" {{ old('user_id', optional($job)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($job)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $user }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div> --}}

    <input type="hidden" name="user_id" value="{{ $authId }}"
</div>

