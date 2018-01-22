@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit {{$good->name}}</div>
                <div class="panel-body">
                    <form action="{{route('goods.update', $good->id)}}" method="POST">



                        <div class="form-group">
                        <label for="name">Good Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$good->name}}">
                      </div>

                        <div class="form-group">
                        <label for="description">Good Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{!!$good->description!!}</textarea>
                      </div>

                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="submit" value="Save Good">

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
