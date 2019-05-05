<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publisher;

class PublisherController extends Controller
{
    //
    public function getList(){
    	$publisher = Publisher::all();
    	return view('admin.publisher.list',['publisher'=>$publisher]);
    }
    public function getAdd(){
    	return view('admin.publisher.add');
    }
    public function getEdit(){
    	return view('admin.publisher.edit');
    }
}
