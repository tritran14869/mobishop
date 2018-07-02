@if($email != 'admin@mobishop.com' || $email == null)
	You are at wrong place :<
@else
	@extends('Admin.master')
	@section('admin-content')
		<div class="wrapper">
			<h1 align="center">Chế độ chỉnh sửa</h1>
			<form style="margin-top: 30px;" class="form-horizontal" method="post" action="{{route('EditUser')}}">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="form-group">
					<label class="control-label col-sm-2" for="id">Mã người dùng:</label>
					<div class="col-sm-10">
				  		<input value="{{$id}}" class="form-control" name="id" id="id" placeholder="Nhập" readonly>
					</div>
			  	</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="Uemail">Email:</label>
					<div class="col-sm-10">
				  		<input value="{{$Uemail}}" class="form-control" name="Uemail" id="Uemail" placeholder="Nhập" required>
					</div>
			  	</div>
			  	<div class="form-group">
					<label class="control-label col-sm-2" for="name">Tên người dùng:</label>
					<div class="col-sm-10">
				  		<input value="{{$name}}" class="form-control" name="name" id="name" placeholder="Nhập" required>
					</div>
			  	</div>
			  	<div class="form-group">
					<label class="control-label col-sm-2" for="birthday">Ngày sinh:</label>
					<div class="col-sm-10">			
						<input type="date" value="{{$birthday}}" class="form-control" name="birthday" id="birthday" max="2012-12-31" min="1930-12-31">	
					</div>
			  	</div>
			  	<div class="form-group">
					<label class="control-label col-sm-2" for="hometown">Sống tại:</label>
					<div class="col-sm-10">
						<select name="hometown" class="form-control">
							<option {{$hometown == '' ? 'selected' : ''}} value="" disabled >--Chọn thành phố--</option>
							<option {{$hometown == 'An Giang' ? 'selected' : ''}} value="An Giang">An Giang</option>
							<option {{$hometown == 'Bà Rịa - Vũng Tàu' ? 'selected' : ''}} value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu</option>
							<option {{$hometown == 'Bắc Giang' ? 'selected' : ''}} value="Bắc Giang">Bắc Giang</option>
							<option {{$hometown == 'Bắc Kạn' ? 'selected' : ''}} value="Bắc Kạn">Bắc Kạn</option>
							<option {{$hometown == 'Bạc Liêu' ? 'selected' : ''}} value="Bạc Liêu">Bạc Liêu</option>
							<option {{$hometown == 'Bắc Ninh' ? 'selected' : ''}} value="Bắc Ninh">Bắc Ninh</option>
							<option {{$hometown == 'Bến Tre' ? 'selected' : ''}} value="Bến Tre">Bến Tre</option>
							<option {{$hometown == 'Bình Định' ? 'selected' : ''}} value="Bình Định">Bình Định</option>
							<option {{$hometown == 'Bình Dương' ? 'selected' : ''}} value="Bình Dương">Bình Dương</option>
							<option {{$hometown == 'Bình Phước' ? 'selected' : ''}} value="Bình Phước">Bình Phước</option>
							<option {{$hometown == 'Bình Thuận' ? 'selected' : ''}} value="Bình Thuận">Bình Thuận</option>
							<option {{$hometown == 'Cà Mau' ? 'selected' : ''}} value="Cà Mau">Cà Mau</option>
							<option {{$hometown == 'Cao Bằng' ? 'selected' : ''}} value="Cao Bằng">Cao Bằng</option>
							<option {{$hometown == 'Đắk Lắk' ? 'selected' : ''}} value="Đắk Lắk">Đắk Lắk</option>
							<option {{$hometown == 'Đắk Nông' ? 'selected' : ''}} value="Đắk Nông">Đắk Nông</option>
							<option {{$hometown == 'Điện Biên' ? 'selected' : ''}} value="Điện Biên">Điện Biên</option>
							<option {{$hometown == 'Đồng Nai' ? 'selected' : ''}} value="Đồng Nai">Đồng Nai</option>
							<option {{$hometown == 'Đồng Tháp' ? 'selected' : ''}} value="Đồng Tháp">Đồng Tháp</option>
							<option {{$hometown == 'Gia Lai' ? 'selected' : ''}} value="Gia Lai">Gia Lai</option>
							<option {{$hometown == 'Hà Giang - Hà Nam' ? 'selected' : ''}} value="Hà Giang - Hà Nam">Hà Giang - Hà Nam</option>
							<option {{$hometown == 'Hà Tĩnh' ? 'selected' : ''}} value="Hà Tĩnh">Hà Tĩnh</option>
							<option {{$hometown == 'Hải Dương' ? 'selected' : ''}} value="Hải Dương">Hải Dương</option>
							<option {{$hometown == 'Hậu Giang' ? 'selected' : ''}} value="Hậu Giang">Hậu Giang</option>
							<option {{$hometown == 'Hòa Bình' ? 'selected' : ''}} value="Hòa Bình">Hòa Bình</option>
							<option {{$hometown == 'Hưng Yên' ? 'selected' : ''}} value="Hưng Yên">Hưng Yên</option>
							<option {{$hometown == 'Khánh Hòa' ? 'selected' : ''}} value="Khánh Hòa">Khánh Hòa</option>
							<option {{$hometown == 'Kiên Giang' ? 'selected' : ''}} value="Kiên Giang">Kiên Giang</option>
							<option {{$hometown == 'Kon Tum' ? 'selected' : ''}} value="Kon Tum">Kon Tum</option>
							<option {{$hometown == 'Lai Châu' ? 'selected' : ''}} value="Lai Châu">Lai Châu</option>
							<option {{$hometown == 'Lâm Đồng' ? 'selected' : ''}} value="Lâm Đồng">Lâm Đồng</option>
							<option {{$hometown == 'Lạng Sơn' ? 'selected' : ''}} value="Lạng Sơn">Lạng Sơn</option>
							<option {{$hometown == 'Lào Cai' ? 'selected' : ''}} value="Lào Cai">Lào Cai</option>
							<option {{$hometown == 'Long An' ? 'selected' : ''}} value="Long An">Long An</option>
							<option {{$hometown == 'Nam Định' ? 'selected' : ''}} value="Nam Định">Nam Định</option>
							<option {{$hometown == 'Nghệ An' ? 'selected' : ''}} value="Nghệ An">Nghệ An</option>
							<option {{$hometown == 'Ninh Bình' ? 'selected' : ''}} value="Ninh Bình">Ninh Bình</option>
							<option {{$hometown == 'Ninh Thuận' ? 'selected' : ''}} value="Ninh Thuận">Ninh Thuận</option>
							<option {{$hometown == 'Phú Thọ' ? 'selected' : ''}} value="Phú Thọ">Phú Thọ</option>
							<option {{$hometown == 'Quảng Bình - Quảng Nam' ? 'selected' : ''}} value="Quảng Bình - Quảng Nam">Quảng Bình - Quảng Nam</option>
							<option {{$hometown == 'Quảng Ngãi' ? 'selected' : ''}} value="Quảng Ngãi">Quảng Ngãi</option>
							<option {{$hometown == 'Quảng Ninh' ? 'selected' : ''}} value="Quảng Ninh">Quảng Ninh</option>
							<option {{$hometown == 'Quảng Trị' ? 'selected' : ''}} value="Quảng Trị">Quảng Trị</option>
							<option {{$hometown == 'Sóc Trăng' ? 'selected' : ''}} value="Sóc Trăng">Sóc Trăng</option>
							<option {{$hometown == 'Sơn La' ? 'selected' : ''}} value="Sơn La">Sơn La</option>
							<option {{$hometown == 'Tây Ninh' ? 'selected' : ''}} value="Tây Ninh">Tây Ninh</option>
							<option {{$hometown == 'Thái Bình' ? 'selected' : ''}} value="Thái Bình">Thái Bình</option>
							<option {{$hometown == 'Thái Nguyên' ? 'selected' : ''}} value="Thái Nguyên">Thái Nguyên</option>
							<option {{$hometown == 'Thanh Hóa' ? 'selected' : ''}} value="Thanh Hóa">Thanh Hóa</option>
							<option {{$hometown == 'Thừa Thiên Huế' ? 'selected' : ''}} value="Thừa Thiên Huế">Thừa Thiên Huế</option>
							<option {{$hometown == 'Tiền Giang' ? 'selected' : ''}} value="Tiền Giang">Tiền Giang</option>
							<option {{$hometown == 'Trà Vinh' ? 'selected' : ''}} value="Trà Vinh">Trà Vinh</option>
							<option {{$hometown == 'Tuyên Quang' ? 'selected' : ''}} value="Tuyên Quang">Tuyên Quang</option>
							<option {{$hometown == 'Vĩnh Long' ? 'selected' : ''}} value="Vĩnh Long">Vĩnh Long</option>
							<option {{$hometown == 'Vĩnh Phúc' ? 'selected' : ''}} value="Vĩnh Phúc">Vĩnh Phúc</option>
							<option {{$hometown == 'Yên Bái' ? 'selected' : ''}} value="Yên Bái">Yên Bái</option>
							<option {{$hometown == 'Phú Yên - Cần Thơ' ? 'selected' : ''}} value="Phú Yên - Cần Thơ">Phú Yên - Cần Thơ</option>
							<option {{$hometown == 'Đà Nẵng' ? 'selected' : ''}} value="Đà Nẵng">Đà Nẵng</option>
							<option {{$hometown == 'Hải Phòng' ? 'selected' : ''}} value="Hải Phòng">Hải Phòng</option>
							<option {{$hometown == 'Hà Nội' ? 'selected' : ''}} value="Hà Nội">Hà Nội</option>
							<option {{$hometown == 'TP HCM' ? 'selected' : ''}} value="TP HCM">TP HCM</option>
						</select>
					</div>
			  	</div>
			  	<div class="form-group">
					<label class="control-label col-sm-2" for="password">Mật khẩu:</label>
					<div class="col-sm-10">
				  		<input type="password" class="form-control" name="password" id="password" minlength="6" placeholder="Nhập" required>
					</div>
			  	</div>
			  	<div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10">
				  		<button type="submit" class="btn btn-default">Xác nhận</button>
					</div>
			  	</div>
			</form>
			
		</div>
	@endsection
@endif