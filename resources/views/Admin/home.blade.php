@if($user['attributes']['email'] != 'admin@mobishop.com' || $user == null || ($user == null && $code == 1))
	You are at wrong place :<
@else
	@extends('Admin.master')
	@section('admin-content')
		<div class="tab-content">
			<p>Lọc dữ liệu</p>
			<input class="form-control" id="myInput" type="text" placeholder="Nhập gì đó..">
			<div id="qldt" class="tab-pane active">
				<table class="table table-striped table-bordered">
					<thead>
						<th colspan="7"></th>
						<th colspan="2" style="text-align: center;">
							<a href="{{route('AdminAdd', 
							['email' => $user['attributes']['email']])}}?tab={{1}}"><img src="/mobishopv2/public/source/image/misc/add.jpg" width="16px" height="16px"></th>
					</thead>
										
					<tr>
						<th>Sản phẩm</th>
						<th>Hãng</th>
						<th>Đơn giá</th>
						<th>Link hình ảnh</th>
						<th>Số lượng tồn</th>
						<th>Số lượng đã bán</th>
						<th>Số lượt xem</th>
						<th>Sửa</th>
						<th>Xoá</th>					
					</tr>
					<tbody id="myTable" id="myTable">						
						@foreach($product as $key => $value)						
							<tr>
								<td>{{$value->name}}</td>
								<td>{{$value->typename}}</td>
								<td>{{$value->unit_price}}</td>
								<td>{{$value->image}}</td>
								<td>{{$value->unit_in_stock}}</td>
								<td>{{$value->unit_sold}}</td>
								<td>{{$value->visited}}</td>
								<td><a href="{{route('AdminEditProduct', ['email' => $user['attributes']['email'], 
																   'id' => $value->id,
																   'productName' => $value->name,
																   'typeName' => $value->typename,
																   'unitPrice' => $value->unit_price,
																   'image' => $value->image])}}">
									<img src="/mobishopv2/public/source/image/misc/edit.png"></a></td>
								<td><a href="{{route('AdminDelete', $value->id)}}?tab={{1}}"><img src="/mobishopv2/public/source/image/misc/trash.gif"></a></td>
							</tr>						
						@endforeach
					</tbody>
				</table>
			</div>

			<div id="qlldt" class="tab-pane">
				<table class="table table-striped table-bordered">
					<thead>
						<th colspan="3"></th>
						<th colspan="2" style="text-align: center;">
							<a href="{{route('AdminAdd', 
							['email' => $user['attributes']['email']])}}?tab={{2}}"><img src="/mobishopv2/public/source/image/misc/add.jpg" width="16px" height="16px"></th>
					</thead>
					<tr>					
						<tr>
							<th>Tên loại</th>
							<th>Số lượng đã bán</th>
							<th>Số lượt xem</th>
							<th>Sửa</th>
							<th>Xoá</th>	
						</tr>
					</tr>
					<tbody id="myTable">
					</tbody>
				</table>
			</div>

			<div id="qlnsx" class="tab-pane">
				<table class="table table-striped table-bordered">
					<thead>
						<th colspan="3"></th>
						<th colspan="2" style="text-align: center;">
							<a href="{{route('AdminAdd', 
							['email' => $user['attributes']['email']])}}?tab={{3}}"><img src="/mobishopv2/public/source/image/misc/add.jpg" width="16px" height="16px"></th>
					</thead>
					<tr>					
						<tr>
							<th>Hãng sản xuất</th>
							<th>Tổng số lượng tồn</th>
							<th>Tổng số lượng đã bán</th>
							<th>Sửa</th>	
							<th>Xóa</th>										
						</tr>
					</tr>
					<tbody id="myTable">
						@foreach($producer as $key => $value)
						<tr>
							<td>{{$value->name}}</td>
							<td>{{$value->totalInStock}}</td>
							<td>{{$value->totalSold}}</td>
							<td><a href="{{route('GetEditProducer', ['email' => 											$user['attributes']['email'], 
																   'id' => $value->id,
																   'name' => $value->name])}}">
									<img src="/mobishopv2/public/source/image/misc/edit.png"></a></td>
							<td><a href="{{route('AdminDelete', $value->id)}}?tab={{3}}"><img src="/mobishopv2/public/source/image/misc/trash.gif"></a></td>						
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>

			<div id="qlnd" class="tab-pane">
				<table class="table table-striped table-bordered">
					<thead>
						<th colspan="4"></th>
						<th colspan="2" style="text-align: center;">
							<a href="{{route('AdminAdd', 
							['email' => $user['attributes']['email']])}}?tab={{4}}"><img src="/mobishopv2/public/source/image/misc/add.jpg" width="16px" height="16px"></th>
					</thead>
					<tr>					
						<tr>						
							<th>Email</th>
							<th>Họ tên người dùng</th>
							<th>Ngày sinh</th>
							<th>Quê quán</th>
							<th>Sửa</th>
							<th>Xoá</th>						
						</tr>
					</tr>
					<tbody id="myTable">
						@foreach($users as $key => $value)
							<tr>
								<td>{{$value->email}}</td>
								<td>{{$value->full_name}}</td>	
								<td>{{$value->birthday}}</td>
								<td>{{$value->hometown}}</td>
								<td><a href="{{route('EditUser1', ['email' => $user['attributes']['email'], 
																   'id' => $value->id,
																   'Uemail' => $value->email,
																   'name' => $value->full_name,
																   'birthday' => $value->birthday,
																   'hometown' => $value->hometown])}}">
									<img src="/mobishopv2/public/source/image/misc/edit.png"></a></td>
								<td><a href="{{route('AdminDelete', $value->id)}}?tab={{4}}"><img src="/mobishopv2/public/source/image/misc/trash.gif"></a></td>					
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>

			<div id="qldh" class="tab-pane">
				<table class="table table-striped table-bordered">
					<tr>					
						<tr>
							<th>Tên khách hàng</th>
							<th>Sản phẩm</th>						
							<th>Số lượng</th>
							<th>Tổng tiền</th>						
							<th>Ngày giao</th>
							<th>Tình trạng</th>
							<th>Xoá</th>	
							<th>Giao hàng</th>							
						</tr>
					</tr>
					<tbody id="myTable">
						@foreach($bill as $key => $value)
						<tr>
							<td>{{$value->full_name}}</td>
							<td>{{$value->pName}}</td>
							<td>{{$value->quantity}}</td>
							<td>{{$value->total}}</td>
							<td>{{$value->date_order}}</td>
							<td>{{$value->status == '1' ? 'Đã giao' : 'Chưa giao'}}</td>
							<td><a href="{{route('AdminDelete', $value->id)}}?tab={{5}}"><img src="/mobishopv2/public/source/image/misc/trash.gif"></a></td>
							<td><a href="{{route('Deliver', $value->id)}}?tab={{5}}"><img src="/mobishopv2/public/source/image/misc/tick.png" width="16px" height="16px"></a></td>							
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			
		</div>
	@endsection
@endif