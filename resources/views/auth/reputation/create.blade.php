@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Rating Contract: {{$contract->get_name()}}</div>
                <div class="panel-body">
                    <form action="{{route('reputation.store', $contract->id)}}" method="POST">



                        <div class="form-group">
                        <label for="description">How was your experience overall?</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                      </div>

                    <div class="form-group">
                         <label for="reccomend">Would you reccomend {{$contractor->name}}?</label><br>
                         <input type="radio" name="reccomend" value="1">Yes<br>
                         <input type="radio" name="reccomend" value="0">No

                    </div>

                    <div class="form-group">
                         <label for="expertise_quality">How knowledgable was {{$contractor->name}} of their trade?</label><br>
                         <input type="radio" name="expertise_quality" value="1">Novice<br>
                         <input type="radio" name="expertise_quality" value="2">Skilled<br>
                         <input type="radio" name="expertise_quality" value="3">Expert<br>
                         <input type="radio" name="expertise_quality" value="4">Artisan<br>
                    </div>

                    <div class="form-group">
                         <label for="tactful">How tactful was {{$contractor->name}}?</label><br>
                         <input type="radio" name="tactful" value="1">Rude<br>
                         <input type="radio" name="tactful" value="2">Unpleasant<br>
                         <input type="radio" name="tactful" value="3">Pleasant<br>
                         <input type="radio" name="tactful" value="4">Very Pleasant<br>
                    </div>

                    <div class="form-group">
                         <label for="punctual">How punctual was {{$contractor->name}}?</label><br>
                         <input type="radio" name="punctual" value="1">Usually late<br>
                         <input type="radio" name="punctual" value="2">Sometimes late<br>
                         <input type="radio" name="punctual" value="3">Usually on time<br>
                         <input type="radio" name="punctual" value="4">Usually early<br>
                    </div>

                       
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" value="Submit Review">

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
