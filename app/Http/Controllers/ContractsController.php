<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\Contract;

class ContractsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('auth.contracts.index', compact('user'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
       $user = Auth::user();
       $contractor = User::find($id);
         if($contractor == null) {

          return redirect()->route("users.profile")->withErrors("That user doesn't exist");
        }
        if($contractor->id == $user->id) {
            return redirect()->route("users.profile")->withErrors("You cannot contract with yourself.");
        }

       return view('auth.contracts.create', compact('id', 'user', 'contractor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $user = Auth::user();
        $contractor = User::find($id);
            if($contractor == null) {

            return redirect()->route("users.profile")->withErrors("That contractor doesn't exist");
        }
        $description = $request->description;
        $contractor1_good = $request->contractor1_good;
        $contractor1_good_quantity = $request->contractor1_good_quantity;
        $contractor2_good = $request->contractor2_good;
        $contractor2_good_quantity = $request->contractor2_good_quantity;
        $new_contract = new Contract;
        $new_contract->description = $description;
        $new_contract->contractor1_good_id = $contractor1_good;
        $new_contract->contractor1_good_quantity = $contractor1_good_quantity;
        $new_contract->contractor2_good_id = $contractor2_good;
        $new_contract->contractor2_good_quantity = $contractor2_good_quantity;
        $new_contract->contractor1_id = $user->id;
        $new_contract->contractor2_id = $contractor->id;
        $new_contract->approved_contractor1 = true;
        $new_contract->message_id = 0;
        $new_contract->save();
        return redirect()->route("users.profile")->with("success","You successfully proposed a contract with {$contractor->name}");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $contract = Contract::find($id);

        //dd($contract->reviews);
        return view('auth.contracts.show', compact('contract', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $contract = Contract::find($id);
        return view('auth.contracts.edit', compact('contract', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contract = Contract::find($id);
        if($contract == null) {

            return redirect()->route("users.profile")->withErrors("That contract doesn't exist");
        }
        $description = $request->description;
        $contractor1_good = $request->contractor1_good;
        $contractor1_good_quantity = $request->contractor1_good_quantity;
        $contractor2_good = $request->contractor2_good;
        $contractor2_good_quantity = $request->contractor2_good_quantity;
        $contract->description = $description;
        $contract->contractor1_good_id = $contractor1_good;
        $contract->contractor1_good_quantity = $contractor1_good_quantity;
        $contract->contractor2_good_id = $contractor2_good;
        $contract->contractor2_good_quantity = $contractor2_good_quantity;
        $contract->approved_contractor2 = !$contract->approved_contractor2;
        $contract->approved_contractor1 = !$contract->approved_contractor1;
        $contract->save();
        return redirect()->route("contracts.show", $contract->id)->with("success", "You have sent your contract for approval.");

    }

   public function approve($id)
    {
        $user = Auth::user();
        $contract = Contract::find($id);
        $contractor = $contract->get_other_contractor($user->id);
        //dd($contractor, $user->idate(format));


        if($contract->approve_for($user->id)) {
            if($contract->is_approved()) {
                $contract->send_approval();
            }

            return redirect()->route("contracts.index")->with("success", "Your contract with {$contractor->name} is now approved.");
        }
        else {
            return redirect()->route("contracts.index")->withErrors("An error occured.");
        }
    }

    public function complete($id)
    {
        $user = Auth::user();
        $contract = Contract::find($id);
        $contractor = $contract->get_other_contractor($user->id);
        $contract->status = Contract::STATUS_COMPLETE;
        $contract->save();

            return redirect()->route("contracts.show", $contract->id)->with("success", "Your contract with {$contractor->name} is now complete.");

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
