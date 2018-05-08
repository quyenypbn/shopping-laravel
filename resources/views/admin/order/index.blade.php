@extends('quantri')
@section('content')
<div class="search-form">
	<form action="" method="get" id="filterForm">
		<div class="page-size form-group col-xs-2">
			<select id="pageSize" name="pagesize" class="form-control">
				@foreach(getPageSizeList() as $ps)
					<option @if($pageSize == $ps) selected @endif value="{{$ps}}">{{$ps}}</option>
				@endforeach
			</select>
		</div>
	{{-- 	<div class="form-group col-md-6  div-cate-relative">
			<input class="form-control" type="text" name="keyword" value="{{$keyword}}"  placeholder="Tìm kiếm...">
			<button class="btn btn-sm btn-asl-form" type="submit">
				<i class="fa fa-search"></i>
			</button>
		</div> --}}
		
	</form>
</div>
<table class="table table-hover table-bordered">
	<thead>
	<tr>
		<th rowspan="2" class = "text-center">
			 #
		</th>
		<th  rowspan="2" class = "text-center">ID</th>
		<th colspan="5" class = "text-center">
			Thông tin khách hàng
		</th>
		<th  rowspan="2" style="text-align: center;">Thao tác</th>
	</tr>
	<tr>
		
		<th>Tên khách hàng</th>
		
		<th >Email</th>
		<th>Tổng cộng</th>
		<th>Ngày đặt hàng</th>
		<th>Trạng thái</th>
	</tr>
	</thead>
	<tbody>
	@foreach($orders as $element)
		<tr>
			<td>
				 {{$loop->index +1}}
			</td>
			<td>
				{{$element->bill}}
			</td>
			<td>
				{{$element->name}}
			</td>
			
			<td style="width:20% !important">
				{{$element->email}}
			</td>
			<td>
				{{ number_format($element->total) }} vnđ
			</td>
			
			<td>
				{{$element->created_at}}
			</td>
			@if ($element->status==0)
			<td><span class="label label-warning">Chưa thanh toán</span></td>
			@elseif($element->status==1)
			<td><span class="label label-success">Đã thanh toán</span></td>
			@elseif($element->status==2)
			<td><span class="label label-danger">Đã hủy</td>
			@endif
			@if ($element->status==0)
			<td style="text-align: center;">
				<a href="{{ route('xacnhan',['id'=>$element->bill]) }}" class="btn btn-success btn-sm" onclick="return confirm('Bạn muốn xác nhận thanh toán đơn hàng !');"><i class="fa fa-check"></i></a>
				<a href="{{ route('huydonhang',['id'=>$element->bill]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Bạn muốn hủy đơn hàng !');"><i class="fa fa-close"></i></a>
				<a href="{{ route('order.detail', ['id' => $element->bill]) }}" title="" class="btn btn-sm btn-primary">
					<i class="fa fa-eye"></i>
				</a>
			</td>
			@else
			<td style="text-align: center;">
				
				<a href="{{ route('order.detail', ['id' => $element->bill]) }}" title="" class="btn btn-sm btn-primary">
					<i class="fa fa-eye"></i>
				</a>
			</td>
			@endif
		</tr>
	@endforeach
	<tr>
		<td colspan="10" class = "text-center">
			{{$orders->links()}}
		</td>
	</tr>
	</tbody>
</table>
@endsection
@section('js')
<script type="text/javascript">
	$(document).ready(function(){
		$('#pageSize').on('change', function(){
			// Xử lý url mỗi khi select pagesize đc thay đổi giá trị
			// redirect trang sang url theo giá trị đc thay đổi
			$('#filterForm').submit();
		});
	});
</script>
@endsection