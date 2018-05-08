@extends('master')
@section('content')
	<div class="content">
	 	<div class="container">
			<div class="row">
				<!-- ======= DANH MỤC TRAI ======= -->
				<div class="col-md-3">
					@include('sub.client.danh-muc-trai')
				</div>
				<!-- ============== END DANH MUC TRAI ======== -->

				<div class="col-md-9">
					<div class="content-cate">
						<div class="title-cate">
							<h4>TÌM KIẾM</h4>
							<p>Tìm thấy {{count($product)}} sản phẩm</p>
						</div>
						<div class="item-content">
								<div class="item-content-top">
									<div class="row">
										@foreach($product as $all)
											<div class="col-md-3 item-list">
												<div class="item-cate">
													<div class="item-content-img">
														<a href="{{route('chi-tiet-san-pham',$all->id)}}" title="">
															<img src="{{asset($all->image)}}" alt="">
														</a>
														@if($all->promotion_price !=0)
															<p>SALE</p>
														@endif
													</div>
													<div class="item-content-title title-cate-B">
														<h4>{{$all->name}}</h4>
														<div class="gia">
															@if($all->promotion_price == 0)
																<span class="gia-moi">{{number_format($all->unit_price)}}vnđ</span>
															@else
																<span class="gia-old">{{number_format($all->unit_price)}}vnđ</span>
																<span class="gia-moi">{{number_format($all->promotion_price)}}vnđ</span>
															@endif
														</div>
														<div class="item-btn">
															<a href="{{ route('addcart',['id'=>$all->id,'qty'=>1]) }}" >
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
				</div>
			</div>
		</div>
	</div>
@endsection