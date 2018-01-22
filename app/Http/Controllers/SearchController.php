<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SearchResult;
use App\User;
use App\GoodRequest;
use App\Good;

class SearchController extends Controller
{
    public function index() {
    	return view('auth.search.index');
    }

    public function search(Request $request) {
    	$search_term = $request->search_term;
    	$srch_type = $request->search_type;
        $results = [];
        $search_results = [];

    	if($srch_type == SearchResult::SEARCH_TYPE_PEOPLE) {
    		$results = $this->search_people($search_term);
    		//dd($search_term, $results);
    	}

    	elseif($srch_type == SearchResult::SEARCH_TYPE_ORGANIZATIONS) {
    		
    	}

    	elseif($srch_type == SearchResult::SEARCH_TYPE_REQUESTS) {
    		$results = $this->search_requests($search_term);
    		//dd($search_term, $results);
    	}

    	elseif($srch_type == SearchResult::SEARCH_TYPE_GOODS) {
    		$results = $this->search_goods($search_term);
    		//dd($search_term, $results);
    	}

        foreach($results as $result) {
            $sr = new SearchResult($result);
            $search_results[] = $sr;
        }
        //dd($search_results);
        return view('auth.search.view', compact('search_results'));
    }

    private function search_people($search_term) {
    	$results = User::where("name", "LIKE", "%$search_term%")
    		->orWhere("email", "LIKE", "%$search_term%")
    		->get();

    	return $results;
    }

    private function search_organizations($search_term) {

    }

    private function search_requests($search_term) {
    	$results = GoodRequest::where("name", "LIKE", "%$search_term%")
    		->orWhere("description", "LIKE", "%$search_term%")
    		->get();

    	return $results;
    }

    private function search_goods($search_term) {
    	$results = Good::where("name", "LIKE", "%$search_term%")
    		->orWhere("description", "LIKE", "%$search_term%")
    		->get();

    	return $results;
    }

}
