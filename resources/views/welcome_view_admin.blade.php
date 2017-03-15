<html>
	<head>
		<title>Welcome</title>
	</head>
	<body>
	@if ($login_state == "login")
		Welcome {{ $username }} <a href="{{ url('logout_login') }}">Logout</a>
	@else
		Please Login
	@endif
	</body>
</html>