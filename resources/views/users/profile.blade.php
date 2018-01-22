@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            @include('users._partials.neighborhood')
            @include('users._partials.goods')
            @include('users._partials.skill_example')
            <div class="panel panel-default">
                <div class="panel-heading">My Skills</div>

                <div class="panel-body">
                    <h3>My Skills</h3>
                    <ul class="list-group">
                    @foreach($user->skills as $skill)
                        <li class="list-group-item">
                        {{ucfirst($skill->name)}}
                         </li>
                    @endforeach
                     </ul>
                    <hr>
                  <h3>Add Skill</h3>
                  {!! Form::open(['route' => ['users.addskill'], 'method' => 'post']) !!}

                   <div class="form-group">
                        <label for="skill">New Skill</label>
                        <select type="text" class="form-control" id="skill" name="skill">
                            @foreach($skills as $skill)

                                <option value="{{$skill->id}}">{{$skill->name}}</option>

                            @endforeach

                        </select>

                        <input value="Add Skill" type="submit">
                    </div>
                    {!! Form::close() !!}

                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
