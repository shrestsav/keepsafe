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
    public function event_statuses()
    {
        $event_statuses = config('settings.event_statuses');
        return $event_statuses;
    }
    public function event_types()
    {
        $event_types = config('settings.event_types');
        return $event_types;
    }
    public function event_vehicles()
    {
        $event_vehicles = config('settings.event_vehicles');
        return $event_vehicles;
    }
    public function install_types()
    {
        $install_types = config('settings.install_types');
        return $install_types;
    }
    public function roof_types()
    {
        $roof_types = config('settings.roof_types');
        return $roof_types;
    }
    public function pitches()
    {
        $pitches = config('settings.pitches');
        return $pitches;
    }
    public function heights()
    {
    	$heights = config('settings.heights');
    	return $heights;
    }
    public function job_event_fields()
    {
        $fields = config('fields.job_event');
        return $fields;
    }
}
