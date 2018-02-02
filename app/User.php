<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\UserSkill;
use App\Good;
use App\Contract;
use Illuminate\Database\Eloquent\Model;
use App\GoodRequest;
use App\SkillExample;
use App\Reputation;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'street',
        'city',
        'state',
        'zipcode',
        'neighborhood',
        'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function skills() {

        return $this->belongsToMany('App\Skill', 'users_skills', 'user_id', 'skill_id');
    }

    public function user_skills() {

        return $this->hasMany('App\UserSkill', 'user_id', 'id');
    }

    public function sent_messages() {

        return $this->hasMany('App\Message', 'sender_id', 'id')->orderBy('created_at', 'desc');
    }

    public function received_messages() {

        return $this->hasMany('App\Message', 'receiver_id', 'id')->orderBy('created_at', 'desc');
    }

    public function goods() {
        return $this->hasMany('App\Good', 'user_id', 'id');
    }

    public function good_requests() {
        return $this->hasMany('App\GoodRequest', 'user_id', 'id');
    }

    public function my_contracts() {
        return $this->hasMany('App\Contract', 'contractor1_id', 'id');
    }


    public function other_contracts() {
        return $this->hasMany('App\Contract', 'contractor2_id', 'id');
    }

    public function all_contracts() {
        $all_contracts = [];
        foreach($this->my_contracts as $contract) {
            $all_contracts[] = $contract;
        }
        foreach($this->other_contracts as $contract) {
            $all_contracts[] = $contract;
        }
        return $all_contracts;
    }
    
    public function skill_examples() {
        return $this->hasMany('App\SkillExample', 'user_id', 'id');
    }

    public function has_reviewed($id) {
        $contract = Contract::find($id);
        $count = Reputation::where("contract_id", $id) 
            ->where("contractor_id", $this->id)
            ->count();
        return $count>0;

    }

    public function has_outstanding_reviews() {
        $all_contracts = $this->all_contracts();
        foreach($all_contracts as $contract) {
            if($contract->is_complete()) {
                if(!$this->has_reviewed($contract->id)) {
                    return true;
                }
            }
        }
        return false;
    }


    public function can_access(Model $object) {
        if($object instanceof GoodRequest) {
            //dd("user", $object);
            return $this->can_access_good_request($object);
        }

        elseif($object instanceof Good) {
            //dd("gr", $object);
            return $this->can_access_good($object);
        }

        elseif($object instanceof Contract) {
            //dd("good", $object);
            return $this->can_access_contract($object);
        }

        elseif($object instanceof SkillExample) {
            //dd("gr", $object);
            return $this->can_access_skill_example($object);
        }
        else {
            return false;
        }
    }

    private function can_access_good_request(GoodRequest $request) {
        return $request->user_id == $this->id;
    }

    private function can_access_good(Good $good) {
        return $good->user_id == $this->id;
    }

    private function can_access_contract(Contract $contract) {
        return $contract->contractor1_id == $this->id || $contract->contractor2_id == $this->id;
    }

    private function can_access_skill_example(SkillExample $skill_example) {
        return $skill_example->user_id == $this->id;
    }



}
