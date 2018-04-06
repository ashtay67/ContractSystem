@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{!!$contract->get_name()!!}</div>

                <div class="panel-body">

                     {{$contract->contractor1_good_quantity}} {{$contract->contractor1_good->name}} for {{$contract->contractor2_good_quantity}} {{$contract->contractor2_good->name}}<br>
                
                    Message: {!!$contract->description!!}

                    <br/>

                    <div class="col-md-6 col-md-offset-3">
                        @if($contract->is_approved_for($user->id))
                            @if(!$contract->is_complete())
                                <a href="{{route('contracts.complete', $contract->id)}}" class="btn btn-success">Mark Complete</a>
                            @else
                                @if(!$user->has_reviewed($contract->id))
                                    <a href="{{route('reputation.create', $contract->id)}}" class="btn btn-info">Review Contract</a>
                                @endif
                            @endif
                        @else   
                            <a href="{{route('contracts.edit', $contract->id)}}" class="btn btn-lg btn-block btn-success">Edit Contract</a>
                            <a href="{{URL::route('contracts.approve', $contract->id)}}" class="btn btn-default">Approve Contract </a>
                        @endif
                    </div>


             </div>
            </div>

            @if($contract->is_complete())
            <div class="panel panel-info">
                <div class="panel-heading">Reviews</div>
                <div class="panel-body">
                    <div class="col-md-6 col-md-offset-3">
                    @foreach($contract->reviews as $review)
                            
                        <ul class="list-group">
                             <li class="list-group-item">
                                {{$review->reviewer->name}}'s Review on {{$review->format_date()}}
                            </li>  
                             <li class="list-group-item">
                                Reccomended? <span class="badge">{{$review->reccomend ? "Yes" : "No"}}</span>
                            </li>  
                             <li class="list-group-item">
                                Overall Experience: <br>{{$review->description}}
                            </li>  
                            <li class="list-group-item">
                                Expertise Quality: <span class="badge">{{$review->expertise_quality}}</span>
                            </li> 
                             <li class="list-group-item">
                                Tact: <span class="badge">{{$review->tact}}</span>
                            </li> 
                            <li class="list-group-item">
                                Punctuality: <span class="badge">{{$review->punctual}}</span>
                            </li>    

                        </ul>
                        

                    
                    @endforeach
                </div>
                </div>
            </div>  
            @endif  
        </div>
    </div>
</div>
@endsection
