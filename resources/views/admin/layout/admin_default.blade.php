<!DOCTYPE html>
	<html>
	<head>
		<!-- BEGIN META SECTION -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <!-- END META SECTION -->
    	<title>PIT MALETA</title>
    	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/img/favicon.ico')}}">
    	@include('admin.partials.styles')	
	</head>		
	<body class="{{ (Request::is('login') ||  Request::is('/')  || Request::is('forgotpassword') || Request::is('resetpassword/*') )? 'body_bg' : '' }}" >
		@include('admin.layout.default')		
		<div id="wrapper" >	
			@show	
				@section('sidemenu')		
					@include('admin.partials.sidemenu')							
			<div id="page-wrapper" {{ Request::is('login') ||  Request::is('/') ? '' : 'class=gray-bg' }}>
				@show	
					@section('navheader')
						@include('admin.partials.navheader')					
				@show	
					@section('footer')							
						@include('admin.partials.footer')
				@show
					@yield('content')
			</div>
		</div>	
		@include('admin.partials.scripts')	
		@include('admin.partials.activemenu')	
		@yield('customscript')	
	</body>
</html>