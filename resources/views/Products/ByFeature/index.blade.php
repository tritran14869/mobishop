@if ($request->has('special'))
	@if ($request->get("special") == "van-tay")
		<?php $title =  "bảo mật vân tay"; ?>
	@elseif ($request->get("special") == "chong-nuoc")
		<?php $title =  "chống nước"; ?>
	@elseif ($request->get("special") == "4g")
		<?php $title =  "hỗ trợ 4G"; ?>
	@elseif ($request->get("special") == "2-sim")
		<?php $title =  "2 SIM 2 Sóng"; ?>
	@endif
@endif

@extends('master', ['title' => 'Điện thoại ' . $title])

@section('content')
<div class="wrapper">
	@if ($productsByFeature->count() > 0)
	<ul class="item-list">		    				    				    	
		@foreach($productsByFeature as $p)
		<li>
			<a href="{{route('productDetail-page')}}?id={{$p->id}}">
				<img class="img-responsive product-img" src="../source/image/products/{{$p->image}}">
			</a>
			<div class="item-price">
				<p>{{$p->name}}</p>
				<p>Số lượt xem: {{$p->visited}}</p>
				<p>{{$p->unit_price . ' VNĐ'}}</p>
			</div>
			<div class="item-caption">
				@if(Auth::check())
				<a class="btn btn-primary" href="{{Route('addToCart', $p->id)}}">
					Thêm vào giỏ hàng
				</a>
				@endif
				<a class="btn btn-default" href="{{route('productDetail-page')}}?id={{$p->id}}">
					Chi tiết
				</a>
			</div>
		</li>
		@endforeach
	</ul>
	@else
	<p>Không tìm thấy</p>
	@endif
</div> <!-- End of Wrapper -->
@endsection