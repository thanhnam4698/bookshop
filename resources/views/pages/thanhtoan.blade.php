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
							            <li class="payment active col-md-2 col-xs-12 col-sm-4"><span><i class="fa fa-dollar"></i></span><span>Thanh toán</span><span class="step-number"><a>2</a></span></li>
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
							    <form class="payment-block clearfix ng-pristine ng-invalid ng-invalid-required ng-valid-email" id="checkout-container" ng-submit="checkout()">
							        <div class="col-md-4 col-sm-12 col-xs-12 payment-step step2">
							            <h4>1. Địa chỉ thanh toán và giao hàng</h4>
							            <div class="step-preview clearfix">
							                <h2 class="title">Thông tin thanh toán</h2>
							                <!-- ngIf: CustomerId>0 -->
							                <!-- ngIf: CustomerId<=0 --><div class="form-block ng-scope" ng-if="CustomerId<=0">
							                    <div class="user-login"><a href="/dang-ky.html">Đăng ký tài khoản mua hàng</a><a href="/dang-nhap.html">Đăng nhập</a></div>
							                    <label class="color-blue">Mua hàng không cần tài khoản</label>
							                    <div class="form-group"><input class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" placeholder="Họ &amp; Tên" type="text" ng-model="$parent.CustomerName" required=""></div>
							                    <div class="form-group"><input class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" placeholder="Số điện thoại" type="text" ng-model="$parent.CustomerPhone" required=""></div>
							                    <div class="form-group"><input class="form-control ng-pristine ng-untouched ng-valid-email ng-invalid ng-invalid-required" placeholder="Email" type="email" ng-model="$parent.CustomerEmail" required=""></div>
							                    <div class="form-group"><input class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" placeholder="Địa chỉ" type="text" ng-model="$parent.CustomerAddress" required=""></div>
							                    <div class="form-group">
							                        <select class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" ng-model="$parent.CustomerProvinceId" ng-options="item.Id as item.Name for item in Provinces" ng-change="changeCustomerProvince()" required=""><option selected="selected"></option><option value="number:0" label="Vui lòng chọn tỉnh/thành phố">Vui lòng chọn tỉnh/thành phố</option><option value="number:1" label="Hồ Chí Minh">Hồ Chí Minh</option><option value="number:2" label="Hà Nội">Hà Nội</option><option value="number:3" label="Đà Nẵng">Đà Nẵng</option><option value="number:4" label="Cần Thơ">Cần Thơ</option><option value="number:5" label=" Thừa Thiên - Huế"> Thừa Thiên - Huế</option><option value="number:6" label="An Giang">An Giang</option><option value="number:7" label="Bà Rịa-Vũng Tàu">Bà Rịa-Vũng Tàu</option><option value="number:8" label="Bạc Liêu">Bạc Liêu</option><option value="number:9" label="Bắc Kạn">Bắc Kạn</option><option value="number:10" label="Bắc Giang">Bắc Giang</option><option value="number:11" label="Bắc Ninh">Bắc Ninh</option><option value="number:12" label="Bến Tre">Bến Tre</option><option value="number:13" label="Bình Dương">Bình Dương</option><option value="number:14" label="Bình Định">Bình Định</option><option value="number:15" label="Bình Phước">Bình Phước</option><option value="number:16" label="Bình Thuận">Bình Thuận</option><option value="number:17" label="Cà Mau">Cà Mau</option><option value="number:18" label="Cao Bằng">Cao Bằng</option><option value="number:19" label="Đắk Lắk">Đắk Lắk</option><option value="number:20" label="Đắk Nông">Đắk Nông</option><option value="number:21" label="Điện Biên">Điện Biên</option><option value="number:22" label="Đồng Nai">Đồng Nai</option><option value="number:23" label="Đồng Tháp">Đồng Tháp</option><option value="number:24" label="Gia Lai">Gia Lai</option><option value="number:25" label="Hà Giang">Hà Giang</option><option value="number:26" label="Hà Nam">Hà Nam</option><option value="number:27" label="Hà Tây">Hà Tây</option><option value="number:28" label="Hà Tĩnh">Hà Tĩnh</option><option value="number:29" label="Hải Dương">Hải Dương</option><option value="number:30" label="Hải Phòng">Hải Phòng</option><option value="number:31" label="Hòa Bình">Hòa Bình</option><option value="number:32" label="Hậu Giang">Hậu Giang</option><option value="number:33" label="Hưng Yên">Hưng Yên</option><option value="number:34" label="Khánh Hòa">Khánh Hòa</option><option value="number:35" label="Kiên Giang">Kiên Giang</option><option value="number:36" label="Kon Tum">Kon Tum</option><option value="number:37" label="Lai Châu">Lai Châu</option><option value="number:38" label="Lào Cai">Lào Cai</option><option value="number:39" label="Lạng Sơn">Lạng Sơn</option><option value="number:40" label="Lâm Đồng">Lâm Đồng</option><option value="number:41" label="Long An">Long An</option><option value="number:42" label="Nam Định">Nam Định</option><option value="number:43" label="Nghệ An">Nghệ An</option><option value="number:44" label="Ninh Bình">Ninh Bình</option><option value="number:45" label="Ninh Thuận">Ninh Thuận</option><option value="number:46" label="Phú Thọ">Phú Thọ</option><option value="number:47" label="Phú Yên">Phú Yên</option><option value="number:48" label="Quảng Bình">Quảng Bình</option><option value="number:49" label="Quảng Nam">Quảng Nam</option><option value="number:50" label="Quảng Ngãi">Quảng Ngãi</option><option value="number:51" label="Quảng Ninh">Quảng Ninh</option><option value="number:52" label="Quảng Trị">Quảng Trị</option><option value="number:53" label="Sóc Trăng">Sóc Trăng</option><option value="number:54" label="Sơn La">Sơn La</option><option value="number:55" label="Tây Ninh">Tây Ninh</option><option value="number:56" label="Thái Bình">Thái Bình</option><option value="number:57" label="Thái Nguyên">Thái Nguyên</option><option value="number:58" label="Thanh Hóa">Thanh Hóa</option><option value="number:59" label="Thừa Thiên - Huế">Thừa Thiên - Huế</option><option value="number:60" label="Tiền Giang">Tiền Giang</option><option value="number:61" label="Trà Vinh">Trà Vinh</option><option value="number:62" label="Tuyên Quang">Tuyên Quang</option><option value="number:63" label="Vĩnh Long">Vĩnh Long</option><option value="number:64" label="Vĩnh Phúc">Vĩnh Phúc</option><option value="number:65" label="Yên Bái">Yên Bái</option></select>
							                    </div>
							                    <div class="form-group">
							                        <select class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" ng-model="$parent.CustomerDistrictId" ng-options="item.Id as item.Name for item in Districts" ng-change="changeCustomerDistrict()" required=""><option selected="selected"></option></select>
							                    </div>
							                    <textarea class="form-control ng-pristine ng-untouched ng-valid" rows="4" placeholder="Ghi chú đơn hàng" ng-model="$parent.Description"></textarea>
							                </div><!-- end ngIf: CustomerId<=0 -->
							                <h2 class="title">Thông tin giao hàng</h2>
							                <div class="checkbox">
							                    <label>
							                        <input type="checkbox" ng-model="IsOtherAddress" ng-change="changeAddress()" class="ng-pristine ng-untouched ng-valid"> Giao hàng địa chỉ khác
							                    </label>
							                </div>
							                <div class="form-block ng-hide" ng-show="IsOtherAddress==true">
							                    <div class="form-group"><input class="form-control ng-pristine ng-untouched ng-valid" placeholder="Họ &amp; Tên" type="text" ng-model="DeliveryName"></div>
							                    <div class="form-group"><input class="form-control ng-pristine ng-untouched ng-valid" placeholder="Số điện thoại" type="text" ng-model="DeliveryPhone"></div>
							                    <div class="form-group"><input class="form-control ng-pristine ng-untouched ng-valid" placeholder="Email" type="text" ng-model="DeliveryEmail"></div>
							                    <div class="form-group"><input class="form-control ng-pristine ng-untouched ng-valid" placeholder="Địa chỉ" type="text" ng-model="DeliveryAddress"></div>
							                    <div class="form-group">
							                        <select class="form-control ng-pristine ng-untouched ng-valid" ng-model="DeliveryProvinceId" ng-options="item.Id as item.Name for item in ProvinceDeliverys" ng-change="changeDeliveryProvince()"><option selected="selected"></option><option value="number:0" label="Vui lòng chọn tỉnh/thành phố">Vui lòng chọn tỉnh/thành phố</option><option value="number:1" label="Hồ Chí Minh">Hồ Chí Minh</option><option value="number:2" label="Hà Nội">Hà Nội</option><option value="number:3" label="Đà Nẵng">Đà Nẵng</option><option value="number:4" label="Cần Thơ">Cần Thơ</option><option value="number:5" label=" Thừa Thiên - Huế"> Thừa Thiên - Huế</option><option value="number:6" label="An Giang">An Giang</option><option value="number:7" label="Bà Rịa-Vũng Tàu">Bà Rịa-Vũng Tàu</option><option value="number:8" label="Bạc Liêu">Bạc Liêu</option><option value="number:9" label="Bắc Kạn">Bắc Kạn</option><option value="number:10" label="Bắc Giang">Bắc Giang</option><option value="number:11" label="Bắc Ninh">Bắc Ninh</option><option value="number:12" label="Bến Tre">Bến Tre</option><option value="number:13" label="Bình Dương">Bình Dương</option><option value="number:14" label="Bình Định">Bình Định</option><option value="number:15" label="Bình Phước">Bình Phước</option><option value="number:16" label="Bình Thuận">Bình Thuận</option><option value="number:17" label="Cà Mau">Cà Mau</option><option value="number:18" label="Cao Bằng">Cao Bằng</option><option value="number:19" label="Đắk Lắk">Đắk Lắk</option><option value="number:20" label="Đắk Nông">Đắk Nông</option><option value="number:21" label="Điện Biên">Điện Biên</option><option value="number:22" label="Đồng Nai">Đồng Nai</option><option value="number:23" label="Đồng Tháp">Đồng Tháp</option><option value="number:24" label="Gia Lai">Gia Lai</option><option value="number:25" label="Hà Giang">Hà Giang</option><option value="number:26" label="Hà Nam">Hà Nam</option><option value="number:27" label="Hà Tây">Hà Tây</option><option value="number:28" label="Hà Tĩnh">Hà Tĩnh</option><option value="number:29" label="Hải Dương">Hải Dương</option><option value="number:30" label="Hải Phòng">Hải Phòng</option><option value="number:31" label="Hòa Bình">Hòa Bình</option><option value="number:32" label="Hậu Giang">Hậu Giang</option><option value="number:33" label="Hưng Yên">Hưng Yên</option><option value="number:34" label="Khánh Hòa">Khánh Hòa</option><option value="number:35" label="Kiên Giang">Kiên Giang</option><option value="number:36" label="Kon Tum">Kon Tum</option><option value="number:37" label="Lai Châu">Lai Châu</option><option value="number:38" label="Lào Cai">Lào Cai</option><option value="number:39" label="Lạng Sơn">Lạng Sơn</option><option value="number:40" label="Lâm Đồng">Lâm Đồng</option><option value="number:41" label="Long An">Long An</option><option value="number:42" label="Nam Định">Nam Định</option><option value="number:43" label="Nghệ An">Nghệ An</option><option value="number:44" label="Ninh Bình">Ninh Bình</option><option value="number:45" label="Ninh Thuận">Ninh Thuận</option><option value="number:46" label="Phú Thọ">Phú Thọ</option><option value="number:47" label="Phú Yên">Phú Yên</option><option value="number:48" label="Quảng Bình">Quảng Bình</option><option value="number:49" label="Quảng Nam">Quảng Nam</option><option value="number:50" label="Quảng Ngãi">Quảng Ngãi</option><option value="number:51" label="Quảng Ninh">Quảng Ninh</option><option value="number:52" label="Quảng Trị">Quảng Trị</option><option value="number:53" label="Sóc Trăng">Sóc Trăng</option><option value="number:54" label="Sơn La">Sơn La</option><option value="number:55" label="Tây Ninh">Tây Ninh</option><option value="number:56" label="Thái Bình">Thái Bình</option><option value="number:57" label="Thái Nguyên">Thái Nguyên</option><option value="number:58" label="Thanh Hóa">Thanh Hóa</option><option value="number:59" label="Thừa Thiên - Huế">Thừa Thiên - Huế</option><option value="number:60" label="Tiền Giang">Tiền Giang</option><option value="number:61" label="Trà Vinh">Trà Vinh</option><option value="number:62" label="Tuyên Quang">Tuyên Quang</option><option value="number:63" label="Vĩnh Long">Vĩnh Long</option><option value="number:64" label="Vĩnh Phúc">Vĩnh Phúc</option><option value="number:65" label="Yên Bái">Yên Bái</option></select>
							                    </div>
							                    <div class="form-group">
							                        <select class="form-control ng-pristine ng-untouched ng-valid" ng-model="DeliveryDistrictId" ng-options="item.Id as item.Name for item in DistrictDeliverys" ng-change="changeDeliveryDistrict()"><option selected="selected"></option></select>
							                    </div>
							                </div>
							            </div>
							        </div>
							        <div class="col-md-4 col-sm-12 col-xs-12 payment-step step3">
							            <h4>2. Thanh toán và vận chuyển</h4>
							            <div class="step-preview clearfix">
							                <h2 class="title">Vận chuyển</h2>
							                <div class="form-group ">
							                    <select class="form-control ng-pristine ng-untouched ng-valid" ng-model="ShippingRateId" ng-options="item.Id as item.Name for item in ShippingRates" ng-change="changeShippingRate()"><option value="?" selected="selected"></option></select>
							                </div>
							                <h2 class="title">Thanh toán</h2>
							                <!-- ngRepeat: item in PaymentMethods --><div class="radio ng-scope" ng-repeat="item in PaymentMethods">
							                    <label class="ng-binding">
							                        <input type="radio" value="521" name="optionsRadios" ng-model="PaymentMethodId" ng-click="changePaymentMethod(item.Id)" class="ng-pristine ng-untouched ng-valid">
							                        Thanh toán online qua cổng OnePay bằng thẻ ATM nội địa
							                    </label>
							                </div><!-- end ngRepeat: item in PaymentMethods --><div class="radio ng-scope" ng-repeat="item in PaymentMethods">
							                    <label class="ng-binding">
							                        <input type="radio" value="522" name="optionsRadios" ng-model="PaymentMethodId" ng-click="changePaymentMethod(item.Id)" class="ng-pristine ng-untouched ng-valid">
							                        Thanh toán khi giao hàng (COD)
							                    </label>
							                </div><!-- end ngRepeat: item in PaymentMethods --><div class="radio ng-scope" ng-repeat="item in PaymentMethods">
							                    <label class="ng-binding">
							                        <input type="radio" value="523" name="optionsRadios" ng-model="PaymentMethodId" ng-click="changePaymentMethod(item.Id)" class="ng-pristine ng-untouched ng-valid">
							                        Chuyển khoản qua ngân hàng
							                    </label>
							                </div><!-- end ngRepeat: item in PaymentMethods --><div class="radio ng-scope" ng-repeat="item in PaymentMethods">
							                    <label class="ng-binding">
							                        <input type="radio" value="524" name="optionsRadios" ng-model="PaymentMethodId" ng-click="changePaymentMethod(item.Id)" class="ng-pristine ng-untouched ng-valid">
							                        Thanh toán online qua cổng OnePay bằng thẻ Visa/Master/JCB
							                    </label>
							                </div><!-- end ngRepeat: item in PaymentMethods -->
							            </div>
							        </div>
							        <div class="col-md-4 col-sm-12 col-xs-12 payment-step step1">
							            <h4>3. Thông tin đơn hàng</h4>
							            <div class="step-preview">
							                <div class="cart-info">
							                    <div class="cart-items">
							                        <!-- ngRepeat: item in OrderDetails --><div class="cart-item clearfix ng-scope" ng-repeat="item in OrderDetails">
							                            <span class="image pull-left" style="margin-right:10px;">
							                                <a href="/san-pham/ao-thun-nu-belike.html">
							                                    <img src="/Uploads/shop910/images/products/ao-belike1_master.jpg" class="img-responsive">
							                                </a>
							                            </span>
							                            <div class="product-info pull-left">
							                                <span class="product-name">
							                                    <a href="/san-pham/ao-thun-nu-belike.html" class="ng-binding">Áo thun nữ Belike</a> x <span class="ng-binding">1</span>
							                                </span>
							                                <!-- ngIf: item.IsVariant==true -->
							                            </div>
							                            <span class="price ng-binding">119,000 ₫</span>
							                        </div><!-- end ngRepeat: item in OrderDetails -->
							                    </div>
							                    <div class="total-price">
							                        Thành tiền  <label class="ng-binding"> 119,000 ₫</label>
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
							                        Thanh toán <span class="ng-binding"> 119,000 ₫</span>
							                    </div>
							                    <div class="button-submit">
							                        <button class="btn button button-secondary" type="submit">Đặt hàng</button>
							                    </div>
							                </div>
							            </div>
							        </div>
							    </form>
							</div>

                            </div>
                    </article>
                </div>
            </div>
        </div>
    </div>

@endsection