@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">

                    {{ucfirst($skill->name)}} 

                    <a class="float-right btn btn-warning btn-xs" href="{{route("skills.edit", $skill->id)}}">
                        edit
                    </a>

                </div>
                <div class="panel-body">
                    
                <ul class="list-group">
                  <li class="list-group-item">
                    {{ucfirst($skill->name)}}
                  </li>
                  <li class="list-group-item">
                    {!!$skill->description!!}
                  </li>
                  @if($skill->parent_skill != null)
                    <li class="list-group-item">
                    Parent Skill:<br>
                    {{$skill->parent_skill->name}}

                  </li>
                  @endif
                    @if(!$skill->child_skills->isEmpty())
                    
                    <li class="list-group-item">

                    Child Skills:<br>
                    @foreach($skill->child_skills as $child)
                     {{$child->name}} <br>
                    @endforeach
                   
                  </li>
                  @endif
                </ul>


                </div>
                <div class="panel-footer">
                    created at: {{$skill->created_at}}
                    updated at: {{$skill->updated_at}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
