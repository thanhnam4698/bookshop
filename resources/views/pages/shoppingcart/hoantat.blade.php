@extends('layouts.index')
@section('content')
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div id="main-content" class="row">
   <div id="primary" class="site-content">
      <article>
         <div class="col-md-12">
            <div class="breadcrumb clearfix">
               <ul>
                  <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
                     <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                  </li>
                  <li class="icon-li"><strong>Hoàn tất</strong> </li>
               </ul>
            </div>
            <script type="text/javascript">
               $(".link-site-more").hover(function () { $(this).find(".s-c-n").show(); }, function () { $(this).find(".s-c-n").hide(); });
            </script>
            <div class="payment-end">
               
               <div class="payment-order clearfix">
                  <h3>Mã đơn hàng của bạn: <b>{{ $cart->id }}</b></h3>
                  <p><b>Ngày đặt:</b> <i>{{ $cart->created_at }}</i></p>
                  <p><b>Phương thức thanh toán:</b> <i>Thanh toán khi giao hàng (COD)</i></p>
                  <h1 class="title">Thông tin đơn hàng</h1>
                  <table class="table">
                     <thead>
                        <tr>
                           <th>STT</th>
                           <th>Sản phâm</th>
                           <th>Đơn giá</th>
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
                           <td>
                              <span> {{ $cartdetail->bookdetail->ten_sach }} </span>
                              <p class="note"></p>
                           </td>
                           <td>{{ $cartdetail->bookdetail->gia_sach }}</td>
                           <td>{{ $cartdetail->so_luong }}</td>
                           <td>{{ $cartdetail->bookdetail->gia_sach * $cartdetail->so_luong }}</td>
                        </tr>
                        @endforeach
                     </tbody>
                     <tfoot>
                        <tr>
                           <td colspan="4" class="text-right label-payment"><b>Tổng thanh toán:</b></td>
                           <td class="total-payment">{{ $cart->tong_tien }}</td>
                        </tr>
                     </tfoot>
                  </table>
                  <span class="print-order"><a href="#"><i class="fa fa-print"></i>In đơn hàng</a></span>
                  <div class="clearfix col-md-12">
                     <div class="button text-right">
                        <a class="btn btn-default" href="/index">Tiếp tục mua hàng</a>
                        @if(Auth::guard('customer')->check())
                        <a class="btn button button-secondary" href="{{ route('user.myCart') }}">Đơn hàng của tôi</a>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </article>
   </div>
</div>
@endsection

