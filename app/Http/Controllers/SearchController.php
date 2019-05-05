<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookDetail;

class SearchController extends Controller
{
	public function query(Request $rq){

		$books = BookDetail::search($rq->search)->paginate(4);
		return view('pages.searchResult',['books'=>$books]);
	}
	
}
