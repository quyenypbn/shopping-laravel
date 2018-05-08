@extends('master')
@section('content')
<div class="content">
	 	<div class="container">
			<div class="row">
			<div class="col-md-3">
				@include('sub.client.danh-muc-trai')
			</div>
				<!-- ============== END DANH MUC TRAI ======== -->
				<div class="col-md-9">
					<div class="detail-top">
						<h4>SẢN PHẨM: {{$sanpham->name}} </h4>

						<div class="row">
							<div class="col-md-6">
								<div id="sync1" class="owl-carousel">
				                    <div class="item">
				                    	<div class="sp_center">
				                    		<img src="{{asset($sanpham->image)}}"  alt="Owl Image">
				                    	</div>
				                    </div>
				                    <div class="item">
				                    	<div class="sp_center">
				                    		<img src="{{asset($sanpham->image)}}"  alt="Owl Image">
				                    	</div>
				                    </div>
				                    <div class="item">
				                    	<div class="sp_center">
				                    		<img src="{{asset($sanpham->image)}}"  alt="Owl Image">
				                    	</div>
				                    </div>
				                    <div class="item">
				                    	<div class="sp_center">
				                    		<img src="{{asset($sanpham->image)}}"  alt="Owl Image">
				                    	</div>
				                    </div>
				                    <div class="item">
				                    	<div class="sp_center">
				                    		<img src="{{asset($sanpham->image)}}"  alt="Owl Image">
				                    	</div>
				                    </div>				                 
				                </div>
				                <div id="sync2" class="owl-carousel">
				                    <div class="item"><img src="{{asset($sanpham->image)}}"  alt="Owl Image"></div>
				                    <div class="item"><img src="{{asset($sanpham->image)}}"  alt="Owl Image"></div>
				                    <div class="item"><img src="{{asset($sanpham->image)}}"  alt="Owl Image"></div>
				                    <div class="item"><img src="{{asset($sanpham->image)}}"  alt="Owl Image"></div>
				                    <div class="item"><img src="{{asset($sanpham->image)}}"  alt="Owl Image"></div>
				                </div>
							</div>
							<div class="col-md-6">
							
								<div class="row">
									<form action="{{-- {{route('themgiohang',$sanpham->id)}} --}}" method="get" accept-charset="utf-8">
									
									
										<div class="lable-detail-left col-xs-5">
											<p>Mã sản phẩm: </p>
											<p>Giá: </p><br/>
											<p>Tình trạng: </p><br/>
											
											<p>Mô tả sản phẩm: </p><br/>
											<p>Số lượng: </p><br/>
										</div>
										<div class="lable-detail-right col-xs-7">
											<p>{{$sanpham->id}} </p>
											<div class="gia">
												<p>
													@if($sanpham->promotion_price == 0)
														<span class="red">{{number_format($sanpham->unit_price)}} VNĐ</span><br>
													@else
														<span class="underline">{{number_format($sanpham->unit_price)}} VNĐ</span><br>
														<span class="red">{{number_format($sanpham->promotion_price)}} VNĐ</span>
													@endif
												</p>
											</div><br>
											<p>{{$sanpham->tinh_trang}}</p><br/>
											<p>{{$sanpham->description}} </p><br/>
											<label>
												<ul>
													<li><input id="qty_id" type="number" value="1" name="qty" min="0"></li >
													
													<li><a href="{{ route('addcart',['id'=>$sanpham->id,'qty'=>1]) }}" class="submit btn btn-warning" id="add-to-cart-id">Thêm vào giỏ</a></li>
												</ul>												
											</label><br/><br>
											
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="detail-middware">
			             <div class="panel with-nav-tabs panel-primary">
				            <div class="panel-heading">
				                    <ul class="nav nav-tabs">
				                        <li class="active"><a href="#tab1primary" data-toggle="tab">Chi tiết sản phẩm</a></li>
				                        <li><a href="#tab2primary" data-toggle="tab">Đánh giá</a></li>
				                    </ul>
				            </div>
				            <div class="panel-body">
				                <div class="tab-content">
				                    <div class="tab-pane fade in active" id="tab1primary">
				                    	<div class="title">
											<h3>{{$sanpham->name}}</h3>
											<p>{{$sanpham->description}} </p><br/>
											<img src="{{asset($sanpham->image)}}"  alt="Owl Image">
										</div>
				                    </div>
				                    <div class="tab-pane fade" id="tab2primary">
			                    	    <div class="row">
										    <div class="col-xs-6">
									        	<p>Đánh giá sản phẩm</p>
									            <div id="stars" class="starrr"></div>
										    </div>
										    <div class="col-xs-6">
										        <p>Nội dung đánh giá</p>
										       <textarea name="desc" id="editor"></textarea>
										       <button type="submit" class="btn gui-danh-gia">Gửi đánh giá</button>
										    </div>
										</div>
				                    </div>
				                </div>
				            </div>
				         </div>

					</div>
					<div class="comment-facebook">
						<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5"></div>
						<div class="help">
							<h3><span class="bold"> HÌNH THỨC THANH TOÁN - ĐẶT HÀNG - CHUYỂN HÀNG</span></h3>
							<p><span class="bold">1. Đặt hàng:</span></p><br>
							<p>Add 1 : 95B Lý Nam Đế - 024.66822225</p><br>
							<p>Add 2 : 297 phố Huế - 024.66802468</p><br>
							<p>Trực tiếp trên web (Hanhstore sẽ liên lạc lại để xác nhận đơn hàng của bạn)</p><br>
							<p>Hotline : 01228211211</p><br>
							<p>Qua FB : www.facebook.com/hanhstore86</p><br>
							<p>Với 1 số mặt hàng order không có sẵn như whoo , ohui , sulwhasoo , mỹ phẩm từ duty free Hàn... các bạn qua cửa hàng đặt cọc hoặc chuyển khoản trước 50% đến 100% tiền hàng.</p><br>
							<p><span class="bold">2. Trong nội thành Hà Nội : nhận hàng thanh toán trực tiếp với người giao hàng (bao gồm cả tiền ship hàng)</span></p><br>
							<p><span class="bold">3. Ngoài Hà Nội :Sau khi shop xác nhận đơn hàng của bạn.Chuyển khoản 100% tiền hàng (hoặc bao gồm cả tiền ship chuyển phát nhanh) vào một trong 2 số tài khoản sau</span></p><br>

							<p>Vietcombank : 0021001959796 - chi nhánh Hà Nội</p>
							<p>Agri bank : 1502205134207 - chi nhánh Hoàn Kiếm</p>
							<p>Chủ tài khoản : Nguyễn Bích Hạnh</p>
							<p>- Xác nhận chuyển khoản , HS sẽ có trách nhiệm gửi hàng bằng dịch vụ chuyển phát nhanh đến địa chỉ bạn yêu cầu
							</p><br>
							<p>4. Thời gian nhận hàng:</p><br>

							<p>Nội thành HN là 1 ngày bằng hình thức chuyển qua shipper (hoặc tùy vào thời gian giao hàng khách hàng mong muốn) Các tỉnh khác tùy thuộc vào địa điểm từ 1 đến 4 ngày và hàng được chuyển bằng dịch vụ chuyển phát nhanh GNN</p><br>
						</div>
					</div>
					<div class="detail-bottom">
						<div class="detail-bottom-tilte">
						<h4>SẢN PHẨM CÙNG LOẠI</h4>
						<div class="same-slide owl-carousel owl-theme">
				            @foreach($sp_tuongtu as $sptt)
					            <div class="item">
						           	<div class="item-cate">
										<div class="item-content-img">
											<a href="{{route('chi-tiet-san-pham',$sptt->id)}}" title="">
												<img src="{{asset($sptt->image)}}" alt="">
											</a>
											@if($sptt->promotion_price !=0)
												<p>SALE</p>
											@endif
										</div>
										<div class="item-content-title title-cate-B">
											<h4>{{$sptt->name}}</h4>
											<div class="gia">
												@if($sptt->promotion_price == 0)
													<span class="gia-moi">{{number_format($sptt->unit_price)}}vnđ</span>
												@else
													<span class="gia-old">{{number_format($sptt->unit_price)}}vnđ</span>
													<span class="gia-moi">{{number_format($sptt->promotion_price)}}vnđ</span>
												@endif
											</div>
											<div class="item-btn">
												<a href="{{ route('addcart',['id'=>$sptt->id,'qty'=>1]) }}" class="btn btn-warning">Mua ngay
												</a>
											</div>
										</div>
									</div>
					            </div>
					        @endforeach			
					      </div>
					    </div>
					</div>
				</div>
			</div>
		</div>
	 </div>

	 
@endsection
@section('script-add-cart')
	<script type="text/javascript">
		$(function(){

			var value = $("#qty_id").val();
$("#qty_id").on('keyup change click', function () {
    if(this.value !== value) {
        value = this.value;

        href = "them-san-pham/"+"{{$sanpham->id}}"+"/"+value;
        $('#add-to-cart-id').attr('href',href);
       
     }        
   });

		});
	</script>
@endsection