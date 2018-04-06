<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Message;

class MessageSent extends Mailable
{
    use Queueable, SerializesModels;
    private $_subject;
    private $_body;
    private $sender;
    private $receiver;
    private $message; 
    private $_link_text;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
        $this->sender = $message->sender;
        $this->receiver = $message->receiver;
        $this->_subject = "New Message on Re-gen.Exchange from " . $this->sender->name; 
        $this->_body = "You have a new message on Re-gen.Exchange from " . $this->sender->name . " with the subject " . $message->subject . " on date " . $message->created_at;
        $this->_link_text .= "<br><a href='". route('messages.show', $message->id) ."'> reply on re-gen.exchange here</a>";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.message')
        ->from('no-reply@re-gen.exchange')
        ->subject($this->_subject)
        ->with([
            'body' => $this->_body,
            'message_body' => $this->message->body,
            'link_text' => $this->_link_text

        ]);
    }
}
