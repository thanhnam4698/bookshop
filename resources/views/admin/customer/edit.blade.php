@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Người dùng
                    <small>Cập nhật</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('customer.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="txt_ten" placeholder="Nhập tên" value="{{ $user->name }}">
                        @if ($errors->has('txt_ten'))
                            <p class="text-danger">{{ $errors->first('txt_ten') }}</p>
                        @endif
                    </div>  

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" disabled="" value="{{ $user->email }}" class="form-control" name="txt_email" placeholder="Nhập email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" value="{{ $user->password }}" class="form-control" name="txt_password" placeholder="Nhập email">
                    </div>

                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input class="form-control" name="txt_sdt" placeholder="Số điện thoại"  value="{{ $user->phone }}">
                    </div>  
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" name="txt_diachi" placeholder="Địa chỉ" value="{{ $user->dia_chi }}">
                    </div>     
                    <div class="form-group">
                        <label>Phân quyền</label>
                        <select name="txt_phan_quyen" class="form-control">
                            <option value="" @if($user->phan_quyen != "admin") selected @endif>Người dùng</option>
                            <option value="admin" @if($user->phan_quyen == "admin") selected @endif>Quản trị viên</option>
                        </select>
                    </div>    
                        
                                              
                    <button type="submit" class="btn btn-default">Cập nhật</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection