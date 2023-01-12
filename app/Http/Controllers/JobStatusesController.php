<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobStatus;
use Illuminate\Http\Request;
use Exception;

class JobStatusesController extends Controller
{

    /**
     * Display a listing of the job statuses.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $jobStatuses = JobStatus::paginate(25);

        return view('job_statuses.index', compact('jobStatuses'));
    }

    /**
     * Show the form for creating a new job status.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('job_statuses.create');
    }

    /**
     * Store a new job status in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            JobStatus::create($data);

            return redirect()->route('job_statuses.job_status.index')
                ->with('success_message', 'Job Status was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified job status.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $jobStatus = JobStatus::findOrFail($id);

        return view('job_statuses.show', compact('jobStatus'));
    }

    /**
     * Show the form for editing the specified job status.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $jobStatus = JobStatus::findOrFail($id);
        

        return view('job_statuses.edit', compact('jobStatus'));
    }

    /**
     * Update the specified job status in the storage.
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
            
            $jobStatus = JobStatus::findOrFail($id);
            $jobStatus->update($data);

            return redirect()->route('job_statuses.job_status.index')
                ->with('success_message', 'Job Status was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified job status from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $jobStatus = JobStatus::findOrFail($id);
            $jobStatus->delete();

            return redirect()->route('job_statuses.job_status.index')
                ->with('success_message', 'Job Status was successfully deleted.');
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
            'description' => 'nullable|string|min:0|max:255', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
