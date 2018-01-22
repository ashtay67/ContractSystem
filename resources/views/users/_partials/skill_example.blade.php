<?php  
$show_buttons = true;
if (isset($public)) {
    if ($public) {
        $show_buttons = false;
    }
}

?>

<div class="panel panel-default">
    <div class="panel-heading">{{$user->name}}'s Past Work 
        <a class="float-right btn btn-success btn-sm group-btn" href="{{route("skill_example.index")}}">
            View all
        </a>
        @if($show_buttons)
         <a class="float-right btn btn-success btn-sm group-btn" href="{{route("skill_example.create")}}">
            Add a past work example
        </a>
        @endif
    </div>

    <div class="panel-body">
        @foreach($user->skill_examples as $example)   
                    <a href="{{route('skill_example.show', $example->id)}}">{{$example->name}}</a><br>
        @endforeach
        
    </div>

</div>