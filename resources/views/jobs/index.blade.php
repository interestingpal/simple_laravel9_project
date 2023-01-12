{{-- @extends('layouts.app') --}}
@extends('layouts.base_admin.base_dashboard')

@section('content')
{{-- @push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush --}}
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
                <h4 class="mt-5 mb-5">Jobs</h4>
            </div>

            {{-- <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('jobs.job.create') }}" class="btn btn-success" title="Create New Job">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div> --}}

        </div>
        
        @if(count($jobs) == 0)
            <div class="panel-body text-center">
                <h4>No Jobs Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Emirates</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($jobs as $job)
                        <tr>
                            <td>{{ $job->name }}</td>
                            <td>{{ $job->company }}</td>
                            <td>{{ $job->emirates }}</td>
                            <td>{{ $job->jobType->name }}</td>
                            <td>{{ $job->jobType->status }}</td>
                            <td>{{ $job->jobType->expiration_date }}</td>

                            <td>

                                <form method="POST" action="{!! route('jobs.job.destroy', $job->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <!-- Call to action buttons -->
                                    <ul class="list-inline m-0">
                                        <li class="list-inline-item">
                                            <a href="{{ route('jobs.job.edit', $job->id ) }}" class="btn btn-success btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Edit" role="button">Edit</a>
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
            {!! $jobs->render() !!}
        </div>
        
        @endif
    
    </div>
    {{-- @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("input[type=datetime-local]");
    </script>
    @endpush --}}
@endsection