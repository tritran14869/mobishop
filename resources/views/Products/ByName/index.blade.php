@extends('master', ['title' => 'Điện thoại '.strtoupper($productsByName[0]->name)])

@section('content')
<div class="wrapper">
	<ul class="item-list">		    				    				    	
		@foreach($productsByName as $p)
		<li>
			<a href="{{route('productDetail-page')}}?id={{$p->id}}">
				<img class="img-responsive product-img" src="source/image/products/{{$p->image}}">
			</a>
			<div class="item-price">
				<p>{{$p->pname}}</p>
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
	
</div> <!-- End of Wrapper -->
@endsection