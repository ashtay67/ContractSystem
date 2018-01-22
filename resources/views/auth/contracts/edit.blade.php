@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Editing Contract: {{$contract->get_name()}}</div>
                <div class="panel-body">
                    <form action="{{route('contracts.update', $contract->id)}}" method="POST">

                        <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{!!$contract->description!!}</textarea>
                      </div>

                       <div class="form-group">
                            <label for="skill">Choose Your Good to Trade</label>
                            <select type="text" class="form-control" id="contractor1_good" name="contractor1_good">
                                @foreach($contract->contractor_1->goods as $good)

                                    <option value="{{$good->id}}" {{$good->id == $contract->contractor1_good_id ? "selected" : ""}}>{{$good->name}}</option>

                                @endforeach

                            </select>
                        </div>

                       <div class="form-group">
                        <label for="description">Value</label>
                         <input type="number" class="form-control" id="contractor1_good_quantity" name="contractor1_good_quantity" placeholder="Enter a number (1 session / 1 hour / 1 item etc)" value="{{$contract->contractor1_good_quantity}}">
                      </div>
                        
                        <div class="form-group">
                            <label for="skill">Choose Contractor's Related Good</label>
                            <select type="text" class="form-control" id="contractor2_good" name="contractor2_good">
                                @foreach($contract->contractor_2->goods as $good)

                                    <option value="{{$good->id}}" {{$good->id == $contract->contractor2_good_id ? "selected" : ""}}>{{$good->name}}</option>

                                @endforeach

                            </select>
                        </div>

                         <div class="form-group">
                        <label for="description">Contractor's Value</label>
                         <input type="number" class="form-control" id="contractor2_good_quantity" name="contractor2_good_quantity" placeholder="Enter a number (1 session / 1 hour / 1 item etc)" value="{{$contract->contractor2_good_quantity}}">
                      </div>

                     

                        
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="submit" value="Propose Updated Contract">

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
