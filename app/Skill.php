<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //

    protected $table = "skills";

    protected $fillable = [
        'name', 
        'description', 
        'parent_id', 
        'created_at', 
        'updated_at'
        
    ];


    public function parent_skill() {
    	return $this->belongsTo('App\Skill', 'parent_id', 'id');
    }

     public function child_skills() {
    	return $this->hasMany('App\Skill', 'parent_id', 'id');
    }


}
