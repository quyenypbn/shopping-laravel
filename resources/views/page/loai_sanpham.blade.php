
@extends('master')
@section('content')
	<!-- CONTENT -->
		<div class="content">
	 	<div class="container">
			<div class="row">
				<div class="col-md-3">
					@include('sub.client.danh-muc-trai')
				</div>
				<!-- ============== END DANH MUC TRAI ======== -->

				<div class="col-md-9">
					<div class="content-cate">
						<form action="" method="get" accept-charset="utf-8">
							<div class="cate-cart">
								<span class="cate-cart-top">
									<h4>GIÁ 
										<button type="reset"><i class="fa fa-times" aria-hidden="true"></i></button>
									</h4>
								</span>
								<span class="cate-cart-bottom">
									<span><input type="checkbox" name="">Dưới 100k</span>
									<span><input type="checkbox" name="">Từ 100k - 200k</span>
									<span><input type="checkbox" name="">200k - 500k</span>
									<span><input type="checkbox" name="">Trên 500k</span>
								</span>
							</div>
						</form>
					</div>
					<div class="content-cate">
						<div class="title-cate">
							<h4>CATEGORY</h4>
							<p>Loại sản phẩm:  {{$loai_sp->name}}</p>
							<div class="form">
								<button class="list-style"><i class="fa fa-th-list" aria-hidden="true"></i>List</button>
								<button class="grid-style Orange"><i class="fa fa-th" aria-hidden="true"></i>Grid</button>
								<span>Sắp xếp theo:</span>
								<select>
									<option value="">Bỏ lọc</option>
									<option value="">Giá giảm dần</option>
									<option value="">Giá tăng dần</option>
									<option value="">Theo tên</option>
								</select>
							</div>
						</div>
						<div class="item-content">
							<div class="item-content-top">
								<div class="row">
									@foreach($sp_theoloai as $sp)
										<div class="col-md-3 item-list">
											<div class="item-cate">
												<div class="item-content-img">
													<a href="{{route('chi-tiet-san-pham',$sp->id)}}" title="">
														<img src="{{asset($sp->image)}}" alt="">
													</a>
													@if($sp->promotion_price !=0)
														<p>SALE</p>
													@endif
												</div>
												<div class="item-content-title title-cate-B">
													<h4>{{$sp->name}}</h4>
													<div class="gia">
														@if($sp->promotion_price == 0)
															<span class="gia-moi">{{number_format($sp->unit_price)}} vnđ</span>
														@else
															<span class="gia-old">{{number_format($sp->unit_price)}} vnđ</span>
															<span class="gia-moi">{{number_format($sp->promotion_price)}}vnđ</span>
														@endif
													</div>
													<div class="item-btn">
														<a href="{{ route('addcart',['id'=>$sp->id,'qty'=>1]) }}" >
																<button type="button" class="btn">Mua ngay</button></a>
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

					<!-- sp khac -->
					<div class="content-cate">
						<div class="title-cate">
							<h4>SẢN PHẨM KHÁC</h4>
						</div>
						<div class="item-content">
							<div class="item-content-top">
								<div class="row">
									@foreach( $sp_khac as $spkhac)
										<div class="col-md-3 item-list">
											<div class="item-cate">
												<div class="item-content-img">
													<a href="{{route('chi-tiet-san-pham',$spkhac->id)}}" title="">
														<img src="{{asset($spkhac->image)}}" alt="">
													</a>
													@if($spkhac->promotion_price !=0)
														<p>SALE</p>
													@endif
												</div>
												<div class="item-content-title title-cate-B">
													<h4>{{$spkhac->name}}</h4>
													<div class="gia">
														@if($spkhac->promotion_price == 0)
															<span class="gia-moi">{{number_format($spkhac->unit_price)}} vnđ</span>
														@else
															<span class="gia-old">{{number_format($spkhac->unit_price)}} vnđ</span>
															<span class="gia-moi">{{number_format($spkhac->promotion_price)}}vnđ</span>
														@endif
													</div>
													<div class="item-btn">
														<a href="{{ route('addcart',['id'=>$spkhac->id,'qty'=>1]) }}" >
																<button type="button" class="btn">Mua ngay</button></a>
															</a>
												</a>
													</div>
												</div>
											</div>
										</div>
									@endforeach	
								</div>
								<div class="row">{{$sp_khac->links()}}</div>
							</div>
						</div>
					</div>
<!-- end sp khac -->
				</div>
			</div>
		</div>
	 </div>
@endsection