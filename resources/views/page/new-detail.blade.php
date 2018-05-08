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
					<div class="new-detail-top detail-bottom">
						<div class="content">
								@foreach($news as $new)
							<div class="title">
								<h3 style="text-align: center;">{{$new->title}}</h3>
								
								<img src="{{asset($new->image)}}" alt="">
								<p>{{$new->content}}</p>
								<hr>
							</div>
							@endforeach
						</div>
					
					</div>
<!-- 					<div class="new-detail-bottom relative"> -->
						<div class="detail-bottom">
						<div class="detail-bottom-tilte">
						<h4>SẢN PHẨM KHUYẾN MÃI</h4>
						<div class="same-slide owl-carousel owl-theme">
							@foreach($sp_khuyenmai as $km)
					            <div class="item">
						           	<div class="item-cate">
										<div class="item-content-img">
											<a href="{{route('chi-tiet-san-pham',$km->id)}}" title=""><img src="{{asset($km->image)}}" alt=""></a>
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
					    </div>
					<!-- </div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection