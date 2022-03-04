<div>
	<main id="main" class="main-site">
		<style>
			.wrap-address-billing .row-in-form input[type=password], .wrap-address-billing .row-in-form input[type=text], .wrap-address-billing .row-in-form input[type=number] {
                font-size: 13px;
                line-height: 19px;
                display: inline-block;
                height: 43px;
                padding: 2px 20px;
                width: 100%;
                border: 1px solid #e6e6e6;
            }
		</style>
		<div class="container">
			<div class=" main-content-area padding_top">
				<form wire:submit.prevent="placeOrder">
    				<div class="row">
    					<div class="col-md-12">
    						<div class="wrap-address-billing">
            					<h3 class="box-title">Billing Address</h3>
            					<div class="billing-address">
            						<p class="row-in-form">
            							<label for="fname">first name<span>*</span>:</label>
            							<input type="text" name="fname" value="" placeholder="Your name" wire:model="firstname">
            							@error('firstname') <span class="text-danger">{{$message}}</span> @enderror
            						</p>
            						<p class="row-in-form">
            							<label for="lname">last name<span>*</span>:</label>
            							<input type="text" name="lname" value="" placeholder="Your last name" wire:model="lastname">
            							@error('lastname') <span class="text-danger">{{$message}}</span> @enderror
            						</p>
            						<p class="row-in-form">
            							<label for="email">Email Addreess:</label>
            							<input type="email" name="email" value="" placeholder="Type your email" wire:model="email">
            							@error('email') <span class="text-danger">{{$message}}</span> @enderror
            						</p>
            						<p class="row-in-form">
            							<label for="phone">Phone number<span>*</span>:</label>
            							<input type="text" name="phone" value="" placeholder="10 digits format"wire:model="mobile"
            							oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
            							@error('mobile') <span class="text-danger">{{$message}}</span> @enderror
            						</p>
            						<p class="row-in-form">
            							<label for="add">Address:</label>
            							<input type="text" name="add" value="" placeholder="Street at apartment number" wire:model="line1">
            							@error('line1') <span class="text-danger">{{$message}}</span> @enderror
            						</p>
        							{{-- <!-- <p class="row-in-form">
            							<label for="add">Line 2:</label>
            							<input type="text" name="add" value="" placeholder="Street at apartment number" wire:model="line2">
            						</p> --> --}}
            						<p class="row-in-form">
										<label for="city">Town / City<span>*</span>:</label>
            							<input type="text" name="city" value="" placeholder="City name" wire:model="city">
            							{{-- <select class="form-control" name="" id="" wire:model="city">
            								<option value="">Select city</option>
            								@foreach ($cities as $city)
            									<option value="{{$city->city_id}}">{{$city->en_name}}</option>
            								@endforeach
            							</select> --}}
            							@error('city') <span class="text-danger">{{$message}}</span> @enderror
            						</p>
            						<p class="row-in-form">
            							<label class="f-option5 float-left">
            								<input name="different-add" id="different-add" value="1" type="checkbox" wire:model="ship_to_different">
            								<span style="color:black">Ship to a different address?</span>
            								<div class="check"></div>
            							</label>
            						</p>
            					</div>
            				</div>
    					</div>
    					@if ($ship_to_different)
        					<div class="col-md-12">
            					<div class="wrap-address-billing">
                					<h3 class="box-title">Shipping Address</h3>
									<div class="billing-address">
										<p class="row-in-form">
											<label for="fname">first name<span>*</span>:</label>
											<input type="text" name="fname" value="" placeholder="Your name" wire:model="s_firstname">
											@error('s_firstname') <span class="text-danger">{{$message}}</span> @enderror
										</p>
										<p class="row-in-form">
											<label for="lname">last name<span>*</span>:</label>
											<input type="text" name="lname" value="" placeholder="Your last name" wire:model="s_lastname">
											@error('s_lastname') <span class="text-danger">{{$message}}</span> @enderror
										</p>
										<p class="row-in-form">
											<label for="email">Email Addreess:</label>
											<input type="email" name="email" value="" placeholder="Type your email" wire:model="s_email">
											@error('s_email') <span class="text-danger">{{$message}}</span> @enderror
										</p>
										<p class="row-in-form">
											<label for="phone">Phone number<span>*</span>:</label>
											<input type="text" name="phone" value="" placeholder="10 digits format"wire:model="s_mobile"
											oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
											@error('s_mobile') <span class="text-danger">{{$message}}</span> @enderror
										</p>
										<p class="row-in-form">
											<label for="add">Address:</label>
											<input type="text" name="add" value="" placeholder="Street at apartment number" wire:model="s_line1">
											@error('s_line1') <span class="text-danger">{{$message}}</span> @enderror
										</p>
										<!-- <p class="row-in-form">
											<label for="add">Line 2:</label>
											<input type="text" name="add" value="" placeholder="Street at apartment number" wire:model="s_line2">
										</p> -->
										<p class="row-in-form">
											<label for="city">Town / City<span>*</span>:</label>
											<!-- <input type="text" name="city" value="" placeholder="City name" wire:model="s_city"> -->
											<select class="form-control" name="" id="" wire:model="s_city">
												<option value="">Select city</option>
												@foreach ($cities as $city)
													<option value="{{$city->city_id}}">{{$city->en_name}}</option>
												@endforeach
											</select>
											@error('s_city') <span class="text-danger">{{$message}}</span> @enderror
										</p>
										<p class="row-in-form">
										</p>
									</div>
                				</div>
            				</div>
        				@endif
    				</div>
				
        			<div class="summary summary-checkout">
        				<div class="summary-item payment-method">
        					<h4 class="title-box">Payment Method</h4>
        					<div class="payment_item">
        					 	<div class="radion_btn">
            						<label class="f-option5">
            							<input name="payment-method" id="payment-method-bank" value="cod" type="radio" wire:model="paymentmode">
            							<span>Cash on Delivery</span>
            							<div class="check"></div>
            						</label>
        						</div>
        						<div class="radion_btn">
            						<label class="f-option5">
            							<input name="payment-method" id="payment-method-visa" value="card" type="radio" wire:model="paymentmode">
            							<span>Debit/Credit Card</span>
            							<div class="check"></div>
            						</label>
        						</div>
        						@if($paymentmode === 'card')
            					<div class="wrap-address-billing">
            						@if(Session::has('stripe_error'))
            							<div class="alert alert-danger" role="alert">{{Session::get('stripe_error')}}</div>
            						@endif
            						<p class="row-in-form">
            							<label for="card-no">Card Number:<span>*</span></label>
            							<input type="text" name="card-no" value="" placeholder="Card Number" wire:model="card_no"
            							oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
            							@error('card_no') <span class="text-danger">{{$message}}</span> @enderror
            						</p>
            						<p class="row-in-form">
            							<label for="exp-month">Expiry Month:<span>*</span></label>
            							<input type="text" name="exp-month" value="" placeholder="MM" wire:model="exp_month"
            							oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
            							@error('exp_month') <span class="text-danger">{{$message}}</span> @enderror
            						</p>
            						<p class="row-in-form">
            							<label for="exp-year">Expiry Year:<span>*</span></label>
            							<input type="text" name="exp-year" value="" placeholder="YYYY" wire:model="exp_year"
            							oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
            							@error('exp_year') <span class="text-danger">{{$message}}</span> @enderror
            						</p>
            						<p class="row-in-form">
            							<label for="cvc">CVC:<span>*</span></label>
            							<input type="password" name="cvc" value="" placeholder="CVC" wire:model="cvc"
            							oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
            							@error('cvc') <span class="text-danger">{{$message}}</span> @enderror
            						</p>
            					</div>
            					@endif
        						@error('paymentmode') <span class="text-danger">{{$message}}</span> @enderror
        					</div>
        					@if (Session::has('checkout'))
        						<p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">${{ Cart::total() }}</span></p>
        					@endif
        					<button type="submit" class="btn_1 checkout_btn_1">Place order now</button>
        				</div>
        				<div class="summary-item shipping-method">
        					<h4 class="title-box f-title">Shipping method</h4>
        					<p class="summary-info"><span class="title">Free Shipping</span></p>
        				</div>
        			</div>
				</form>
			</div><!--end main content area-->
		</div><!-- end container -->
		
	</main>
</div>

