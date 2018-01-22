@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">All Skills

                 <a class="float-right btn btn-success btn-md" href="{{route("skills.create")}}">
                        Create
                </a>
                </div>
                <div class="panel-body">
                    
                <ul class="list-group">
                  @foreach($allskills as $skill)
                  <li class="list-group-item">
                    {{$skill->name}}
                    <a class="float-right btn btn-primary btn-xs group-btn" href="{{route("skills.show", $skill->id)}}">
                        view
                    </a>

                    <a class="float-right btn btn-warning btn-xs group-btn" href="{{route("skills.edit", $skill->id)}}">
                        edit
                    </a>


                </li>
                  @endforeach
                </ul>


                </div>
                <div class="panel-footer">
                    Last Updated: 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
