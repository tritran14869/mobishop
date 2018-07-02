@extends('master')

@section('title', 'Tìm nâng cao')
@section('content')
	<div>
		<h1 align="center">Tìm kiếm nâng cao</h1>
		<form style="margin-top: 30px;" class="form-horizontal" role="search" method="post" id="searchform" action="{{route('advResult')}}">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="form-group">
				<label class="control-label col-sm-2" for="productName">Từ khóa:</label>
				<div class="col-sm-10">
			  		<input type="productName" class="form-control" name="productName" id="productName">
				</div>
		  	</div>
			<!-- id_type -->
			<div class="form-group">		
				<label class="control-label col-sm-2" for="producer">Hãng điện thoại:</label>		
				<label class="radio-inline">
				  <input type="radio" name="id_type" id="inlineRadio1" value="1"> Apple
				</label>
				<label class="radio-inline">
				  <input type="radio" name="id_type" id="inlineRadio2" value="2"> Samsung
				</label>
				<label class="radio-inline">
				  <input type="radio" name="id_type" id="inlineRadio3" value="3"> Sonny
				</label>
				<label class="radio-inline">
				  <input type="radio" name="id_type" id="inlineRadio3" value="4"> Oppo
				</label>
				<label class="radio-inline">
				  <input type="radio" name="id_type" id="inlineRadio3" value="5"> HTC
				</label>
			</div>
			

			<!-- Camera -->
			<div class="form-group">		
				<label class="control-label col-sm-2" for="Camera">Camera:</label>		
				<label class="radio-inline">
				  <input type="radio" name="camera" id="inlineRadio1" value="5"> 5MP
				</label>
				<label class="radio-inline">
				  <input type="radio" name="camera" id="inlineRadio2" value="6"> 6MP
				</label>
				<label class="radio-inline">
				  <input type="radio" name="camera" id="inlineRadio3" value="7"> 7MP
				</label>
				<label class="radio-inline">
				  <input type="radio" name="camera" id="inlineRadio3" value="8"> 8MP
				</label>
				<label class="radio-inline">
				  <input type="radio" name="camera" id="inlineRadio3" value="9"> 9MP
				</label>
				<label class="radio-inline">
				  <input type="radio" name="camera" id="inlineRadio1" value="10"> 10MP
				</label>
				<label class="radio-inline">
				  <input type="radio" name="camera" id="inlineRadio2" value="11"> 11MP
				</label>
				<label class="radio-inline">
				  <input type="radio" name="camera" id="inlineRadio3" value="12"> 12MP
				</label>
				<label class="radio-inline">
				  <input type="radio" name="camera" id="inlineRadio3" value="13"> 13MP
				</label>
				<label class="radio-inline">
				  <input type="radio" name="camera" id="inlineRadio3" value="14"> 14MP
				</label>
			</div>

		  	<!-- rom -->
		  	<div class="form-group">		
				<label class="control-label col-sm-2" for="ROM">ROM :</label>		
				<label class="radio-inline">
				  <input type="radio" name="rom" id="inlineRadio1" value="8"> 8 GB
				</label>
				<label class="radio-inline">
				  <input type="radio" name="rom" id="inlineRadio2" value="16"> 16 GB
				</label>
				<label class="radio-inline">
				  <input type="radio" name="rom" id="inlineRadio3" value="32"> 32 GB
				</label>
				<label class="radio-inline">
				  <input type="radio" name="rom" id="inlineRadio3" value="64"> 64 GB
				</label>
				<label class="radio-inline">
				  <input type="radio" name="rom" id="inlineRadio3" value="128"> 128 GB
				</label>
				<label class="radio-inline">
				  <input type="radio" name="rom" id="inlineRadio1" value="256"> 256 GB
				</label>
			</div>
		  	<!-- ram -->
		  	<div class="form-group">		
				<label class="control-label col-sm-2" for="RAM">RAM :</label>		
				<label class="radio-inline">
				  <input type="radio" name="ram" id="inlineRadio1" value="1"> 1 GB
				</label>
				<label class="radio-inline">
				  <input type="radio" name="ram" id="inlineRadio2" value="2"> 2 GB
				</label>
				<label class="radio-inline">
				  <input type="radio" name="ram" id="inlineRadio3" value="3"> 3 GB
				</label>
				<label class="radio-inline">
				  <input type="radio" name="ram" id="inlineRadio3" value="4"> 4 GB
				</label>
				<label class="radio-inline">
				  <input type="radio" name="ram" id="inlineRadio3" value="5"> 5 GB
				</label>
			</div>
		  	<!-- price -->
		  	<div class="form-group">		
				<label class="control-label col-sm-2" for="price">Giá tiền từ :</label>		
				<label class="radio-inline">
				  <input type="radio" name="price" id="inlineRadio1" value="1000000"> 1 triệu
				</label>
				<label class="radio-inline">
				  <input type="radio" name="price" id="inlineRadio2" value="3000000"> 3 triệu
				</label>
				<label class="radio-inline">
				  <input type="radio" name="price" id="inlineRadio3" value="5000000"> 5 triệu
				</label>
				<label class="radio-inline">
				  <input type="radio" name="price" id="inlineRadio3" value="7000000"> 7 triệu
				</label>
				<label class="radio-inline">
				  <input type="radio" name="price" id="inlineRadio3" value="10000000"> 10 triệu
				</label>
				<label class="radio-inline">
				  <input type="radio" name="price" id="inlineRadio3" value="15000000"> 15 triệu
				</label>
			</div>
		  	<!-- resolution -->
		  	<div class="form-group">		
				<label class="control-label col-sm-2" for="resolution">Độ phân giải :</label>		
				<label class="radio-inline">
				  <input type="radio" name="resolution" id="inlineRadio1" value="HD"> HD
				</label>
				<label class="radio-inline">
				  <input type="radio" name="resolution" id="inlineRadio2" value="Full HD"> Full HD
				</label>
				<label class="radio-inline">
				  <input type="radio" name="resolution" id="inlineRadio2" value="2K"> 2K
				</label>
				<label class="radio-inline">
				  <input type="radio" name="resolution" id="inlineRadio2" value="4K"> 4K
				</label>
			</div>
			<!-- battery -->
		  	<div class="form-group">		
				<label class="control-label col-sm-2" for="battery">Dung lượng pin :</label>		
				<label class="radio-inline">
				  <input type="radio" name="battery" id="inlineRadio1" value="1000"> 1000mAh
				</label>
				<label class="radio-inline">
				  <input type="radio" name="battery" id="inlineRadio2" value="1500"> 1500mAh
				</label>
				<label class="radio-inline">
				  <input type="radio" name="battery" id="inlineRadio3" value="2000"> 2000mAh
				</label>
				<label class="radio-inline">
				  <input type="radio" name="battery" id="inlineRadio3" value="2500"> 2500mAh
				</label>
				<label class="radio-inline">
				  <input type="radio" name="battery" id="inlineRadio3" value="3000"> 3000mAh
				</label>
				<label class="radio-inline">
				  <input type="radio" name="battery" id="inlineRadio3" value="3500"> 3500mAh
				</label>
				<label class="radio-inline">
				  <input type="radio" name="battery" id="inlineRadio3" value="4000"> 4000mAh
				</label>
			</div>
			<div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-10">
				  	<button type="submit" class="btn btn-default">Tìm kiếm</button>
				</div>
			</div>
		</form>

	</div>

	<div class="push"></div>
@endsection