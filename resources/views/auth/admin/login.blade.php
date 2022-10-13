<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    @if(!empty($sitesetting->logo))
    <link href="{{$sitesetting->logo}}" rel="shortcut icon" type="image/png">
    @endif

    <title>Mounatin Guide - Log in </title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset('admin/css/vendors_css.css')}}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('admin/css/skin_color.css')}}">	

</head>
<body class="hold-transition over-layer-dark"  style="background: #0e1e56">
	
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">	
			
			<div class="col-12">
				<div class="row justify-content-center no-gutters">
					<div class="col-lg-4 col-md-5 col-12">
						<div class="content-top-agile p-10">
							<h2 class="text-white">Get started with Us</h2>
							<p class="text-white">Sign in</p>							
						</div>
                        @if(Session::has('error'))
                        <div class="alert alert-danger">
                            {{Session::get('error')}}
                        </div>
                        @endif
						@if(Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                        @endif
						<div class="p-30 rounded30 box-shadowed b-2 b-dashed" style="background: #37373d96;">
							<form action="{{route('admin.login')}}" method="POST">
                               @csrf
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent text-white"><i class="ti-user"></i></span>
										</div>
										<input type="email" name="email" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Email">
                                       
									</div>
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
								</div>
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text  bg-transparent text-white"><i class="ti-lock"></i></span>
										</div>
										<input type="password" name="password" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Password">
                                       
									</div>
                                    @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
								</div>
								  <div class="row">
									<div class="col-6">
									  <div class="checkbox text-white">
										<input type="checkbox" id="basic_checkbox_1" name="remember_token" style="visibility: hidden">
										<label for="basic_checkbox_1">Remember Me</label>
									  </div>
									</div>
									<!-- /.col -->
									<div class="col-6">
									 <div class="fog-pwd text-right">
										<a href="{{route('admin.forget.password.get')}}" class="text-white hover-info"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
									  </div>
									</div>
									<!-- /.col -->
									<div class="col-12 text-center">
									  <button type="submit" class="btn btn-info btn-rounded mt-10">SIGN IN</button>
									</div>
									<!-- /.col -->
								  </div>
							</form>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Vendor JS -->
	<script src="{{asset('admin/js/vendors.min.js')}}"></script>
    <script src="{{asset('assets/icons/feather-icons/feather.min.js')}}"></script>	

</body>
</html>
