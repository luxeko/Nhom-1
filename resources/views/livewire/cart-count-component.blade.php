<div>
    <div class="navbar__icon" style="margin-top: 5px; padding-top:10px">
        <a class="navbar__icon" href="/cart" >
            <ion-icon name="cart-outline" style="visibility: visible;"></ion-icon>
            <span class="fa badge" style="vertical-align: top; margin-left: -5px; padding: 0">
                @if(Cart::count() > 0)									
                    {{Cart::count()}}	
                @endif
            </span>
        </a>
    </div>
</div>
