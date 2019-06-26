<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobEvent extends Model
{
    protected $fillable = [
        'job_id',
		'priority',
		'superslip',
		'date',
		'status',
		'type',
		'vehicle',
		'boom_lift_req',
		'note',
		'rail_rate',
		'platform_rate',
		'int_platform_rate',
		'purchase_order',
		'ref',
		'off_hired',
		'hire_days',
		'location',
		'GD',
		'NORR',
		'BOMR',
		'P',
		'UB',
		'N',
		'BR',
		'ORS',
		'BRC',
		'BRR',
		'BRP',
    ];
}
