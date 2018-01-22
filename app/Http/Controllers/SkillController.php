<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;

class SkillController extends Controller
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
        $allskills = Skill::all();
        //dd($allskills);

        return view('auth.skills.index', compact('allskills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->description);
        $name = $request->name;
        $description = $request->description;
        $parentid = $request->parent_id;
        $newskill = new Skill;
        $newskill->name = $name;
        $newskill->description = $description;
        $newskill->parent_id = $parentid;
        $newskill->save();
        return redirect()->route("skills.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $skill = Skill::find($id);
        if($skill == null) {

             return redirect()->route("skills.index");
        }

        return view('auth.skills.show', compact('skill'));

        //dd($skill);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill = Skill::find($id);
        if($skill == null) {

             return redirect()->route("skills.index");
        }

        return view('auth.skills.edit', compact('skill'));
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
        $skill = Skill::find($id);
        if($skill == null) {

             return redirect()->route("skills.index");
        }
/*
        $name = $request->name;
        $description = $request->description;
        $parent_id = $request->parent_id;
*/
        $skill->update($request->except(["_token"]));
        //$skill->save();
        //dd($skill);
        
        return redirect()->route("skills.show", $skill->id);


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
