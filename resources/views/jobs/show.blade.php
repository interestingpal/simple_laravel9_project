{{-- @extends('layouts.app') --}}
@extends('layouts.base_admin.base_dashboard')
@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Student Details</b></div>
			<div class="col col-md-6">
				<a href="" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Student Name</b></label>
			<div class="col-sm-10">
				
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Student Email</b></label>
			<div class="col-sm-10">
				
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Student Gender</b></label>
			<div class="col-sm-10">
				
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Student Image</b></label>
			<div class="col-sm-10">
				<img src="" width="200" class="img-thumbnail" />
			</div>
		</div>
	</div>
</div>

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($job->name) ? $job->name : 'Job' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('jobs.job.destroy', $job->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('jobs.job.index') }}" class="btn btn-primary" title="Show All Job">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('jobs.job.create') }}" class="btn btn-success" title="Create New Job">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('jobs.job.edit', $job->id ) }}" class="btn btn-primary" title="Edit Job">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Job" onclick="return confirm(&quot;Click Ok to delete Job.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $job->name }}</dd>
            <dt>Emirates</dt>
            <dd>{{ $job->emirates }}</dd>
            <dt>Address</dt>
            <dd>{{ $job->address }}</dd>
            <dt>Job Type</dt>
            <dd>{{ optional($job->jobType)->name }}</dd>
            <dt>Job Status</dt>
            <dd>{{ optional($job->jobStatus)->name }}</dd>
            <dt>Description</dt>
            <dd>{{ $job->description }}</dd>
            <dt>Expiration Date</dt>
            <dd>{{ $job->expiration_date }}</dd>
            <dt>User</dt>
            <dd>{{ optional($job->user)->name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $job->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $job->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection