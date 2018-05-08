@extends('quantri')
@section('content')
<form id="cate-form" action="{{ route('cate.add') }}" method="post" enctype="multipart/form-data" novalidate>
	{{csrf_field()}}
	<div class="col-md-6">
		<div class="form-group row">
			<lable class="col-md-3 control-lable">ID <span class="text-danger">*</span> </lable>
			<div class="col-md-9">
				<input class="form-control" type="number" placeholder="ID" name="id" value="{{$model->id}}"></input>
				<!-- <span class="help-block">A block of help text. </span> -->
			</div>
		</div>
		<div class="form-group row">
			<lable class="col-md-3 control-lable">Name <span class="text-danger">*</span> </lable>
			<div class="col-md-9">
				<input class="form-control" type="text" placeholder="Name" name="name" value="{{$model->name}}"></input>
				<!-- <span class="help-block">A block of help text. </span> -->
			</div>
		</div>
		<div class="form-group row">
			<lable class="col-md-3 control-lable">Description <span class="text-danger">*</span> </lable>
			<div class="col-md-9">
				<textarea name="description" id="editor">{{$model->description}}</textarea>
				<!-- <span class="help-block">A block of help text. </span> -->
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group row">
			<div class="col-md-offset-3">
				
			<!-- 	<img src="@if($model->image == "") 
						{{asset('uploads/default-img.jpg')}} 
					@else 
						{{asset($model->image)}} 
					@endif" id="exampleImage" width="200"> -->
			</div>
			</div>
		<div class="form-group row">
			
			<label for="image" class="col-md-3 control-label">Ảnh </label>
			<div class="col-md-9">
				<input type="file" id="image" name="image" accept="image/*">
				<!-- @if(count($errors) > 0)
					<span class="text-danger">{{$errors->first('image')}}</span>
				@endif -->
			</div>
		</div>
		<div class="text-center">
			<a href="{{ route('cate.index') }}" class="btn btn-danger">Huỷ</a>
			<button type="submit" class="btn btn-success">Lưu</button>
		</div>
	</div>
	
</form>
@endsection