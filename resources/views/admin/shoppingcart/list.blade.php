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
                        <th>ID</th>
                        <th>Tên Tài Khoản</th>
                        <th>Tổng Trọng Lượng</th>
                        <th>Phí Vận Chuyển</th>
                        <th>Tổng Tiền </th>
                        <th>Họ Tên Người Nhận</th>
                        <th>Số Điện Thoại</th>
                        <th>Địa Chỉ</th>
                        <th>Tình Trạng</th>
                        <th>Detail</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @if($cart)
                        @foreach($cart as $cart)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $cart->id }}</td>
                                <td>{{ isset($cart->user->name) ? $cart->user->name : ""}}</td>
                                <td>{{ $cart->tong_trong_luong ? $cart->tong_trong_luong : "0" }}</td>
                                <td>{{ $cart->phi_van_chuyen ? $cart->phi_van_chuyen : "0" }}</td>
                                <td>{{ $cart->tong_tien ? $cart->tong_tien : "0" }}</td>
                                <td>{{ $cart->ho_ten_nguoi_nhan ? $cart->ho_ten_nguoi_nhan : "Chưa xác định" }}</td>
                                <td>{{ $cart->so_dien_thoai ? $cart->so_dien_thoai : "0000000000" }}</td>
                                <td>{{ $cart->dia_chi ? $cart->dia_chi : "Chưa xác định" }}</td>
                                <td>{{-- {{ $cart->tinh_trang ? $cart->tinh_trang : "Chưa đặt hàng" }} --}}
                                    <select class="selection_cart_state" idcart="{{ $cart->id }}" cart_state="{{ $cart->tinh_trang }}">
                                        <option value="Đã đặt hàng">
                                            Đã đặt hàng
                                        </option>
                                        <option value="Đã xác nhận">
                                            Đã xác nhận
                                        </option>
                                        <option value="Đã gửi hàng">
                                            Đã gửi hàng
                                        </option>
                                        <option value="Đã nhận hàng">
                                            Đã nhận hàng
                                        </option>
                                    </select>
                                </td>
                                <td class="center"><i class="fa fa-search fa-fw"></i><a href="admin/shoppingcart/shoppingcartdetail/list/{{ $cart->id }}"> Detail</a></td>
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

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".selection_cart_state").on('change',function(){
                var idcart = $(this).attr('idcart');
                var idstate = $(this).val();
                console.log(idstate);
                $.ajax({
                    url: '{{ route('admin.cartstate') }}',
                    data: {
                        id_cart: JSON.stringify(idcart),
                        id_state: JSON.stringify(idstate),
                    },
                    success:function(data){
                        console.log(data);
                    }
                })
            })
            $(".selection_cart_state").each(function(){
                var cart_state = $(this).attr("cart_state");
                console.log(cart_state);
                $(this).children().each(function(){
                    if($(this).val() == cart_state){
                        $(this).prop("selected","true");
                        console.log($(this).val());
                        
                    }
                })
            })
        })
    </script>

@endsection