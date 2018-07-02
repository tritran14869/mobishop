@extends('master', ['title'=>'Đăng ký'])
@section('content')
		<div class="wrapper">
			<form style="margin-top: 30px;" class="form-horizontal" method="post" action="{{route('register-page')}}">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				@if(count($errors)>0)
					<div class="alert alert-danger">
						@foreach($errors->all() as $err)
						{{$err}}
						@endforeach
					</div>
				@endif
				@if(Session::has('thanhcong'))
					<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
				@endif
				<h3 style="color: #0000cc; padding-left: 30px;">Thông tin cá nhân</h3>				
			  	<div class="form-group">
					<label class="control-label col-sm-2" for="fullname">Họ tên của bạn:</label>
					<div class="col-sm-8">
				  		<input type="text" class="form-control" name="fullname" id="fullname" placeholder="Nhập họ tên" required>
					</div>
			  	</div>
			  	<div class="form-group">
					<label class="control-label col-sm-2" for="birthday">Ngày sinh:</label>
					<div class="col-sm-8">			
						<input type="date" class="form-control" name="birthday" id="birthday" max="2012-12-31" min="1930-12-31">	
					</div>
			  	</div>
			  	<div class="form-group">
					<label class="control-label col-sm-2" for="hometown">Bạn sống tại:</label>
					<div class="col-sm-8">
						<select name="hometown" class="form-control">
							<option value="" disabled="" selected="">--Chọn thành phố--</option>
							<option value="An Giang">An Giang</option>
							<option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu</option>
							<option value="Bắc Giang">Bắc Giang</option>
							<option value="Bắc Kạn">Bắc Kạn</option>
							<option value="Bạc Liêu">Bạc Liêu</option>
							<option value="Bắc Ninh">Bắc Ninh</option>
							<option value="Bến Tre">Bến Tre</option>
							<option value="Bình Định">Bình Định</option>
							<option value="Bình Dương">Bình Dương</option>
							<option value="Bình Phước">Bình Phước</option>
							<option value="Bình Thuận">Bình Thuận</option>
							<option value="Cà Mau">Cà Mau</option>
							<option value="Cao Bằng">Cao Bằng</option>
							<option value="Đắk Lắk">Đắk Lắk</option>
							<option value="Đắk Nông">Đắk Nông</option>
							<option value="Điện Biên">Điện Biên</option>
							<option value="Đồng Nai">Đồng Nai</option>
							<option value="Đồng Tháp">Đồng Tháp</option>
							<option value="Gia Lai">Gia Lai</option>
							<option value="Hà Giang - Hà Nam">Hà Giang - Hà Nam</option>
							<option value="Hà Tĩnh">Hà Tĩnh</option>
							<option value="Hải Dương">Hải Dương</option>
							<option value="Hậu Giang">Hậu Giang</option>
							<option value="Hòa Bình">Hòa Bình</option>
							<option value="Hưng Yên">Hưng Yên</option>
							<option value="Khánh Hòa">Khánh Hòa</option>
							<option value="Kiên Giang">Kiên Giang</option>
							<option value="Kon Tum">Kon Tum</option>
							<option value="Lai Châu">Lai Châu</option>
							<option value="Lâm Đồng">Lâm Đồng</option>
							<option value="Lạng Sơn">Lạng Sơn</option>
							<option value="Lào Cai">Lào Cai</option>
							<option value="Long An">Long An</option>
							<option value="Nam Định">Nam Định</option>
							<option value="Nghệ An">Nghệ An</option>
							<option value="Ninh Bình">Ninh Bình</option>
							<option value="Ninh Thuận">Ninh Thuận</option>
							<option value="Phú Thọ">Phú Thọ</option>
							<option value="Quảng Bình - Quảng Nam">Quảng Bình - Quảng Nam</option>
							<option value="Quảng Ngãi">Quảng Ngãi</option>
							<option value="Quảng Ninh">Quảng Ninh</option>
							<option value="Quảng Trị">Quảng Trị</option>
							<option value="Sóc Trăng">Sóc Trăng</option>
							<option value="Sơn La">Sơn La</option>
							<option value="Tây Ninh">Tây Ninh</option>
							<option value="Thái Bình">Thái Bình</option>
							<option value="Thái Nguyên">Thái Nguyên</option>
							<option value="Thanh Hóa">Thanh Hóa</option>
							<option value="Thừa Thiên Huế">Thừa Thiên Huế</option>
							<option value="Tiền Giang">Tiền Giang</option>
							<option value="Trà Vinh">Trà Vinh</option>
							<option value="Tuyên Quang">Tuyên Quang</option>
							<option value="Vĩnh Long">Vĩnh Long</option>
							<option value="Vĩnh Phúc">Vĩnh Phúc</option>
							<option value="Yên Bái">Yên Bái</option>
							<option value="Phú Yên - Cần Thơ">Phú Yên - Cần Thơ</option>
							<option value="Đà Nẵng">Đà Nẵng</option>
							<option value="Hải Phòng">Hải Phòng</option>
							<option value="Hà Nội">Hà Nội</option>
							<option value="TP HCM">TP HCM</option>
						</select>
					</div>
			  	</div>
			  	<h3 style="color: #0000cc; padding-left: 30px;">Thông tin tài khoản</h3>
			  	<div class="form-group">
					<label class="control-label col-sm-2" for="email">Email:</label>
					<div class="col-sm-8">
				  		<input type="email" class="form-control" name="email" id="email" placeholder="Nhập email" required>
					</div>
			  	</div>
			  	<div class="form-group">
					<label class="control-label col-sm-2" for="password">Mật khẩu:</label>
					<div class="col-sm-8">
						<input type="password" minlength="6" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu" onkeyup="passwordStrength(this.value)" required>					
					
				</div>
				<div class="col-sm-2" style="height: 10px;">
					  	<div id="passwordDescription" style="font-size: 13px">Rất yếu</div>
					  	<div id="passwordStrength" style="width: 60%;" class="strength0"></div>
					</div>
			  	</div>
			  	<div class="form-group">
					<label class="control-label col-sm-2" for="re-password">Xác nhận mật khẩu:</label>
					<div class="col-sm-8"> 
				  		<input type="password" minlength="6" class="form-control" name="re-password" id="re-password" placeholder="Nhập lại mật khẩu" required>
					</div>
			  	</div>
			  	<h3 style="color: #0000cc; padding-left: 30px;">Kiểm tra chống spam</h3>
			  	<div class="form-group">
					<label class="control-label col-sm-2">Captcha</label>
					<div class="col-sm-10"> 
				  		{!! app('captcha')->display() !!}
				  		{{-- @if ($errors->has('g-recaptcha-response'))
                            <span class="help-block">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                            </span>
                        @endif --}}
					</div>
			  	</div>			  	
			  	<div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10">
				  		<button type="submit" class="btn btn-default">Đăng Ký</button>
					</div>
			  	</div>
			</form>
			
		</div>
@endsection