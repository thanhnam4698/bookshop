<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booktype;
use App\BookTopic;
use App\BookContent;
use App\ShoppingCartDetail;
use App\BookDetail;
use App\Rating;

class AjaxController extends Controller
{
    //
    public function getBookCollection($idTopic,$isAll = 0){
      $count = 0;
      if($isAll == 0){
        
        $noidung = BookContent::where("chu_de_sach_id", $idTopic)->get();
        foreach ($noidung as $nd) {
          
            foreach ($nd->bookdetail as $book) {
              if($count < 4){
                $count++;
                # code...
                echo "<div class='product col-md-3 col-sm-4 col-xs-6 product-item animated zoomIn '> <div class='product-wrapper product-resize fixheight' style='height: 249px;'> <div class='product-information'> <div class='product-detail'> <div class='product-image thumbnail-wrapper'> <a href='/chitiet/".$book->slug."' title=''> <figure class='no-back-image image-resize' style='height: 185px;'> <img alt='' src='upload/images/".$book->anh_bia."'> </figure> </a> <div class='product-label field-sale'> <span class='onsale'>Hot</span> </div> <div class='product-group-button three-button'> <div class='loop-add-to-cart'> <a rel='nofollow' class='ajax_add_to_cart_button' idbook='".$book->id."'> <i class='fas fa-shopping-cart'></i> <span class='ts-tooltip button-tooltip'> Giỏ hàng </span> </a> </div> <div> <a href='/chitiet/".$book->slug."' class=''> <i class='fas fa-align-center'></i> <span class='ts-tooltip button-tooltip'>Chi tiết</span> </a> </div> </div> </div> <div class='product-info meta-wrapper'> <a href='/chitiet/".$book->slug."' title=''> <h3 class='heading-title product-name'> ".$book->ten_sach." </h3> </a> <div class='price-info clearfix'> <div class='price-new-old'> <span>".$book->gia_sach.",000đ</span> </div> </div> </div> </div> </div> </div> </div>
                    ";
            }
          }
            # code...
        }
        unset($nd);
        unset($book);
      }
      else{

        $chude = BookTopic::where("loai_sach_id",$idTopic)->get();

        foreach ($chude as $cd) {
          foreach ($cd->bookcontent as $nd) {
            
              foreach ($nd->bookdetail as $book) {
                if($book->khac == "hot" || $book->khac == "Hot"){
                  if($count < 4){
                    $count++;
                    echo "<div class='product col-md-3 col-sm-4 col-xs-6 product-item animated zoomIn '> <div class='product-wrapper product-resize fixheight' style='height: 249px;'> <div class='product-information'> <div class='product-detail'> <div class='product-image thumbnail-wrapper'> <a href='/chitiet/".$book->slug."' title='".$book->anh_bia."'> <figure class='no-back-image image-resize' style='height: 185px;'> <img alt='' src='upload/images/".$book->anh_bia."'> </figure> </a> <div class='product-label field-sale'> <span class='onsale'>Hot</span> </div> <div class='product-group-button three-button'> <div class='loop-add-to-cart'> <a rel='nofollow' class='ajax_add_to_cart_button' idbook='".$book->id."'> <i class='fas fa-shopping-cart'></i> <span class='ts-tooltip button-tooltip'> Giỏ hàng </span> </a> </div> <div> <a href='/chitiet/".$book->slug."' class=''> <i class='fas fa-align-center'></i> <span class='ts-tooltip button-tooltip'>Chi tiết</span> </a> </div> </div> </div> <div class='product-info meta-wrapper'> <a href='/chitiet/".$book->slug."' title=''> <h3 class='heading-title product-name'> ".$book->ten_sach." </h3> </a> <div class='price-info clearfix'> <div class='price-new-old'> <span>".$book->gia_sach.",000đ</span> </div> </div> </div> </div> </div> </div> </div>";
                }
              }
            }
          }
        }
      }
    }


    public function getCartDetailOrder(Request $request){
      $cart = $request->all();

      $ids = request('ids');

      $ids = json_decode($ids);
      
      $list = BookDetail::findMany($ids);
      return response($list, 200);
      // echo $cart[0]['id'];
    }

    // public function postCartDetailOrder(Request $rq){
    //   $cart = json_encode($rq);
    //   $cart = $rq->all();
    //   // $cart = array_keys(array_values($cart));
      
    //   // print_r($rq);
    //   echo $cart;


      
    // }

    

    public function postRating(Request $rq){
      $rating = (int)json_decode(request('rating'));
      $id_book = (int)json_decode(request('id_sach'));
      $id_user = (int)json_decode(request('id_user'));
      
      if(!Rating::where([
          ['chi_tiet_sach_id',$id_book],
          ['customers_id',$id_user],
        ])->first()){
        $rate = new Rating;
        $rate->chi_tiet_sach_id = $id_book;
        $rate->customers_id = $id_user;
        $rate->diem_danh_gia = $rating;
        $rate->save();
      }else{
        $rate = Rating::where([
          ['chi_tiet_sach_id',$id_book],
          ['customers_id',$id_user],
        ])->update(['diem_danh_gia' => $rating]);
      }
      

      $pointRating = 0;
      $allRate = Rating::where('chi_tiet_sach_id',$id_book)->get();
      foreach ($allRate as $rate) {
        $pointRating += $rate->diem_danh_gia;
      }
      $count = count($allRate);
      if($count == 0){
        $count = 1;
      }
      $pointRating /= $count;
      $book = BookDetail::find($id_book);
      $book->danh_gia = $pointRating;
      $book->save();
      return response([$pointRating, count($allRate)], $status = 200);

    }
}

