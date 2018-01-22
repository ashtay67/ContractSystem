@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$skill_example->name}}
                    
                    @if($user->can_access($skill_example)) 
                        <a class="float-right btn btn-warning btn-xs group-btn" href="{{route("skill_example.edit", $skill_example->id)}}">
                            Edit
                        </a>
                    @endif
                </div>

                <div class="panel-body">
                    {!!$skill_example->description!!}

                    <h3>Related Skill</h3>
                    <ul class="list-group">
                    @foreach($skill_example->skills as $skill)
                        <li class="list-group-item">
                        {{ucfirst($skill->name)}}
                         </li>
                    @endforeach
                     </ul>
                    <hr>
                </div>

                <div class="panel-footer">
                    
                    @if($user->can_access($skill_example)) 
                    {!! Form::open(['route' => ['skill_example.destroy', $skill_example->id], 'method' => 'delete']) !!}

                        <input type="submit" class="float-right btn btn-danger btn-xs" value="Delete this work example">

                    {!! Form::close() !!}
                    <div class="clearfix"></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
