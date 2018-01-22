@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Your past work 
                    <a class="float-right btn btn-success btn-sm group-btn" href="{{route("skill_example.create")}}">
                    Add a past work example
                    </a>
                </div>
                <div class="panel-body">
                @foreach($user->skill_examples as $example)   
                    {{$example->name}}<br>
                @endforeach
                </div>
                <div class="panel-footer">
                    woooo
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
