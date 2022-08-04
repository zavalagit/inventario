<!DOCTYPE html>
<html>
    
<head>
	<title>Login Sistema de Inventario</title>
	
    <link rel="stylesheet" href="{{asset('css/bootstrap4css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/jquery-confirmv3/jquery-confirm.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('login/login.css')}}">
</head>
<!--Coded with love by Mutiullah Samim-->
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="{{asset('logos/logo_fge.png')}}" class="brand_logo drop" alt="Logo">
					</div>
				</div>
				@if($errors->any())
					<div style="position:absolute; top:20%; left:1%;"; class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				
				<div class="d-flex justify-content-center form_container">
					<form  action="{{route('login_post')}}" method="POST" autocomplete="off">
						@csrf
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="usuario" class="form-control input_user" value="{{old('usuario')}}" placeholder="Usuario">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" value="" placeholder="Contraseña">
						</div>
						
							<div class="d-flex justify-content-center mt-3 login_container">
				 				<button type="submit" class="btn login_btn">INICIAR</button>
				   			</div>
					</form>
				</div>
				
			
			</div>
		</div>
	</div>
<!--JS-->
<script src="{{asset('js/jquery/jquery-3.3.1.min.js')}}"></script>	 
<script src="{{asset('js/popper/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap4js/bootstrap.min.js')}}"></script>
</body>
</html>