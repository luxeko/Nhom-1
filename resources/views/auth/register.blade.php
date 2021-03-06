<x-guest-layout>
    <main id="main" class="main-site left-sidebar">

		<div class="container">
			<div class="row" style="padding: 150px 0 0 0;">
                <div class="col"></div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">							
					<div class=" main-content-area">
						<div class="wrap-login-item ">
							<div class="register-form form-item ">
                                <x-jet-validation-errors class="mb-4" style="color: black;"/>
                                <form class="form-stl" action="{{route('register')}}" name="frm-login" method="POST" 
								style="padding-right: 40px; margin-bottom: 65px; padding-left: 40px;">
                                    @csrf
									<fieldset class="wrap-title">
										<h3 class="form-title">Create an account</h3>
										<h4 class="form-subtitle">Personal infomation</h4>
									</fieldset>									
									<fieldset class="wrap-input">
										<label for="frm-reg-lname">Name*</label>
										<input type="text" id="frm-reg-lname" name="full_name" placeholder="Your name*" value="{{old('full_name')}}" autofocus autocomplete="full_name">
									</fieldset>
									<fieldset class="wrap-input">
										<label for="frm-reg-email">Email Address*</label>
										<input type="email" id="frm-reg-email" name="email" placeholder="Email address" value="{{old('email')}}">
									</fieldset>
									
									<fieldset class="wrap-title">
										<h3 class="form-title">Login Information</h3>
									</fieldset>
									<fieldset class="wrap-input item-width-in-half left-item ">
										<label for="frm-reg-pass">Password *</label>
										<input type="password" id="frm-reg-pass" name="password" placeholder="Password" required autocomplete="new-password">
									</fieldset>
									<fieldset class="wrap-input item-width-in-half ">
										<label for="frm-reg-cfpass">Confirm Password *</label>
										<input type="password" id="frm-reg-cfpass" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
									</fieldset>
									<input type="submit" class="btn btn-sign" value="Register" name="register" style="background: #444444;">
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