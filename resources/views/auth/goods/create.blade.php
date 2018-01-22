@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add a new good</div>
                <div class="panel-body">
                    <form action="{{route('goods.store')}}" method="POST">



                        <div class="form-group">
                        <label for="name">Good Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter good name">
                      </div>

                        <div class="form-group">
                        <label for="description">Good Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                      </div>

                        <div class="form-group">
                            <label for="skill">Choose Related Skill</label>
                            <select type="text" class="form-control" id="skill" name="skill">
                                @foreach($skills as $skill)

                                    <option value="{{$skill->id}}">{{$skill->name}}</option>

                                @endforeach

                            </select>
                        </div>
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="submit" value="Submit Good">

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
