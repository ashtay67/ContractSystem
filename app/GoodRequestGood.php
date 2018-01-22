<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodRequestGood extends Model
{
    protected $table = "good_requests_goods";

    public function good_request() {

        return $this->hasOne('App\GoodRequest', 'good_request_id', 'id');
    }

    public function good() {

        return $this->hasOne('App\Good', 'good_id', 'id');
    }
}
