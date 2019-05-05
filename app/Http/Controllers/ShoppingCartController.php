<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use App\User;
use App\BookDetail;
use App\ShoppingCart;
use App\ShoppingCartDetail;
class ShoppingcartController extends Controller
{
    //
    public function getCart(){
    	$id_cart = 1;
    	$cart = ShoppingCart::find($id_cart);
    	$id_user =1; 
    	$user = User::find($id_user);
    	return view('pages.shoppingcart.shoppingcart',['cart' => $cart, 'user' => $user]);
    }

    public function postCartDetail($idbook,$idcart){
    	// if(Auth::check()){
	    	$cartdetail = ShoppingCartDetail::where([
	    		['gio_hang_id',$idcart],
	    		['chi_tiet_sach_id',$idbook]
	    	])->get();
	    	
	    	if($cartdetail == "[]"){
	    		$cartdetail = new ShoppingCartDetail;
		    	$cartdetail->gio_hang_id = $idcart;
		    	$cartdetail->chi_tiet_sach_id = $idbook;
		    	$cartdetail->so_luong = 1;
		    	$cartdetail->tong_gia_tien = 0;
		    	$cartdetail->tong_khoi_luong = 0;
		    	$cartdetail->save();
		    	echo "Thêm thành công";
	    		
	    	}
	    	else{
	    		echo "Sách đã có trong giỏ hàng. Bạn có thể chỉnh sửa số lượng trong giỏ hàng";
	    	}
    	// }
    }

    public function deleteCartDetail($idbook,$idcart){
    	$cart = ShoppingCart::find($idcart);
    	$cartdetail = ShoppingCartDetail::where([
    		['gio_hang_id',$idcart],
    		['chi_tiet_sach_id',$idbook]
    	]);

    	if($cartdetail == "[]"){
	    		echo "Sách đã bị xoá khỏi giỏ hàng.";
	    	}
	    	else{
		    	$cartdetail->delete();
		    	if($cart){
                    foreach($cart->shoppingcartdetail as $cartdetail){
                        echo 
                        '
	                    <tr>
	                        <td class="des">
	                            <a href="/san-pham/son-moi-itachi.html">
	                                <strong class="ng-binding">'.$cartdetail->bookdetail->ten_sach.'</strong>
	                            </a>
	                            <span class="ng-binding"></span>
	                        </td>
	                        <td class="image">
	                            <a href="/san-pham/son-moi-itachi.html"> <img src="upload/images/'.$cartdetail->bookdetail->anh_bia.'" class="img-responsive"></a>
	                        </td>
	                        <td class="price ng-binding">'.$cartdetail->bookdetail->gia_sach.'</td>
	                        <td class="quantity">
	                            <input type="number" value="1" class="text ng-pristine ng-untouched ng-valid soluongitem" ng-model="item.Quantity" ng-change="updateItemCart(item)">
	                        </td>
	                        <td class="amount ng-binding" amount-item="">
	                            '.$cartdetail->bookdetail->gia_sach.'
	                        </td>
	                        <td class="quantity">
	                        </td>
	                        <td class="remove">
	                            <a idbook="'.$cartdetail->bookdetail->id.'" class="delete-cart-detail">
	                                <i class="fas fa-trash-alt"></i>
	                            </a>
	                        </td>
	                    </tr><!-- end ngRepeat: item in OrderDetails -->';
                    }
                }
	    	}
    }

    public function addCart($id_book,$id_user){
    	$user = User::find($id_user);
    	$book = BookDetail::find($id_book);
    	
    	echo $user->email;
    	echo $book->ten_sach;
    	
    	// if(Auth::check()){
    	// 	echo "success";
    	// }
    	// else{
    	// 	echo "false";
    	// }
    }

    public function getThanhToan(){
    	return view('pages.shoppingcart.thanhtoan');
    }

    public function postThanhToan(Request $rq){
    	$this->validate($rq,[
    		'txt_hoten' => 'required',
    		'txt_sdt' => 'required|numeric',
    		'txt_diachi' => 'required',
            'txt_thanhtoan' => 'required',
    	],[
    		'txt_hoten.required' => 'Không được để trống họ tên!',
    		'txt_sdt.required' => 'Không được để trống số điện thoại!',
    		'txt_sdt.numeric' => 'Hãy nhập chính xác số điện thoại',
    		'txt_diachi.required' => 'Không được để trống địa chỉ!',
            'txt_thanhtoan.required' => 'Không được để trống thanhtoan!',
    	]);
        
    	$cart = new ShoppingCart;
        if($rq->txt_idcustomer){
            $cart->nguoi_dung_id = $rq->txt_idcustomer;
        }
        $cart->ho_ten_nguoi_nhan = $rq->txt_hoten;
        $cart->so_dien_thoai = $rq->txt_sdt;
        $cart->dia_chi = $rq->txt_diachi;
        $cart->thanh_toan = $rq->txt_thanhtoan;
        $cart->tinh_trang = "Đã đặt hàng";
        $cart->tong_tien = $rq->txt_tongtien;
        $cart->save();
        
        $ids = json_decode($rq->txt_id);
        $qty = json_decode($rq->txt_qty);
        
        foreach ($ids as $id) {
            $cartdetail = new ShoppingCartDetail;
            $cartdetail->gio_hang_id = $cart->id;
            $cartdetail->chi_tiet_sach_id = $id;
            $cartdetail->so_luong = $qty[$id];
            $cartdetail->save();
        }
        $cartdetails = ShoppingCartDetail::where('gio_hang_id',$cart->id)->get();
    	return view('pages.shoppingcart.hoantat',['cart'=>$cart, 'cartdetails'=>$cartdetails]);
    }

    public function getHoanTat(){
    	return view('pages.shoppingcart.hoantat');
    }
}
