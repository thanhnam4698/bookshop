@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Giỏ Hàng ID</th>
                        <th>Tên Sách</th>
                        <th>Số lượng</th>
                        <th>Tổng Tiền</th>
                        <th>Tổng Khối Lượng</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @if($cartDetail)
                        @foreach($cartDetail as $detail)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $detail->gio_hang_id }}</td>
                                <td>{{ $detail->bookdetail->ten_sach }}</td>
                                <td>{{ $detail->so_luong }}</td>
                                <td>{{ $detail->so_luong * $detail->bookdetail->gia_sach }}</td>
                                <td>{{ $detail->so_luong * $detail->bookdetail->khoi_luong }}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection