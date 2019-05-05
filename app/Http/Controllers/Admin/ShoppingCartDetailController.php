<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ShoppingCart;
use App\ShoppingCartDetail;

class ShoppingCartDetailController extends Controller
{
    //
    public function getList($idcart){
    	$cartDetail = ShoppingCartDetail::where("gio_hang_id","$idcart")->get();
    	return view('admin.shoppingcart.shoppingcartdetail.list',['cartDetail'=>$cartDetail]);
    }
}
