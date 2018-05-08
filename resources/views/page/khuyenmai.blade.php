@extends('master')
@section('content')
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
					<h4>SẢN PHẨM KHUYẾN MÃI</h4>
					<p>Tìm thấy {{count($sp_khuyenmai)}} sản phẩm</p>
				</div>
				<div class="item-content">
						<div class="item-content-top">
							<div class="row">
								@foreach($sp_khuyenmai as $km)
									<div class="col-md-3 item-list">
										<div class="item-cate">
											<div class="item-content-img">
												<a href="{{route('chi-tiet-san-pham',$km->id)}}" title="">
													<img src="{{asset($km->image)}}" alt="">									
												</a>
												@if($km->promotion_price !=0)
													<p>SALE</p>
												@endif
											</div>
											
											<div class="item-content-title title-cate-B">
												<h4>{{$km->name}}</h4>
												<div class="gia">
													@if($km->promotion_price == 0)
														<span class="gia-moi">{{number_format($km->unit_price)}}vnđ</span>
													@else
														<span class="gia-old">{{number_format($km->unit_price)}}vnđ</span>
														<span class="gia-moi">{{number_format($km->promotion_price)}}vnđ</span>
													@endif
												</div>
												<div class="item-btn">
													<a href="{{ route('addcart',['id'=>$km->id,'qty'=>1]) }}" >
														<button type="button" class="btn">Mua ngay</button></a>
													</a>
												</div>
											</div>
										</div>
									</div>
								@endforeach	
							</div>
							<div class="row">{{$sp_khuyenmai->links()}}</div>
						</div>
				</div>
			</div>
			<!-- <div class="row">{{$sp_khuyenmai->links()}}</div> -->
		</div>
	</div>
</div>

@endsection