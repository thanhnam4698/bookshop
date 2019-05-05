@extends('layouts.index')
@section('content')
	<div id="main" class="wrapper">
	<div class="page-container container ">
		<div id="main-content" class="row">
			<div id="primary" class="site-content">
				<article>
					<div class="col-md-3">
					    <div class="menu-account ts-product-categories-widget">
					        <div type="button" class="collapsed" data-toggle="collapse" data-target="#category_menu" aria-expanded="false">
					            <span class="sr-only">Toggle navigation</span>
					            <div class="title-wrapper">
					                <h3 class="hr_title heading-title">Tài khoản</h3>
					            </div>
					        </div>
					        <div class="block_content navbar-collapse collapse" aria-expanded="false" id="category_menu">
					            <ul class="list-block product-categories tree dynamized" style="display: block;">
					                <li><a href="{{ route('home.login') }}"><i class="fa fa-sign-in"></i>Đăng nhập</a></li>
					                <li><a href="{{ route('home.register') }}"><i class="fa fa-key"></i>Đăng ký</a></li>
					                <!-- <li><a href=""><i class="fa fa-key"></i>Quên mật khẩu</a></li> -->
					            </ul>
					        </div>
					    </div>
					</div>
					<div class="col-md-9">
						<div class="breadcrumb clearfix">
						    <ul>
						        <li itemtype="" itemscope="" class="home">
						            <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
						        </li>
						        <li class="icon-li"><strong>Đăng nhập</strong></li>
						    </ul>
						</div>
					</div>
				</article>
			</div>
			<div class="login-content clearfix">
			  
			    <div class="col-md-6 ccol-xs-12 col-sm-12 ">
			        <form action="{{ route('home.register.post') }}" class="form-horizontal" method="POST">
			        	@csrf
			        	<div class="form-group">
			                <label for="Email" class="col-sm-4 control-label">Họ tên</label>
			                <div class="col-sm-8">
			                    <input type="text" class="form-control" value="{{ old('name') }}" required="required" name="name">
			                    @if ($errors->has('name')) 
									<p class="text-danger">{{ $errors->first('name') }}</p>
			                    @endif
			                </div>
			            </div>
			            <div class="form-group">
			                <label for="Email" class="col-sm-4 control-label">Email</label>
			                <div class="col-sm-8">
			                    <input type="email" class="form-control" value="{{ old('email') }}" required="required" name="email">
			                    @if ($errors->has('email')) 
									<p class="text-danger">{{ $errors->first('email') }}</p>
			                    @endif
			                </div>
			            </div>
			            <div class="form-group">
			                <label for="Email" class="col-sm-4 control-label">Số điện thoại</label>
			                <div class="col-sm-8">
			                    <input type="text" class="form-control" value="{{ old('phone') }}" required="required" name="phone">
			                    @if ($errors->has('phone')) 
									<p class="text-danger">{{ $errors->first('phone') }}</p>
			                    @endif
			                </div>
			            </div>
			            <div class="form-group">
			                <label for="Password" class="col-sm-4 control-label">Mật khẩu</label>
			                <div class="col-sm-8">
			                    <input type="password" class="form-control" required="required" name="password">
			                    @if ($errors->has('password')) 
									<p class="text-danger">{{ $errors->first('password') }}</p>
			                    @endif
			                </div>
			            </div>

			            <div class="form-group">
			                <label for="Password" class="col-sm-4 control-label">Nhập lại mật khẩu</label>
			                <div class="col-sm-8">
			                    <input type="password" class="form-control"  required="required" name="confirm_password">
			                    @if ($errors->has('confirm_password')) 
									<p class="text-danger">{{ $errors->first('confirm_password') }}</p>
			                    @endif
			                </div>
			            </div>
			            
			            <div class="form-group">
			                <div class="col-sm-offset-4 col-sm-8">
			                    <button type="submit" class="btn button button-secondary">Đăng kí tài khoản</button>
			                    <a href="/quen-mat-khau.html">Quên mật khẩu?</a>
			                </div>

			            </div>
			        </form>
			    </div>
			</div>
		</div>
	</div>
	
@endsection