@if($email != 'admin@mobishop.com' || $email == null)
	You are at wrong place :<
@else
	@extends('Admin.master')
	@section('admin-content')
		<div class="wrapper">
			<h1 align="center">Chế độ chỉnh sửa</h1>
			<form style="margin-top: 30px;" class="form-horizontal" method="post" action="{{route('EditProducer')}}">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="form-group">
					<label class="control-label col-sm-2" for="id">Mã nhà sản xuất:</label>
					<div class="col-sm-10">
				  		<input value="{{$id}}" class="form-control" name="id" id="id" placeholder="Nhập" readonly>
					</div>
			  	</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="name">Tên nhà sản xuất:</label>
					<div class="col-sm-10">
				  		<input value="{{$name}}" class="form-control" name="name" id="name" placeholder="Nhập" required>
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