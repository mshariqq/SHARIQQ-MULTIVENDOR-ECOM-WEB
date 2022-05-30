<!-- <div class="feature_header">
    <span>{{ \App\CPU\translate('shopping_cart')}}</span>
</div> -->

<!-- Grid-->
<!-- <hr class="view_border"> -->


@php($shippingMethod=\App\CPU\Helpers::get_business_settings('shipping_method'))
@php($cart=\App\Model\Cart::where(['customer_id' => auth('customer')->id()])->get()->groupBy('cart_group_id'))


@if( $cart->count() == 0)
<div class="alert alert-danger" role="alert">
    <strong>{{\App\CPU\translate('cart_empty')}}</strong>
</div>
@endif

<div class="row">
    <div class="col-lg-9">
    @foreach($cart as $group_key=>$group)
        <div class="col-12 p-0">
            @foreach($group as $cart_key=>$cartItem)
                @if ($shippingMethod=='inhouse_shipping')
                <?php

                $admin_shipping = \App\Model\ShippingType::where('seller_id', 0)->first();
                $shipping_type = isset($admin_shipping) == true ? $admin_shipping->shipping_type : 'order_wise';

                ?>
                @else
                <?php
                if ($cartItem->seller_is == 'admin') {
                    $admin_shipping = \App\Model\ShippingType::where('seller_id', 0)->first();
                    $shipping_type = isset($admin_shipping) == true ? $admin_shipping->shipping_type : 'order_wise';
                } else {
                    $seller_shipping = \App\Model\ShippingType::where('seller_id', $cartItem->seller_id)->first();
                    $shipping_type = isset($seller_shipping) == true ? $seller_shipping->shipping_type : 'order_wise';
                }
                ?>
                @endif

                @if($cart_key==0)
                @if($cartItem->seller_is=='admin')
                <p class="bg-light p-3">
                    <span>{{ \App\CPU\translate('shop_name')}} : </span>
                    <a href="{{route('shop-view',['id'=>0])}}">{{\App\CPU\Helpers::get_business_settings('company_name')}}</a>
                </p>
                @else
                <p class="bg-light p-3">
                    <span>{{ \App\CPU\translate('shop_name')}}:</span>
                    <a href="{{route('shop-view',['id'=>$cartItem->seller_id])}}">
                        {{\App\Model\Shop::where(['seller_id'=>$cartItem['seller_id']])->first()->name}}
                    </a>
                </p>
                @endif
                @endif
            @endforeach
        </div>
        <table class="table table-cart table-mobile">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
            @foreach($group as $cart_key=>$cartItem)
                <tr>
                    <td class="product-col">
                        <div class="product">
                            <figure class="product-media">
                                <a href="{{route('product',$cartItem['slug'])}}">
                                            <img style="height: 62px;" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$cartItem['thumbnail']}}" alt="Product">
                                        </a>
                            </figure>

                            <h3 class="product-title">
                                <a class="mb-2" href="{{route('product',$cartItem['slug'])}}">{{$cartItem['name']}}</a>
                                <br>
                                <p class="mt-2">
                                    @foreach(json_decode($cartItem['variations'],true) as $key1 =>$variation)
                                        <span class="bg-light p-2 round border">
                                            {{$key1}} : {{$variation}}</span>

                                    @endforeach
                                </p>
                                <br>
                                    @if ( $shipping_type != 'order_wise')
                                    <p class="text-success">
                                        {{ \App\CPU\Helpers::currency_converter($cartItem['shipping_cost']) }}
                                    </p>
                                    @endif
                                
                            </h3><!-- End .product-title -->
                        </div><!-- End .product -->
                    </td>
                    <td class="price-col">
                                {{ \App\CPU\Helpers::currency_converter($cartItem['price']-$cartItem['discount']) }}</div>
                                @if($cartItem['discount'] > 0)
                                <strike class="text-danger">
                                    {{\App\CPU\Helpers::currency_converter($cartItem['price'])}}
                                </strike>
                                @endif
                    </td>
                    <td class="quantity-col">
                        <div class="cart-product-quantity">
                            <input 
                            name="quantity[{{ $cartItem['id'] }}]" id="cartQuantity{{$cartItem['id']}}" onchange="updateCartQuantity('{{$cartItem['id']}}')"
                            type="number" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                        </div><!-- End .cart-product-quantity -->
                    </td>
                    <td class="total-col">
                        {{ \App\CPU\Helpers::currency_converter(($cartItem['price']-$cartItem['discount'])*$cartItem['quantity']) }}
                    </td>
                    <td class="remove-col">
                        <button class="btn-remove" onclick="removeFromCart({{ $cartItem['id'] }})"><i class="icon-close"></i></button></td>
                </tr>
                        @if($shippingMethod=='sellerwise_shipping' && $shipping_type == 'order_wise')
                                @php($choosen_shipping=\App\Model\CartShipping::where(['cart_group_id'=>$cartItem['cart_group_id']])->first())

                                @if(isset($choosen_shipping)==false)
                                @php($choosen_shipping['shipping_method_id']=0)
                                @endif

                                @php($shippings=\App\CPU\Helpers::get_shipping_methods($cartItem['seller_id'],$cartItem['seller_is']))
                                <tr>
                                    <td colspan="4">

                                        @if($cart_key==$group->count()-1)

                                        <!-- choosen shipping method-->

                                        <div class="row">

                                            <div class="col-12">
                                                <select class="form-control" onchange="set_shipping_id(this.value,'{{$cartItem['cart_group_id']}}')">
                                                    <option>{{\App\CPU\translate('choose_shipping_method')}}</option>
                                                    @foreach($shippings as $shipping)
                                                    <option value="{{$shipping['id']}}" {{$choosen_shipping['shipping_method_id']==$shipping['id']?'selected':''}}>
                                                        {{$shipping['title'].' ( '.$shipping['duration'].' ) '.\App\CPU\Helpers::currency_converter($shipping['cost'])}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        @endif
                                    </td>
                                    <td colspan="3">
                                        @if($cart_key==$group->count()-1)
                                        <div class="row">
                                            <div class="col-12">
                                                <span>
                                                    <b>{{\App\CPU\translate('shipping_cost')}} : </b>
                                                </span>
                                                {{\App\CPU\Helpers::currency_converter($choosen_shipping['shipping_method_id']!= 0?$choosen_shipping->shipping_cost:0)}}
                                            </div>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                
                        @endif
            @endforeach
            </tbody>
        </table><!-- End .table table-wishlist -->
    @endforeach
    <div class="cart-bottom">
            <div class="cart-discount">
                <form action="#">
                    <div class="input-group">
                        <input type="text" class="form-control" required placeholder="coupon code">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
                        </div><!-- .End .input-group-append -->
                    </div><!-- End .input-group -->
                </form>
            </div><!-- End .cart-discount -->

            <a href="#" class="btn btn-outline-dark"><span>UPDATE CART</span><i class="icon-refresh"></i></a>
        </div><!-- End .cart-bottom -->
    </div><!-- End .col-lg-9 -->
    <aside class="col-lg-3">
        <div class="summary summary-cart">
            <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

            <table class="table table-summary">
                <tbody>
                    <tr class="summary-subtotal">
                        <td>Subtotal:</td>
                        <td>$160.00</td>
                    </tr><!-- End .summary-subtotal -->
                    <tr class="summary-shipping">
                        <td>Shipping:</td>
                        <td>&nbsp;</td>
                    </tr>
                    
                    <tr class="summary-shipping-row">
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
                                <label class="custom-control-label" for="free-shipping">Free Shipping</label>
                            </div><!-- End .custom-control -->
                        </td>
                        <td>$0.00</td>
                    </tr><!-- End .summary-shipping-row -->

                    <tr class="summary-shipping-row">
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="standart-shipping" name="shipping" class="custom-control-input">
                                <label class="custom-control-label" for="standart-shipping">Standart:</label>
                            </div><!-- End .custom-control -->
                        </td>
                        <td>$10.00</td>
                    </tr><!-- End .summary-shipping-row -->

                    <tr class="summary-shipping-row">
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="express-shipping" name="shipping" class="custom-control-input">
                                <label class="custom-control-label" for="express-shipping">Express:</label>
                            </div><!-- End .custom-control -->
                        </td>
                        <td>$20.00</td>
                    </tr><!-- End .summary-shipping-row -->

                    <tr class="summary-shipping-estimate">
                        <td>Estimate for Your Country<br> <a href="dashboard.html">Change address</a></td>
                        <td>&nbsp;</td>
                    </tr><!-- End .summary-shipping-estimate -->

                    <tr class="summary-total">
                        <td>Total:</td>
                        <td>$160.00</td>
                    </tr><!-- End .summary-total -->
                </tbody>
            </table><!-- End .table table-summary -->

            <a href="#" onclick="checkout()" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
        </div><!-- End .summary -->

        <a onclick="checkout()" href="#" class="btn btn-outline-dark-2 btn-block mb-3"><span> {{\App\CPU\translate('checkout')}}</span><i class="icon-refresh"></i></a>
    </aside><!-- End .col-lg-3 -->
</div><!-- End .row -->


<script>
    cartQuantityInitialize();

    function set_shipping_id(id, cart_group_id) {
        $.get({
            url: '{{url(' / ')}}/customer/set-shipping-method',
            dataType: 'json',
            data: {
                id: id,
                cart_group_id: cart_group_id
            },
            beforeSend: function() {
                $('#loading').show();
            },
            success: function(data) {
                location.reload();
            },
            complete: function() {
                $('#loading').hide();
            },
        });
    }

    function checkout() {
        let order_note = $('#order_note').val();
        //console.log(order_note);
        $.post({
            url: "{{route('order_note')}}",
            data: {
                _token: '{{csrf_token()}}',
                order_note: order_note,

            },
            beforeSend: function() {
                $('#loading').show();
            },
            success: function(data) {
                let url = "{{ route('checkout-details') }}";
                location.href = url;

            },
            complete: function() {
                $('#loading').hide();
            },
        });
    }
</script>