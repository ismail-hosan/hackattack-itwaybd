<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>EndGam - Gaming Magazine Template</title>
	<meta charset="UTF-8">
	<meta name="description" content="EndGam Gaming Magazine Template">
	<meta name="keywords" content="endGam,gGaming, magazine, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('font_assets/css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('font_assets/css/font-awesome.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('font_assets/css/slicknav.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('font_assets/css/owl.carousel.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('font_assets/css/magnific-popup.css')}}"/>
	<link rel="stylesheet" href="{{asset('font_assets/css/animate.css')}}"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="{{asset('font_assets/css/style.css')}}"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
@include('fontend.parsial.header')
@yield('section')
@include('fontend.parsial.footer')
	<!--====== Javascripts & Jquery ======-->
	<script src="{{asset('font_assets/js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('font_assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('font_assets/js/jquery.slicknav.min.js')}}"></script>
	<script src="{{asset('font_assets/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('font_assets/js/jquery.sticky-sidebar.min.js')}}"></script>
	<script src="{{asset('font_assets/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('font_assets/js/main.js')}}"></script>

	</body>
</html>
