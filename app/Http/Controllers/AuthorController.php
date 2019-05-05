<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    //
    public function getList(){
    	return view('admin.author.list');
    }
    public function getAdd(){
    	return view('admin.author.add');
    }
    public function getEdit(){
    	return view('admin.author.edit');
    }
}
