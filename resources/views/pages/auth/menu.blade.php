<div class="menu-account ts-product-categories-widget">
    <div type="button" class="collapsed" data-toggle="collapse" data-target="#category_menu" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <div class="title-wrapper">
            <h3 class="hr_title heading-title">Tài khoản</h3>
        </div>
    </div>
    <div class="block_content navbar-collapse collapse" aria-expanded="false" id="category_menu">
        <ul class="list-block product-categories tree dynamized" style="display: block;">
            <li><a href="{{ route('user.login') }}"><i class="fa fa-sign-in"></i>Đăng nhập</a></li>
            <li><a href="{{ route('user.register') }}"><i class="fa fa-key"></i>Đăng ký</a></li>
            <li><a href="{{ route('user.verify') }}"><i class="fa fa-key"></i>Quên mật khẩu</a></li>
        </ul>
    </div>
</div>