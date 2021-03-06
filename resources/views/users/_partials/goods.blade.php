<?php  
$show_buttons = true;
if (isset($public)) {
    if ($public) {
        $show_buttons = false;
    }
}

?>

<div class="panel panel-default">
    <div class="panel-heading">Resources</div>

    <div class="panel-body">
        @if($show_buttons)
        <a class="float-right btn btn-success btn-md group-btn" href="{{route("goods.create")}}">
                        Add a Resource
        </a>
        @endif
        @if(!$show_buttons)
        <h3>{{$user->name}}'s Resources</h3>
        @else
        <h3>My Resources</h3>
        @endif
        <ul class="list-group">
            @foreach($user->goods as $good)
                <li class="list-group-item">
                {{ucfirst($good->name)}}
                <a class="float-right btn btn-primary btn-xs group-btn" href="{{route("goods.show", $good->id)}}">
                        View
                 </a>
                 </li>
            @endforeach
         </ul>
    </div>

</div>