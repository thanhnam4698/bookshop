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
										<li>Trang chủ
											<i class="fas fa-angle-double-right"></i>
										</li>
										<li>Manga
											<i class="fas fa-angle-double-right"></i>
										</li>
										<li>One Piece
											
										</li>
									</ul>
								</div>
								<script src="/app/services/orderServices.js"></script>
								<script src="/app/controllers/orderController.js"></script>
								<div class="cart-content ng-scope" ng-controller="orderController" ng-init="initOrderCartController()">
								    <h1 class="title"><span>Giỏ hàng của tôi</span></h1>
								    <div class="steps clearfix">
								        <ul class="clearfix">
								            <li class="cart active col-md-2 col-xs-12 col-sm-4 col-md-offset-3 col-sm-offset-0 col-xs-offset-0"><span><i class="fa fa-shopping-cart"></i></span><span>Giỏ hàng của tôi</span><span class="step-number"><a>1</a></span></li>
								            <li class="payment col-md-2 col-xs-12 col-sm-4"><span><i class="fas fa-dollar-sign"></i></span><span>Thanh toán</span><span class="step-number"><a>2</a></span></li>
								            <li class="finish col-md-2 col-xs-12 col-sm-4"><span><i class="fa fa-check"></i></span><span>Hoàn tất</span><span class="step-number"><a>3</a></span></li>
								        </ul>
								    </div>
								    <div class="cart-block">
								        <div class="cart-info table-responsive">
								            <table class="table product-list">
								                <thead>
								                    <tr>
								                        <th>Sản phẩm</th>
								                        <th>Hình ảnh</th>
								                        <th>Giá</th>
								                        <th>Số lượng</th>
								                        <th>Thành tiền</th>
								                        <th></th>
								                    </tr>
								                </thead>
								                <tbody id="list-item">
								                    
								                </tbody>
								            </table>
								        </div>
								        <div class="clearfix text-right">
								            <span><b>Tổng thanh toán:</b></span>
								            <span id = "tongtien" class="pay-price ng-binding">
								            
								            </span>
								        </div>
								        <div class="button text-right">
								            <a class="btn btn-default" href="/" onclick="window.history.back()">Tiếp tục mua hàng</a>
								            <a id="thanhtoan" class="btn button button-secondary" href="{{ route('shoppingcart.thanhtoan') }}">Tiến hành thanh toán</a>
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

@section('script')
	<script type="text/javascript">
		

		$(document).ready(function(){
			loadcartdt();
		})
		//delete item
		

		$(document).ready(function(){

         	$('#list-item').on('click','.delete-cart-detail',function(){
         		var idbook = $(this).attr('idbook');
         		var cartdt = localStorage.getObj('product');
         		for(var i = 0; i < cartdt.length; i++){
         			if (cartdt[i].id == idbook) {
         				cartdt.splice(i,1);
         				break;
         			}
         		}
         		console.log(cartdt);
         		localStorage.setObj('product',cartdt);
         		loadcartdt();
         		update_header_cart();
         	})
		})

		$(document).ready(function()
		{
			$('#list-item').on('change','.soluongitem',function()
			{
				var cartdt = localStorage.getItem('product');
				cartdt = JSON.parse(cartdt);
				for(var i = 0; i < cartdt.length; i++){
					if($(this).attr('idbook') == cartdt[i].id){
						cartdt[i].quantity = parseInt($(this).val());
						break;
					}
				}
				localStorage.setObj('product',cartdt);
				loadcartdt();
			})
		})

	</script>
@endsection