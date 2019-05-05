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
                        <li class="icon-li"><strong>Thông tin tài khoản</strong> </li>
                     </ul>
                  </div>
                  <script src="/app/services/accountServices.js"></script>
                  <script src="/app/controllers/accountController.js"></script>
                  <div class="comunication-content clearfix ng-scope" ng-controller="accountController" ng-init="initPersonalController()">
                     <h1 class="title"><span>Thông tin tài khoản</span></h1>
                     <!-- ngIf: IsError -->
                     <!-- ngIf: IsSuccess -->
                     <!-- ngIf: InValid -->
                     <div class="col-md-8 col-md-offset-2 col-xs-12 col-sm-12 col-xs-offset-0 col-sm-offset-0">
                        <form class="form-horizontal ng-pristine ng-valid ng-valid-required" ng-submit="update()">
                           <h2>Thông tin tài khoản</h2>
                           <div class="form-group">
                              <label for="Email" class="col-sm-3 control-label">Email</label>
                              <div class="col-sm-9">
                                 <label class="control-label ng-binding">{{ Auth::guard('customer')->user()->email }}</label>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="Email" class="col-sm-3 control-label">Mật khẩu</label>
                              <div class="col-sm-9">
                                 <label class="control-label">***</label>
                                 <a href="/thay-doi-mat-khau.html"><i class="fa fa-edit"></i></a>
                              </div>
                           </div>
                           <h2>Thông tin cá nhân</h2>
                           <div class="form-group">
                              <label for="Name" class="col-sm-3 control-label">Họ tên</label>
                              <div class="col-sm-9">
                                 <input type="text" class="form-control ng-pristine ng-untouched ng-valid ng-valid-required" ng-model="Name" required="true">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-sm-3 control-label">Giới tính</label>
                              <div class="col-sm-9">
                                 <select class="form-control ng-pristine ng-untouched ng-valid" ng-model="GenderId" ng-options="item.Id as item.Name for item in Genders">
                                    <option value="number:0" label="Nữ" selected="selected">Nữ</option>
                                    <option value="number:1" label="Nam">Nam</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group form-inline">
                              <label class="col-sm-3 control-label">Ngày sinh</label>
                              <div class="col-sm-9">
                                 <input type="text" id="datepicker" name="" class="form-control">
                              </div>
                              
                           </div>
                           <div class="form-group">
                              <label for="" class="col-sm-3 control-label">Điện thoại</label>
                              <div class="col-sm-9">
                                 <input type="text" class="form-control ng-pristine ng-untouched ng-valid" ng-model="Phone">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="" class="col-sm-3 control-label">Địa chỉ</label>
                              <div class="col-sm-9">
                                 <input type="text" class="form-control ng-pristine ng-untouched ng-valid" ng-model="Address">
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-sm-offset-4 col-sm-8">
                                 <button type="submit" class="btn button button-secondary">Cập nhật</button>
                              </div>
                           </div>
                        </form>
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
         $(function(){
            $('#datepicker').datepicker();
         });
      })
      
   </script>
@endsection