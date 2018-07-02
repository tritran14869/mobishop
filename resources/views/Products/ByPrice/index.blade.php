@if ($request->has('below'))
	<?php $title = "Sản phẩm dưới 1 triệu"; ?>
@elseif ($request->has('over'))
	<?php $title = "Sản phẩm trên 15 triệu"; ?>
@else
	<?php $title = "Sản phẩm từ " . $request->query('from') . " đến " . $request->query('to') . " triệu"; ?>
@endif

@extends ('master', ['title' => $title])

@section ('content')
<div class="wrapper">
	@if($productsByPrice->count() > 0)
	<ul class="item-list">
		@foreach($productsByPrice as $p)
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
	<h1 style="padding-top: 50px;">Không có sản phẩm</h1>
	@endif	
</div> <!-- End of Wrapper -->
@endsection