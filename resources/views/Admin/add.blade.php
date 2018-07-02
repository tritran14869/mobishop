@if($email != 'admin@mobishop.com' || $email == null)
	You are at wrong place :<
@else
	@extends('Admin.master')
	@section('admin-content')
		<div class="wrapper">
			<h1 align="center">Thêm danh mục</h1>
			@if ($tab == '1')
			<form style="margin-top: 30px;" class="form-horizontal" method="post" action="{{route('AddIndex', ['tab' => $tab])}}">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="form-group">
					<label class="control-label col-sm-2" for="productName">Tên sản phẩm:</label>
					<div class="col-sm-10">
				  		<input class="form-control" name="productName" id="productName" placeholder="Nhập" required>
					</div>
			  	</div>
			  	<div class="form-group">
					<label class="control-label col-sm-2" for="typeName">Tên hãng sản xuất:</label>
					<div class="col-sm-10">
				  		<input class="form-control" name="typeName" id="typeName" placeholder="Nhập" required>
					</div>
			  	</div>
			  	<div class="form-group">
					<label class="control-label col-sm-2" for="unitPrice">Giá tiền:</label>
					<div class="col-sm-10">
				  		<input type="number" class="form-control" name="unitPrice" id="unitPrice" placeholder="Nhập" required>
					</div>
			  	</div>
			  	<div class="form-group">
					<label class="control-label col-sm-2" for="image">Đường dẫn hình ảnh:</label>
					<div class="col-sm-10">
				  		<input class="form-control" name="image" id="image" placeholder="Nhập" required>
					</div>
			  	</div>
			  	<div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10">
				  		<button type="submit" class="btn btn-default">Xác nhận</button>
					</div>
			  	</div>
			</form>
			@endif
			@if ($tab == '2')

			@endif
			@if ($tab == '3')
			<form style="margin-top: 30px;" class="form-horizontal" method="post" action="{{route('AddIndex', ['tab' => $tab])}}">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
			  	<div class="form-group">
					<label class="control-label col-sm-2" for="typeName">Tên hãng sản xuất:</label>
					<div class="col-sm-10">
				  		<input class="form-control" name="typeName" id="typeName" placeholder="Nhập tên hãng" required>
					</div>
			  	</div>
			  	<div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10">
				  		<button type="submit" class="btn btn-default">Xác nhận</button>
					</div>
			  	</div>
			 </form>
			@endif		

			@if ($tab == '4')
			<form style="margin-top: 30px;" class="form-horizontal" method="post" action="{{route('AddIndex', ['tab' => $tab])}}">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
			  	<div class="form-group">
					<label class="control-label col-sm-2" for="email">Email:</label>
					<div class="col-sm-10">
				  		<input class="form-control" name="email" id="email" placeholder="Nhập email" required>
					</div>
			  	</div>
			  	<div class="form-group">
					<label class="control-label col-sm-2" for="fullname">Tên đầy đủ:</label>
					<div class="col-sm-10">
				  		<input class="form-control" name="fullname" id="fullname" placeholder="Nhập tên" required>
					</div>
			  	</div>
			  	<div class="form-group">
					<label class="control-label col-sm-2" for="birthday">Ngày sinh:</label>
					<div class="col-sm-10">			
						<input type="date" class="form-control" name="birthday" id="birthday" max="2012-12-31" min="1930-12-31">	
					</div>
			  	</div>
			  	<div class="form-group">
					<label class="control-label col-sm-2" for="hometown">Sống tại:</label>
					<div class="col-sm-10">
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
			  	<div class="form-group">
					<label class="control-label col-sm-2" for="password">Mật khẩu:</label>
					<div class="col-sm-10">
				  		<input class="form-control" name="password" id="password" type="password" minlength="6" placeholder="Nhập mật khẩu" required>
					</div>
			  	</div>
			  	<div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10">
				  		<button type="submit" class="btn btn-default">Xác nhận</button>
					</div>
			  	</div>
			 </form>
			@endif	

			@if ($tab == '5')
			<form style="margin-top: 30px;" class="form-horizontal" method="post" action="{{route('AddIndex', ['tab' => $tab])}}">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
			  	<div class="form-group">
					<label class="control-label col-sm-2" for="customerID">Mã khách hàng:</label>
					<div class="col-sm-10">
				  		<input class="form-control" name="customerID" id="customerID" placeholder="Nhập tên hãng" required>
					</div>
			  	</div>
			  	<div class="form-group">
					<label class="control-label col-sm-2" for="productID">Mã sản phẩm:</label>
					<div class="col-sm-10">
				  		<input class="form-control" name="productID" id="productID" placeholder="Nhập tên hãng" required>
					</div>
			  	</div>
			  	<div class="form-group">
					<label class="control-label col-sm-2" for="quantity">Số lượng:</label>
					<div class="col-sm-10">
				  		<input type="number" class="form-control" name="quantity" id="quantity" placeholder="Nhập tên hãng" required>
					</div>
			  	</div>
			  	<div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10">
				  		<button type="submit" class="btn btn-default">Xác nhận</button>
					</div>
			  	</div>
			 </form>
			@endif		
		</div>
	@endsection
@endif