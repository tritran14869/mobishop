@extends('master')

@section('title', 'Trang chủ')

@section('content')
<div class="wrapper">	
	<h1 align="center">Kết quả tìm kiếm</h1>
	@if (count($searchResult) <= 0)
		<h3 align="center">Không tìm thấy</h3>
	@else
	<ul class="item-list">
		@foreach($searchResult as $sr)
			<li>
				<a href="{{route('productDetail-page')}}?id={{$sr->id}}">
					<img class="img-responsive product-img" width="350" height="180" src="source/image/products/{{$sr->image}}">
				</a>
				<div class="item-price">
					<p>{{$sr->name}}</p>
					<p>{{number_format($sr->unit_price) . ' VNĐ'}}</p>
				</div>
				<div class="item-caption">
					@if(Auth::check())
					<a class="btn btn-primary" href="{{Route('addToCart', $sr->id)}}">
						Thêm vào giỏ hàng
					</a>
					@endif
					<a class="btn btn-default" href="{{route('productDetail-page')}}?id={{$sr->id}}">Chi tiết</a>
				</div>
			</li>
		@endforeach
	</ul>
	@endif
</div> <!-- End of Wrapper -->
@endsection