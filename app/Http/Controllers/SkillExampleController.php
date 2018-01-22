<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\SkillExample;

class SkillExampleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
    	$user = Auth::user();
    	return view('auth.skill_example.index', compact('user'));
    }

    public function create() {
    	$user = Auth::user();
    	$skills = $user->skills;
    	return view('auth.skill_example.create', compact('user', 'skills'));
    }

    public function store(Request $request) {
    	$name = $request->name;
    	$description = $request->description;
    	$user = Auth::user();
 		$link = $request->link;
 		$skill_ids = $request->skill;
 		$skill_example = new SkillExample;
 		$skill_example->name = $name;
 		$skill_example->description = $description;
 		$skill_example->link = $link;
 		$skill_example->user_id = $user->id;
 		$skill_example->save();
 		foreach($skill_ids as $skill_id) {
 			$skill_example->skills()->attach($skill_id);
 		}


 		return redirect()->route('skill_example.index')->with("success", "Successfully added past work example.");
    }

    public function show($id) {
    	$skill_example = SkillExample::find($id);
        $user = Auth::user();
    	return view('auth.skill_example.show', compact('skill_example', 'user'));
    }

    public function edit($id) {
    	$user = Auth::user();
    	$skill_example = SkillExample::find($id);
        if(!$user->can_access($skill_example)) {
            return redirect()->route('skill_example.index')->with("You do not have access to this page");
        }
    	$skills = $user->skills;
    	return view('auth.skill_example.edit', compact('skill_example', 'skills', 'user'));
    }

    public function update(Request $request, $id) {
        $name = $request->name;
        $description = $request->description;
        $link = $request->link;
        $skill_ids = $request->skill;
        $skill_example = SkillExample::find($id);
         if(!$skill_example->is_owned_by($user)) {
            return redirect()->route('skill_example.index')->with("You do not have access to this page");
        }
        $skill_example->name = $name;
        $skill_example->description = $description;
        $skill_example->link = $link;
        $skill_example->save();
        $skill_example->skills()->detach(); // remove all skills 
        //re-add skills from latest update
        foreach($skill_ids as $skill_id) {
            $skill_example->skills()->attach($skill_id);
        }
        return redirect()->route('skill_example.show', $id)->with("success", "Successfully updated past work example.");
    }

    public function destroy($id) {
        $user = Auth::user();
        $skill_example = SkillExample::find($id);
         if(!$skill_example->is_owned_by($user)) {
            return redirect()->route('skill_example.index')->with("You do not have access to this page");
        }
        $skill_example->delete();
        return redirect()->route('skill_example.index')->with("success", "Successfully deleted your past work example.");
    }

}
