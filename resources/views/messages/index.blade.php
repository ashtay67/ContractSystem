@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            
            <div class="panel panel-default">
                <div class="panel-heading">{{$user->name}}'s Sent Messages
                      
                </div>

                <div class="panel-body">
                    
                     <ul class="list-group">
                        @foreach($user->sent_messages as $sentmessage)
                            <?php
                            if($sentmessage->reply_to == -1) continue;
                            ?>
                            <li class="list-group-item {{ !$sentmessage->read ? "message-unread" : ""}}">
                                <a href="{{route('messages.show', $sentmessage->id)}}">
                                     {{$sentmessage->subject}}
                                </a>
                            </li>
                        @endforeach
                    </ul> 
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">{{$user->name}}'s Received Messages
                      
                </div>

                <div class="panel-body">
                    
                     <ul class="list-group">
                        @foreach($user->received_messages as $receivedmessage)
                            <li class="list-group-item {{ !$receivedmessage->read ? "message-unread" : ""}}"><a href="{{route('messages.show', $receivedmessage->id)}}">
                                     {{$receivedmessage->subject}}
                                </a></li>
                        @endforeach
                    </ul> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
