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
		<div class="form-group col-md-6  div-cate-relative">
			<input class="form-control" type="text" name="keyword" value="{{$keyword}}"  placeholder="Tìm kiếm...">
			<button class="btn btn-sm btn-asl-form" type="submit">
				<i class="fa fa-search"></i>
			</button>
		</div>
		
	</form>
</div>
<table class="table table-hover table-bordered">
	<thead>
	<tr>
		<th>
			 #
		</th>
		<th>Name</th>
		<th>name_type</th>
		<th>Description</th>
		<th>Unit_price</th>
		<th>Promotion_price</th>
		<th>Image</th>
		<th>Unit</th>
		<th>New</th>
		<th>Created_at</th>
		<th>Update_at</th>
		<th>Tinh_trang</th>
		<th>
			<a href="{{ route('cate.add') }}" class="btn btn-success">
				<i class="fa fa-plus"></i>
				Thêm
			</a>
		</th>
	</tr>
	</thead>
	<tbody>
	@foreach($cates as $element)
		<tr>
			<td>
				 {{$loop->index +1}}
			</td>
			<!-- <td>
				{{$element->id}}
			</td> -->
			<td>
				{{$element->name}}
			</td>
			<td>
				{{$element->type_product}}
			</td>
			<td>
				{{$element->description}}
			</td>
			<td>
				{{$element->unit_price}}
			</td>
			<td>
				{{$element->promotion_price}}
			</td>
			<td>
				 <img src="{{asset($element->image)}}" width="70">
			</td>
			<td>
				{{$element->unit}}
			</td>
			<td>
				{{$element->new}}
			</td>
			<td>
				{{$element->created_at}}
			</td>
			<td>
				{{$element->updated_at}}
			</td>
			<td>
				{{$element->tinh_trang}}
			</td>
			
			<!-- <td class="hidden-480">
				 makr124
			</td> -->
			<td>
				<a href="{{ route('cate.edit', ['id' => $element->id]) }}" title="" class="btn btn-sm btn-primary">
					<i class="fa fa-pencil"></i>
				</a>
				<a href="javascript:;" onclick="confirmRemove('{{ route('cate.remove', ['id' => $element->id]) }}')" title="" class="btn btn-sm btn-danger">
					<i class="fa fa-remove"></i>
				</a>
				<!-- <a href="{{ route('cate.remove', ['id' => $element->id]) }}" title="" class="btn btn-sm btn-danger">
					<i class="fa fa-remove"></i>
				</a> -->
			</td>
		</tr>
	@endforeach
	<tr>
		<td colspan="13" class = "text-center">
			{{$cates->links()}}
		</td>
	</tr>
	</tbody>
</table>
@endsection
@section('js')
<script type="text/javascript">
	function confirmRemove(url){
		bootbox.confirm({
	    message: "Bạn có chắc chắn muốn xóa sản phẩm  này không",
	    buttons: {
	        confirm: {
	        	label: 'Có',
	            className: 'btn-danger'
	           
	        },
	        cancel: {
	             label: 'Không',
	            className: 'btn-primary'
	        }
	    },
	    callback: function (result) {
	       if(result) // neu result = true
	       {
	       		window.location.href= url;
	       }	
	    }
	});
	}
	$(document).ready(function(){
		$('#pageSize').on('change', function(){
			// Xử lý url mỗi khi select pagesize đc thay đổi giá trị
			// redirect trang sang url theo giá trị đc thay đổi
			$('#filterForm').submit();
		});
	});
</script>
@endsection