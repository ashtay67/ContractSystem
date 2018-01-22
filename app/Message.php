<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Message extends Model
{

	const PRIORITY_NORMAL = 5;
	const PRIORITY_HIGH = 10;
	const PRIORITY_LOW = 0;

	public function canAccess(User $user) {

		return $user->id == $this->sender_id || $user->id == $this->receiver_id;
	}


     public function sender() {
    	return $this->belongsTo('App\User', 'sender_id', 'id');
    }

    public function receiver() {
    	return $this->belongsTo('App\User', 'receiver_id', 'id');
    }

    public function reply() {
    	return $this->hasOne('App\Message', 'reply_to', 'id');
    }

}
