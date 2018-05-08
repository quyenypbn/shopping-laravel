@extends('master')
@section('content')
<div class="container">
	<div class="dat-hang">
    <form id="dat_hang_form" action="{{route('dat-hang')}}" method="post" accept-charset="utf-8">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <h4 style="color: orange">@if(Session::has('thongbao')){{Session::get('thongbao')}}@endif</h4>

        </div>
        <div class="col-md-4"></div>
      </div>
    <div class="row">
      <div class="col-md-8">
@php
  $user=Auth::user();
@endphp
        <h3 class="center">ĐẶT HÀNG</h3>
          <div class="form-group">
            <label class="col-md-3 control-label" for="name">Họ tên*</label>
            <div class="col-md-9">
              <input id="name" name="name" type="text" placeholder="Your name" class="form-control" value="{{Auth::check()?$user->full_name:null}}">
            </div>
            @if(count($errors) > 0)
              <span  class="text-danger">{{$errors->first('name')}}</span>
            @endif
          </div>
          <!-- gioi tinh -->
          <div class="form-group">
            <label class="col-md-3 control-label" for="name">Giới tính</label>
            <div class="col-md-9">
                <div class="left">
                  <input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked"><span>Nam</span>
                <input id="gender" type="radio" class="input-radio" name="gender" value="nữ"><span>Nữ</span>
                </div>
                @if(count($errors) > 0)
                  <span class="text-danger">{{$errors->first('gender')}}</span>
                @endif
            </div>
          </div>
          <!-- Email input-->
          <div class="form-group">
            <label class="col-md-3 control-label" for="email">Email*</label>
            <div class="col-md-9">
              <input id="email" value="{{Auth::check()?$user->email:null}}" name="email" type="text" placeholder="Your email" class="form-control">
            </div>
             @if(count($errors) > 0)
                <span class="text-danger">{{$errors->first('email')}}</span>
              @endif
          </div>
          <!-- dia chi -->
           <div class="form-group">
            <label class="col-md-3 control-label" for="address">Địa chỉ*</label>
            <div class="col-md-9">
              <input id="address" value="{{Auth::check()?$user->address:null}}" name="address" type="text" placeholder="Address" class="form-control">
            </div>
             @if(count($errors) > 0)
                <span class="text-danger">{{$errors->first('address')}}</span>
              @endif
          </div>
              <!--điện thoại  -->
          <div class="form-group">
            <label class="col-md-3 control-label" for="phone">Điện thoại*</label>
            <div class="col-md-9">
              <input id="phone" value="{{Auth::check()?$user->phone:null}}" name="phone" type="text" placeholder="Phone" class="form-control">
            </div>
             @if(count($errors) > 0)
                <span class="text-danger">{{$errors->first('phone')}}</span>
              @endif
          </div>
          <!-- ghi chú -->
          <div class="form-group">
            <label class="col-md-3 control-label" for="message">Ghi chú</label>
            <div class="col-md-9">
              <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
            </div>
            @if(count($errors) > 0)
                <span style="text-align: left; display: block;" class="text-danger">{{$errors->first('message')}}</span>
              @endif
          </div>
      </div>
      <div class="col-md-4">
       <div class="don-hang">
        <h4>Đơn hàng của bạn</h4>
        @if($cart)
            
            <div class=" no-hiddent">
              <ul>
                @foreach($product_cart as $ct)
                  <li>
                    <div class="giohang-img">
                    
                      <img src="{{asset($ct->options->img)}}" alt="">
                    </div>
                    <div class="giohang-title">
                      <h4><a href="{{ route('chi-tiet-san-pham',['id'=>$ct->id]) }}">{{$ct->name}}</a></h4>
                      <p>{{$ct->qty}} x {{ number_format($ct->price)}} (vnđ)</p>
                     
                    </div>
                    <div class="giohang-close">
                     <a onclick="return confirm('Bạn muốn xóa sản phẩm này');"  href="{{ route('deletecart',['rowid'=>$ct->rowId]) }}" title="">
                        <i class="fa fa-window-close" aria-hidden="true"></i>
                      </a>
                    </div>
                    
                  </li>
                @endforeach
                
                <li class="right">
                  <p>Tổng tiền: <span>{{$totalPrice}} (vnđ)</span></p>

                </li>
                
              </ul>               
            </div>
          </li>
          @endif
          <div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
            
            <div class="your-order-body">
              <ul class="payment_methods methods">
                <li class="payment_method_bacs">
                  <input id="payment_method_bacs" type="radio" class="input-radio" name="payment" value="COD" checked="checked" data-order_button_text="">
                  <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
                  <div class="payment_box payment_method_bacs" style="display: block;">
                    Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
                  </div>            
                </li>

                <li class="payment_method_cheque">
                  <input id="payment_method_cheque" type="radio" class="input-radio" name="payment" value="ATM" data-order_button_text="">
                  <label for="payment_method_cheque">Chuyển khoản </label>
                  <div class="payment_box payment_method_cheque" style="display: none;">
                    Chuyển tiền đến tài khoản sau:
                    <br>- Số tài khoản: 123 456 789
                    <br>- Chủ TK: Nguyễn A
                    <br>- Ngân hàng ACB, Chi nhánh TPHCM
                  </div>            
                </li>
                
              </ul>
            </div>

            <div class="text-center">
              <button type="submit" class="beta-btn btn primary" href="#">Đặt hàng</button>
            </div>
      </div>
    </div>
    </form>
   
    </div>
		
	</div>
</div>

@endsection
