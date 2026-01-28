@extends('layouts.custom-app')

@section('title', 'Admin Login')
@section('styles')

@endsection

@section('body')

<body class="ltr login-img admin-bg">

@endsection

   @section('content')

			<!-- PAGE -->
			<div class="page">
				<div>
				    <!-- CONTAINER OPEN -->
					<div class="col col-login mx-auto text-center">
						<a href="{{url('/')}}" class="text-center">
							<img src="{{asset('assets/images/logo.png')}}" class="header-brand-img" alt="{{ env('APP_NAME') }}">
						</a>
					</div>
					<div class="container-login100">
						<div class="wrap-login100 p-0">
							<div class="card-body">
								<form class="login100-form validate-form" method="post" action="{{url('admin/login-submit')}}">
									@if(session()->has('error'))
									<div class="alert alert-danger alert-dismissible" role="alert">
										<p>{!! session()->get('error') !!}</p>
									</div>
									@endif
									{{ csrf_field() }}
									<span class="login100-form-title">
										Admin Login
									</span>
									<div class="wrap-input100 validate-input" data-bs-validate = "Valid email is required: ex@abc.xyz">
										<input class="input100" type="email" name="email" placeholder="Email" autocomplete="new-username" autofocus required />
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="zmdi zmdi-email" aria-hidden="true"></i>
										</span>
									</div>
									<div class="wrap-input100 validate-input" data-bs-validate = "Password is required">
										<input class="input100" type="password" name="password" placeholder="Password" autocomplete="new-password" required />
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="zmdi zmdi-lock" aria-hidden="true"></i>
										</span>
									</div>
									<div class="container-login100-form-btn">
										<button name="login" type="submit" class="login100-form-btn btn-primary">
											Login
										</button>
									</div>

								</form>
							</div>
						</div>
					</div>
					<!-- CONTAINER CLOSED -->
				</div>
			</div>
			<!-- End PAGE -->

            @endsection

        @section('scripts')

        @endsection
