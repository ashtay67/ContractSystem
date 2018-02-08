<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Skill;
use Carbon\Carbon;
use App\User;

class UserController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');

    }

    public function publicprofile($id) {
    	$user = User::find($id);
    	if($user == null) {
            //dd("bad skill", $skill_id);
             return redirect()->route("users.profile")->withErrors("That user doesn't exist");
        }



        return view ('users.publicprofile', compact('user'));


    }

    public function profile() {
        $user = Auth::user();
        $skills = Skill::all();
       // dd("je;");  


        return view ('users.profile', compact('user', 'skills'));

    }

    public function add_user_skills(Request $request) {

        //dd($request->all());

        $skill_value = $request->skill;
        $skill_piece = explode(":", $skill_value);
        $skill_id = intval($skill_piece[0]);
        $skill = Skill::find($skill_id);
        if($skill == null) {
            //dd("bad skill", $skill_id);
             return redirect()->route("users.profile")->withErrors("That skill doesn't exist");
        }

        $user = Auth::user();
        if ($user->skills()->where("skill_id", $skill_id)->count() > 0) {
            return redirect()->route("users.profile")->withErrors("You already have that skill");
        }
        $user->skills()->attach($skill->id, ['verified' => false, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

        ///dd($user->skills);
        return redirect()->route("users.profile");

    }
}


