@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @include('users._partials.neighborhood')
            @include('users._partials.goods', ["public" => true])
            @include('users._partials.skill_example', ["public" => true])
            <div class="panel panel-default">
                <div class="panel-heading">{{$user->name}}'s Profile
                     <a class="float-right btn btn-success btn-xs group-btn" href="{{route("messages.send", $user->id)}}">
                        Message {{$user->name}}
                    </a>
                    <a class="float-right btn btn-success btn-xs group-btn" href="{{route("contracts.create", $user->id)}}">
                        Create Contract with {{$user->name}}
                    </a>
                </div>

                <div class="panel-body">
                    <h3>{{$user->name}}'s Skills</h3>
                    <ul class="list-group">
                    @foreach($user->skills as $skill)
                        <li class="list-group-item">
                        {{ucfirst($skill->name)}}
                         </li>
                    @endforeach
                     </ul>
                    <hr>
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
