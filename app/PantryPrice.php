<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PantryPrice extends Model
{
    protected $fillable = ['client_id','CSFEP','CTFEP','RSEP','RPEP','REP','RP','STDCP','ICP','CEP','BL','CO','EVOR','EVTR','K','MG','COF','ERC','MMC','HCR','HCP','HCEVO','HCEVT','HCEK','HCEMG','DW','Note'];
}
