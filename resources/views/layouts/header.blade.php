<header class="ts-header has-sticky">
  <div class="header-container">
     <div class="header-template">
        <div class="header-top">
           <div class="container">
              <div class="col-md-4 col-sm-5 header-top-left">
                 <div class="info-desc">
                    <span class="info-email">
                    <i class="fa fa-envelope"></i>bookshop.hnue
                    </span>
                    <span class="info-phone">
                    <i class="fa fa-phone"></i>0912 34 56 78
                    </span>
                 </div>
              </div>
              <div class="col-md-8 col-sm-7 col-xs-12 header-top-right">
                 <span class="ts-mobile-menu-icon-toggle visible-phone" id="menu-icon"></span>
                 <div type="button" class="collapsed" data-toggle="collapse" data-target="#login_logout" aria-expanded="false">
                    <span class="ts-group-meta-icon-toggle visible-phone">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                 </div>
                 <div class="group-meta-header navbar-collapse collapse" aria-expanded="false" id="login_logout">
                 @if (!Auth::guard('customer')->check())
                    <div class="my-account-wrapper">
                       <div class="ts-tiny-account-wrapper">
                          <div class="account-control">
                             <a class="login" href="{{ route('home.login') }}" title=""><span>Đăng nhập</span></a>
                               <a class="sign-up" href="{{ route('home.register') }}" title=""><span>Đăng ký</span></a>
                          </div>
                          <div class="account-dropdown-form dropdown-container">
                             <i class="fas fa-sort-up dropdown-icon"></i>
                             <div class="form-content">
                                <form accept-charset="UTF-8" id="login-container" method="POST" class="ng-pristine ng-valid" action="{{ route('home.login.post') }}">
                                  @csrf
                                   <p class="login-username">
                                      <label>Email</label>
                                      <input id="email" name="email" class="input {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" size="20" autocomplete="off" type="email" required autofocus>
                                      @if ($errors->has('email'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('email') }}</strong>
                                          </span>
                                      @endif
                                   </p>
                                   <p class="login-password">
                                      <label>Mật khẩu</label>
                                      <input id="password" name="password" class="input {{ $errors->has('password') ? ' is-invalid' : '' }}" value="" size="20" type="password" required>
                                      @if ($errors->has('password'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('password') }}</strong>
                                          </span>
                                      @endif
                                   </p>
                                   <p class="login-submit">
                                      <button name="wp-submit" class="btn btn-primary" value="Đăng nhập" type="submit" id="btnLoginAjax">Đăng nhập</button>
                                   </p>
                                   <p class="forgot-pass">
                                      <a href="" title="Forgot Your Password?">Quên mật khẩu?</a>
                                   </p>
                                </form>
                             </div>
                          </div>
                       </div>
                    </div>
                  @else
                    <div class="my-account-wrapper">
                       <div class="ts-tiny-account-wrapper">
                          <div class="account-control">
                             <a class="logout" href="{{ route('inforBasic') }}" title=""><span>{{ Auth::guard('customer')->user()->name }}</span></a>
                          </div>
                          <div class="account-dropdown-form dropdown-container">
                             <i class="fas fa-sort-up dropdown-icon"></i>
                             <div class="form-content">
                                   <p class="infor-user">
                                     <a href="{{ route('inforBasic') }}">Thông tin cơ bản</a>
                                   </p>
                                   <p class="log-out">
                                     <a href="{{ route('home.logout') }}">Đăng xuất</a>
                                   </p>
                             </div>
                          </div>
                       </div>
                    </div>
                  @endif
                    <!--Kết thúc login-->
                    <div class="search-wrapper hidden-xs">
                       <div class="ts-search-by-category">
                          <form class="ng-pristine ng-valid" method="POST" action="{{ route('query') }}">
                            @csrf
                             <div class="search-table">
                                <div class="search-field search-content">
                                   <input name="type" value="product" type="hidden">
                                   <input type="text" name="search" id="txtsearch" placeholder="Tìm kiếm...">
                                </div>
                                <div class="search-button">
                                   <button type="submit" name="submit_search" id="btnsearch" value="Search"></button>
                                </div>
                             </div>
                          </form>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
        {{-- <script type="text/javascript">
           $("#btnsearch").click(function () {
               SearchProduct();
           });
           $("#txtsearch").keydown(function (event) {
               if (event.keyCode == 13) {
                   SearchProduct();
               }
           });
           function SearchProduct() {
               var key = $('#txtsearch').val();
               if (key == '' || key == 'Tìm kiếm...') {
                   $('#txtsearch').focus();
                   return;
               }
               window.location = '/tim-kiem.html?key=' + key;
           }
        </script> --}}
        <!--Template--
           --End-->
        <section class="header-content clearfix">
        </section>
        
        <div id="undefined-sticky-wrapper" class="sticky-wrapper affix-top">
           <div id="undefined-sticky-wrapper" class="sticky-wrapper" style="height: 114px;">
              <div class="header-middle header-sticky" style="">
                 <div class="container">
                    <div class="logo-wrapper col-md-3 col-sm-12 col-xs-12">
                       <div class="logo">
                          <a href="/index">
                          <img src="assets/logo.png" alt="Big Market">
                          </a>
                       </div>
                    </div>
                    <!--Kết thúc logo-->
                    <div class="menu-wrapper col-md-7 col-sm-9 hidden-xs">
                       <div class="ts-menu">
                          <nav class="main-menu pc-menu ts-mega-menu-wrapper">
                             <!-- MENU MAIN -->
                             <ul class="nav navbar-nav menu clearfix sm" data-smartmenus-id="15515414750359023">
                                <li>
                                   <a class="" href="/index">
                                      <span>Trang chủ</span>
                                   </a>
                                </li>
                                <li>
                                   <a class="" href="">
                                      <span>Giới thiệu</span>
                                   </a>
                                </li>{{-- 
                                <li class="dropdown">
                                   <a class="has-submenu" href="http://runecom01.runtime.vn/san-pham.html">
                                      <span>Sản phẩm</span>
                                      <span class="sub-arrow">...</span>
                                   </a>
                                   <ul class="dropdown-menu menu_sub" role="menu">
                                      <li><a class="" href="http://runecom01.runtime.vn/trang-chu.html"><span>sub</span></a></li>
                                   </ul>
                                </li> --}}
                                <li><a class="" href=""><span>Liên hệ</span></a></li>
                             </ul>
                          </nav>
                       </div>
                    </div>
                    <!--Kết thúc menu-->
                    <div class="shopping-cart-wrapper col-md-2 col-sm-3 hidden-xs">
                       <div class="cart-inner ts-tiny-cart-wrapper">
                          <div id="cart">
                             <div class="heading">
                                <a href="/shoppingcart">
                                <span class="link_a">
                                <i class="fa fa-shopping-cart"></i>
                                <b class="hidden-md hidden-sm">Giỏ hàng:</b>
                                <span class="ajax_cart_no_product ajax_cart_quantity" id="total_qty">0</span>
                                <span class="clear"></span>
                                </span>
                                </a>
                             </div>
                             <div id="view-cart" class="cart_content content hidden-xs">
                                <i class="fas fa-sort-up cartsub-icon"></i>
                                <div class="cart-list" id="clone-item">
                                   <div class="item_2 clearfix hidden item-ajax item-cart clearfix">
                                      <div class="nav-bar-item">
                                         <div class="text_cart">
                                            <h4>
                                               <a href="/index"></a>
                                            </h4>
                                            <span class="variant"></span>
                                            <div class="price-line">
                                               <div class="down-case"> <span class="new-price">  </span></div>
                                            </div>
                                         </div>
                                         <span class="remove_link">
                                         <a href="javascript:void(0);" data-id="" class="remove-cart"></a>
                                         </span>
                                      </div>
                                   </div>
                                </div>
                                <div class="cart-list" id="header-cart-items">
                                   <div style="padding:10px 20px;">
                                      <p style="margin:0" class="text-center">Giỏ hàng của bạn đang trống</p>
                                      <p class="text-center"><a href="/index">Tiếp tục mua hàng</a></p>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                       <!--Kết thúc Cart-->
                    </div>
                 </div>
              </div>
           </div>
        </div>
        <script type="text/javascript">
          $(document).ready(function(){
            $(window).scroll(function(){
              if($(this).scrollTop() > 40){
                $('#undefined-sticky-wrapper').addClass('fix-nav');
              }
              else{
                $('#undefined-sticky-wrapper').removeClass('fix-nav'); 
              }
            })
          })
        </script>
        <script type="text/javascript">
           $(document).ready(function () {
               var str = location.href.toLowerCase();
               $("ul.menu li a").each(function () {
                   if (str.indexOf(this.href.toLowerCase()) >= 0) {
                       $("ul.menu li a").removeClass("current");
                       $(this).addClass("current");
                   }
               });
           });
        </script>
        <!--Template--
           --End-->
     </div>
  </div>
</header>