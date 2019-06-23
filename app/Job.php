<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
     protected $fillable = [
        'job_type',
		'client_id',
		'client_contacts',
		'purchase_order',
		'location',
		'site_contact',
		'site_phone',
		'suburb',
		'site_address',
		'directions',
		'footnote',
		'AMORR',
		'status',
		'invoice_note',
    ];
}
