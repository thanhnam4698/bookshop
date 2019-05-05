@extends('layouts.index')
@section('content')
<div id="main" class="wrapper">
   <div class="page-container container ">
      <div id="main-content" class="row">
         <div id="primary" class="site-content">
            <article>
               <div class="col-md-3">
                  @include('pages.auth.menu')
               </div>
               <div class="col-md-9">
                  <div class="breadcrumb clearfix">
                     <ul>
                        <li>
                           <span>Trang chủ</span>
                           <i class="fas fa-angle-double-right"></i>
                        </li>
                        <li>
                           <span>Xác Thực</span>
                        </li>
                     </ul>
                  </div>
                  <script type="text/javascript">
                     $(".link-site-more").hover(function () { $(this).find(".s-c-n").show(); }, function () { $(this).find(".s-c-n").hide(); });
                  </script>
                  <script src="/app/services/accountServices.js"></script>
                  <script src="/app/controllers/accountController.js"></script>
                  <div class="foget-password-content clearfix ng-scope" ng-controller="accountController" ng-init="initController()">
                     <h1 class="title"><span>Quên mật khẩu</span></h1>
                     <!-- ngIf: IsError -->
                     <!-- ngIf: IsSuccess -->
                     <!-- ngIf: InValid -->
                     <div class="alert alert-info fade in">
                        <button data-dismiss="alert" class="close"></button>
                        <i class="fa-fw fa fa-check"></i>
                        Điền vào email của bạn để yêu cầu một mật khẩu mới. Một Email sẽ được gửi đến địa chỉ này để xác minh địa chỉ Email của bạn.
                     </div>
                     <div class="col-md-8 col-md-offset-2 col-xs-12 col-sm-12 col-xs-offset-0 col-sm-offset-0">
                        <form class="form-horizontal ng-pristine ng-valid-email ng-invalid ng-invalid-required" ng-submit="forgetPassword()">
                           <div class="form-group">
                              <label class="col-sm-4 control-label">Email</label>
                              <div class="col-sm-8">
                                 <input type="email" class="form-control ng-pristine ng-untouched ng-valid-email ng-invalid ng-invalid-required" ng-model="Email" ng-required="true" required="required">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-sm-4 control-label">Mã xác nhận</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" ng-model="Captcha" ng-required="true" required="required">
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-sm-offset-4 col-sm-8">
                                 <img class="img-captcha" id="imgCaptcha" alt="captcha" src="/Captcha.ashx?t=1">
                                 <a class="refresh-captcha" id="btnRefreshCapcha" href="javascript:void(0);">
                                 <i class="fa fa-refresh fa-lg"></i>
                                 </a>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-sm-offset-4 col-sm-8">
                                 <button type="submit" class="btn button button-secondary">Gửi mật khẩu</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
                  <script type="text/javascript">
                     $(document).ready(function () {
                         $("#btnRefreshCapcha").click(function () {
                             GetImageCaptcha();
                         });
                     });
                     function GetImageCaptcha() {
                         var date = new Date();
                         var t = date.getTime();
                         $("#imgCaptcha").attr("src", "/Captcha.ashx?t=" + t);
                     }
                  </script>
               </div>
            </article>
         </div>
      </div>
   </div>
</div>
@endsection