<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Contract;

class Reputation extends Model
{
     public function contract() {
    	return $this->belongsTo('App\Contract', 'contract_id', 'id');
    }

}
