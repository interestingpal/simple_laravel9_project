@extends('layouts.base_admin.base_dashboard')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($jobStatus->name) ? $jobStatus->name : 'Job Status' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('job_statuses.job_status.destroy', $jobStatus->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('job_statuses.job_status.index') }}" class="btn btn-primary" title="Show All Job Status">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('job_statuses.job_status.create') }}" class="btn btn-success" title="Create New Job Status">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('job_statuses.job_status.edit', $jobStatus->id ) }}" class="btn btn-primary" title="Edit Job Status">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Job Status" onclick="return confirm(&quot;Click Ok to delete Job Status.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $jobStatus->name }}</dd>
            <dt>Description</dt>
            <dd>{{ $jobStatus->description }}</dd>
            <dt>Created At</dt>
            <dd>{{ $jobStatus->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $jobStatus->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection