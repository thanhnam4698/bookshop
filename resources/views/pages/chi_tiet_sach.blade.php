@extends('layouts.index')

@section('content')
	
		<div class="container">
			<div class="content-main">
				<div class="row">
					<div class="product-wrapper col-sm-9">
						<div class="breadcrum row">
							<ul>

							</ul>
						</div>
					
						<div class="book-infor row content-product-list" >
							<div class="book-image col-sm-6">
								<img src="upload/images/{{ $book->anh_bia }}">
							</div>
							<div class="book-infor-tiny col-sm-6">
								<div class="book-name">
									<h2>{{ $book->ten_sach }}</h2>
								</div>
								<div class="book-infor-mega" class="book-price">
									<span class="cc-infor-price" style="font-size: 25px; color: #4dabf7; font-weight: bold;">{{ $book->gia_sach }}đ</span>
								</div>
								<div class="book-infor-mega" class="book-price" style="display: inline-block;">
									<span class="cc-infor-title">Đánh giá: </span>
									<span class="rating">
									    <span><input type="radio" name="rating" id="str5" value="5"><i class="fas fa-star"></i></span>
									    <span><input type="radio" name="rating" id="str4" value="4"><i class="fas fa-star"></i></span>
									    <span><input type="radio" name="rating" id="str3" value="3"><i class="fas fa-star"></i></span>
									    <span><input type="radio" name="rating" id="str2" value="2"><i class="fas fa-star"></i></span>
									    <span><input type="radio" name="rating" id="str1" value="1"><i class="fas fa-star"></i></span>
									</span>
									<span id="number_rating" style="color: blue; margin-right: 10px;"> {{ count($book->rating) }} lượt đánh giá </span>
								</div>
								<script type="text/javascript">
									$(document).ready(function(){
										var inp = $('input:radio');
										inp.each(function(index, value){
											if($(this).attr('value') == @json($book->danh_gia)){
												$(this).parent().addClass('checked');
											}
										})

								    	// Check Radio-box
								    @if(Auth::guard('customer')->id() != '')
									    $(".rating input:radio").attr("checked", false);

									    $('.rating input').click(function () {
									        $(".rating span").removeClass('checked');
									        $(this).parent().addClass('checked');
									    });
									@endif
									});


									$(document).ready(function(){
									    $('input:radio').change(
									      function(){
									        var userRating = this.value;
									        $.ajax({
									        	url: 'ajax/rating',
									        	data: {
									        		rating: JSON.stringify(userRating),
									        		id_user: {{ Auth::guard('customer')->id() != '' ? Auth::guard('customer')->id() : 0 }},
									        		id_sach: {{ $book->id }},
									        	},
									        	dataType: 'JSON',
									        	success:function(data){
									        		var point_rating = data[0];
									        		var number_rating = data[1];
									        		$('#number_rating').html( number_rating+' lượt đánh giá ')
									        		this.value = number_rating;
									        		var inp = $('input:radio');
													inp.each(function(index, value){
														if($(this).attr('value') == point_rating){
															$(this).parent().addClass('checked');
														}
													})
									        	},
									        	error:function(err){
									        		console.log(err);
									        	}
									        })
									    }); 
									});
								</script>
								<div class="book-infor-mega" name="book-author">
									<span class="cc-infor-title">Tác giả: </span>
									<span class="cc-infor-value">
										{{-- @if($book->tac_gia != "[]")
											{{ $book->tac_gia->ho_ten }}
										@endif --}}
									</span>
								</div>
								<div class="book-infor-mega" name="book-type">
									<span class="cc-infor-title">Thể loại: </span>
									<span class="cc-infor-value">
										@if($book->noi_dung_sach_id)
											{{ $book->noi_dung->ten_noi_dung }}
										@elseif($book->chu_de_sach_id)
											{{ $book->chu_de->ten_chu_de }}
										@elseif($book->loai_sach_id)
											{{ $book->loai_sach->ten_loai }}
										@endif
									</span>
								</div>
								<div class="book-infor-mega" name="book-publisher">
									<span class="cc-infor-title">Nhà xuất bản: </span>
									<span class="cc-infor-value">
										{{-- @if($book->nha_xb_id)
											{{ $book->nha_xb->ten_nha_xb }}
										@endif --}}
									</span>
								</div>
								<div class="book-infor-mega" name="book-size">
									<span class="cc-infor-title">Kích thước: </span>
									<span class="cc-infor-value">
										@if($book->kich_thuoc)
											{{ $book->kich_thuoc }}
										@endif
									</span>
								</div>
								<div class="book-infor-mega" name="book-pagenumber">
									<span class="cc-infor-title">Số trang: </span>
									<span class="cc-infor-value">
										@if($book->so_trang)
											{{ $book->so_trang }}
										@endif
									</span>
								</div>
								<div class="book-infor-mega" name="book-description">
									<span class="cc-infor-title">Giới thiệu: </span>
									<span class="cc-infor-description">
										{{ $book->gioi_thieu }}
									</span>
								</div>
								<div class="cc-submit-cart book-infor-mega content-product-list">
									<a class="btn btn-primary ajax_add_to_cart_button" idbook={{ $book->id }}>THÊM GIỎ HÀNG</a>
								</div>
							</div>
						</div>
					</div>
					<div class="ts-products-widget suggest-box col-sm-3">
						<div class="title-wrapper">
		                   <h3 class="hr_title heading-title">
		                      CÓ THỂ BẠN MUỐN XEM
		                   </h3>
		                </div>
						<div class="per-slide">
	                      <ul class="product_list_widget">
                             <li>
                                <a class="ts-wg-thumbnail" href="" title="">
                                <img src="upload/images/18660_15_02_19_81-an-tay-du-dai-duong-pham-thien-ky-tap-3.jpg" alt="">
                                </a>
                                <div class="ts-wg-meta">
                                   <a href="" title="">One Piece</a>
                                   <span class="price">
                                   <ins><span class="amount">500.000₫</span></ins>
                                   </span>
                                </div>
                             </li>
                             <li>
                                <a class="ts-wg-thumbnail" href="" title="">
                                <img src="upload/images/18660_15_02_19_81-an-tay-du-dai-duong-pham-thien-ky-tap-3.jpg" alt="">
                                </a>
                                <div class="ts-wg-meta">
                                   <a href="" title="">One Piece</a>
                                   <span class="price">
                                   <ins><span class="amount">500.000₫</span></ins>
                                   </span>
                                </div>
                             </li><li>
                                <a class="ts-wg-thumbnail" href="" title="">
                                <img src="upload/images/18660_15_02_19_81-an-tay-du-dai-duong-pham-thien-ky-tap-3.jpg" alt="">
                                </a>
                                <div class="ts-wg-meta">
                                   <a href="" title="">One Piece</a>
                                   <span class="price">
                                   <ins><span class="amount">500.000₫</span></ins>
                                   </span>
                                </div>
                             </li>
	                      </ul>
	                   </div>
					</div>
				</div>
				<div class="feedback-box row">
					<div class="feedback-head">
						<span>Bình luận</span>
					</div>
					@if(Auth::guard('customer')->check())
					<form action="/chitiet/comment/{{ Auth::guard('customer')->id() }}/{{ $book->id }}" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="feedback-input">
							<input type="text" class="form-control" name="content_cmt" placeholder="Bình luận ...">
							<button class="btn btn-primary">Bình luận</button>
						</div>
					</form>
					@else
					<form>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="feedback-input">
							<input type="text" class="form-control" name="content_cmt" placeholder="Để bình luận bạn phải đăng nhập">
							<button class="btn btn-primary">Bình luận</button>
						</div>
					</form>
					@endif
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
					<div class="feedback-list">
						<?php $rep_dis = 3 ?>
						@foreach($book->binh_luan as $cmt)
							<div class="feedback-content row">
								<div class="col-sm-1">
									<div class="user-avatar">
										<img src="assets/upload/images/default-avatar.png" class="img-thumbnail">
									</div>
								</div>
								<div class="col-sm-10">
									<div class="user-name row">
										<span>{{ $cmt->user->name }}</span>
									</div>
									
									<div class="user-feedback row">
										<span>{{ $cmt->noi_dung }}</span>
										@if(count($cmt->replycomment) > $rep_dis)
										<div class="load-more" style="margin: 5px;">
											<a href="javascript:(0)" class="load-more-item">Tải thêm bình luận!</a>
										</div>
										@endif
									</div>
									<div class="reply-box">
											@foreach($cmt->replycomment->slice(0,$rep_dis) as $rep)
												<div class="feedback-content row" style="margin: 10px 0 10px 5%;">
													<div class="col-sm-1">
														<div class="user-avatar">
															<img src="assets/upload/images/default-avatar.png" class="img-thumbnail">
														</div>
													</div>
													<div class="col-sm-10">
														<div class="user-name row">
															<span>{{ $rep->user->name }}</span>
														</div>
														<div class="user-feedback row">
															<span>{{ $rep->noi_dung }}</span>
														</div>
														
														<div class = "chinh_sua row">
														@if(Auth::guard('customer')->check())
															@if(Auth::guard('customer')->id() == $rep->user->id)
															
																<a id_cmt="{{ $rep->id }}" class ="edit_reply" href="javascript:(0)">
																	<span style="margin-right: 25px;">Chỉnh Sửa</span>
																</a>
																<a id_cmt="{{ $rep->id }}" class ="delete_comment" href="/chitiet/delete_reply/{{ $rep->id }}">
																	<span style="margin-right: 25px;">Xóa</span>
																</a>
															@endif
														@endif
														</div>
													</div>
												</div>
											@endforeach
										</div>
										<div class="admin-reply row" style="display: none; margin: 10px;">
											<form action="/chitiet/reply/{{ $cmt->id }}/{{ Auth::guard('customer')->id() }}" method="POST" style="display: inline-block;">
												@csrf 
												<input class="form-control" type="text" style="display: inline-block; margin-right: 10px" name="content_cmt" value="">
												<button type="submit" class="btn btn-primary">Trả lời</button>
											</form>
										</div>
									
									<div class = "chinh_sua row">
									@if(Auth::guard('customer')->check())
										@if(Auth::guard('customer')->id() == $cmt->user->id)
										
											<a id_cmt="{{ $cmt->id }}" class ="edit_comment" href="javascript:(0)">
												<span style="margin-right: 25px;">Chỉnh Sửa</span>
											</a>
											<a id_cmt="{{ $cmt->id }}" class ="delete_comment" href="/chitiet/delete_cmt/{{ $cmt->id }}">
												<span style="margin-right: 25px;">Xóa</span>
											</a>
										
										@endif
										@if(Auth::guard('customer')->user()->phan_quyen == "admin" || Auth::guard('customer')->id() == $cmt->user->id)
											<a id_cmt="{{ $cmt->id }}" class ="reply_comment" href="javascript:(0)">
												<span>Trả lời</span>
											</a>
										@endif
									@endif
									</div>
								</div>
							</div>						
						@endforeach
					</div>
				</div>	
			</div>
		</div>
	
@endsection

@section('script')
	<script type="text/javascript">
		$(document).ready(function(){
			var	string = @json($book->gioi_thieu);
     		var content = '.cc-infor-description';
            $(content).html(string);

            $('.edit_comment').on('click',function(){
            	var id = $(this).attr('id_cmt');
            	var old_content = $(this).parent().siblings('.user-feedback').children('span').text();
            	var html = '<form action="/chitiet/comment/'+id+'" method="POST" style="display: inline-block;">@csrf <input class="form-control" type="text" style="display: inline-block; margin-right: 10px" name="content_cmt" value="'+old_content+'"><button type="submit" class="btn btn-primary">Chỉnh Sửa</button></form>'
            	$(this).parent().siblings('.user-feedback').html(html);
            });
            $('.edit_reply').on('click',function(){
            	var id = $(this).attr('id_cmt');
            	var old_content = $(this).parent().siblings('.user-feedback').children('span').text();
            	var html = '<form action="/chitiet/reply/'+id+'" method="POST" style="display: inline-block;">@csrf <input class="form-control" type="text" style="display: inline-block; margin-right: 10px" name="content_cmt" value="'+old_content+'"><button type="submit" class="btn btn-primary">Chỉnh Sửa</button></form>'
            	$(this).parent().siblings('.user-feedback').html(html);
            });
         });
		$(document).ready(function(){

			$('.reply_comment').on('click',function(){
            	// var id = $(this).attr('id_cmt');
            	$(this).parent().siblings('.user-feedback').children('.admin-reply').css('display','block');
            })

            $('.load-more-item').on('click',function(){
            	<?php if(isset($rep_dis)){ $rep_dis += 3;} ?>;
            	// 
            	// $(this).parent().siblings('.reply-box').html(html)
            })
		})
	</script>
@endsection