<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = [
        'user_id', 
        'd_o_b', 
        'license_no',
        'license_expiry',
        'gender',
        'address',
        'contact',
        'about',
        'joined_date',
        'documents'
    ];
}
