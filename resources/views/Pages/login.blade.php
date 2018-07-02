@extends('master', ['title'=>'Đăng nhập'])
@section('content')
		<div class="wrapper">
			<form style="margin-top: 30px;" class="form-horizontal" method="post" action="{{route('login-page')}}">
				<input type="hidden" name="_token" value="{{csrf_token()}}">			
				@if(Session::has('flag'))
					<div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
				@endif
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">Email:</label>
					<div class="col-sm-10">
				  		<input type="email" class="form-control" name="email" id="email" placeholder="Nhập email" required>
					</div>
			  	</div>
			  	<div class="form-group">
					<label class="control-label col-sm-2" for="password">Mật khẩu:</label>
					<div class="col-sm-10"> 
				  		<input type="password" class="form-control" name="password" id="password" placeholder="Nhập password" required>
					</div>
			  	</div>
			  	<div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10">
				  		<div class="checkbox">
						<label><input type="checkbox"> Remember me</label>
				  		</div>
					</div>
			  	</div>
			  	<div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10">
				  		<button type="submit" class="btn btn-default">Đăng nhập</button>
					</div>
			  	</div>
			</form>
			
		</div>
@endsection