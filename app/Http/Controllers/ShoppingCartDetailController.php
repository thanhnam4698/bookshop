<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingCartDetailController extends Controller
{
    //
    public function getList(){
    	return view('admin.shoppingcart.shoppingcartdetail.list');
    }
}
