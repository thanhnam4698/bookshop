@extends('admin.layout.index')
@section('content')
<div id="page-wrapper" style="display: inline-block;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Book
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th width="200px">Description</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Type</th>
                        <th>Topic</th>
                        <th>Content</th>
                        <th>Release Date</th>
                        <th>Rate</th>
                        <th>Size</th>
                        <th>Weight</th>
                        <th>Page Number</th>
                        <th>Age</th>
                        <th>Price</th>
                        <th>Amount</th>
                        <th>Other</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($book as $b)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $b->id }}</td>
                        <td>{{ $b->ten_sach }}</td>
                        <td><img width="100px" src="upload/images/{{ $b->anh_bia }}"></td>
                        <td class="description">{{ $b->gioi_thieu }}</td>
                        <td>
                            @if($b->tac_gia != "")
                                {{  $b->tac_gia->ho_ten }}
                            @endif
                        </td>
                        <td>
                            @if($b->nha_xb !="")
                                {{ $b->nha_xb->ten_nha_xb }}
                            @endif
                        </td>
                        <td>
                            @if($b->noi_dung != "")
                                {{ $b->noi_dung->booktopic->booktype->ten_loai }}
                            @endif
                        </td>
                        <td>
                            @if($b->noi_dung != "")
                                {{ $b->noi_dung->booktopic->ten_chu_de }}
                            @endif
                        </td>
                        <td>
                            @if($b->noi_dung != "")
                                {{ $b->noi_dung->ten_noi_dung }}
                            @endif
                        </td>
                        <td>{{ $b->ngay_phat_hanh }}</td>
                        <td>{{ $b->danh_gia }}</td>
                        <td>{{ $b->kich_thuoc }}</td>
                        <td>{{ $b->trong_luong }}</td>
                        <td>{{ $b->so_trang }}</td>
                        <td>{{ $b->do_tuoi }}</td>
                        <td>{{ $b->gia_sach }}</td>
                        <td>{{ $b->so_luong }}</td>
                        <td>{{ $b->khac }}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/book/delete/{{ $b->id }}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/book/edit/{{ $b->id }}">Edit</a></td>
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

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            
            
            //   var element = document.getElementsByClassName('description')
              
            //   for (var i = 0; i < element.length; i++) {

            //       truncated = element[i].innerText;
                  
                      
            //     if (truncated.length > 107) {
                    
            //         truncated = truncated.substr(0,107) + '...';
            //                             }
                
            //     }
            
            });   
    </script>
    
@endsection