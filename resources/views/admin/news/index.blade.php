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
		<th>Title</th>
		<th>Content</th>
		<th>Image</th>
		<th>
			<a href="{{ route('news.add') }}" class="btn btn-success">
				<i class="fa fa-plus"></i>
				Thêm
			</a>
		</th>
	</tr>
	</thead>
	<tbody>
	@foreach($news as $element)
		<tr>
			<td>
				 {{$loop->index +1}}
			</td>
			<td>
				{{$element->title}}
			</td>
			<td>
				{{$element->content}}
			</td>
			<td>
				 <img src="{{asset($element->image)}}" width="70">
			</td>
			<td>
				<a href="{{ route('news.edit', ['id' => $element->id]) }}" title="" class="btn btn-sm btn-primary">
					<i class="fa fa-pencil"></i>
				</a>
				<a href="javascript:;" onclick="confirmRemove('{{ route('news.remove', ['id' => $element->id]) }}')" title="" class="btn btn-sm btn-danger">
					<i class="fa fa-remove"></i>
				</a>
			</td>
		</tr>
	@endforeach
	<tr>
		<td colspan="6" class = "text-center">
			{{$news->links()}}
		</td>
	</tr>
	</tbody>
</table>
@endsection
@section('js')
<script type="text/javascript">
	function confirmRemove(url){
		bootbox.confirm({
	    message: "Bạn có chắc chắn muốn xóa tin tức này không",
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