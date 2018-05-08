@extends('quantri')
@section('content')
<h1><span class="glyphicon glyphicon-book text-center text-danger" aria-hidden="true"> THỐNG KÊ DOANH THU</span><br><br></h1>


<div class="row">
	<div class="container">
		<div class="tk">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				 <table class="table table-bordered table-hover">
				 	<thead>
				 		<tr>
				 			<th>ID</th>
				 			<th>Tên khách hàng</th>
				 			<th>Email</th>
				 			<th>Tổng tiền</th>
				 			<th>Ngày tạo</th>
				 		</tr>
				 	</thead>
				 	<tbody>
				 		@php
				 			$s=0;
				 		@endphp
				 			@foreach ($bills as $bill)
				 				
				 			<tr>

				 			<td>{{$bill->bill}}</td>
				 			<td>{{$bill->namecus}}</td>
				 			<td>{{$bill->email}}</td>
				 			<td>{{number_format($bill->total)}} vnđ</td>
				 			<td>{{$bill->created_at}}</td>
                            </tr>
                            @php
                            	$s+=$bill->total;
                            @endphp
				 			@endforeach
				 		
				 	</tbody>
				 </table>
             <h2>Doanh số từ <span style="color: red">{{date('d/m/Y',strtotime($bd))}}</span> đến <span style="color: red">{{date('d/m/Y',strtotime($kt))}}</span> đạt: <strong>{{number_format($s)}} vnđ</strong></h2>	
             <form action="{{ route('xuatexcel') }}" method="POST" class="form-inline" role="form">
                 <input type="hidden" name="start" value="{{$bd}}">
                 <input type="hidden" name="end" value="{{$kt}}">
                 <input type="hidden" name="type" value="1">
             	<button type="submit" class="btn btn-primary">Xuất excel</button>
             </form>
			</div>

		</div>
	</div>
</div>
@endsection