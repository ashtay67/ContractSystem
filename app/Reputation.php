<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Contract;
use Carbon\Carbon;

class Reputation extends Model
{
    const DATE_FORMAT = "F jS 'y g:i a";

    public function contract() {
    	return $this->belongsTo('App\Contract', 'contract_id', 'id');
    }

    public function reviewer() {
    	return $this->belongsTo('App\User', 'contractor_id', 'id');
    }

    public function format_date() {
        $date = Carbon::parse($this->created_at);
        return $date->format(self::DATE_FORMAT);
    }

}
