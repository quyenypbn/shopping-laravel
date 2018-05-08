@extends('quantri')
@section('content')
<div class="search-form">
	<form action="" method="get" id="filterForm">
		<div class="page-size form-group col-xs-2">
			<select id="pageSize" name="pagesize" class="form-control">
				@foreach (getPageSizeList() as $ps)
					<option @if($pageSize == $ps) selected @endif value="{{$ps}}">{{$ps}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group col-md-6  div-cate-relative">
			<input class="form-control" type="text" name="keyword"  value="{{$keyword}}"  placeholder="Tìm kiếm...">
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
		<th>Full name</th>
		<th>Email</th>
		<th>Phone</th>
		<th>Address</th>
		<th></th>
	</tr>
	</thead>
	<tbody>
	@foreach($users as $element)
		<tr>
			<td>
				 {{$loop->index +1}}
			</td>
			<td>
				{{$element->full_name}}
			</td>
			<td>
				{{$element->email}}
			</td>	
			<td>
				{{$element->phone}}
			</td>	
			<td>
				{{$element->address}}
			</td>	
			<td style="text-align: center;">
				<a href="javascript:;" onclick="confirmRemove('{{ route('user.remove', ['id' => $element->id]) }}')" title="" class="btn btn-sm btn-danger" >
					<i class="fa fa-remove"></i>
				</a>
			</td>
		</tr>
	@endforeach
	<tr>
		<td colspan="6" class = "text-center">
			{{$users->links()}}
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
	function confirmRemove(url){
		bootbox.confirm({
	    message: "Bạn có chắc chắn muốn xóa khách hàng  này không",
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
</script>
@endsection