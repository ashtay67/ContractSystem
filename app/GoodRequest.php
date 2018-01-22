<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodRequest extends Model
{
     public function offered_goods() {

        return $this->belongsToMany('App\Good', 'good_requests_goods', 'good_request_id', 'good_id');
    }

    public function related_skill() {
    	return $this->hasOne('App\Skill', 'id', 'skill_id');
    }

    public function user() {
    	return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function has_good($id) {
    	foreach($this->offered_goods as $good) {
    		if($good->id == $id)
    			return true;
    	}

  		return false;
    }
}
