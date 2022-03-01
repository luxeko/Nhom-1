<div>
  <section class="cart_area padding_top">
    <div class="container">
      @if(Session::has('success_message'))
        <div class="alert alert-success">
          <strong>Success</strong> {{Session::get('success_message')}}
        </div>
      @endif
      <div class="cart_inner">
        <div class="table-responsive">
          @if(Cart::count() > 0)
            <table class="table">
              <thead>
                <tr>
                  <th class="text-center" scope="col">Product</th>
                  <th class="text-center" scope="col">Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Subtotal</th>
                </tr>
              </thead>
              <tbody>
                @foreach (Cart::content() as $item)
                <tr>
                  <td colspan=1 style="width: 20%">
                    <div class="media d-flex flex-column">
                      <div class="">
                        <a href="{{route('product.details', ['slug'=>$item->model->slug])}}">
                          <img src="{{ $item->model->feature_image_path }}" alt="{{$item->model->name}}" style="width: 100%"/>
                        </a>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="text-center">
                      <a href="{{route('product.details', ['slug'=>$item->model->slug])}}"><p>{{$item->model->name}}</p></a>
                    </div>
                  </td>
                  <td >
                    <h5>${{number_format($item->price)}}</h5>
                  </td>
                  <td>
                  <div class="quantity">
                    <div class="product_count">
                      <input name="input-number" type="text" value="{{$item->qty}}" data-max="120" pattern="[0-9]*">
                      <span class="input-number-increment"><a class="ti-angle-up" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"></a></span>
                      <span class="input-number-decrement"><a class="ti-angle-down" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"></a></span>
                    </div>
                  </div>
                  </td>
                  <td>
                    <h5>${{$item->subtotal()}}</h5>
                  </td>
                  <td> 
                    <a href="" wire:click.prevent="destroy('{{$item->rowId}}')" style="color: #2a2a2a;">
                      <i class="fas fa-trash-alt"></i>
                    </a>
                  </td>
                </tr>
                @endforeach
                <!-- <tr class="bottom_button">
                  <td>
                    <a class="btn_1" href="#">Update Cart</a>
                  </td>
                  <td></td>
                  <td></td>
                  <td>
                    <div class="cupon_text float-right">
                    </div>
                  </td>
                </tr> -->
                <tr class="shipping_area">
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Subtotal</h5>
                  </td>
                  <td>
                    <h5>${{Cart::subtotal()}}</h5>
                  </td>
                </tr>
                <tr class="shipping_area">
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Tax</h5>
                  </td>
                  <td>
                    <h5>${{Cart::tax()}}</h5>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Shipping</h5>
                  </td>
                  <td>
                    <div class="shipping_box">
                        <ul class="list">
                          <li>
                            <h5>Free shipping</h5>
                          </li>
                        </ul>
                      </div>
                  </td>
                </tr>
                <tr class="shipping_area">
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Total</h5>
                  </td>
                  <td>
                    <h5>${{Cart::total()}}</h5>
                  </td>
                </tr>
              </tbody>
            </table>
            <div class="checkout_btn_inner float-right">
              <a class="btn_1" href="/">Continue Shopping</a>
              <a class="btn_1 checkout_btn_1" href="#" wire:click.prevent="checkout">Proceed to checkout</a>
            </div>
          @else
            <div class="text-center" style="padding:30px 0;">
              <h1>Your cart is empty!</h1>
              <p>Add item to it now</p>
              <a href="/" class="btn btn-success">Shop Now</a>
            </div>
          @endif
        </div>
      </div>
    </div>
  </section>
</div>
