<x-guest-layout>
    <x-jet-authentication-card>
        <main id="main" class="main-site left-sidebar">
            <div class="container">
                <div class="row" style="padding: 150px 0 0 0;">
                    <div class="col"></div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class=" main-content-area">
                                <div class="wrap-login-item ">
                                    <div class="login-form form-item form-stl">
                                        <div class="mb-4 text-sm text-gray-600">
                                            <p>Forgot your password? No problem.</p>
                                            <p>Just let us know your email address and we will email you</p>
                                            <p>a password reset link that will allow you to choose a new one.</p>
                                        </div>

                                        @if (session('status'))
                                            <div class="mb-4 font-medium text-sm text-green-600" style="color: green;">
                                                {{ session('status') }}
                                            </div>
                                        @endif

                                        <x-jet-validation-errors class="mb-4" style="color: #dc3545;"/>

                                        <form class="" method="POST" action="{{ route('password.email') }}">
                                            @csrf

                                            <div class="block">
                                                <x-jet-label for="email" value="{{ __('Email') }}" />
                                                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                            </div>

                                            <div class="flex items-center justify-end mt-4" >
                                                <x-jet-button style="background-color: #444444; color: #fff;">
                                                    {{ __('Email Password Reset Link') }}
                                                </x-jet-button>
                                            </div>
                                        </form>
                                    </div>  
                                </div>											
                            </div>
                        </div><!--end main products area-->		
                    <div class="col"></div>
                </div>
			</div><!--end row-->
		</div><!--end container-->
	</main>
        
    </x-jet-authentication-card>
</x-guest-layout>
