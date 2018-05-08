@extends('master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="login">
				
				<form action="{{route('pagelogin')}}" method="post" accept-charset="utf-8">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					@if(Session::has('flag'))
						<div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
					@endif
					
					<h3 class="center">Đăng nhập</h3><br>
					<input type="text" name="email" placeholder="Email"><br><br>
					 <input type="password" placeholder="Password" name="password"><br><br>
					<button type="submit" class="btn right">Login</button>
				</form>
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>	
</div>

@endsection