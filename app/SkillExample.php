<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class SkillExample extends Model
{
    public function skills() {

        return $this->belongsToMany('App\Skill', 'skill_examples_skills','skill_example_id', 'skill_id');
    }

    public function user() {
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function has_skill($id) {
    	foreach($this->skills as $skill) {
    		if($skill->id == $id)
    			return true;
    	}

  		return false;
    }

    public function is_owned_by(User $user) {
        if($user->id == $this->user_id) {
                return true;
        }

        return false;
    }
    
}


