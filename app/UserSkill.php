<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{
    protected $table = "users_skills";

    public function goods() {

        return $this->belongsToMany('App\Good', 'user_skill_id', 'id');
    }
}
