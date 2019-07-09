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
        // 
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

    public function jobs($key)
    {
        $jobs = Job::with('client')->withCount('events')->where('status',$key)->paginate(config('settings.rows'));
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
        $job = Job::where('id',$id)->with('client')->first();
        return response()->json($job);
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
        $deleteJob = Job::destroy($id);
    }

    public function deletedJobs()
    {
        $deletedJobs = Job::onlyTrashed()->with('client')->withCount('events')->paginate(config('settings.rows'));
        return $deletedJobs;
    }    

    public function restoreJob(Request $request)
    {
        $restoreJob = Job::onlyTrashed()->where('id',$request->job_id)->restore();
        return response()->json('Successfull');
    }

    public function jobEvents($job_id)
    {
        return JobEvent::where('job_id',$job_id)->orderBy('id','DESC')->paginate(config('settings.rows'));
    }

    public function allEvents($key)
    {
        return JobEvent::where('status',$key)->paginate(config('settings.rows'));
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

        foreach($request->json_field_list as $key => $value){
            $var = explode("_",$key);
            ${$var[0]} = [];
            foreach($request->{$key} as $list) {
                ${$var[0]}[$list] = $request[$list];
            }
            $request[$var[0]] = json_encode(${$var[0]});
        }

        $jobEvent = JobEvent::create($request->all());
    } 

    public function jobEventUpdate(Request $request)
    { 
        $validatedData = $request->validate([
            'job_id' => 'required',
            'priority' => 'required',
            'date' => 'required',
            'status' => 'required',
            'type' => 'required',
            'vehicle' => 'required',
        ]);

        foreach($request->json_field_list as $key => $value){
            $var = explode("_",$key);
            ${$var[0]} = [];
            foreach($request->{$key} as $list) {
                ${$var[0]}[$list] = $request[$list];
                unset($request[$list]);
                unset($request[$key]);
            }
            $request[$var[0]] = json_encode(${$var[0]});
        }
        unset($request['json_field_list']);
        unset($request['job']);

        $update = JobEvent::where('id',$request->id)->update($request->all());
        return $update;
    }

    public function jobEventDetails($event_id)
    {
        $jobEvent = JobEvent::find($event_id);
        $json_fields_all = ['GD','NORR','BOMR','UB'];
        $json_fields_commercial = ['BR','ORS'];
        $json_fields_domestic = ['BRC','BRR','BRP'];

        foreach($json_fields_all as $jfa){
            $arr = json_decode($jobEvent->{$jfa},true);
            foreach($arr as $key => $val){
                $jobEvent[$key] = $val;
            }
            unset($jobEvent[$jfa]);
        }
        if($jobEvent->job->job_type==1 || $jobEvent->superslip){
            foreach($json_fields_commercial as $jfc){
                $arr = json_decode($jobEvent->{$jfc},true);
                foreach($arr as $key => $val){
                    $jobEvent[$key] = $val;
                }
                unset($jobEvent[$jfc]);
            }
            
        }
        if($jobEvent->job->job_type==2 || $jobEvent->superslip){
            foreach($json_fields_domestic as $jfd){
                $arr = json_decode($jobEvent->{$jfd},true);
                foreach($arr as $key => $val){
                    $jobEvent[$key] = $val;
                }
                unset($jobEvent[$jfd]);
            }
            
        }
        return $jobEvent;
    }
}
