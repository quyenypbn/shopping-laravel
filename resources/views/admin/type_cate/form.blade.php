@extends('quantri')
@section('content')
<form id="type_cate_form" action="{{ route('type_cate.save') }}" method="post" enctype="multipart/form-data" novalidate>
	{{csrf_field()}}
	<input type="hidden" name="id" value="{{$model->id}}">
	<div class="col-md-6">

		<div class="form-group row">
			<lable class="col-md-3 control-lable">Tên loại sản phẩm <span class="text-danger">*</span> </lable>
			<div class="col-md-9">
				<input class="form-control" type="text" placeholder="Name" name="name" value="{{old('name',$model->name)}}"></input>
			</div>
			@if(count($errors) > 0)
				<span class="text-danger">{{$errors->first('name')}}</span>
			@endif
		</div>

		<div class="form-group row">
			<lable class="col-md-3 control-lable">Mô tả <span class="text-danger">*</span> </lable>
			<div class="col-md-9">
				<textarea name="description" id="editor">{{ $model->description }}</textarea>
			</div>
		</div>
	</div>

	<div class="col-md-6">
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
			<label for="image" class="col-md-3 control-label">Ảnh </label>
			<div class="col-md-9">
				<input type="file" id="image" name="image" accept="image/*">
				@if(count($errors) > 0)
					<span class="text-danger">{{$errors->first('image')}}</span>
				@endif
			</div>
		</div>
		<div class="text-center">
			<a href="{{ route('type_cate.index') }}" class="btn btn-danger">Huỷ</a>
			<button type="submit" class="btn btn-success">Lưu</button>
		</div>
	</div>
	<input name="_token" type="hidden" id="ajaxToken" value="{{csrf_token()}}">
</form>
@endsection

@section('js')
	<script type="text/javascript">
		$(document).ready(function(){
			$('#image').change(function(event){
				var tmppath = URL.createObjectURL(event.target.files[0]);
				$('#exampleImage').attr('src',tmppath);
			});
		
			$('type_cate_form').validate({
				rules:{
					name:{
						required: true,
						checkExisted:{
							requestUrl: "{{route('type_cate.checkName')}}",
							modelId: "{{$model->id}}"
						}
					}
				},
				messages:{
					name:{
						required : 'Vui lòng nhập tên loại sản phẩm'
					}
				},
				errorPlacement:function(error,element){
					$(error).addClass('text-danger');
					error.insertAfter(element);
				}
			});
		});
	</script>
@endsection