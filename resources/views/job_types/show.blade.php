@extends('layouts.base_admin.base_dashboard')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($jobType->name) ? $jobType->name : 'Job Type' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('job_types.job_type.destroy', $jobType->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('job_types.job_type.index') }}" class="btn btn-primary" title="Show All Job Type">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('job_types.job_type.create') }}" class="btn btn-success" title="Create New Job Type">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('job_types.job_type.edit', $jobType->id ) }}" class="btn btn-primary" title="Edit Job Type">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Job Type" onclick="return confirm(&quot;Click Ok to delete Job Type.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $jobType->name }}</dd>
            <dt>Description</dt>
            <dd>{{ $jobType->description }}</dd>
            <dt>Created At</dt>
            <dd>{{ $jobType->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $jobType->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection