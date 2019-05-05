<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;
use App\ShoppingCartDetail;
use Auth;

class UserController extends Controller
{
    public function getRegister(){
    	return view('pages.auth.register');
    }
    public function getLogin(){
    	return view('pages.auth.login');
    }
    public function getVerify(){
    	return view('pages.auth.verify');
    }
    public function getInfor(){
        if(Auth::guard('customer')->check()){
            return view('pages.privateInfor.inforAccount');
        }
    }
    public function getMyCart(){
        if(Auth::guard('customer')->check()){
        	$carts = ShoppingCart::where('nguoi_dung_id',Auth::guard('customer')->id())->get();
        	return view('pages.privateInfor.myCart',['carts'=>$carts]);
        }
    }

    public function getMyCartDetail($id_cart){
        $cartdetails = ShoppingCartDetail::where('gio_hang_id',$id_cart)->get();
        $cart = ShoppingCart::find($id_cart);
        return view('pages.privateInfor.myCartDetail',['cart'=>$cart,'cartdetails'=>$cartdetails]);
    }

}
