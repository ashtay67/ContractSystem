@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Create a new Request</div>
                <div class="panel-body">
                    <form action="{{route('good_request.store')}}" method="POST">



                        <div class="form-group">
                        <label for="name">Request Title</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter good name">
                      </div>

                        <div class="form-group">
                        <label for="description">Request Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                      </div>

                      <div class="form-group">
                            <label for="skill">Choose Desired Skill</label>
                            <select type="text" class="form-control" id="skill" name="skill">
                                @foreach($skills as $skill)

                                    <option value="{{$skill->id}}">{{$skill->name}}</option>

                                @endforeach

                            </select>
                        </div>

                    <div class="form-group">
                        <label for="value">Value</label>
                        <input type="number" class="form-control" id="value" name="value" placeholder="enter the amount of desired skill sessions">
                      </div>


                      @foreach($user->goods as $good)
                      <div class="checkbox">
                          <label><input type="checkbox" name="good_offered[]" value="{{$good->id}}">{{$good->name}}</label>
                    </div>
                    @endforeach

                        
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="submit" value="Submit Good Request">

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
