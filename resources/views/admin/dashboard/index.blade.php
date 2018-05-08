@extends('quantri')
@section('content')
<h1><span class="glyphicon glyphicon-book text-center text-danger" aria-hidden="true"> THỐNG KÊ</span><br><br></h1>
<!-- <ul>
	<li><h4>THỐNG KÊ NGƯỜI SỬ DỤNG: {!!$stas_user!!}</h4></li><br>
	<li><h4>THỐNG KÊ LOẠI SẢN PHẨM: {!!$stas_type_product!!}</h4></li><br>
	<li><h4>THỐNG KÊ SẢN PHẨM: {!!$stas_product!!} </h4></li>
</ul> -->
<div class="row">
	<div class="col-md-3">
		<div class="dashboard-stat blue-madison">
			<div class="visual">
				<i class="fa fa-comments"></i>
			</div>
			<div class="details">
				<div class="number">
					{!!$stas_user!!}
				</div>
				<div class="desc">
					 NGƯỜI SỬ DỤNG
				</div>
			</div>
			<a class="more" href="{{route('user.index')}}">
			View more <i class="m-icon-swapright m-icon-white"></i>
			</a>
		</div>
	</div>
	<div class="col-md-3">
		<div class="dashboard-stat red-intense">
			<div class="visual">
				<i class="fa fa-bar-chart-o"></i>
			</div>
			<div class="details">
				<div class="number">
					 {!!$stas_type_product!!}
				</div>
				<div class="desc">
					LOẠI SẢN PHẨM
				</div>
			</div>
			<a class="more" href="{{route('type_cate.index')}}">
			View more <i class="m-icon-swapright m-icon-white"></i>
			</a>
		</div>
	</div>
	<div class="col-md-3">
		<div class="dashboard-stat green-haze">
			<div class="visual">
					<i class="fa fa-shopping-cart"></i>
			</div>
			<div class="details">
				<div class="number">
					{!!$stas_bill!!}
				</div>
				<div class="desc">
					ĐƠN HÀNG
				</div>
			</div>
			<a class="more" href="{{route('order.index')}}">
			View more <i class="m-icon-swapright m-icon-white"></i>
			</a>
		</div>
	</div>
	<div class="col-md-3">
		<div class="dashboard-stat purple-plum">
			<div class="visual">
				<i class="fa fa-globe"></i>
			</div>
			<div class="details">
				<div class="number">
					{!!$stas_product!!}
				</div>
				<div class="desc">
					SẢN PHẨM
				</div>
			</div>
			<a class="more" href="{{route('cate.index')}}">
			View more <i class="m-icon-swapright m-icon-white"></i>
			</a>
		</div>
	</div> 
</div> 
<div class="row">
	<div class="container">
		<div class="tk">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<form action="{{ route('st') }}" method="POST"  class="form-inline">
					<legend>Thống kê</legend>
						<div class="form-group">
							<label for="">Loại</label>
							<select name="type" id="input" class="form-control" required="required">
								<option value="1">Doanh thu</option>
								<option value="2">Sản phẩm nhập</option>
								<option value="3">Sản phẩm hết</option>
							</select>
						</div>

						<div class="form-group">
							<label for="">Từ ngày</label>
							<input type="date" name="start" class="form-control">
						</div>

						<div class="form-group">
							<label for="">Đến ngày</label>
							<input type="date" name="end" class="form-control">
						</div>
						
						<button type="submit" class="btn btn-primary">Xem</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection