<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\GoodRequest;
use App\Skill;

class GoodRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create() {
    	$user = Auth::user();
    	$skills = Skill::all();
    	return view('auth.good_request.create', compact('user', 'skills'));
    }

    public function store(Request $request) {
    	$user = Auth::user();
    	$title = $request->name;
    	$description = $request->description;
    	$good_offered = $request->good_offered;
    	$good_quantity = $request->value;
    	$skill_id = $request->skill;
    	$good_request = new GoodRequest;

    	$good_request->name = $title;
    	$good_request->description = $description;
    	$good_request->user_id = $user->id;
    	$good_request->good_quantity = $good_quantity;
    	$good_request->skill_id = $skill_id;
    	$good_request->save();

    	foreach($good_offered as $good_request_id) {
    		$good_request->offered_goods()->attach($good_request_id);

   		}

   		return redirect()->route("good_request.index")->with("success", "You have created a new request.");
    	
    }

    public function index() {
    	$user = Auth::user();
        return view('auth.good_request.index', compact('user'));
    }

      public function show($id) {
        $user = Auth::user();
        $request = GoodRequest::find($id);

        //dd($request->related_skill, $request->user, $request->offered_goods);
        return view('auth.good_request.show', compact('user', 'request'));
    }

    public function edit($id) {
        $user = Auth::user();
        $request = GoodRequest::find($id);
        if(!$user->can_access($request)) {
            return redirect()->route('good_request.index')->withErrors("You do not have access to this page");
        }
        $skills = Skill::all();
        return view('auth.good_request.edit', compact('user', 'request', 'skills'));
    }

    public function update(Request $request, $id) {
        $user = Auth::user();
        $good_request = GoodRequest::find($id);
        $title = $request->name;
        $description = $request->description;
        $good_offered = $request->good_offered;
        $good_quantity = $request->value;
        $skill_id = $request->skill;

        $good_request->name = $title;
        $good_request->description = $description;
        $good_request->user_id = $user->id;
        $good_request->good_quantity = $good_quantity;
        $good_request->skill_id = $skill_id;
        $good_request->save();
        $good_request->offered_goods()->detach();
        foreach($good_offered as $good_request_id) {
            $good_request->offered_goods()->attach($good_request_id);

        }

        return redirect()->route("good_request.show", $good_request->id)->with("success", "You have updated your request.");
        
        
    }

}
