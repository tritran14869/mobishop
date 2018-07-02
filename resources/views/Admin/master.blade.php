<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
	<title> Admin </title>	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script type="text/javascript">
				
	</script>
	<script type="text/javascript">
		// Slide motion
		var $ = jQuery.noConflict();
			$(function() {
				$('#tabsmenu').tabify();
				$(".toggle_container").hide(); 
				$(".trigger").click(function(){
				$(this).toggleClass("active").next().slideToggle("slow");
				return false;
			});
		});

		// Refresh page with selected tab
		$(document).ready(function() {
			if (location.hash) {
				$("a[href='" + location.hash + "']").tab("show");
			}
			$(document.body).on("click", "a[data-toggle]", function(event) {
				location.hash = this.getAttribute("href");
			});
		});

		$(window).on("popstate", function() {
			var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
			$("a[href='" + anchor + "']").tab("show");
		});		

		// Filter
		$(document).ready(function(){
			$("#myInput").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#myTable tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
		});
	</script>
	<style type="text/css">
		html {
			background-color: #222222;
		}
		table {
			text-align: center;
		}
		tr {
			text-align: center;
		}
	</style>
</head>
<body>
	<div style="margin-top: 25px;" class="container">
		
	<!-- .header -->
	@include('Admin.header')
	<!-- end .header -->
	<!-- .center_content -->
	<div style="margin-top: 25px;" class="container">
		@yield('admin-content')
	</div> <!-- End of Container -->
    
    <!-- end .center_content -->	 
	</div> <!-- End of Container -->
</body>
</html>