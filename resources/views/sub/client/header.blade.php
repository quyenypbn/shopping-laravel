<!DOCTYPE html>
<html>
<head>
	<title>thoi trang</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<base href="{{asset('')}}">
	
	<link rel="stylesheet" href="source/assets/dest/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="source/assets/dest/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="source/assets/dest/css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="source/assets/dest/css/owl.theme.css">
	<link rel="stylesheet" type="text/css" href="source/assets/dest/css/owl.transitions.css">
	<link rel="stylesheet" type="text/css" href="source/assets/dest/css/style.css">
	<link rel="stylesheet" type="text/css" href="source/assets/dest/css/style-cate-news.css">
	<style type="text/css" media="screen">
	.cartt:hover{
		text-decoration: underline;
	}
		
	</style>
	}
</head>
<body>
	<!-- HEADER -->
	<div class="header">
		<div class="header1">
			<div class="container">
				<ul>
					<?php use Cart as CART; ?>
              
					@if(CART::content())
					<li class="click-giohang">

						<span class="cartt" style="color: white; cursor: pointer;" title="" ><i style="font-size: 22px" class="fa fa-shopping-cart"></i> ( {{CART::count() }} sản phẩm )</span>
						<div class="giohang-hiddent">
							<ul>
							
								@foreach(CART::content() as $cart)
									<li>
										<div class="giohang-img">
											 
											<img src="{{ asset($cart->options->img)}}" alt="">
										</div>
										<div class="giohang-title">

											<p>{{$cart->qty}} x {{ number_format($cart->price)}} (vnđ)</p>
											<a href="{{ route('chi-tiet-san-pham',['id'=>$cart->id]) }}">{{$cart->name}}</a>
										</div>

										<div class="giohang-close">
											<a onclick="return confirm('Bạn muốn xóa sản phẩm này');"  href="{{ route('deletecart',['rowid'=>$cart->rowId]) }}" title="">
												<i class="fa fa-window-close" aria-hidden="true"></i>
											</a>
											

										</div>
										
									</li>
								@endforeach
								
								<li class="right">
									<p>Tổng tiền: {{CART::total()}} (vnđ)</p>

								</li>
								@if (CART::total()!=0)
							
								<li class="center">
									<a href="{{ route('viewcart') }}" title="">
										<button class="btn" >Xem giỏ hàng</button>
									</a>
									<a href="{{route('dat-hang-view')}}" title="">
										<button class="btn" type="submit">Đặt hàng</button>
									</a>
								</li>

								@endif
							</ul>								
						</div>
					</li> 
					@endif
					
					@if(Auth::check())
						<li><a href="" title=""> Chào bạn {{Auth::user()->full_name}}</a></li>
						<li><a href="{{route('pagelogout')}}" title="">Đăng xuất</a></li>
					@else
						{{-- <li><a href="#" title="">Thanh toán</a></li> --}}
						<li><a href="{{route('pagelogin')}}" title="">Đăng nhập</a></li>
						<li><a href="{{route('singUp')}}" title="">Đăng ký</a></li>
					@endif
				</ul>
			</div>

		</div>
		<div class="header2">
			<div class="container">
				<div class="row">
					<div class="col-md-4 logo">
						<img src="source/image/images/logo.png" alt="">
					</div>
					<div class="col-md-2 col-xs-6 item">
						<a href="#" title="">
							<div class="item-icon">
								<i class="fa fa-refresh fa-2x" aria-hidden="true"></i>
							</div>
							<div class="item-title">
								<p>Sản phẩm chính hãng</p>
							</div>
						</a>
					</div>
					<div class="col-md-2 col-xs-6 item">
						<a href="#" title="">
							<div class="item-icon">
								<i class="fa fa-truck fa-2x" aria-hidden="true"></i>
							</div>
							<div class="item-title">
								<p>Giao hàng miễn phí</p>
							</div>
						</a>
					</div>
					<div class="col-md-2 col-xs-6 item">
						<a href="#" title="">
						<div class="item-icon">
								<i class="fa fa-credit-card fa-2x" aria-hidden="true"></i>
							</div>
							<div class="item-title">
								<p>Thanh toán linh hoạt</p>
							</div>
						</a>
					</div>
					<div class="col-md-2 col-xs-6 item">
						<a href="#" title="">
							<div class="item-icon">
								<i class="fa fa-phone-square fa-2x" aria-hidden="true"></i>
							</div>
							<div class="item-title">
								<p>Hotel: 0123456789</p>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="header3">
			<div class="container">
				<div class="row">
					<div class="col-md-8 header3-top">
						<div class="bg-menu-mobile"></div>
						<div class="navigation" > 
							<ul class="relative menu">
								<li><a  href="{{route('home')}}" title="">Trang chủ</a></li>
								<li class="menu-item-has-children relative"><a class="icon" href="" title="">Sản phẩm</a>
									<ul class="sub-menu absolute">
										@foreach($loai_sp as $loai)
											<li><a href="{{route('loai-san-pham',$loai->id)}}" title="">{{$loai->name}}</a></li>	
										@endforeach								
									</ul>
								</li>
								<li><a href="{{route('phu-kien')}}" title="">Phụ kiện</a>
									<!-- <ul class="sub-menu absolute">
										<li><a href="#" title="">Phụ kiện 1</a></li>
										<li><a href="#" title="">Phụ kiện 2</a></li>
										<li><a href="#" title="">Phụ kiện 3</a></li>
									</ul> -->
								</li>
								<li><a href="{{route('new-detail')}}" title="">News</a></li>
								<li><a href="{{route('lien-he')}}" title="">Liên hệ</a></li>
								<li><a href="{{route('dat-hang-view')}}" title="">Thanh toán và đặt hàng</a></li>
								<li><a href="{{route('khuyenmai')}}" title="">Khuyến mại</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-4 menu-mobile">
						<div class="row">
							
							<div class="col-xs-7 search">
								<form action="{{route('search')}}" method="get" accept-charset="utf-8">
									<input type="text" name="key" placeholder="Search...">
									<i class="fa fa-search" aria-hidden="true"></i>
								</form>
							</div>
							<div class="col-xs-5 hidden-lg but">
								<button type="button" class="menu-reposive">
									<i class="fa fa-bars fa-2x" aria-hidden="true"></i> Menu
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END HEADER -->
	<!-- TITLE PAGE -->
	<div class="title-page">
		<div class="container">
			<ol class="breadcrumb">
				
			</ol>
		</div>
	</div>
