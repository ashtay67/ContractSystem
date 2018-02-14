@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$good->name}} from <a href="{{route("users.public.profile", $good_owner)}}">{{$name}}</a>
                    @if($user_id == $good_owner)
                    <a class="float-right btn btn-warning btn-xs group-btn" href="{{route("goods.edit", $good->id)}}">
                        Edit
                 </a>
                 @endif
                </div>

                <div class="panel-body">
                    {!!$good->description!!}

                    <h3>Related Skill</h3>
                    <ul class="list-group">
                    @foreach($good->skills as $skill)
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
