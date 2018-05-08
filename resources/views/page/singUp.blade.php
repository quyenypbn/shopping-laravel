@extends('master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="singUp">
				@if(count($errors)>0)
					<div class="alert alert-danger">
						@foreach($errors->all() as $err);
							{{$err}}
						@endforeach
					</div>
				@endif
				@if(Session::has('thanhcong'))
					<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
				@endif
				<form action="{{route('singUp')}}" method="post" accept-charset="utf-8">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<h3 class="center">Đăng Ký</h3><br>
					<label>Email or Address</label> <input type="text" name="email"><br><br>
					<label>Full name</label> <input type="text" name="name"><br><br>
					<label>Address</label> <input type="text" name="address"><br><br>
					<label>Phone</label> <input type="number" name="phone"><br><br>
					<label>Password</label> <input type="password" name="password"><br><br>
					<label>Re password</label> <input type="password" name="re_password"><br><br>
					<button type="submit" class="btn right">Register</button>
				</form>
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>	
</div>

@endsection