@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Book
                    <small>{{ $book->ten_sach }}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                        
                            {{ $err }}<br>
                        
                        @endforeach
                    </div>                
                @endif
                @if(session('Information'))
                    <div class="alert alert-success">
                        {{ session('Information') }}
                    </div>
                @endif
                <form action="admin/book/edit/{{ $book->id }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="NameBook" value="{{ $book->ten_sach }}">
                    </div>                            
                    <div class="form-group">
                        <label>Images</label>
                        <p>
                        <img width="200px" src="upload/Images/{{ $book->anh_bia }}">
                        </p>
                        <input type="file" name="Avatar" class="form-control" value="{{ $book->anh_bia }}">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control {{-- ckeditor --}}" rows="6" name="Description">
                            {{ $book->gioi_thieu }}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <br>
                        
                        {{-- <input class="form-control" list="author" name="browser"
                            @foreach($author as $a)
                                @if($book->tac_gia->id == $a->id)
                                    placeholder="{{ $a->ho_ten }}"
                                @endif
                            @endforeach
                        >
                        <datalist name="Author" id="author">
                            @foreach($author as $au)
                                <option value="{{ $au->ho_ten }}" >
                            @endforeach
                        </datalist> --}}
                        <select name="Author" id="author" class="form-control" >
                            <option value=""></option>
                            @foreach($author as $au)
                                <option value="{{ $au->id }}"
                                    @if($book->tac_gia_id != "")
                                        @if($au->id == $book->tac_gia_id)
                                            selected="selected" 
                                        @endif
                                    @endif
                                >{{ $au->ho_ten }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Publisher</label>
                        <br>
                        <select name="Publisher" class="form-control">
                            <option value=""></option>
                            @foreach($pub as $p)
                                <option value="{{ $p->id }}" 
                                    @if($book->nha_xb_id != "")
                                        @if($p->id == $book->nha_xb_id)
                                            selected="selected" 
                                        @endif
                                    @endif
                                > {{ $p->ten_nha_xb }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Type Book {{ $book->noi_dung_id }}</label>
                        <br>
                        <select name="Type" id="type" class="form-control">
                            <option value=""></option>
                            @foreach($type as $t)
                                <option value="{{ $t->id }}" 
                                    @if($book->loai_sach_id != "")
                                        @if($t->id == $book->loai_sach_id)
                                            selected="selected" 
                                        @endif
                                    @endif
                                >{{ $t->ten_loai }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Topic Book</label>
                        <br>
                        <select name="Topic" id="topic" class="form-control">
                            <option value=""></option>
                            @foreach($topic as $tp)
                                <option value="{{ $tp->id }}"
                                    @if($book->noi_dung != "")
                                        @if($tp->id == $book->noi_dung->id)
                                     selected="selected"
                                        @endif
                                    @endif
                                >{{ $tp->ten_chu_de }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Content Book</label>
                        <br>
                        <select name="Content" id="content" class="form-control">
                            <option value=""></option>
                            @foreach($cont as $t)
                                <option value="{{ $t->id }}"
                                    @if($book->noi_dung_id != "")
                                        @if($t->id == $book->noi_dung_id)
                                         selected="selected"
                                         @endif
                                    @endif
                                >{{ $t->ten_noi_dung }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Release Date</label>
                        <input class="form-control" name="ReleaseDate" value="{{ $book->ngay_phat_hanh }}" />
                    </div>
                    <div class="form-group">
                        <label>Size</label>
                        <input class="form-control" name="Size" value="{{ $book->kich_thuoc }}" />
                    </div>
                    <div class="form-group">
                        <label>Weight</label>
                        <input class="form-control" name="Weight" value="{{ $book->trong_luong }}" />
                    </div>
                    <div class="form-group">
                        <label>Page Number</label>
                        <input class="form-control" name="PageNumber" value="{{ $book->so_trang }}" />
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input class="form-control" name="Age" value="{{ $book->do_tuoi }}" />
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" name="Price" value="{{ $book->gia_sach }}" />
                    </div>
                    <div class="form-group">
                        <label>Amount</label>
                        <input class="form-control" name="Amount" value="{{ $book->so_luong }}" />
                    </div>
                    <div class="form-group">
                        <label>Other</label>
                        <input class="form-control" name="Other" value="{{ $book->khac }}" />
                    </div>
                    <button type="submit" class="btn btn-default">Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection

@section('script')
    <script type="text/javascript">
        // $(document).ready(function(){
        //     alert("gdfh");
        //     $.get('admin/ajax/topic/'+typeid,{},function(data){
        //             alert(data);
        //         });
        // })
        $(document).ready(function(){
            $('#type').change(function(){
                var typeid = $(this).val();
                $.get('admin/ajax/topic/'+typeid,function(data){
                    
                    $('#topic').html(data);
                });
            });
            $('#topic').change(function(){
                var topicid = $(this).val();
                $.get('admin/ajax/content/'+topicid,function(data){
                    
                    $('#content').html(data);
                });
            });
        });
        
        // $('#topic').change(function(){
        //         var topicid = $(this).val();
        //         alert(topicid);
        //         $.ajax({
        //             type: "GET",
        //             url: 'admin/ajax/content/'+topicid;,
        //             dataType: "html",
        //             success: function(){
        //                 alert("success");
        //             },
        //             error: function(e){
        //                 console.error(e);
        //             }
        //         });
            
        // })
    </script>
@endsection