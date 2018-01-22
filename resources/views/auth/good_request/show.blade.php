@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$request->name}} by {{$request->user->name}}

                    @if($user->can_access($request))
                        <a class="float-right btn btn-warning btn-xs group-btn" href="{{route("good_request.edit", $request->id)}}">
                            Edit
                        </a>
                    @endif
                </div>

                <div class="panel-body">
                    {!!$request->description!!}<br>
                    Amount Requested: {{$request->good_quantity}} sessions<br>
                    Related Skill: {{$request->related_skill->name}}
                    <br>
                    
                     <h3>Offered Goods</h3>
                    <ul class="list-group">
                    @foreach($request->offered_goods as $good)
                        <li class="list-group-item">
                        {{ucfirst($good->name)}}
                         </li>
                    @endforeach
                     </ul>



                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
