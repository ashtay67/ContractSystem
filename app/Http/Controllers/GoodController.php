<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Good;
use Auth;
use App\UserSkill;
use Carbon\Carbon;
use App\User;

class GoodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create() {
    	$user = Auth::user(); 
    	$skills = $user->skills;

    	return view("auth.goods.create", compact('user', 'skills'));

    }

    public function store(Request $request) {

    	$name = $request->name;
    	$description = $request->description;
    	$skill_id = $request->skill;
    	$new_good = new Good;
    	$user = Auth::user(); 
    	

    	$new_good->name = $name;
    	$new_good->description = $description;
    	$new_good->user_id = $user->id;
    	$new_good->save();
        //dd($new_good, $skill_id);
        $new_good->skills()->attach($skill_id, ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
    	return redirect()->route("users.profile");
    }

    public function show($id) {
        $user = Auth::user();
        $user_id = $user->id; 
        $good = Good::find($id);
        $good_owner = $good->user_id;
        $name = User::find($good_owner)->name;
         if($good == null) {
            //dd("bad skill", $skill_id);
             return redirect()->route("users.profile")->withErrors("That good doesn't exist");
        }
        return view("auth.goods.show", compact('good', 'user', 'good_owner', 'user_id', 'name'));
    }

     public function edit($id) {
        $good = Good::find($id);
         if($good == null) {
            //dd("bad skill", $skill_id);
             return redirect()->route("users.profile")->withErrors("That good doesn't exist");
        }
        return view("auth.goods.edit", compact('good'));
    }

     public function update(Request $request, $id) {
        $good = Good::find($id);
        if($good == null) {

             return redirect()->route("users.profile")->withErrors("That good doesn't exist");;
        }

        $good->update($request->except(["_token"]));

        
        return redirect()->route("goods.show", $good->id);
    }

}
