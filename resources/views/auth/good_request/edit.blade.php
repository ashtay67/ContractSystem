@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit {{$request->name}}</div>
                <div class="panel-body">
                    {!! Form::open(['route' => ['good_request.update', $request->id], 'method' => 'put']) !!}



                        <div class="form-group">
                        <label for="name">Request Title</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$request->name}}">
                      </div>

                        <div class="form-group">
                        <label for="description">Request Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"> {{$request->description}}</textarea>
                      </div>

                      <div class="form-group">
                            <label for="skill">Choose Desired Skill</label>
                            <select type="text" class="form-control" id="skill" name="skill">
                                @foreach($skills as $skill)

                                    <option value="{{$skill->id}}" {{$skill->id == $request->skill_id ? "selected" : ""}}>{{$skill->name}}</option>

                                @endforeach

                            </select>
                        </div>

                    <div class="form-group">
                        <label for="value">Value</label>
                        <input type="number" class="form-control" id="value" name="value" value="{{$request->good_quantity}}">
                      </div>


                      @foreach($user->goods as $good)
                      <div class="checkbox">
                          <label><input type="checkbox" name="good_offered[]" value="{{$good->id}}" {{$request->has_good($good->id) ? "checked" : ""}}>{{$good->name}}</label>
                    </div>
                    @endforeach

                        
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="submit" value="Submit Good">

                    {!! Form::close()!!} 
                </div>
                <div class="panel-footer">
                    woooo
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
