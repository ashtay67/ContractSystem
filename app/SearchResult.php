<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\GoodRequest;
use App\Good;



class SearchResult 
{
	const SEARCH_TYPE_PEOPLE = 1;
	const SEARCH_TYPE_ORGANIZATIONS = 2;
	const SEARCH_TYPE_REQUESTS = 3;
	const SEARCH_TYPE_GOODS = 4;

	private $name;
	private $description;
	private $user;
	private $link;

	public function __construct(Model $object) {

		if($object instanceof User) {
			//dd("user", $object);
			$this->create_from_user($object);
		}

		elseif($object instanceof GoodRequest) {
			//dd("gr", $object);
			$this->create_from_request($object);
		}

		elseif($object instanceof Good) {
			//dd("good", $object);
			$this->create_from_good($object);
		}

	}

	public function get_name() {
		return $this->name;
	}

	public function get_description() {
		return $this->description;
	}

	public function get_user() {
		return $this->user;
	}

	public function get_link() {
		return $this->link;
	}

	private function create_from_user(User $user) {
		$this->name = $user->name;
		$this->description = "Neighborhood: " . $user->neighborhood;
		$this->description .= ", Goods: ";
		foreach($user->goods as $good) {
			$this->description .= $good->name . 
			", ";
		}
		$this->description = trim($this->description, ",");
		$this->user = $user;
		$this->link = route("users.public.profile", $user->id);

	}

	private function create_from_organization(User $organization) {
		
	}

	private function create_from_request(GoodRequest $request) {
		$this->name = $request->name;
		$this->description = $request->description;
		$this->user = $request->offered_goods->first()->user;
		$this->link = route("good_request.show", $request->id);
	}

	private function create_from_good(Good $good) {
		$this->name = $good->name;
		$this->description = $good->description;
		$this->user = $good->user;
		$this->link = route("goods.show", $good->id);
	}


}