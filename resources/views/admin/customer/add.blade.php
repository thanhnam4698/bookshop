@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Người dùng
                    <small>Thêm mới</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('customer.store') }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="txt_ten" placeholder="Nhập tên" value="{{ old('txt_ten') }}">
                        @if ($errors->has('txt_ten'))
                            <p class="text-danger">{{ $errors->first('txt_ten') }}</p>
                        @endif
                    </div>   
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input class="form-control" name="txt_matkhau" placeholder="Nhập mật khẩu">
                    </div>  

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="txt_email" placeholder="Nhập email"
                        value="{{ old('txt_email') }}">
                        @if ($errors->has('txt_email'))
                            <p class="text-danger">{{ $errors->first('txt_email') }}</p>
                        @endif
                    </div>     

                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input class="form-control" name="txt_sdt" placeholder="Số điện thoại">
                    </div>  

                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" name="txt_diachi" placeholder="Địa chỉ">
                    </div>     
                    <div class="form-group">
                        <label>Phân quyền</label>
                        <select name="txt_phan_quyen" class="form-control">
                            <option value="">Người dùng</option>
                            <option value="admin">Quản trị viên</option>
                        </select>
                    </div>       
                                              
                    <button type="submit" class="btn btn-default">Thêm mới</button>
                   
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection