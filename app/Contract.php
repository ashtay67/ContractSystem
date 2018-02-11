<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Message;
use App\User;

class Contract extends Model
{

    const STATUS_PENDING = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_COMPLETE = 2;


    public function contractor_1() {
        return $this->belongsTo('App\User', 'contractor1_id', 'id');
    }

    public function contractor_2() {
        return $this->belongsTo('App\User', 'contractor2_id', 'id');
    }

    public function canAccess(User $user) {

        return $user->id == $this->contractor1_id || $user->id == $this->contractor2_id;
    }

    public function contractor1_good() {
        return $this->belongsTo('App\Good', 'contractor1_good_id', 'id');
    }

    public function contractor2_good() {
        return $this->belongsTo('App\Good', 'contractor2_good_id', 'id');
    }

    public function reviews() {
        return $this->hasMany('App\Reputation', 'contract_id', 'id');
    } 

    public function get_name() {
    	$name = "Contract Between " . $this->contractor_1->name . " and " . $this->contractor_2->name . " on " . $this->created_at;
    	return $name;
    }

    public function get_other_contractor($id) {
        if ($this->contractor1_id == $id)
            return $this->contractor_2;
        else 
            return $this->contractor_1;
    }

    public function is_approved_for($id) {
         if ($this->contractor1_id == $id) {
            return $this->approved_contractor1;
        }
        elseif ($this->contractor2_id == $id) {
            return $this->approved_contractor2;
        }
        else
            return false;
    }

    public function approve_for($id) {
         if ($this->contractor1_id == $id) {
            $this->approved_contractor1 = true;
        }
        elseif ($this->contractor2_id == $id) {
            $this->approved_contractor2 = true;
        }
        else
            return false;

        $this->save();
        return true;

    }

    public function is_approved() {
        if ($this->approved_contractor1 == true && $this->approved_contractor2 == true)
            return true;
        else
            return false;
    }

    public function send_approval() {
        $this->send_approval_to($this->contractor1_id, $this->contractor2_id);
        $this->send_approval_to($this->contractor2_id, $this->contractor1_id);
    }

    private function send_approval_to($to_id, $from_id) {
        $sender = User::find($from_id);
        $receiver = User::find($to_id);
        $subject = "Your contract with {$sender->name} is approved.";
        $body = "Coordinate scheduling at your convenience.";
        $reply_to = -1; 
        /*
        $reply_message = Message::find($reply_to);
        if ($reply_message == null) {

        }
        else {
            $subject = "Re: ".$reply_message->subject;
        }   
        */
        $message = new Message; 
        $message->subject = $subject;
        $message->body = $body;
        $message->priority = Message::PRIORITY_HIGH;
        $message->read = false;
        $message->sender_id = $sender->id;
        $message->receiver_id = $receiver->id;
        $message->reply_to = $reply_to;
        $message->save();
    }

    public function send_new_proposal() {
        $this->send_new_proposal_to($this->contractor1_id, $this->contractor2_id);
        $this->send_new_proposal_to($this->contractor2_id, $this->contractor1_id);
    }

    public function send_new_proposal_to($to_id, $from_id) {
        $sender = User::find($from_id);
        $receiver = User::find($to_id);
        $subject = "{$sender->name} has proposed a contract with you.";
        $body = '<a href="'.route('contracts.show', $this->id) . '">view the contract here</a>';
        $reply_to = -1; 
        /*
        $reply_message = Message::find($reply_to);
        if ($reply_message == null) {

        }
        else {
            $subject = "Re: ".$reply_message->subject;
        }   
        */
        $message = new Message; 
        $message->subject = $subject;
        $message->body = $body;
        $message->priority = Message::PRIORITY_HIGH;
        $message->read = false;
        $message->sender_id = $sender->id;
        $message->receiver_id = $receiver->id;
        $message->reply_to = $reply_to;
        $message->save();
    }

    public function complete_for($id) {
         if ($this->contractor1_id == $id) {
            $this->completed_contractor1 = true;
        }
        elseif ($this->contractor2_id == $id) {
            $this->completed_contractor2 = true;
        }
        else
            return false;

        $this->save();
        if ($this->completed_contractor1 == true && $this->completed_contractor2 == true) {
            $this->status = self::STATUS_COMPLETE;
            $this->save();
        }
        return true;
    }

    public function is_complete() {
        return $this->status == self::STATUS_COMPLETE;
    }



}
