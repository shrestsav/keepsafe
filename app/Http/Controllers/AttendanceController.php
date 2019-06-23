<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = [];
        $last_check_in_out_client = [];
        return view('attendance.check_in_out',compact('clients','last_check_in_out_client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = ['type' => 'required',
                 'image' => 'required',
                 'latitude' => 'required',
                 'longitude' => 'required'
                ];
        $msg = ['image.required' => 'Something is wrong with your camera',
                'type.required' => 'Something is wrong',
                'latitude.required' => 'Location Error',
                'longitude.required' => 'Location Error'
                ];
        $this->validate($request, $rule, $msg);

        //Have to check this validation could be already validated from above validate method
        if(!$request->get('image')){
            return redirect()->back()->withErrors('No Photo');
        }
        
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
        //
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
        //
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
}
