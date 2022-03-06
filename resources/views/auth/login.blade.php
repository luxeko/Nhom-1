<x-guest-layout>
    <main id="main" class="main-site left-sidebar">

		<div class="container">
			<div class="row" style="padding: 150px 0 0 0;">
                <div class="col"></div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class=" main-content-area">
						<div class="wrap-login-item ">						
							<div class="login-form form-item form-stl">
                                <x-jet-validation-errors class="mb-4" style="color: black;"/>
                                <form name="frm-login" method="POST" action="{{route('login')}}">
                                    @csrf
									<fieldset class="wrap-title">
										<h3 class="form-title">Log in to your account</h3>										
									</fieldset>
									<fieldset class="wrap-input">
										<label for="frm-login-uname">Email Address:</label>
										<input type="email" id="frm-login-uname" name="email" placeholder="Type your email address" :value="old('email')" required autofocus>
									</fieldset>
									<fieldset class="wrap-input">
										<label for="frm-login-pass">Password:</label>
										<input type="password" id="frm-login-pass" name="password" placeholder="************" required autocomplete="current-password">
									</fieldset>
									
									<fieldset class="wrap-input">
										<label class="remember-field">
											<input class="form-check-input" name="remember" id="rememberme" value="forever" type="checkbox"><span>Remember me</span>
										</label>
										<a class="link-function left-position" href="{{route('password.request')}}" title="Forgotten password?">Forgotten password?</a>
									</fieldset>
									<input type="submit" class="btn btn-submit" value="Login" name="submit" style="background: #444444;">
								</form>
							</div>												
						</div>
					</div><!--end main products area-->		
				</div>
                <div class="col"></div>
			</div><!--end row-->

		</div><!--end container-->

	</main>
</x-guest-layout>