@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Search


                </div>

                <div class="panel-body">
                 <div class="col-md-8 col-md-offset-2">
                    <form action="{{route('search.search')}}" method="POST">
                        <div class="col-md-10">
                        <input class="form-control" placeholder="Search" name="search_term" id="search_term" type="text">
                        </div>
            
                        <button class="btn btn-default float-right">
                                    <i class="glyphicon glyphicon-search"></i>
                        </button>

                        <div class="form-group">
                             <label for="search_type">What are you searching for?</label><br>
                             or just select a catgeory to see all results<br>
                             <input type="radio" name="search_type" value="1">People<br>
                             <input type="radio" name="search_type" value="2">Organizations<br>
                             <input type="radio" name="search_type" value="3">Requests<br>
                             <input type="radio" name="search_type" value="4" checked>Goods<br>
                        </div>
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
