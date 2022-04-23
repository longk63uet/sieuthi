<!DOCTYPE html>
<head>
<title>Đăng nhập Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link rel="stylesheet" href="{{('backend/css/bootstrap.min.css')}}" >
<link href="{{('backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{('backend/css/style-responsive.css')}}" rel="stylesheet"/>
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{('backend/css/font.css')}}" type="text/css"/>
<link href="{{('backend/css/font-awesome.css')}}" rel="stylesheet"> 
<script src="{{('js/jquery2.0.3.min.js')}}"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Đăng nhập</h2>
	@php
		$message = Session::get('message');
		if($message){
			 echo $message;
			 Session::put('message','');
		}
	@endphp
		<form action="{{url('/admin-dashboard')}}" method="post">
            @csrf
			<input type="email" class="ggg" name="email" placeholder="EMAIL" required="">
			<input type="password" class="ggg" name="password" placeholder="Mật khẩu" required="">
			<span><input type="checkbox" />Nhớ mật khẩu</span>
			<h6><a href="#">Quên mật khẩu?</a></h6>
				<div class="clearfix"></div>
				<input type="submit" value="Đăng nhập" name="login">
		</form>
</div>
</div>
<script src="{{('backend/js/bootstrap.js')}}"></script>
<script src="{{('backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{('backend/js/scripts.js')}}"></script>
<script src="{{('backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{('backend/js/jquery.nicescroll.js')}}"></script>
<script src="{{('backend/js/jquery.scrollTo.js')}}"></script>
</body>
</html>
