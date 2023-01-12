<?php

namespace App\Http\Controllers;

use App\Enums\Emirates;
use Exception;
use App\Models\Job;
use App\Models\User;
use App\Models\JobType;
use App\Models\JobStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rules\Enum;

class JobsController extends Controller
{

    /**
     * Display a listing of the jobs.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $jobs = Job::paginate(25);
        $authId = auth()->id();
        return view('jobs.index', compact('jobs', 'authId'));
    }

    /**
     * Show the form for creating a new job.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $jobTypes = JobType::pluck('name','id')->all();
        $jobStatuses = JobStatus::pluck('name','id')->all();
        $users = User::pluck('name','id')->all();
        $authId = auth()->id();
        
        return view('jobs.create', compact('jobTypes','jobStatuses','users', 'authId'));
    }

    /**
     * Store a new job in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
            
            $data = $this->getData($request);
            //$data['expiration_date'] = Carbon::createFromFormat('m/d/Y', $request->expiration_date)->format('d/m/Y');
            $response = Job::create($data);
            return redirect()->route('jobs.job.index')
                ->with('success_message', 'Job was successfully added.');
        try {
        } catch (Exception $exception) {
            var_dump($exception);
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified job.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $job = Job::with('jobtype','jobstatus','user')->findOrFail($id);

        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified job.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        $jobTypes = JobType::pluck('name','id')->all();
$jobStatuses = JobStatus::pluck('name','id')->all();
$users = User::pluck('name','id')->all();

        return view('jobs.edit', compact('job','jobTypes','jobStatuses','users'));
    }

    /**
     * Update the specified job in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $job = Job::findOrFail($id);
            $job->update($data);

            return redirect()->route('jobs.job.index')
                ->with('success_message', 'Job was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified job from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $job = Job::findOrFail($id);
            $job->delete();

            return redirect()->route('jobs.job.index')
                ->with('success_message', 'Job was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'name' => 'required|string|min:1|max:255',
            'emirates' => [new Enum(Emirates::class)],
            'company' => 'required|string|min:1|max:255',
            'address' => 'required|string|min:1|max:2147483647',
            'job_type_id' => 'required',
            'job_status_id' => 'required',
            'description' => 'required|string|min:1|max:2147483647',
            'expiration_date' => 'required|date_format:d/m/Y',
            'user_id' => 'required', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
