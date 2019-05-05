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
                  <div class="myorder-content clearfix">
                     <h1 class="title"><span>Đơn hàng của tôi</span></h1>
                     <div class="myorder-block">
                        <div class="table-responsive clearfix myorder-info">
                           <table class="table table-mycart">
                              <thead>
                                 <tr>
                                    <th>STT</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Tên khách hàng</th>
                                    <th>Tổng tiền</th>
                                    <th>Vận chuyển</th>
                                    <th></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    $i = 0;
                                 ?>
                              	@foreach($carts as $cart)
                                 <tr>
                                    <td>{{ ++$i }}</td>
                                    <td><a href="">{{ $cart->id }}</a></td>
                                    <td><a href="">{{ $cart->user->name }}</a></td>
                                    <td>{{ $cart->tong_tien }}</td>
                                    <td>{{ $cart->tinh_trang }}</td>
                                    <td class="text-center"><a href="{{ route('user.myCartDetail',$cart->id) }}"><i class="fa fa-angle-double-right "></i>Xem đơn hàng</a></td>
                                 </tr>
                                @endforeach
                              </tbody>
                           </table>
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