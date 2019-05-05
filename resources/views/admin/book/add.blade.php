@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Book
                    <small>Add</small>
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
                <form action="admin/book/add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name (*)</label>
                        <input class="form-control" name="NameBook" placeholder="Please Enter Book Name">
                    </div>                            
                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" name="Avatar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Description (*)</label>
                        <textarea class="form-control {{-- ckeditor --}}" rows="6" name="Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <br>
                        <input type="text" name="Author" class="form-control" placeholder="Please enter Author name">
                        {{-- <select name="Author" id="author" class="form-control">
                            <option value=""></option>
                            @foreach($author as $au)
                                <option value="{{ $au->id }}" >{{ $au->ho_ten }}</option>
                            @endforeach
                        </select> --}}
                    </div>
                    <div class="form-group">
                        <label>Publisher</label>
                        <br>
                        <input type="text" name="Publisher" class="form-control" placeholder="Please enter Publisher name">
                        {{-- <select name="Publisher" class="form-control">
                            <option value=""></option>
                            @foreach($pub as $p)
                                <option value="{{ $p->id }}" > {{ $p->ten_nha_xb }} </option>
                            @endforeach
                        </select> --}}
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <br>
                        
                        <select name="Type" id="type" class="form-control">
                            <option value="" ></option>
                            @foreach($type as $t)
                                <option value="{{ $t->id }}" >{{ $t->ten_loai }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Topic</label>
                        <br>
                        
                        <select name="Topic" id="topic" class="form-control">
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <br>
                        
                        <select name="Content" id="content" class="form-control">
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Release Date</label>
                        <input class="form-control" name="ReleaseDate" placeholder="Please Enter ReleaseDate (YYYY_MM_DD)" />
                    </div>
                    <div class="form-group">
                        <label>Size</label>
                        <input class="form-control" name="Size" placeholder="Please Enter Book Size" />
                    </div>
                    <div class="form-group">
                        <label>Weight</label>
                        <input class="form-control" name="Weight" placeholder="Please Enter Book Weight" />
                    </div>
                    <div class="form-group">
                        <label>Page Number</label>
                        <input class="form-control" name="PageNumber" placeholder="Please Enter Page Number" />
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input class="form-control" name="Age" placeholder="Please Enter Age" />
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" name="Price" placeholder="Please Enter Book Price" />
                    </div>
                    <div class="form-group">
                        <label>Amount</label>
                        <input class="form-control" name="Amount" placeholder="Please Enter Amount" />
                    </div>
                    <div class="form-group">
                        <label>Other</label>
                        <input class="form-control" name="Other" placeholder="Please Enter Other Infor" />
                    </div>
                    <button type="submit" class="btn btn-default">Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>
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