<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Message;

class MessageController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function send($id) 
    {
        $receiver = User::find($id);
    	if($receiver == null) {
             return redirect()->route("users.profile")->withErrors("That user doesn't exist");
        }

        return view('messages.send', compact('receiver'));
    }

    public function store(Request $request, $id) 
    {
        $receiver = User::find($id);
    	if($receiver == null) {
             return redirect()->route("users.profile")->withErrors("That user doesn't exist");
        }

        $sender = Auth::user();
        $subject = $request->subject;
        $body = $request->message;
        $reply_to = $request->reply_to; 
        $reply_message = Message::find($reply_to);
        if ($reply_message == null) {

        }
        else {
        	$subject = "Re: ".$reply_message->subject;
        }	

        $message = new Message; 
        $message->subject = $subject;
        $message->body = $body;
        $message->priority = Message::PRIORITY_NORMAL;
        $message->read = false;
        $message->sender_id = $sender->id;
        $message->receiver_id = $receiver->id;
        $message->reply_to = $reply_to;
        $message->save();

        return redirect()->route("users.profile");
        


    }

    public function index() {


    	$user = Auth::user();

    	return view('messages.index', compact('user'));
    }

    public function show($id) {


    	$message = Message::find($id);
    	
		if($message == null) {
             return redirect()->route("messages.index")->withErrors("Unfortunately there is an error.");
        }
    	if (!$message->canAccess(Auth::user())) {
    		return redirect()->route("users.profile")->withErrors("Unfortunately there is an error.");

    	}
    	$message->read = true;
    	$message->save();
    	$replies = [];
    	$current_reply = $message->reply;
    	$last_reply = $message;

    	while ($current_reply != null) {
    		$last_reply = $current_reply;
    		$replies[]=$current_reply;
    		$current_reply=$current_reply->reply;
    	}



    	return view('messages.show', compact('message', 'replies', 'last_reply'));
    }
}
