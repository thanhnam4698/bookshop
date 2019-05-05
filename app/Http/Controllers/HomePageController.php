<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booktype;
use App\BookDetail;
use App\Slider;

class HomePageController extends Controller
{
    //
    function getHomePage(){
    	$slider = Slider::all();
    	$bookType = Booktype::all();
    	$bookdetail = BookDetail::all();
    	$limit = 4;
    	$arrayOfSlider = [];
        

    	foreach ($slider as $slide) {
            // $book = BookDetail::find($slide->chi_tiet_sach_id);
            // print_r($book);
            $arrayOfSlider[] = $slide->chi_tiet_sach_id;
        }
        

    	$slides = BookDetail::findMany($arrayOfSlider);
        
    	return view('pages.homepage',['type'=>$bookType, 'detail'=>$bookdetail,'limit'=>$limit, 'slides'=>$slides]);
    }

}
