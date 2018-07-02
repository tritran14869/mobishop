@if ($product->count() > 0)
	@extends('master', ['title' => $product[0]->name])

	@section('content')
	<div class="wrapper">
		<div class="row">
			<div class="col-md-4">
				<div class="product-main">
					<img class="img-responsive img-thumbnail" src="../source/image/products/{{$product[0]->image}}">
					<div class="product-main-text">
						<h3>{{ $product[0]->name }}</h3>
						<p>Số lượt xem: {{$product[0]->visited}}</p>
						<h4>{{ number_format($product[0]->unit_price) }} VNĐ</h4>
					</div>
					<div class="product-main-caption">
						@if(Auth::check())
						<a class="btn btn-primary" href="{{Route('addToCart', $product[0]->id)}}">
							Thêm vào giỏ hàng
						</a>
						@endif
					</div>
				</div>				
			</div>
			<div class="col-md-8">
				<?php $json_decoded = json_decode($product[0]->detail, true); ?>
				<ul class="parameter">
					<li class="para-header">
						<label><b style="text-transform: uppercase;">OS</b></label>
					</li>
					@foreach($json_decoded['OS'] as $key => $value)
					<li class="para-content">
						<span>{{$key.':'}}</span>
						<div>{{$value}}</div>
					</li>
					@endforeach
					<div class="panel-group">
					    <div class="panel panel-default">                
					        <div id="collapse1" class="collapse">
					            @foreach ($json_decoded as $item => $i)
					                @if ($item !== 'OS')
					                    <li class="para-header">
					                        <label><b style="text-transform: uppercase;">{{$item}}</b></label>
					                    </li>
					                    @foreach($i as $key => $value)
					                        @if (!is_array($value))                     
					                            <li class="para-content">
					                                <span>{{$key.':'}}</span>
					                                <div>{{$value}}</div>
					                            </li>
					                        @else
					                            <li class="para-content">
					                                <span>{{$key.':'}}</span>
					                                <div>
					                                @foreach ($value as $k => $v)                           
					                                    {{$v}}
					                                    @if ($value[count($value)-1] != $v)
					                                    {{', '}}
					                                    @endif                  
					                                @endforeach
					                                </div>
					                            </li>
					                        @endif
					                    @endforeach
					                @endif
					            @endforeach            
					        </div>

							<div class="panel-heading">
					            <h4 class="panel-title">
					                <a data-toggle="collapse" href="#collapse1">Hiển thị thêm</a>
					            </h4>
					        </div>
					    </div>
					</div> <!-- .panel-group -->				
				</ul>				
			</div>
		</div> <!-- .row -->
		
		<div class="row">
			<div id="disqus_thread"></div>
			
		</div>

		<h3>Sản phẩm liên quan</h3>
		<div class="row">
			<div class="col-md-1"></div>
			@foreach($relate_product as $p)
			<div class="col-md-2">				
				<a href="{{route('productDetail-page')}}?id={{$p->id}}">
					<img style="width: 200px; height: 250px;" src="/mobishopv2/public/source/image/products/{{$p->image}}">
				</a>
				<div class="item-price">
					<p>{{$p->name}}</p>
					<p>Số lượt xem: {{$p->visited}}</p>
					<p>{{number_format($p->unit_price) . ' VNĐ'}}</p>
				</div>
				<div class="item-caption">
					@if(Auth::check())
					<a class="btn btn-primary" href="{{Route('addToCart', $p->id)}}">
						Thêm vào giỏ hàng
					</a>
					@endif
					<a class="btn btn-default" href="{{route('productDetail-page')}}?id={{$p->id}}">Chi tiết</a>
				</div>
			</div>
			@endforeach
			<div class="col-md-1"></div>
		</div>
				
	</div> <!-- End of Wrapper -->
	@endsection
@else
	<h1>Không tìm thấy</h1>
@endif