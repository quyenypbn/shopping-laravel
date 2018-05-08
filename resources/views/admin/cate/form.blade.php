@extends('quantri')
@section('content')
<form id="cate-form" action="{{ route('cate.save') }}" method="post" enctype="multipart/form-data" novalidate>
	{{csrf_field()}}
	<input type="hidden" name="id" value="{{$model->id}}">
	<div class="col-md-6">
		<div class="form-group row">
			<lable class="col-md-3 control-lable"><b>Tên sản phẩm</b> <span class="text-danger">*</span> </lable>
			<div class="col-md-9">
				<input class="form-control" type="text" placeholder="Name" name="name" value="{{$model->name}}"></input>
			</div>
			@if(count($errors) > 0)
				<span class="text-danger">{{$errors->first('name')}}</span>
			@endif
		</div>
		<div class="form-group row">
			<lable class="col-md-3 control-lable"><b>Loại sản phẩm</b><span class="text-danger">*</span> </lable>
			<div class="col-md-9">
				<select name="id_type" class="form-control">
					<option value="-1">--------------</option>
					@foreach($type_pro as $element)
						<option 
							@if($model->id_type == $element->id) selected
							@endif 
							value="{{$element->id}}">
							{{$element->name}}
						</option>
					@endforeach
				</select>
			</div>
			@if(count($errors) > 0)
				<span class="text-danger">{{$errors->first('id_type')}}</span>
			@endif
		</div>
		<div class="form-group row">
			<lable class="col-md-3 control-lable"><b>Số lượng </b><span class="text-danger">*</span> </lable>
			<div class="col-md-9">
				<input class="form-control" type="number" min="0" placeholder="quantity" name="quantity" value="{{$model->quantity}}"></input>
			</div>
			@if(count($errors) > 0)
				<span class="text-danger">{{$errors->first('quantity')}}</span>
			@endif
		</div>
		<div class="form-group row">
			<lable class="col-md-3 control-lable"><b>Mô tả</b><span class="text-danger">*</span> </lable>
			<div class="col-md-9" contenteditable="true">

				<textarea name="description" id="editor">{{ $model->description }}</textarea>
			</div>
		</div>
		<div class="form-group row">
			<lable class="col-md-3 control-lable"><b>Giá sản phẩm</b><span class="text-danger">*</span> </lable>
			<div class="col-md-9">
				<input class="form-control" type="number" min="0" placeholder="unit_price" name="unit_price" value="{{$model->unit_price}}"></input>
			</div>
			@if(count($errors) > 0)
				<span class="text-danger">{{$errors->first('unit_price')}}</span>
			@endif
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="form-group row">
			<lable class="col-md-3 control-lable"><b>Giá khuyến mại</b><span class="text-danger">*</span> </lable>
			<div class="col-md-9">
				<input class="form-control" type="number" min="0" placeholder="promotion_price" name="promotion_price" value="{{$model->promotion_price}}"></input>
			</div>
			@if(count($errors) > 0)
				<span class="text-danger">{{$errors->first('promotion_price')}}</span>
			@endif
		</div>
		<div class="form-group row">
			<div class="col-md-offset-3">
				
				<img src="@if($model->image == "") 
						{{asset('uploads/default-img.jpg')}} 
					@else 
						{{asset($model->image)}} 
					@endif" id="exampleImage" width="100">
			</div>
			</div>
		<div class="form-group row">
			
			<label for="image" class="col-md-3 control-label"><b>Ảnh</b> </label>
			<div class="col-md-9">
				<input type="file" id="image" name="image" accept="image/*">
				@if(count($errors) > 0)
					<span class="text-danger">{{$errors->first('image')}}</span>
				@endif
			</div>
		</div>

		<div class="form-group row">
			<lable class="col-md-3 control-lable"><b>Loại</b> <span class="text-danger">*</span> </lable>
			<div class="col-md-9">
				<input class="form-control" type="text" placeholder="áo hoặc bộ" name="unit" value="{{$model->unit}}"></input>
			</div>
			@if(count($errors) > 0)
				<span class="text-danger">{{$errors->first('unit')}}</span>
			@endif
		</div>
		<div class="form-group row">
				<label class="col-md-3 control-label"><b>Sản phẩm mới</b></label>
				<div class="col-md-7">
					<input 
					@if($model->new == 1) checked @endif
					id="new" type="checkbox" name="new" value="1">
				</div>
			</div>
		<div class="form-group row">
			<lable class="col-md-3 control-lable"><b>Tình trạng</b><span class="text-danger">*</span> </lable>
			<div class="col-md-9">
				<input class="form-control" type="text" placeholder="tinh_trang" name="tinh_trang" value="{{$model->tinh_trang}}"></input>
			</div>
			@if(count($errors) > 0)
				<span class="text-danger">{{$errors->first('tinh_trang')}}</span>
			@endif
		</div>
	</div>
	<div class="text-center col-md-12">
		<a href="{{ route('cate.index') }}" class="btn btn-danger">Huỷ</a>
		<button type="submit" class="btn btn-success">Lưu</button>
	</div>

	<input type="hidden" id="ajaxToken" value="{{csrf_token()}}">
</form>
@endsection

@section('js')
<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(event){
				var tmppath = URL.createObjectURL(event.target.files[0]);
				$('#exampleImage').attr('src',tmppath);
			});
		
		$('#cate-form').validate({
			// chuoi json
			rules:{
				name:{
					required: true
					// checkExisted:{
					// 		requestUrl: "{{route('cate.checkName')}}",
					// 		modelId: "{{$model->id}}"
					// 	}
				},
				id_type: 'required',
				quantity: 'required',
				unit_price: 'required',
				promotion_price: 'required',
				unit: 'required',
				tinh_trang: 'required'
			},
			messages:{
				name:{
					required: 'Vui lòng nhập tên sản phẩm'
				},
				id_type:{
					required: 'Vui lòng nhập loại sản phẩm'
				},
				quantity:{
					required: 'Vui lòng nhập số lượng'
				},
				unit_price:{
					required: 'Vui lòng nhập giá sản phẩm'
				},
				promotion_price:{
					required: 'Vui lòng nhập giá khuyến mại'
				},
				unit:{
					required: 'Vui lòng nhập loại áo hoặc bộ'
				},
				tinh_trang:{
					required: 'Vui lòng nhập tình trạng'
				}
			},
			errorPlacement: function(error,element)
			{
				$(error).addClass('text-danger');
				 error.insertAfter(element); 
			}
		});
	});
</script>
@endsection