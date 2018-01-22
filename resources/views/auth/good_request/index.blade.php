@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            
            <div class="panel panel-default">
                <div class="panel-heading">{{$user->name}}'s Requests
                      
                </div>

                <div class="panel-body">
                    
                     <ul class="list-group">
                        @foreach($user->good_requests as $goodrequest)
                            <li class="list-group-item">
                                <a href="{{route('good_request.show', $goodrequest->id)}}">
                                     {{$goodrequest->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul> 
                </div>
            </div>

            </div>
        </div>
    </div>
</div>
@endsection
