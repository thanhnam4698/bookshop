@extends('layouts.index')
@section('content')
<div id="main" class="wrapper">
   <div class="page-container container ">
      <div id="main-content" class="row">
         <div id="primary" class="site-content">
            <article>
               <div class="col-md-12">
                  <div class="breadcrumb clearfix">
                     <ul>
                        <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
                           <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                        </li>
                        <li class="icon-li"><strong>Thanh toán</strong> </li>
                     </ul>
                  </div>
                  <script type="text/javascript">
                     $(".link-site-more").hover(function () { $(this).find(".s-c-n").show(); }, function () { $(this).find(".s-c-n").hide(); });
                  </script>
                  <script src="/app/services/orderServices.js"></script>
                  <script src="/app/controllers/orderController.js"></script>
                  <div class="payment-content ng-scope" ng-controller="orderController" ng-init="initCheckoutController()">
                     <h1 class="title"><span>Thanh toán</span></h1>
                     <div class="steps clearfix">
                        <ul class="clearfix">
                           <li class="cart active col-md-2 col-xs-12 col-sm-4 col-md-offset-3 col-sm-offset-0 col-xs-offset-0"><span><i class="fa fa-shopping-cart"></i></span><span>Giỏ hàng của tôi</span><span class="step-number"><a>1</a></span></li>
                           <li class="payment active col-md-2 col-xs-12 col-sm-4"><span><i class="fas fa-dollar-sign"></i></span><span>Thanh toán</span><span class="step-number"><a>2</a></span></li>
                           <li class="finish col-md-2 col-xs-12 col-sm-4"><span><i class="fa fa-check"></i></span><span>Hoàn tất</span><span class="step-number"><a>3</a></span></li>
                        </ul>
                     </div>
                     <div class="payment-title text-center hidden">
                        <h3>
                           GIAO HÀNG TOÀN QUỐC - THANH TOÁN KHI NHẬN HÀNG - 15 NGÀY ĐỔI TRẢ MIỄN PHÍ
                        </h3>
                        <div>
                           Nếu gặp khó khăn trong việc đặt hàng xin hãy gọi<b class="hotline"> 0908 77 00 95 </b>
                           để được hỗ trợ tốt nhất.
                        </div>
                     </div>
                     <form class="payment-block clearfix ng-valid ng-dirty ng-valid-parse" id="checkout-container" action="{{ route('shoppingcart.postthanhtoan') }}" method="POST">
                     	@csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="col-md-4 col-sm-12 col-xs-12 payment-step step2">
                           <h4>1. Địa chỉ thanh toán và giao hàng</h4>
                           <div class="step-preview clearfix">
                              <h2 class="title">Thông tin thanh toán</h2>
                              <!-- ngIf: CustomerId>0 -->
                              @if(Auth::guard('customer')->check())
                              <input type="hidden" name="txt_idcustomer" value="{{ Auth::guard('customer')->id() }}">
                              <div class="info-user ng-scope" ng-if="CustomerId>0">
                                 <label>Người nhận:</label>
                              </div>
                              <!-- end ngIf: CustomerId>0 -->
                              <!-- ngIf: CustomerId<=0 -->

                              <div class="form-block" ng-show="IsOtherAddress==true">
                                 <div class="form-group"><input class="form-control ng-pristine ng-untouched ng-valid" placeholder="@if(Auth::guard('customer')->user()->name == '') Họ tên @endif" value="{{ Auth::guard('customer')->user()->name }}" type="text" ng-model="DeliveryName" name="txt_hoten"></div>
                                 <div class="form-group"><input class="form-control ng-pristine ng-untouched ng-valid" placeholder="@if(Auth::guard('customer')->user()->name == '') Số điện thoại @endif" value="{{ Auth::guard('customer')->user()->phone }}" type="text" ng-model="DeliveryPhone" name="txt_sdt"></div>
                                 <div class="form-group"><input class="form-control ng-pristine ng-untouched ng-valid" placeholder="@if(Auth::guard('customer')->user()->dia_chi == '') Địa chỉ @endif" value="{{ Auth::guard('customer')->user()->dia_chi }}" type="text" name="txt_diachi"></div>
                              </div>
                              @else
                              <div class="form-block ng-scope" ng-if="CustomerId<=0">
								   <div class="user-login">
								   	<a href="{{ route('home.register') }}">Đăng ký tài khoản mua hàng</a>
								   	<a href="{{ route('home.login') }}">Đăng nhập</a>
								   </div>
								   <label class="color-blue">Mua hàng không cần tài khoản</label>
								   <div class="form-group"><input class="form-control ng-pristine ng-untouched ng-valid ng-valid-required" placeholder="Họ &amp; Tên" name="txt_hoten" type="text" ng-model="$parent.CustomerName" required=""></div>
								   <div class="form-group"><input class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" placeholder="Số điện thoại" name="txt_sdt" type="text" ng-model="$parent.CustomerPhone" required=""></div>
								   <div class="form-group"><input class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" placeholder="Địa chỉ" name="txt_diachi" type="text" ng-model="$parent.CustomerAddress" required=""></div>
								   <textarea class="form-control ng-pristine ng-untouched ng-valid" rows="4" placeholder="Ghi chú đơn hàng" ng-model="$parent.Description"></textarea>
								</div>
                              @endif
                           </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 payment-step step3">
                           <h4>2. Thanh toán và vận chuyển</h4>
                           <div class="step-preview clearfix">
                              <h2 class="title">Vận chuyển</h2>
                              <div class="form-group ">
                                 <select class="form-control ng-pristine ng-untouched ng-valid" ng-model="ShippingRateId" ng-options="item.Id as item.Name for item in ShippingRates" ng-change="changeShippingRate()">
                                    <option value="?" selected="selected"></option>
                                 </select>
                              </div>
                              <h2 class="title">Thanh toán</h2>
                              <!-- ngRepeat: item in PaymentMethods -->
                              <div class="radio ng-scope" ng-repeat="item in PaymentMethods">
                                 <label class="ng-binding">
                                 <input type="radio" value="521" name="optionsRadios" ng-model="PaymentMethodId" ng-click="changePaymentMethod(item.Id)" class="ng-pristine ng-untouched ng-valid" disabled>
                                 Thanh toán online qua cổng OnePay bằng thẻ ATM nội địa
                                 </label>
                              </div>
                              <!-- end ngRepeat: item in PaymentMethods -->
                              <div class="radio ng-scope" ng-repeat="item in PaymentMethods">
                                 <label class="ng-binding">
                                 <input type="radio" value="COD" name="txt_thanhtoan" ng-model="PaymentMethodId" ng-click="changePaymentMethod(item.Id)" class="ng-pristine ng-untouched ng-valid" checked>
                                 Thanh toán khi giao hàng (COD)
                                 </label>
                              </div>
                              <!-- end ngRepeat: item in PaymentMethods -->
                              <div class="radio ng-scope" ng-repeat="item in PaymentMethods">
                                 <label class="ng-binding">
                                 <input type="radio" value="523" name="optionsRadios" ng-model="PaymentMethodId" ng-click="changePaymentMethod(item.Id)" class="ng-pristine ng-untouched ng-valid" disabled>
                                 Chuyển khoản qua ngân hàng
                                 </label>
                              </div>
                              <!-- end ngRepeat: item in PaymentMethods -->
                              <div class="radio ng-scope" ng-repeat="item in PaymentMethods">
                                 <label class="ng-binding">
                                 <input type="radio" value="524" name="optionsRadios" ng-model="PaymentMethodId" ng-click="changePaymentMethod(item.Id)" class="ng-pristine ng-untouched ng-valid" disabled>
                                 Thanh toán online qua cổng OnePay bằng thẻ Visa/Master/JCB
                                 </label>
                              </div>
                              <!-- end ngRepeat: item in PaymentMethods -->
                           </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 payment-step step1">
                           <h4>3. Thông tin đơn hàng</h4>
                           <div class="step-preview">
                              <div class="cart-info">
                                 <div class="cart-items" id="cart-items">

                                 </div>
                                 <div class="total-price">
                                    Thành tiền  <label class="ng-binding" id="thanh_tien"> </label>

                                 </div>
                                 <div class="shiping-price">
                                    Phí vận chuyển  <label class="ng-binding">0 ₫</label>
                                 </div>
                                 <div class="btn-coupon hidden">
                                    <a href="#" class="btn btn-primary"><span></span>Sử dụng mã giảm giá </a>
                                 </div>
                                 <div class="use-coupon hidden">
                                    <div class="form-group">
                                       <input placeholder="Nhập mã giảm giá" class="coupon-code form-control">
                                       <a class="btn btn-primary">Sử dụng</a>
                                    </div>
                                 </div>
                                 <div class="total-payment">
                                    Thanh toán <span class="ng-binding" id="tong_tien" style="text-transform: none;"></span>
                                 </div>
                                 <div class="button-submit">
                                    <button class="btn button button-secondary" type="submit">Đặt hàng</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="input_value"></div>
                     </form>
                  </div>
               </div>
            </article>
         </div>
      </div>
   </div>
</div>

@endsection

@section('script')
	<script type="text/javascript">
		$(document).ready(function(){
			var cartdt = localStorage.getObj('product');
			var ids = [], soluong = [];
			for(var i = 0; i < cartdt.length; i++){
			 	ids.push(cartdt[i].id);
			 	soluong[cartdt[i].id] = cartdt[i].quantity;
			}
         var id_itm = JSON.stringify(ids);
         
         var qty_itm = JSON.stringify(soluong);
         // qty_itm = JSON.stringify(qty_itm);
         
         
			$.ajax({
				url:'ajax/cart_detail_order',
				data: {ids: JSON.stringify(ids)},
				datatype: 'json',
				success:function(data){
					var html ="", tongtien = 0; 
					for(var i = 0; i < data.length; i++){
						var itm = data[i];
						var tien = soluong[itm.id] * itm.gia_sach;
						tongtien += tien;
						html += '<div class="cart-item clearfix ng-scope" ng-repeat="item in OrderDetails"> <span class="image pull-left" style="margin-right:10px;"> <a href="/pibook/public/chitiet/'+itm.id+'">  <img src="upload/images/'+itm.anh_bia+'" class="img-responsive"> </a> </span> <div class="product-info pull-left"> <span class="product-name"> <a href="/pibook/public/chitiet/'+itm.id+'" class="ng-binding">'+itm.ten_sach+' x <span class="ng-binding">'+soluong[itm.id]+'</span></a> <input type="hidden" name="txt_qty[]" value="'+soluong[itm.id]+'"> </span> <!-- ngIf: item.IsVariant==true --> </div> <span class="price ng-binding">'+tien+'₫</span> </div>';
					}
					$("#cart-items").html(html);
               $("#tong_tien").html(tongtien+" đ");
					$("#thanh_tien").html(tongtien+" đ");
               var txt = "<input type='hidden' name='txt_id' value='"+id_itm+"''> <input type='hidden' name='txt_qty' value='"+qty_itm+"''> <input type='hidden' name='txt_tongtien' value='"+tongtien+"'>";
               $('#input_value').html(txt);
				},
				error:function(err){
					console.log(err);
				},
			})
         
			Storage.prototype.setObj = function(key, value){
				this.setItem(key, JSON.stringify(value));
			}
			Storage.prototype.getObj = function(key){
				var value = this.getItem(key);
				return value && JSON.parse(value);
			}
		});
      $(document).ready(function(){
         $('#checkout-container').submit(function(){
            localStorage.removeItem('product');
         });
      })
	</script>
@endsection