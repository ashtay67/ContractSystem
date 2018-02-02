<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon\Carbon;

class Message extends Model
{

	const PRIORITY_NORMAL = 5;
	const PRIORITY_HIGH = 10;
	const PRIORITY_LOW = 0;

    const DATE_FORMAT = "F jS 'y g:i a";

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

    public function format_date() {
        $date = Carbon::parse($this->created_at);
        return $date->format(self::DATE_FORMAT);
    }

}
