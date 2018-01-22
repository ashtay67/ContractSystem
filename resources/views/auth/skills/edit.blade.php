@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit {{$skill->name}}</div>
                <div class="panel-body">
                    <!--<form action="{{route('skills.update', $skill->id)}}" method="GET" _method="PUT">-->
                        {!! Form::open(['route' => ['skills.update', $skill->id], 'method' => 'put']) !!}



                        <div class="form-group">
                        <label for="name">Skill Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$skill->name}}">
                      </div>

                      <div class="form-group">
                        <label for="parent_id">Parent ID</label>
                        <input type="text" class="form-control" id="parent_id" name="parent_id" value="{{$skill->parent_id}}">
                      </div>


                        <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"> {!!$skill->description!!} </textarea>
                      </div>
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="submit" value="Save Skill">

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
