@extends('master', ['title'=>'Xác nhận đơn hàng'])

@section('content')

<div class="wrapper">

	@if(Session::has('cart'))
		<?php $cart = Session('cart'); ?>		
		
		<div class="table-responsive">
			<table class="table table-striped">
		    	<thead>
			    	<tr>
			    		<th>Tên sản phẩm</th>
			    		<th>Số lượng</th>
			    		<th>Đơn giá (VND)</th>
			    		<th>Tổng tiền (VND)</th>
			    	</tr>
		    	</thead>
		    	<tbody>
		    		@foreach($cart->items as $key => $value)
		    		<tr>
		    			<td>{{$value['item']['attributes']['name']}}</td>
		    			<td>{{$value['qty']}}</td>
		    			<td>{{number_format($value['item']['attributes']['unit_price'])}}</td>
		    			<td>{{number_format($cart->totalPrice)}}</td>
		    		</tr>
		    		@endforeach
		    	</tbody>
			</table>
		</div>
		<div style="float: right;">
			<span><b>Tổng số lượng:</b> {{$cart->totalQty}}</span><br>
			<span><b>Tổng tiền phải trả:</b> {{number_format($cart->totalPrice)}}</span><br>
			<a class="btn btn-primary" href="{{route('thanhtoan')}}"><span class="glyphicon glyphicon-ok-circle"></span> Thanh toán</a>		
		</div>

	@else
		<h1>Giỏ hàng trống</h1>
	@endif
</div>

@endsection