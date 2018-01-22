<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contract;
use Auth;
use App\Reputation;

class ReputationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($id) {
    	$contract = Contract::find($id);
    	$user = Auth::user();
    	$contractor = $contract->get_other_contractor($user->id);
    	return view('auth.reputation.create', compact('contract', 'user', 'contractor'));
    }

    public function store(Request $request, $id) {
    	$contract = Contract::find($id);
    	$user = Auth::user();
    	$contractor = $contract->get_other_contractor($user->id);
    	$description = $request->description;
    	$reccomend = $request->reccomend; 
    	$punctual = $request->punctual;
    	$expertise_quality = $request->expertise_quality;
    	//dd($request->all());
    	$tactful = $request->tactful;
    	$reputation = new Reputation;
    	$reputation->contractor_id = $user->id;
    	$reputation->contract_id = $contract->id;
    	$reputation->description = $description;
    	$reputation->reccomend = $reccomend;
    	$reputation->expertise_quality = $expertise_quality;
    	$reputation->punctual = $punctual;
    	$reputation->tact = $tactful;
    	$reputation->save();
    	return redirect()->route("contracts.show", $contract->id)->with("success", "You have reviewed your contract.");
    }
}
