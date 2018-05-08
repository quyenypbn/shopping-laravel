@extends('quantri')
@section('content')
<h3>Mã hóa đơn: {{$model->id}}</h3>
	<table class="table table-hover table-bordered">
		<thead>
		<tr>
			<th>
				 #
			</th>
			<th>Ảnh</th>
			<th>Tên sản phẩm</th>
			<th>Giá sản phẩm</th>
			<th>Số lượng</th>
		</tr>
		</thead>
		<tbody>
		@foreach($detail as $element)
			<tr>
				<td>
					 {{$loop->index +1}}
				</td>
				<td>
					 <img src="{{asset($element->image)}}" width="70">
				</td>
				<td>
					{{$element->name}}
				</td>
				<td>
					{{$element->unit_price}}
				</td>
				<td>
					{{$element->quantity}}
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@endsection
