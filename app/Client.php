<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name', 
        'address', 
        'suburb',
        'state',
        'postcode',
        'phone',
        'fax',
        'account_limit',
        'cr_ac_approve',
        'billing_email',
        'billing_address',
        'billing_suburb',
        'billing_state',
        'billing_postcode',
        'website',
        'abn',
        'charge_rate',
        'footnote',
    ];

    public function contacts()
    {
        return $this->hasMany(ClientContact::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
