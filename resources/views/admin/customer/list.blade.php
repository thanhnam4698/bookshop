@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Người dùng
                    <small>Danh sách</small>
                </h1>
            </div>
            @if (Session::has('messages'))
            <div class="">
                <p class="text-success">{{ Session::get('messages') }}</p>
            </div>
            @endif
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th style="width: 70px">Thứ tự</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Phân Quyền</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                    <tr class="odd gradeX" align="center">
                        <td style="width: 70px">{{ $key + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->dia_chi }}</td>
                        <td>
                            @if($user->phan_quyen == "admin")
                                Quản trị viên
                            @else
                                Người Dùng
                            @endif
                        </td>
                        <td class="center">
                            <a style="margin-right: 5px" class="pull-left btn-info btn" 
                                href="{{ route('customer.edit', $user->id) }}">
                                <i class="fa fa-pencil fa-fw"></i> Cập nhật
                            </a>
                            <form class="pull-left" action="{{ route('customer.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method ('DELETE')
                                <button type="submit" onclick="confirm('Bạn có muốn xoá người dùng không?')" class="btn btn-danger"><i class="fa fa-trash fa-fw"></i>  Xoá</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection