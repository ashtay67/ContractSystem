@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Send {{$receiver->name}} a message</div>
                <div class="panel-body">
                        {!! Form::open(['route' => ['messages.store', $receiver->id], 'method' => 'post']) !!}



                        <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject">
                      </div>


                        <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="3">  </textarea>
                      </div>
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="submit" value="Send">

                    </form>
                </div>
                <div class="panel-footer">
                    woooo
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
