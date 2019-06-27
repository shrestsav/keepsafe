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

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function events()
    {
        return $this->hasMany(JobEvent::class);
    }

    public function clientContacts()
    {
    	$contacts = [];
    	$ids = json_decode($this->client_contacts, true);
    	if($ids)
            $contacts = ClientContact::whereIn('id',$ids)->get();
        return $contacts;
    }
}
