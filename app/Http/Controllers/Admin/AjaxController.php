<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Booktype;
use App\BookTopic;
use App\BookContent;
use App\ShoppingCart;

class AjaxController extends Controller
{
    //
    public function getTopic($idtype){
    	$chude = BookTopic::where("loai_sach_id", $idtype)->get();
    	echo "<option value=''></option>";
    	foreach ($chude as $cd) {
    		# code...
    		echo "<option value='".$cd->id."' >".$cd->ten_chu_de."</option>";
    	}
    }
    public function getContent($idTopic){
    	$noidung = BookContent::where("chu_de_sach_id", $idTopic)->get();
    	echo "<option value=''></option>";
    	foreach ($noidung as $nd) {
    		# code...
    		echo "<option value='".$nd->id."' >".$nd->ten_noi_dung."</option>";
    	}
    }
    public function getCartState(Request $rq){
        $idCart = json_decode($rq->id_cart);
        $idState = json_decode($rq->id_state);
        $cart = ShoppingCart::find($idCart);
        $cart->tinh_trang = $idState;
        $cart->save();
    }
}
