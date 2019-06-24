<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoreController extends Controller
{
    public function jobTypes()
    {
    	$jobTypes = config('settings.job_types');
    	return $jobTypes;
    }
    public function jobStatuses()
    {
    	$jobStatuses = config('settings.job_statuses');
    	return $jobStatuses;
    }
    public function states()
    {
    	$states = config('settings.states');
    	return $states;
    }
}
