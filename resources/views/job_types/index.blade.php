@extends('layouts.base_admin.base_dashboard')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Job Types</h4>
            </div>

            {{-- <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('job_types.job_type.create') }}" class="btn btn-success" title="Create New Job Type">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div> --}}

        </div>
        
        @if(count($jobTypes) == 0)
            <div class="panel-body text-center">
                <h4>No Job Types Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Name</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($jobTypes as $jobType)
                        <tr>
                            <td>{{ $jobType->name }}</td>

                            <td>

                                <form method="POST" action="{!! route('job_types.job_type.destroy', $jobType->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}
                                    <!-- Call to action buttons -->
                                    <ul class="list-inline m-0">
                                        <li class="list-inline-item">
                                            <a href="{{ route('job_types.job_type.edit', $jobType->id ) }}" class="btn btn-success btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Edit" role="button">Edit</a>
                                            {{-- <button class="btn btn-success btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('jobs.job.edit', $job->id ) }}"><i class="fa fa-edit"><a href="{{ route('jobs.job.edit', $job->id ) }}"/></i></button> --}}
                                        </li>
                                        <li class="list-inline-item">
                                            <button class="btn btn-danger btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Delete Job" onclick="return confirm(&quot;Click Ok to delete Job.&quot;)"><i class="fa fa-trash"></i></button>
                                        </li>
                                    </ul>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $jobTypes->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection