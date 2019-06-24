<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientContact extends Model
{
    protected $fillable = [
        'client_id', 
        'name', 
        'position',
        'phone',
        'fax',
        'email',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
