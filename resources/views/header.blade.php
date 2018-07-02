<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		    	<span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span> 
		    </button>
			<a class="navbar-brand" href="#">TTV</a>	
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class="active"><a href="{{route('home-page')}}">Trang chủ</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Hãng điện thoại
					<span class="caret"></span></a>
					<ul class="dropdown-menu">
						@foreach($p_type as $t)
						<li><a href="{{route('productByName-page', $t->name)}}">{{strtoupper($t->name)}}</a></li>
						@endforeach
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Mức giá
					<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="{{route('productByPrice-page')}}?below=1">Dưới 1 triệu</a></li>
						<li><a href="{{route('productByPrice-page')}}?from=1&to=3">Từ 1 - 3 triệu</a></li>
						<li><a href="{{route('productByPrice-page')}}?from=3&to=7">Từ 3 - 7 triệu</a></li>
						<li><a href="{{route('productByPrice-page')}}?from=7&to=10">Từ 7 - 10 triệu</a></li>
						<li><a href="{{route('productByPrice-page')}}?from=10&to=15">Từ 10 - 15 triệu</a></li>
						<li><a href="{{route('productByPrice-page')}}?over=15">Trên 15 triệu</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Tính năng
					<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="{{route('productByFeature-page')}}?special={{$feature[0]}}">Bảo mật vân tay</a></li>					
						<li><a href="{{route('productByFeature-page')}}?special={{$feature[1]}}">Chống nước</a></li>
						<li><a href="{{route('productByFeature-page')}}?special={{$feature[2]}}">Hỗ trợ 4G</a></li>
						<li><a href="{{route('productByFeature-page')}}?special={{$feature[3]}}">2 SIM</a></li>					
					</ul>
				</li>			
			</ul>
			<ul style="margin-right: 10px;" class="nav navbar-nav navbar-right">
				@if(Auth::check())
					<li><a href="{{route('profile-page')}}">Chào bạn {{Auth::user()->full_name}}</a></li>
					<li><a href="{{route('logout')}}">Đăng xuất</a></li>
				@else
					<li><a href="{{route('register-page')}}"><span class="glyphicon glyphicon-user"></span> Đăng ký</a></li>
					<li><a href="{{route('login-page')}}"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>
				@endif
			</ul>	
		</div>		
	</div>
</nav>

<div style="margin-top: 65px;" class="container-head">
	<div class="row">
		<div class="col-sm-6">logo here</div>
		<div class="col-sm-4" style="text-align: right;">
			<form role="search" method="post" id="searchform" action="{{route('result')}}">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="input-group">
					<input class="form-control" type="text" value="" name="search" id="s" placeholder="Nhập từ khóa..." />				
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit" id="searchsubmit">
							<i class="glyphicon glyphicon-search"></i>
						</button>
					</div>
				</div>
			</form>
			<a href="{{route('adv')}}"><span class="glyphicon glyphicon-search"></span>Tìm kiếm nâng cao</a>			
		</div>
		<div class="col-sm-2">
			<div class="cart pull-right">
				<!-- Trigger the modal with a button -->
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#cart-content">
					<span class="glyphicon glyphicon-shopping-cart"></span> Giỏ hàng ( <b id="cart-header"> @if(Session::has('cart')){{Session('cart')->totalQty}} @else Trống @endif </b>)				
				</button>

				<!-- Modal -->
				<div class="modal fade" id="cart-content" role="dialog">
					<div class="modal-dialog modal-sm">						
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Giỏ hàng ( @if(Session::has('cart')){{Session('cart')->totalQty}} @else Trống @endif)
								</h4>
							</div>
							@if (Session::has('cart'))
							@foreach($product_cart as $product)
							<div class="modal-body cart-item">
								<a href="{{route('delCart', $product['item']['id'])}}">x</a>
								<a href="{{route('decreaseQty', $product['item']['id'])}}">-</a>
								<a href="{{route('increaseQty', $product['item']['id'])}}">+</a>
								<div class="media">
									<a class="pull-left" href="{{route('productDetail-page')}}?id={{$product['item']['id']}}"><img style="width: 50px; height: 50px" src="/mobishopv2/public/source/image/products/{{$product['item']['image']}}"></a>
									<div class="media-body">
										<div><span class="cart-item-title">{{$product['item']['name']}}</span></div>	
										<div>
											<span class="cart-item-amount">
												{{$product['qty']}}*<span>{{number_format($product['item']['unit_price'])}} VND</span>
											</span>
										</div>										
									</div>									
								</div>								
							</div>
							@endforeach
							@endif						
							<div class="modal-footer">
								<div style="text-align: right;" class="cart-total">
									Tổng tiền: <span class="cart-total-value">@if(Session::has('cart')){{number_format(Session('cart')->totalPrice)}} @else 0 @endif VND</span>
								</div>
							</div>						
							<div class="modal-footer">
								<a class="btn btn-primary" href="@if(Session::has('cart')) @if(Session('cart')->totalQty != 0) {{route('dathang-page')}} @endif @else {{'#'}} @endif">Đặt hàng</a>	
							</div>
						</div>
					</div>
				</div>
			</div> <!-- .cart -->
		</div>
	</div>
</div>