<div class="feature_header">
    <h4>{{ \App\CPU\translate('shopping_cart')}}</h4>
</div>
<!-- Grid-->
@php($shippingMethod=\App\CPU\Helpers::get_business_settings('shipping_method'))
@php($cart=\App\Model\Cart::where(['customer_id' => auth('customer')->id()])->get()->groupBy('cart_group_id'))
<div class="row">
    <!-- List of items-->
    <section class="col-lg-8 col-12">
        <div class="cart_information">
            @foreach($cart as $group_key=>$group)
                <div class="col-12 bg-light mb-1 pb-3 pt-3">
                @foreach($group as $cart_key=>$cartItem)
                    @if($cart_key==0)
                        @if($cartItem->seller_is=='admin')
                            <p class="bg-light">
                            Seller : <b class="text-primary">{{\App\CPU\Helpers::get_business_settings('company_name')}}</b>
                            </p>
                        @else
                            <p class="bg-light">
                            Seller : <b class="text-primary">{{\App\Model\Shop::where(['seller_id'=>$cartItem['seller_id']])->first()->name}}</b>
                            </p>
                        @endif
                    @endif
 
                    <div class="card p-3 mb-2 border mt-2">
                        <!-- 1st row -->
                        <div class="row align-items-start">
                            <div class="col-md-2 col-12">
                                <a href="{{route('product',$cartItem['slug'])}}">
                                            <img style="height: 100%;"
                                                 onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                                 src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$cartItem['thumbnail']}}"
                                                 alt="{{$cartItem['name']}}">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <h6 class="mb-0">
                                    <a href="{{route('product',$cartItem['slug'])}}">{{$cartItem['name']}}</a>
                                </h6>
                                
                                @foreach(json_decode($cartItem['variations'],true) as $key1 =>$variation)
                                
                                                    <span class="mt-1">{{$key1}} : {{$variation}}, </span>
                                @endforeach
                                <br>
                                <select class="form-control form-control-sm col-md-3" name="quantity[{{ $cartItem['id'] }}]" id="cartQuantity{{$cartItem['id']}}"
                                            onchange="updateCartQuantity('{{$cartItem['id']}}')">
                                        @for ($i = 1; $i <= 10; $i++)
                                            <option
                                                value="{{$i}}" {{$cartItem['quantity'] == $i?'selected':''}}>
                                                {{$i}}
                                            </option>
                                        @endfor
                                    </select>
                            </div>
                            <div class="col-md-3 text-right">
                                <p>
                                    <a onclick="removeFromCart({{ $cartItem['id'] }})" class="text-right" href="#">
                                        <i style="font-size: 1.4em;" class="fa fa-times text-dark"></i>
                                    </a>
                                </p>
                                <br>
                                <h6 class="mb-0">Final : <b class="text-primary"> {{ \App\CPU\Helpers::currency_converter(($cartItem['price']-$cartItem['discount'])*$cartItem['quantity']) }}</b> </h6>
                            </div>
                        </div>
                    </div>
                    @if($cart_key==$group->count()-1)
                    <!-- choosen shipping method-->
                        @php($choosen_shipping=\App\Model\CartShipping::where(['cart_group_id'=>$cartItem['cart_group_id']])->first())
                        @if(isset($choosen_shipping)==false)
                            @php($choosen_shipping['shipping_method_id']=0)
                        @endif
                        @if($shippingMethod=='sellerwise_shipping')
                            @php($shippings=\App\CPU\Helpers::get_shipping_methods($cartItem['seller_id'],$cartItem['seller_is']))
                            <div class="row">
                                <div class="col-12">
                                    <select class="form-control"
                                            onchange="set_shipping_id(this.value,'{{$cartItem['cart_group_id']}}')">
                                        <option>{{\App\CPU\translate('choose_shipping_method')}}</option>
                                        @foreach($shippings as $shipping)
                                            <option
                                                value="{{$shipping['id']}}" {{$choosen_shipping['shipping_method_id']==$shipping['id']?'selected':''}}>
                                                {{$shipping['title'].' ( '.$shipping['duration'].' ) '.\App\CPU\Helpers::currency_converter($shipping['cost'])}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
                
                </div>
                <div class="mt-3"></div>
            @endforeach
           
        </div>

    </section>
    <!-- Sidebar-->
    @include('web-views.partials._order-summary')

    <div class="col-12">

        <div class="row pt-2">
            <div class="col-md-6">
                <p>Please select your shipping method to proceed</p>
            @if($shippingMethod=='inhouse_shipping')
                @php($shippings=\App\CPU\Helpers::get_shipping_methods(1,'admin'))
                <div class="row">
                    <div class="col-12">
                        <select class="form-control" onchange="set_shipping_id(this.value,'all_cart_group')">
                            <option>{{\App\CPU\translate('choose_shipping_method')}}</option>
                            @foreach($shippings as $shipping)
                                <option
                                    value="{{$shipping['id']}}" {{$choosen_shipping['shipping_method_id']==$shipping['id']?'selected':''}}>
                                    {{$shipping['title'].' ( '.$shipping['duration'].' ) '.\App\CPU\Helpers::currency_converter($shipping['cost'])}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif
            @if( $cart->count() == 0)
                <div class="d-flex justify-content-center align-items-center">
                    <h4 class="text-danger text-capitalize">{{\App\CPU\translate('cart_empty')}}</h4>
                </div>
            @endif
            </div>
            <div class="col-6 row justify-content-end align-items-center">
                <p class="p-1">
                <a href="{{route('home')}}" class="btn btn-outline-primary btn-round">
                    <i class="fa fa-{{Session::get('direction') === "rtl" ? 'forward' : 'backward'}} px-1"></i> {{\App\CPU\translate('continue_shopping')}}
                </a>
                </p>
                <p class="p-1">
                <a href="{{route('checkout-details')}}"
                   class="btn btn-success btn-round pull-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}">
                    {{\App\CPU\translate('Proceed to Checkout')}}
                    <i class="fa fa-{{Session::get('direction') === "rtl" ? 'backward' : 'forward'}} px-1"></i>
                </a>
                </p>
            </div>
            
        </div>
    </div>
</div>

<script>
    cartQuantityInitialize();
    function set_shipping_id(id, cart_group_id) {
        $.get({
            url: '{{url('/')}}/customer/set-shipping-method',
            dataType: 'json',
            data: {
                id: id,
                cart_group_id: cart_group_id
            },
            beforeSend: function () {
                $('#loading').show();
            },
            success: function (data) {
                location.reload();
            },
            complete: function () {
                $('#loading').hide();
            },
        });
    }
</script>