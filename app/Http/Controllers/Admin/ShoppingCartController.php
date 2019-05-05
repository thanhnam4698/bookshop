<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ShoppingCart;


class ShoppingCartController extends Controller
{
    //
    public function getList(){
    	$cart = ShoppingCart::all();
    	return view('admin.shoppingcart.list',['cart'=>$cart]);
    }

    public function getDelete($idcart){
    	$cart = ShoppingCart::where('id',$idcart);
    	if($cart){
    		$cart->delete();
    		return redirect('admin.shoppingcart.list')->with('Information','Xoá thành công');
    	}

    }
}
