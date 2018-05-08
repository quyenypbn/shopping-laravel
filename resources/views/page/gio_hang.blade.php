@extends('master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th class="text-center">Đơn giá</th>
                        <th class="text-center">Tổng cộng</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                	@foreach ($carts as $cart)
                		<tr>
                        <td class="col-sm-8 col-md-4">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{{asset($cart->options->img)}}" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#"> {{$cart->name}}</a></h4>
                                
                                
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="text" row-id="{{$cart->rowId}}" data-id="{{$cart->id}}" class="form-control qty_item"  min="0" value="{{$cart->qty}}">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{number_format($cart->price)}} vnđ</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{number_format($cart->qty*$cart->price)}} vnđ</strong></td>
                        <td class="col-sm-1 col-md-2">
                        	<a onclick="return confirm('Bạn muốn xóa sản phẩm này');"  href="{{ route('deletecart',['rowid'=>$cart->rowId]) }}" title="">
                        <button type="button" class="btn btn-danger">
                            <span class="fa fa-close"></span> Xóa
                        </button></a></td>
                    </tr>
                	@endforeach
                    
                  
             
           
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td style="width:10%"><h3>Tổng cộng</h3></td>
                        <td><h3><strong>{{$cart_total}} vnđ</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        	<a href="{{ route('home') }}" title="">
                        <button type="button" class="btn btn-default">
                            <span class="fa fa-arrow-left"></span> Tiếp tục mua hàng
                        </button></a></td>
                        @if($cart_total!=0)
                        <td>
                        	<a href="{{ route('dat-hang-view') }}" title="">
                        <button type="button" class="btn btn-success">
                            Đặt hàng <span class="fa fa-arrow-right"></span>
                        </button></a></td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script-add-cart')
	<script type="text/javascript">
		$(function(){

$('.qty_item').each(function(){

     $(this).on('change', function () {
        rowid = $(this).attr('row-id');
        qty = $(this).val();
        id =$(this).attr('data-id');
         
        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
      
        $.post('{{ route('updatecart') }}',{rowid: rowid,id: id,qty: qty},function(res) {

            if(res.status == 200)
            {
                location.reload();
            }else
            {
                alert('sản phẩm không đủ số lượng');
            }
          
        });

      }); 
       
           
   });

});
			
	</script>
@endsection