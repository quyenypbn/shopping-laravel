
	<!-- <input type="hidden" name="token" value="{{$token}}" placeholder="">
	<div>
		New password:
		<input type="password" name="password" value="" placeholder="Password">
	</div>
	<div>
		Confirm password:
		<input type="password" name="cfpassword" value="" placeholder="ConfirmPassword">
	</div>
	<div>
		<button type="submit">Submit</button>
	</div> -->
@include('sub.admin.style')
<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <form action="{{route('auth.reset-pwd')}}" class="bg-secondary" method="post" accept-charset="utf-8">
    {{csrf_field()}}
    <input type="hidden" name="token" value="{{$token}}" placeholder="">
        <div class="card card-outline-secondary">
            <div class="card-header">
              <h1  style="text-align: center;">Change Password</h1>
            </div>
            <div class="card-body">
              
                <div class="form-group">
                    <label for="inputPasswordNew">New Password</label>
                    <input type="password" class="form-control" id="inputPasswordNew" name="password" required="">
                    <span class="form-text small text-muted">
                           <!--  The password must be 8-20 characters, and must <em>not</em> contain spaces. -->
                        </span>
                </div>
                <div class="form-group">
                    <label for="inputPasswordNewVerify">Confirm Password</label>
                    <input type="password" class="form-control" name="cfpassword" id="inputPasswordNewVerify" required="">
                    <span class="form-text small text-muted">
                          <!--   To confirm, type the new password again. -->
                        </span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg float-right">Save</button>
                </div>

            </div>
        </div>
    </form>
    </div>
    <div class="col-md-3">
        
    </div>
</div>
