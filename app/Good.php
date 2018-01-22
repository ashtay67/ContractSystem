<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{

	protected $fillable = [
        'name', 
        'description', 
        'created_at', 
        'updated_at'
        
    ];

     public function skills() {
        return $this->belongsToMany('App\Skill', 'goods_skills', 'good_id', 'skill_id');
    }

    public function user() {
    	return $this->hasOne('App\User', 'id', 'user_id');
    }



}
