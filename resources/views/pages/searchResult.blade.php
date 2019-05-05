@extends('layouts.index')
@section('content')
<div id="main" class="wrapper">
   <div class="page-container container ">
      <div id="main-content" class="row">
         <div id="primary" class="site-content">
            <article>
               <div class="col-md-9">
                  <div class="breadcrumb clearfix">
                     <ul>
                        <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
                           <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                        </li>
                        <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="category17 icon-li">
                           <div class="link-site-more">
                              <a title="" href="/san-pham/thoi-trang-15148" itemprop="url">
                              <span itemprop="title"></span>
                              </a>
                           </div>
                        </li>
                     </ul>
                  </div>
                  <div id="main-content" class="product-content page_commerce">
                     <h1 class="title clearfix"><span></span></h1>
                     <div class="before-loop-wrapper hidden-xs">
                        <ul class="display hidden-xs gridlist-toggle">
                           <li id="grid" class="selected">
                              <a class="btn-tooltip" rel="nofollow" href="#" title="Grid">
                              <i class="fa fa-th-large"></i>
                              </a>
                           </li>
                           <li id="list">
                              <a class="btn-tooltip" rel="nofollow" href="#" title="List">
                              <i class="fa fa-th-list"></i>
                              </a>
                           </li>
                        </ul>
                        <div class="browse-tags pull-left">
                           <span>Sản phẩm/trang</span>
                           <span class="custom-dropdown custom-dropdown--white">
                              <select id="lblimit" name="lblimit" class="sort-by custom-dropdown__select custom-dropdown__select--white" onchange="window.location.href = this.options[this.selectedIndex].value">
                                 <option value="?limit=10">10</option>
                                 <option selected="selected" value="?limit=12">12</option>
                                 <option value="?limit=20">20</option>
                                 <option value="?limit=50">50</option>
                                 <option value="?limit=100">100</option>
                                 <option value="?limit=250">250</option>
                                 <option value="?limit=500">500</option>
                              </select>
                           </span>
                        </div>
                        <div class="browse-tags pull-right">
                           <span>Sắp xếp theo:</span>
                           <span class="custom-dropdown custom-dropdown--white">
                              <select class="sort-by custom-dropdown__select custom-dropdown__select--white" id="lbsort" onchange="window.location.href = this.options[this.selectedIndex].value">
                                 <option selected="selected" value="?sort=index&amp;order=asc">Mặc định</option>
                                 <option value="?sort=price&amp;order=asc">Giá tăng dần</option>
                                 <option value="?sort=price&amp;order=desc">Giá giảm dần</option>
                                 <option value="?sort=name&amp;order=asc">Tên sản phẩm: A to Z</option>
                                 <option value="?sort=name&amp;order=desc">Tên sản phẩm: Z to A</option>
                              </select>
                           </span>
                        </div>
                     </div>
                     <!--Kết thúc gird list -->
                     <div class="product_list grid row products-grid content-product-list products">
                     	@foreach($books as $book)
                        <section class="product  product-resize col-lg-3 col-md-3 col-sm-6 col-xs-6 fixheight" style="height: 298px;">
                           <div class="product-wrapper">
                              <div class="thumbnail-wrapper left-block">
                                 <a href="">
                                    <figure class="no-back-image image-resize" style="height: 233px;">
                                       <img src="upload/images/{{ $book->anh_bia }}" >
                                    </figure>
                                 </a>
                                 <div class="product-label">
                                    <span class="onsale">Hot</span>
                                 </div>
                                 <div class='product-group-button three-button'>
                                     <div class='loop-add-to-cart'>
                                        <a rel='nofollow' class='ajax_add_to_cart_button' idbook='{{$book->id}}'>
                                          <i class='fas fa-shopping-cart'></i>
                                        <span class='ts-tooltip button-tooltip'> Giỏ hàng </span>
                                        </a>
                                     </div>
                                     <div>
                                        <a href='/chitiet/{{ $book->id }}' class=''>
                                        <i class='fas fa-align-center'></i>
                                        <span class='ts-tooltip button-tooltip'>Chi tiết</span>
                                        </a>
                                     </div>
                                  </div>
                              </div>
                              <div class="meta-wrapper right-block">
                                 <div class="pr-0 product-contents">
                                    <h3 class="heading-title product-name">
                                       <a href="">{{ $book->ten_sach }}</a>
                                    </h3>
                                    <span class="price">
                                    <ins><span class="amount">{{ $book->gia_sach }}đ</span></ins>
                                    </span>
                                 </div>
                              </div>
                           </div>
                        </section>
                        @endforeach
                        {{ $books->links() }}
                     </div>
                     <!--Kết thúc sản phẩm-->
                  </div>
                  <!--Template--
                     --End-->
               </div>
               <div class="col-md-3">
                  <div class="menu-product ts-product-categories-widget">
                     <div type="button" class="collapsed" data-toggle="collapse" data-target="#category_menu" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <div class="title-wrapper">
                           <h3 class="hr_title heading-title"><a href="/san-pham/thoi-trang-15148" title="Thời trang"></a></h3>
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