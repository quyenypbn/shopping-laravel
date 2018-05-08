@extends('quantri')
@section('content')
<h1><span class="glyphicon glyphicon-book text-center text-danger" aria-hidden="true"> THỐNG KÊ SẢN PHẨM {{$type==3?"HẾT":"NHẬP"}}</span><br><br></h1>


<div class="row">
	<div class="container">
		<div class="tk">
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
				 <table class="table table-bordered table-hover">
				 	<thead>
				 		<tr>
				 			<th>ID</th>
				 			<th>Tên sản phẩm</th>
				 			<th>Đơn giá</th>
				 			<th>Số lượng</th>
				 			<th>Ngày nhập</th>
				 		</tr>
				 	</thead>
				 	<tbody>
				 		@foreach ($products as $product)
				 		
				 		<tr>
				 			<td>{{$product->id}}</td>
				 			<td>{{$product->name}}</td>
				 			<td>{{number_format($product->unit_price)}} vnđ</td>
				 			<td>{{$product->quantity}}</td>
				 			<td>{{$product->created_at}}</td>
				 		</tr>

				 		@endforeach
				 	</tbody>
				 </table>

			</div>
		</div>
	</div>
</div>
@endsection