<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Job;
use App\JobEvent;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jobs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        return $clients;
    }

    public function jobs()
    {
        $jobs = Job::with('client')->paginate(config('settings.rows'));
        foreach($jobs as $job){
            $contacts = $job->clientContacts();
            $job['contacts'] = $contacts;
        }
    
        // return $jobs; //same thing
        return response()->json($jobs);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'job_type' => 'required',
            'client_id' => 'required',
            'footnote' => 'required|string|max:555',
            'status' => 'required',
            'invoice_note' => 'required|string|max:555',
        ]);
        $request['client_contacts'] = json_encode($request->client_contacts);
        $job = Job::create($request->all());
        if($job)
            return $job->id;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::find($id);
        return response()->json($job);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'job_type' => 'required',
            'client_id' => 'required',
            'footnote' => 'required|string|max:555',
            'status' => 'required',
            'invoice_note' => 'required|string|max:555',
        ]);
        $request['client_contacts'] = json_encode($request->client_contacts);
        $update = Job::where('id',$id)->update($request->all());
        return $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function jobEvents($job_id)
    {
        return JobEvent::where('job_id',$job_id)->paginate(config('settings.rows'));
    }

    public function jobEventStore(Request $request)
    {
        $validatedData = $request->validate([
            'job_id' => 'required',
            'priority' => 'required',
            'date' => 'required',
            'status' => 'required',
            'type' => 'required',
            'vehicle' => 'required',
        ]);
        $jobEvent = JobEvent::create($request->all());
    }
}
