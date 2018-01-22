@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Create a new skill</div>
                <div class="panel-body">
                    <form action="{{route('skills.store')}}" method="POST">



                        <div class="form-group">
                        <label for="name">Skill Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter skill name">
                      </div>

                        <div class="form-group">
                        <label for="parent_id">Parent ID</label>
                        <input type="text" class="form-control" id="parent_id" name="parent_id" value="0">
                      </div>

                        <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                      </div>
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="submit" value="Submit Skill">

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
