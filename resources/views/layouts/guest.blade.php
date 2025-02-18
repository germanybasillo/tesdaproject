<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>{{config('app.name')}}</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('images/logo/logo.png') }}"/>

@vite([
   'resources/LoginRegisterStyle/vendor/bootstrap/css/bootstrap.min.css',
   'resources/LoginRegisterStyle/fonts/font-awesome-4.7.0/css/font-awesome.min.css',
   'resources/LoginRegisterStyle/fonts/Linearicons-Free-v1.0.0/icon-font.min.css',
   'resources/LoginRegisterStyle/vendor/animate/animate.css',
   'resources/LoginRegisterStyle/vendor/css-hamburgers/hamburgers.min.css',
   'resources/LoginRegisterStyle/vendor/animsition/css/animsition.min.css',
   'resources/LoginRegisterStyle/vendor/select2/select2.min.css',
   'resources/LoginRegisterStyle/daterangepicker/daterangepicker.css',
   'resources/LoginRegisterStyle/css/util.css',
   'resources/LoginRegisterStyle/css/main.css',
   'resources/LoginRegisterStyle/vendor/jquery/jquery-3.2.1.min.js',
   'resources/LoginRegisterStyle/vendor/animsition/js/animsition.min.js',
   'resources/LoginRegisterStyle/vendor/bootstrap/js/popper.js',
   'resources/LoginRegisterStyle/vendor/bootstrap/js/bootstrap.min.js',
   'resources/LoginRegisterStyle/vendor/select2/select2.min.js',
   'resources/LoginRegisterStyle/vendor/daterangepicker/moment.min.js',
   'resources/LoginRegisterStyle/vendor/daterangepicker/daterangepicker.js',
   'resources/LoginRegisterStyle/vendor/countdowntime/countdowntime.js',
   'resources/LoginRegisterStyle/js/main.js',
   'resources/LoginRegisterStyle/register/script.js',
])

    </head>
    <body style="background-color: #666666;">
    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100" style="background-image: url('bg.png'); background-size: auto 400px; background-position: 100px center; background-repeat: no-repeat; object-fit: cover;">
            <div class="login-container">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>


    </body>
</html>
