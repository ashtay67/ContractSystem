@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">My Contracts</div>

                <div class="panel-body">
                   <h3>Contracts I Proposed</h3>
                    <ul class="list-group">
                    @foreach($user->my_contracts as $contract)

                        <li class="list-group-item">
                            @if($contract->is_approved())
                            <img src="{{asset('images/success.png')}}" />
                            @endif
                        <a href="{{route("contracts.show", $contract->id)}}">{{ucfirst($contract->get_name(false))}}</a>
                         </li>
                    @endforeach
                     </ul>

                    <h3>Contracts Others Proposed</h3>
                     <ul class="list-group">
                    @foreach($user->other_contracts as $contract)

                        <li class="list-group-item">
                            @if($contract->is_approved())
                            <img src="{{asset('images/success.png')}}" />
                            @endif
                        <a href="{{route("contracts.show", $contract->id)}}">{{ucfirst($contract->get_name(false))}}
                        </a>
                         </li>
                    @endforeach
                     </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
