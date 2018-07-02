<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
	<title> {{ $title or 'Trang chủ'}} </title>	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script type="text/javascript">var disqus_developer = 1;</script>
	
	<style type="text/css">
		.container {
			min-height: 100%;
			height: 100%;
			margin-top: 50px;
		}
		html, body {
			height: 100%;
			min-height: 100%;
		}
		footer {
			width: 100%;
			min-width: 1024px;
			margin: 0 auto;
			background: #000;
			overflow: hidder;
			clear: both;			
			bottom: 0;
		}
		.container-head {
			margin: 0 66px 0 66px;
			padding: 0 15px 0 15px;
		}
		.wrapper {
		    min-height: 100%;
		    height: auto !important;
		    height: 100%;		    
		}
		.footer {
			display: block;
			overflow: hidden;
			width: 100%;
			min-width: 1024px;
			max-width: 1200px;
			margin: 0 auto;
			padding: 15px 0;
		}
		.footer ul {
			list-style: none;
			float: left;
			margin: 0;
			position: relative;
		}
		.footer ul li {
			float: none;
			position: relative;
			font-size: 13px;
			color: #fff;
		}		
		#dt{
			color: #fff;
			text-align: center;
			font-size: 30px;
		}

		#house{
			color: #fff;
			text-align: center;
			font-size: 30px;
		}

		#hand{
			color: #fff;
			text-align: center;
			font-size: 30px;
		}	

		#fb{
			text-align: center;
			background: #34495e;
			text-decoration: none;
			width: 200px;
			height: 30px;
			padding-top: 5px;
			border-radius: 20px;
			transition: color 2s background 2s;
		}

		#fb:hover{
			background-color: #2ecc71;
			transition: color 2s background 2s;
		}

		#fb a{
			color: #fff;
			text-decoration: none;
			transition: color 2s background 2s;
		}

		#yt{
			text-align: center;
			background: #e74c3c;
			text-decoration: none;
			width: 200px;
			height: 30px;
			padding-top: 5px;
			border-radius: 20px;
			transition: color 2s background 2s;
		}

		#yt a{
			color: #fff;
			text-decoration: none;
		}

		#yt:hover{
			background-color: #3498db;
		}
		.item {
			width: 785px; height: 275px;
			margin-left: auto;
			margin-right: auto;
			display: block;
		}

		.banner {
			width: 1140px;
			height: 275px;
		}

		.product-img {
			height: 290px;
			width: 320px;
		}

		/*img {						
			
			max-width: 100%;
			max-height: 100%;
		}*/
		.item-list li{
			display: table-cell;
			float: left;
			list-style-type: none;
			padding: 7px;
		}
		.item-list li div {
			text-align: center;
		}
		.dropdown:hover .dropdown-menu {
			display: block;
		}
		.dropdown-menu li a:hover {
			background-color: #222222;
			color: #fff;
		}
		ul.nav.nav-tabs li.active a {
			color: #fff;
			background-color: #222222;
		}
		.parameter {
			display: block;
			position: relative;
			overflow: hidden;
			background: #fff;
			list-style: none;
		}
		.parameter li {
			display: table;
			background: #fff;
			width: 100%;
			border-bottom: 1px solid #dadada
		}
		.parameter li label {
			display: block;
			background: #f2f2f2;
			font-size: 16px;
			font-weight: 600;
			color: #c0392b;
			padding: 8px;
		}
		.parameter li span {
			display: table-cell;
			width: 35%;
			vertical-align: top;
			padding: 6px 5px;
			font-size: 13px;
			color: #666;
			font-weight: 600;
		}
		.parameter li div {
			display: table-cell;
			width: auto;
			vertical-align: top;
			padding: 6px, 5px;
			font-size: 13px;
			color: #666;
		}
		.para-content span {
			text-transform: capitalize;
		}
		.product-main {
			text-align: center;
		}
		.item-price, .product-main-text{
			color: #e74c3c;
		}
		#passwordStrength
		{
		        height:15px;
		        display:block;
		        float:left;
		}
		.strength0
		{
		        width:250px;
		        background:#cccccc;
		}
		.strength1
		{
		        width:40px;
		        background:#ff0000;
		}
		.strength2
		{
		        width:75px;
		        background:#ff5f5f;
		}
		.strength3
		{
		        width:150px;
		        background:#56e500;
		}
		.strength4
		{
		        background:#399800;
		        width:200px;
		}
		
	</style>
</head>
<body>
	@include('header')
	<div style="margin-top: 25px;" class="container">
		@yield('content')
	</div> <!-- End of Container -->
	
	@include('footer')

	<script type="text/javascript">
		function passwordStrength(t){var e=new Array;e[0]="Rất yếu",e[1]="Yếu",e[2]="Được",e[3]="Tốt",e[4]="Mạnh";var n=0;t.length>10&&n++,t.match(/[a-z]/)&&t.match(/[A-Z]/)&&n++,t.match(/d+/)&&n++,t.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)&&n++,document.getElementById("passwordDescription").innerHTML=e[n],document.getElementById("passwordStrength").className="strength"+n}
	</script>
	<script>
		/**
		*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
		*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
		/*
		var disqus_config = function () {
		this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
		this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
		};
		*/
		(function() { // DON'T EDIT BELOW THIS LINE
		var d = document, s = d.createElement('script');
		s.src = 'https://15ck5-netai-net.disqus.com/embed.js';
		s.setAttribute('data-timestamp', +new Date());
		(d.head || d.body).appendChild(s);
		})();
	</script>
	<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
</body>
</html>