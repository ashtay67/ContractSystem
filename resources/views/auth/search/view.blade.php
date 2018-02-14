@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    Search Results

                </div>

                <div class="panel-body">
                    @foreach($search_results as $search_result)
                        <a href="{{$search_result->get_link()}}">{{$search_result->get_name()}}</a><br>
                        {!!$search_result->get_description()!!}<br><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
