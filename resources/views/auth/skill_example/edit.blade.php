@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit {{$skill_example->name}}</div>
                <div class="panel-body">
                    {!! Form::open(['route' => ['skill_example.update', $skill_example->id], 'method' => 'put']) !!}

                        <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" value="{{$skill_example->name}}" id="name" name="name" placeholder="Enter title of this work example">
                      </div>

                        <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{!!$skill_example->description!!}</textarea>
                      </div>

                       <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" class="form-control" value="{{$skill_example->link}}" id="link" name="link" placeholder="paste link to past work example">
                      </div>

                        <div class="form-group">
                            <label for="skill">Choose Related Skills</label><br>
                            
                                @foreach($skills as $skill)

                                    <input type="checkbox" name="skill[]" value="{{$skill->id}}" {{$skill_example->has_skill($skill->id) ? "checked" : ""}}>{{$skill->name}}<br>

                                @endforeach

                            
                        </div>
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="submit" value="Update Work Example">

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
