<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookDetail;
use App\Comment;

class BookController extends Controller
{
    //
    function getBookDetail($id){
    	$book = BookDetail::where('slug',$id)->first();
    	return view('pages.chi_tiet_sach',['book'=>$book]);
    }
}
