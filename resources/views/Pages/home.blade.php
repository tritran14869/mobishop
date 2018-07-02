@extends('master')

@section('title', 'Trang chủ')

@section('content')
<div class="wrapper">	
	<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="1700">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div class="item active">
				<img class="img-responsive banner" src="source/image/banner/{{$slide[0]->image}}" alt="banner1">
			</div>

			<div class="item">
				<img class="img-responsive banner" src="source/image/banner/{{$slide[1]->image}}" alt="banner2">
			</div>

			<div class="item">
				<img class="img-responsive banner" src="source/image/banner/{{$slide[0]->image}}" alt="banner3">
			</div>
		</div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

	<!-- tab menu hiển thị sản phẩm -->
	<ul style="margin: 15px 0 0 0;" class="nav nav-tabs nav-justified">
		<li class="active"><a data-toggle="tab" href="#moinhat">Sản phẩm mới nhất</a></li>
		<li><a data-toggle="tab" href="#banchay">Sản phẩm bán chạy</a></li>                        
	</ul>
	<div class="tab-content">
		<div id="moinhat" class="tab-pane fade in active">
			<!-- Sản phẩm mới nhất -->
			<ul class="item-list">                                                      
				@foreach($lastestProduct as $lp)
				<li>
					<a href="{{route('productDetail-page')}}?id={{$lp->id}}">
						<img class="img-responsive product-img" src="source/image/products/{{$lp->image}}">
					</a>
					<div class="item-price">
						<p>{{$lp->name}}</p>
						<p>Số lượt xem: {{$lp->visited}}</p>
						<p>{{number_format($lp->unit_price) . ' VNĐ'}}</p>
					</div>
					<div class="item-caption">
						@if(Auth::check())
						<a class="btn btn-primary addtocart-click" href="{{Route('addToCart', $lp->id)}}">
							Thêm vào giỏ hàng
						</a>
						@endif
						<a class="btn btn-default" href="{{route('productDetail-page')}}?id={{$lp->id}}">Chi tiết</a>
					</div>
				</li>
				@endforeach
			</ul>               
		</div>
		<div id="banchay" class="tab-pane fade">
			<!-- Sản phẩm bán chạy -->
			<ul class="item-list">
				@foreach($bestSeller as $bs)
				<li>
					<a href="{{route('productDetail-page')}}?id={{$bs->id}}">
						<img class="img-responsive product-img" width="350" height="180" src="source/image/products/{{$bs->image}}">
					</a>
					<div class="item-price">
						<p>{{$bs->name}}</p>
						<p>Số lượt xem: {{$bs->visited}}</p>
						<p>{{number_format($bs->unit_price) . ' VNĐ'}}</p>
					</div>
					<div class="item-caption">
						@if(Auth::check())
						<a class="btn btn-primary" href="{{Route('addToCart', $bs->id)}}">
							Thêm vào giỏ hàng
						</a>
						@endif
						<a class="btn btn-default" href="{{route('productDetail-page')}}?id={{$bs->id}}">Chi tiết</a>
					</div>
				</li>
				@endforeach
			</ul>
		</div>          
	</div>
</div> <!-- End of Wrapper -->
@endsection