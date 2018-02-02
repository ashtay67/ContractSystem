@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    Subject: {{$message->subject}}
                      
                </div>

                <div class="panel-body">
                    {!!$message->body!!}
                     
                </div>


                    
            </div>
            @foreach($replies as $reply)

            <div class="panel panel-default">
                <div class="panel-heading">
                    Subject: {{$reply->subject}}
                      
                </div>

                <div class="panel-body">
                    ajdflajsd;lfj{!!$reply->body!!}
                     
                </div>


                    
            </div>

            @endforeach
            {!! Form::open(['route' => ['messages.store', $message->sender_id], 'method' => 'post']) !!}

                 <div class="panel panel-default">
                    <div class="panel-heading">
                           <div class="form-group">
                              <label for="subject">Subject</label>
                             <input type="text" class="form-control" id="subject" name="subject" value="{{"Re: ".$last_reply->subject}}" disabled>
                          </div>
                          
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="3">  </textarea>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="reply_to" value="{{ $last_reply->id }}">
                        <input type="submit" value="Send">        
                    </div>               
                </div>
            </form>          
        </div>
    </div>
</div>
@endsection


   
