@extends('layouts.index')
@section('content')
	<div class="slideshow">
	    <div class="container">
	       <div class="row">
	          <div class="col-md-3">
	             <div class="menu-product">
	                <div class="wpb_content_element hidden-xs">
	                   <section class="widget-container ts-menus-widget">
	                      <div class="widget-title-wrapper">
	                         <h3 class="widget-title heading-title">
	                            <i class="fas fa-bars" style="margin-right: 15px; "></i>
	                            Danh mục 
	                         </h3>
	                      </div>
	                      <nav class="vertical-menu ts-mega-menu-wrapper">
	                         <ul class="menu" id="menu-shop-by-category">
	                            @foreach($type as $tp)
	                               <li class="parent">
	                                  <a href="{{ route('classify.theloai',$tp->slug) }}">
	                                     <span class="menu-label">{{ $tp->ten_loai }}</span>
	                                  </a>
	                                  @if($tp->booktopic != "[]")
	                                     <i class="fas fa-angle-double-right" style="float: right; line-height: 45px"></i>
	                                     <div class="cc-tiny-menu">
	                                       <ul class="cc-tiny-menu">
	                                          @foreach($tp->booktopic as $topic)
	                                             <li class="cc-tiny-menu">
	                                                <ul class="cc-mega-menu">
	                                                   <li><a href="{{ route('classify.chude',$topic->slug) }}" style="font-weight: bold;">{{ $topic->ten_chu_de }}</a></li>
	                                                   @foreach($topic->bookcontent as $content)
	                                                   <li><a href="{{ route('classify.noidung',$content->slug) }}">{{ $content->ten_noi_dung }}</a></li>
	                                                   @endforeach
	                                                </ul>
	                                             </li>
	                                          @endforeach
	                                          @unset($topic)
	                                       </ul>
	                                     </div>
	                                  @endif
	                               </li>
	                            @endforeach
	                            @unset($tp)
	                            <!--Kết thúc menu 1-->
	                         </ul>
	                      </nav>
	                   </section>
	                </div>
	             </div>
	             <!--Begin-->
	             
	             <!--End-->
	          </div>
	          <div class="col-md-6">
	             <div id="slider" class="nivoSlider">
	             	@foreach($slides as $slide)
	             		<a href="/chitiet/{{ $slide->slug }}">
							<img src="upload/images/{{ $slide->anh_bia }}" data-thumb="upload/images/18660_15_02_19_81-an-tay-du-dai-duong-pham-thien-ky-tap-3.jpg" alt="" title="{{ $slide->ten_sach }}" />
						</a>
					@endforeach
				</div>
				<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
				<script type="text/javascript" src="assets/nivo-slider/jquery.nivo.slider.js"></script>
				<script type="text/javascript">
					$(window).load(function() {
					$('#slider').nivoSlider();
					});
				</script>
				<script type="text/javascript">
					$(window).load(function() {
						$('#slider').nivoSlider({
							effect: 'random',
							slices: 15,
							boxCols: 8,
							boxRows: 4,
							animSpeed: 500,
							pauseTime: 3000,
							startSlide: 0,
							directionNav: true,
							controlNav: true,
							controlNavThumbs: false,
							pauseOnHover: true,
							manualAdvance: false,
							prevText: 'Prev',
							nextText: 'Next',
							randomStart: false,
							beforeChange: function(){},
							afterChange: function(){},
							slideshowEnd: function(){},
							lastSlide: function(){},
							afterLoad: function(){}
						});
					});
				</script>
{{-- 	             <script>
	                jQuery(document).ready(function ($) {
	                    var posTabProduct = $(".ts-slider .products");
	                    posTabProduct.owlCarousel({
	                        items: 1,
	                        itemsDesktop: [1199, 1],
	                        itemsDesktopSmall: [991, 1],
	                        itemsTablet: [767, 1],
	                        itemsMobile: [480, 1],
	                        autoPlay: false,
	                        stopOnHover: false,
	                        addClassActive: true,
	                    });
	                    $(".ts-slider .navslider .next").click(function () {
	                        posTabProduct.trigger('owl.next');
	                    })
	                    $(".ts-slider .navslider .prev").click(function () {
	                        posTabProduct.trigger('owl.prev');
	                    })
	                });
	             </script>      --}}                   
	          </div>
	          <div class="col-md-3">
	             <section class="ts-products-widget">
	                <div class="title-wrapper">
	                   <h3 class="hr_title heading-title">
	                      Sản phẩm khuyến mãi
	                   </h3>
	                </div>
	                <div class="ts-products-wrapper ">
	                   <div class="per-slide">
	                      <ul class="product_list_widget">
	                      	{{-- <script type="text/javascript">
                          		$(document).ready(function(){
                          			// alert('($det)');
                          			alert("asdasd");
                          		});
                      		</script> --}}
	                      	
	                          	@foreach($detail->where('khac','sale') as $det)

	                             <li>
	                                <a class="ts-wg-thumbnail" href="/chitiet/{{ $det->slug }}" title="">
	                                <img src="upload/images/{{ $det->anh_bia }}" alt="{{ $det->ten_sach }}">
	                                </a>
	                                <div class="ts-wg-meta">
	                                   <a href="" title="{{ $det->ten_sach }}">{{ $det->ten_sach }}</a>
	                                   <span class="price">
	                                   	<span class="">{{ $det->gia_sach }}₫</span>
	                                   </span>
	                                </div>
	                             </li>
	                            @endforeach
	                        
	                      </ul>
	                   </div>
	                </div>
	             </section>
	             <!--Begin-->
	             {{-- <section class="feedburner-subscription ng-scope" ng-controller="moduleController" ng-init="initController()">
	                <div class="widget-title-wrapper">
	                   <h3 class="widget-title heading-title">Đăng ký nhận tin</h3>
	                </div>
	                <div class="subscribe-widget">
	                   <form method="post" class="contact-form ng-pristine ng-valid-email ng-invalid ng-invalid-required" ng-submit="registerNewsletter()" accept-charset="UTF-8">
	                      <div class="subscribe-email">
	                         <input type="email" value="" size="18" name="Email" placeholder="Email của bạn" class="subscribe-input ng-pristine ng-untouched ng-valid-email ng-invalid ng-invalid-required" ng-model="newsletter.Email" required="">
	                         <span class="input-group-btn">
	                         <button class="button button-secondary transparent" name="submitNewsletter" type="submit">Đăng ký</button>
	                         </span>
	                      </div>
	                   </form>
	                </div>
	             </section> --}}
	             <!--End-->
	          </div>
	       </div>
	    </div>
	 </div>
	 <div class="adv">
	    <div class="container">
	       <div class="row">
	          <div class="col-md-12">
	             <div class="box-html">
	                <div class="ts-effect-image eff-border-scale ts-single-image">
	                   <div class="image-link">
	                      {{-- <img alt="" src="assets/banner_home_img.jpg">  --}}
	                      <span class="overlay"></span>
	                   </div>
	                </div>
	             </div>
	          </div>
	       </div>
	    </div>
	 </div>
	 <div id="main" class="wrapper">
	    <div class="page-container container ">
	       <div id="main-content" class="row">
	          <div id="primary" class="site-content">
	             <article>
	                <div class="col-md-12">
	                   <div class="row">
	                      <div class="col-lg-12">
	                      	@foreach($type->where("noi_bat","==","1") as $tp)
	                        <div class="box-section-collection">
	                            <div class="row">
	                               <div class="col-xs-12">
	                                  <div class="ts-product-in-category-tab-wrapper tabs_1 clearfix box-section-background border-top-index">
	                                    <div class="column-tabs hr-col-md-2">
	                                        <div type="button" id="tabs_1_home" class="collapsed" data-toggle="collapse" data-target="#tabs_1" aria-expanded="false">
	                                           <div class="heading-tab">
	                                              <h3 class="heading-title">
	                                                 <i class="fas fa-book-open"></i>
	                                                 <span>{{ $tp->ten_loai }} </span>
	                                              </h3>
	                                           </div>
	                                        </div>
	                                        <ul class="catalog-list clearfix group-link-collection navbar-collapse collapse" aria-expanded="false" style="" id="tabs_1" role="tablist">
	                                           <li data-handle="0" data-loaded="true" class="cc-topic cc-topic-all active " id-topic="{{ $tp->id }}" loai_sach="{{ $tp->id }}">
	                                              <a href="javascript:void(0);">
	                                              	Tất cả
	                                              </a>
	                                           </li>
	                                           @foreach($tp->booktopic as $topic)
	                                           <li data-handle="15155" data-loaded="true" class="cc-topic" id-topic="{{ $topic->id }}" loai_sach="{{ $tp->id }}">
	                                              <a href="javascript:void(0);">
	                                              {{ $topic->ten_chu_de }}
	                                              </a>
	                                           </li>
	                                           @endforeach
	                                           @unset($topic)
	                                        </ul>
	                                    </div>
	                                     <!--Kết thúc tabs-->
	                                     <div class="group-collection column-products hr_commerce hr-col-md-6">
	                                     	<div class="owl-carousel section-collection product-lists box-product-lists products content-product-list {{ $tp->id }} active " id="content-product-list">
	                                     		<?php $start = 0 ?>
	                                     		@foreach($tp->booktopic as $topic)
	                                     			@foreach($topic->bookcontent as $content)
	                                     				@foreach($content->bookdetail as $book)
	                                     					@if($book->khac == "hot" || $book->khac == "Hot")
		                                     					@if($start < $limit)
		                                     					<?php $start++ ?>
		                                     					
			                                             		<div class='product col-md-3 col-sm-4 col-xs-6 product-item animated zoomIn'>
										                          <div class='product-wrapper product-resize fixheight' style='height: 249px;'>
										                             <div class='product-information'>
										                                <div class='product-detail'>
										                                  <div class='product-image thumbnail-wrapper'>
										                                      <a href='' >
										                                         <figure class='no-back-image image-resize' style='height: 185px;'>
										                                            <img alt='{{ $book->ten_sach }}' src='upload/images/{{ $book->anh_bia }}'>
										                                         </figure>
										                                      </a>
										                                      <div class='product-label field-sale'>
										                                         <span class='onsale'>Hot</span>
										                                      </div>
										                                      <div class='product-group-button three-button'>
										                                         <div class='loop-add-to-cart'>
										                                            <a rel='nofollow' class='ajax_add_to_cart_button' idbook='{{$book->id}}'>
										                                              <i class='fas fa-shopping-cart'></i>
										                                            <span class='ts-tooltip button-tooltip'> Giỏ hàng </span>
										                                            </a>
										                                         </div>
										                                         <div>
										                                            <a href='/chitiet/{{ $book->slug }}' class=''>
										                                            <i class='fas fa-align-center'></i>
										                                            <span class='ts-tooltip button-tooltip'>Chi tiết</span>
										                                            </a>
										                                         </div>
										                                      </div>
										                                  </div>
										                                  <div class='product-info meta-wrapper'>
										                                      <a href='/chitiet/{{ $book->slug }}' title='{{ $book->slug }}'>
										                                         <h3 class='heading-title product-name'>
										                                            {{ $book->ten_sach }}
										                                         </h3>
										                                      </a>
										                                      <div class='price-info clearfix'>
										                                         <div class='price-new-old'>
										                                            <span>{{ $book->gia_sach }}đ</span>
										                                         </div>
										                                      </div>
										                                  </div>
										                                </div>
										                             </div>
										                          </div>
										                       	</div>
										                       	@endif
										                    @endif
						                       			@endforeach
						                       			
						                       		@endforeach
						                       	@endforeach
	                                     	</div>
	                                 	 </div>
	                                     <!--Kết thúc content tabs-->
	                                  </div>
	                               </div>
	                            </div>
	                        </div>
	                        @endforeach
	                         {{-- <script>
	                            var owl = $(".tabs_1 .column-banners figure");
	                            owl.owlCarousel({
	                                slideSpeed: 100,
	                                paginationSpeed: 400,
	                                loop: true,
	                                responsiveClass: true, nav: false, dots: true,
	                                items: 1,
	                                itemsDesktop: [1000, 1],
	                                itemsDesktopSmall: [900, 1],
	                                itemsTablet: [600, 1],
	                                autoPlay: true,
	                                itemsMobile: false,
	                            });
	                            jQuery("#tabs_" +1 +"_home").on("click", function () {
	                                jQuery(this).toggleClass("active");
	                            });
	                         </script> --}}
	                         <!--Kết thúc tabs_1-->
	                         {{-- <script>
	                            var owl = $(".tabs_2 .column-banners figure");
	                            owl.owlCarousel({
	                                slideSpeed: 100,
	                                paginationSpeed: 400,
	                                loop: true,
	                                responsiveClass: true, nav: false, dots: true,
	                                items: 1,
	                                itemsDesktop: [1000, 1],
	                                itemsDesktopSmall: [900, 1],
	                                itemsTablet: [600, 1],
	                                autoPlay: true,
	                                itemsMobile: false,
	                            });
	                            jQuery("#tabs_" +2 +"_home").on("click", function () {
	                                jQuery(this).toggleClass("active");
	                            });
	                         </script> --}}
	                         <!--Kết thúc tabs_1-->
	                         
	                      </div>
	                   </div>
	                   <!--Kết thúc Tabs -->                            
	                </div>
	             </article>
	          </div>
	       </div>
	    </div>
	 </div>

	         



@endsection

@section('script')

	<script type="text/javascript">
		// carousel slider product
		$(document).ready(function(){
			$('.owl-carousel').owlCarousel({
				items: 4,
				loop: true,
				nav: true,
				dots: false,
				autoPlay: true,
				autoplayTimeout: 5000,
				autoplayHoverPause: true,

			});
		});
	</script>
	


	<script type="text/javascript">
		//create animation on menu
         $(document).ready(function(){
            $('li.parent').hover(function(){
               $(this).children('div.cc-tiny-menu').show('slow');
            });
            $('li.parent').mouseleave(function(){
               $(this).children('div.cc-tiny-menu').hide('fast');
            });
         });

         // add active class
         $(document).ready(function(){
         	
         	var group = $('ul.group-link-collection');
         	group.children('li').click(function()
         	{
         		var ulParent = $(this).parent();
         		for (var i = 0; i < ulParent.children().length; i++) {
         			ulParent.children(i).removeClass('active');
         		}
         		$(this).addClass('active');
         	})
         })

         // add data from database into div.content-product-list
         $(document).ready(function(){
         	$('.cc-topic').click(function(){
         		var topicid = $(this).attr("id-topic");
         		var id_loai = $(this).attr("loai_sach");
         		var content = '.content-product-list.'+ id_loai;
         		if($(this).hasClass('cc-topic-all')){
	                $.get('ajax/book-collection/'+topicid+'/1',function(data){

	                	if($('.content-product-list').hasClass(id_loai)){
	                		$(content).html(data);
	                    	$(content).addClass('active');
	                    	event_add_cart();
	                	}
	                });
	           //      $.ajax({
	           //      	url: 'ajax/book-collection/'+topicid+'/1',
	           //      	success: function(data){
		          //       	if($('.content-product-list').hasClass(id_loai)){
		          //       		$(content).html(data);
		          //           	$(content).addClass('active');
		          //           }
	           //      	},
	           //      	error: function(e){
	           //      		alert(e);
	           //      	}
         			// })
	            }
         		else{
         			// var topicid = $(this).attr("id-topic");
	                $.get('ajax/book-collection/'+topicid,function(data){
	                	if($('.content-product-list').hasClass(id_loai)){
		                    $(content).html(data);
		                    $(content).addClass('active');
		                    event_add_cart();
		                }

	                });
         		}
                
            });
         });
         
      </script>
      <style type="text/css"></style>
@endsection