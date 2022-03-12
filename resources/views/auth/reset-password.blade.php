<x-guest-layout>
    <x-jet-authentication-card>
        <main id="main" class="main-site left-sidebar">
                <div class="container">
                    <div class="row" style="padding: 150px 0 0 0;">
                        <div class="col"></div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" style="padding-right: 100px;">
                            <div class=" main-content-area">
                                <div class="wrap-login-item ">
                                    <div class="login-form form-item form-stl">
                                    <x-jet-validation-errors class="mb-4" style="color: black;"/>

                                    <form method="POST" action="{{ route('password.update') }}">
                                        @csrf

                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                        <div class="block">
                                            <x-jet-label for="email" value="{{ __('Email') }}" />
                                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="password" value="{{ __('Password') }}" />
                                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                            <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            <x-jet-button style="background-color: #444444; color: #fff;">
                                                {{ __('Reset Password') }}
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
