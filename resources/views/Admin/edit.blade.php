@if($email != 'admin@mobishop.com' || $email == null)
	You are at wrong place :<
@else
	@extends('Admin.master')
	@section('admin-content')
		<div class="wrapper">
			<h1 align="center">Chế độ chỉnh sửa</h1>
			<form style="margin-top: 30px;" class="form-horizontal" method="post" action="{{route('EditProduct')}}">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="form-group">
					<label class="control-label col-sm-2" for="productName">Mã sản phẩm:</label>
					<div class="col-sm-10">
				  		<input value="{{$id}}" class="form-control" name="id" id="id" placeholder="Nhập" readonly>
					</div>
			  	</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="productName">Tên sản phẩm:</label>
					<div class="col-sm-10">
				  		<input value="{{$productName}}" class="form-control" name="productName" id="productName" placeholder="Nhập productName" required>
					</div>
			  	</div>
			  	<div class="form-group">
					<label class="control-label col-sm-2" for="typeName">Tên hãng sản xuất:</label>
					<div class="col-sm-10">
				  		<input value="{{$typeName}}" class="form-control" name="typeName" id="typeName" placeholder="Nhập " required>
					</div>
			  	</div>
			  	<div class="form-group">
					<label class="control-label col-sm-2" for="unitPrice">Giá tiền:</label>
					<div class="col-sm-10">
				  		<input value="{{$unitPrice}}" class="form-control" name="unitPrice" id="unitPrice" placeholder="Nhập" required>
					</div>
			  	</div>
			  	<div class="form-group">
					<label class="control-label col-sm-2" for="image">Đường dẫn hình ảnh:</label>
					<div class="col-sm-10">
				  		<input value="{{$image}}" class="form-control" name="image" id="image" placeholder="Nhập" required>
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