@extends('layouts.index')
@section('content')
<div id="main" class="wrapper">
   <div class="page-container container ">
      <div id="main-content" class="row">
         <div id="primary" class="site-content">
            <article>
               <div class="col-md-3">
                  <script src="/app/services/accountServices.js"></script>
                  <script src="/app/controllers/accountController.js"></script>
                  <div class="menu-account ts-product-categories-widget ng-scope" ng-controller="accountController">
                     <div type="button" class="collapsed" data-toggle="collapse" data-target="#category_menu" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <div class="title-wrapper">
                           <h3 class="hr_title heading-title">Quản lý cá nhân</h3>
                        </div>
                     </div>
                     <div class="block_content navbar-collapse collapse" aria-expanded="false" id="category_menu">
                        <ul class="list-block product-categories tree dynamized" style="display: block;">
                           <li class="active"><a href="{{ route('inforBasic') }}"><i class="fa fa-user"></i> Thông tin tài khoản</a></li>
                           <li><a href="{{ route('user.myCart') }}"><i class="fa fa-list-alt"></i> Đơn hàng của tôi</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-md-9">
                  <div class="breadcrumb clearfix">
                     <ul>
                        <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
                           <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                        </li>
                        <li class="icon-li"><strong>Đơn hàng của tôi</strong> </li>
                     </ul>
                  </div>
                  <script type="text/javascript">
                     $(".link-site-more").hover(function () { $(this).find(".s-c-n").show(); }, function () { $(this).find(".s-c-n").hide(); });
                  </script>
                  <div class="myorder-content myorder-detail-content clearfix">
                     <h1 class="title"><span>Đơn hàng của tôi</span></h1>
                     <div class="myorder-block">
                        <div class="table-responsive clearfix myorder-info">
                           <table class="table table-mycart">
                              <thead>
                                 <tr>
                                    <th>STT</th>
                                    <th colspan="2">Tên sản phẩm</th>
                                    <th>Mã sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                 </tr>
                              </thead>
                              <tbody>
                              	<?php
                              		$i = 0;
                              	?>
                              	@foreach($cartdetails as $cartdetail)
                                 <tr>
                                    <td>{{ ++$i }}</td>
                                    <td class="image">
                                       <a href="{{ route('chitietsach', $cartdetail->chi_tiet_sach_id) }}"><img class="img-responsive" src="upload/images/{{ $cartdetail->bookdetail->anh_bia }}"></a>
                                    </td>
                                    <td>
                                       <a href="{{ route('chitietsach', $cartdetail->chi_tiet_sach_id) }}">{{ $cartdetail->bookdetail->ten_sach }}</a>
                                       <!-- ngIf: it.IsVariant==true -->
                                    </td>
                                    <td>{{ $cartdetail->bookdetail->id }}</td>
                                    <td>{{ $cartdetail->bookdetail->gia_sach }}</td>
                                    <td>{{ $cartdetail->so_luong }}</td>
                                    <td>{{ $cartdetail->bookdetail->gia_sach * $cartdetail->so_luong }}</td>
                                 </tr>
                                 @endforeach
                                 <tr>
                                    <td class="border-right" colspan="3">
                                       <div class="box-customer-content">
                                          <div class="title docs"><span>Thông tin giao hàng</span></div>
                                          <div>[Anh/Chị]: <span><b>{{ $cart->ho_ten_nguoi_nhan }}</b></span> </div>
                                          <div>Số điện thoại: <span><b>{{ $cart->so_dien_thoai }}</b></span></div>
                                          <div>Địa chỉ : <span><b>{{ $cart->dia_chi }}</b></span></div>
                                       </div>
                                    </td>
                                    <td colspan="4">
                                       <table class="table">
                                          <tbody>
                                             <tr>
                                                <td class="text-left"><b>Tổng tiền thanh toán</b></td>
                                                <td class="text-right ">
                                                   <b class="total-payment">
                                                   {{ $cart->tong_tien }} đ
                                                   </b>
                                                   <div class="help-block">Bao gồm VAT</div>
                                                </td>
                                             </tr>
                                             <tr class="text-center order-stt">
                                                <td colspan="2">
                                                   <div class="docs">Trạng thái đơn hàng</div>
                                                   <div class="docs"><b>{{ $cart->tinh_trang }}</b></div>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                        <div class="button text-right">
                           <a class="btn btn-default" href="/don-hang.html">Trở về danh sách đơn hàng</a>
                           <a class="btn button button-secondary" href="{{ route('index') }}">Tiếp tục mua hàng</a>
                        </div>
                     </div>
                  </div>
               </div>
            </article>
         </div>
      </div>
   </div>
</div>
@endsection