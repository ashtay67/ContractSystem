@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Test Hello {{$user->name}}</div>



                <div class="panel-body">
                    this is a test page!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
