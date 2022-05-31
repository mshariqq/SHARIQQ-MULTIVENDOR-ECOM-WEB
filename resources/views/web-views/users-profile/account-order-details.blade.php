@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('Order Details'))

@section('content')

    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4 mt-3 rtl"
         style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
        <div class="row">
            <!-- Sidebar-->
            @include('web-views.partials._profile-aside')

            {{-- Content --}}
            <section class="col-lg-9 col-md-9">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <a class="page-link" href="{{ route('account-oder') }}">
                            <i class="fa fa-chevron-left"></i>{{\App\CPU\translate('Go Back')}}
                        </a>
                    </div>
                </div>
                
                <div class="col-12 mb-2">
                    <a href="{{route('generate-invoice',[$order->id])}}" class="btn btn-warning btn-round mb-2 for-glaxy-mobile"
                       >
                       <i class="fa fa-print"></i>
                        {{\App\CPU\translate('generate_invoice')}}
                    </a>
                    <br>
                    <a class="btn btn-primary btn-round" type="button"
                       href="{{route('track-order.result',['order_id'=>$order['id']])}}"
                       style="width:50%; color: white">
                       <i class="fa fa-search"></i>
                        {{\App\CPU\translate('Track')}} {{\App\CPU\translate('Order')}}
                    </a>
                </div>

                <div class=" col-12 row mb-3">
                    <div class="col-md-4 col-12">
                        <div class="card border">
                            <div class="card-body">
                            <p>{{\App\CPU\translate('order_no')}} : <b>{{$order->id}}</b></p>
                            <p>{{\App\CPU\translate('order_date')}} :   <b>{{$order->created_at->diffForHumans()}}</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="card border">
                            <div class="card-body">
                                <h6>{{\App\CPU\translate('Shipping Address')}}</h6>
                                @if($order->shippingAddress)
                                            @php($shipping=$order->shippingAddress)
                                        @else
                                            @php($shipping=json_decode($order['shipping_address_data']))
                                        @endif

                                        <span class="spanTr text-dark">
                                            @if($shipping)
                                                {{$shipping->address}},<br>
                                                    {{$shipping->city}}
                                                , {{$shipping->zip}}
                                                
                                            @endif
                                        </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="card border">
                            <div class="card-body">
                                <h6>{{\App\CPU\translate('Billing Address')}}</h6>

                                @if($order->billingAddress)
                                            @php($billing=$order->billingAddress)
                                        @else
                                            @php($billing=json_decode($order['billing_address_data']))
                                        @endif

                                            <span class="spanTr text-dark">
                                                @if($billing)
                                                    {{$billing->address}}, <br>
                                                     {{$billing->city}}
                                                    , {{$billing->zip}}
                                                    
                                                @else
                                                    {{$shipping->address}},<br>
                                                     {{$shipping->city}}
                                                    , {{$shipping->zip}}
                                                @endif
                                            </span>
                                        
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card ">
                    @if(\App\CPU\Helpers::get_business_settings('order_verification'))
                        <div class="card-header">
                            <h4>{{\App\CPU\translate('order_verification_code')}} : {{$order['verification_code']}}</h4>
                        </div>
                    @endif
                    <div class="payment mb-3  table-responsive">
                        @if(isset($order['seller_id']) != 0)
                            @php($shopName=\App\Model\Shop::where('seller_id', $order['seller_id'])->first())
                        @endif

                        <table class="table table-borderless">
                            <tbody>
                            @foreach ($order->details as $key=>$detail)
                                @php($product=json_decode($detail->product_details,true))
                                <tr>
                                    <div class="row">
                                        <div class="col-md-6"
                                             onclick="location.href='{{route('product',$product['slug'])}}'">
                                            <td class="col-2 for-tab-img">
                                                <img
                                                     onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                                     src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$product['thumbnail']}}"
                                                     alt="VR Collection" width="100%">
                                            </td>
                                            <td class="col-10 for-glaxy-name" style="vertical-align:middle;">

                                                <a class="font-weight-bold" href="{{route('product',[$product['slug']])}}">
                                                    {{isset($product['name']) ? Str::limit($product['name'],60) : ''}}
                                                </a> 
                                                @if($detail->refund_request == 1)
                                                    <small> ({{\App\CPU\translate('refund_pending')}}) </small> <br>
                                                @elseif($detail->refund_request == 2)
                                                    <small> ({{\App\CPU\translate('refund_approved')}}) </small> <br>
                                                @elseif($detail->refund_request == 3)
                                                    <small> ({{\App\CPU\translate('refund_rejected')}}) </small> <br>
                                                @elseif($detail->refund_request == 4)
                                                    <small> ({{\App\CPU\translate('refund_refunded')}}) </small> <br>
                                                @endif<br>
                                                <span>{{\App\CPU\translate('variant')}} : </span>
                                                {{$detail->variant}}
                                            </td>
                                        </div>
                                        <div class="col-md-4">
                                            <td width="100%">
                                                
                                                    <span
                                                        class="font-weight-bold amount">{{\App\CPU\Helpers::currency_converter($detail->price)}} </span>
                                                    <br>
                                                    <span>{{\App\CPU\translate('qty')}}: {{$detail->qty}}</span>
                                                
                                            </td>
                                        </div>
                                        <?php
                                            $refund_day_limit=\App\CPU\Helpers::get_business_settings('refund_day_limit');
                                            $order_details_date = $detail->created_at;
                                            $current = \Carbon\Carbon::now();
                                            $length = $order_details_date->diffInDays($current);                                          

                                        ?>
                                        <div class="col-md-2">
                                            <td>
                                                @if($order->order_type == 'default_type')
                                                    @if($order->order_status=='delivered')
                                                        <a href="{{route('submit-review',[$detail->id])}}" class="btn btn-primary btn-sm d-inline-block w-100 mb-2">{{\App\CPU\translate('review')}}</a>
                                                        
                                                        @if($detail->refund_request !=0)
                                                            <a href="{{route('refund-details',[$detail->id])}}" class="btn btn-primary btn-sm d-inline-block w-100 mb-2">
                                                                {{\App\CPU\translate('refund_details')}}
                                                            </a>
                                                        @endif
                                                        @if( $length <= $refund_day_limit && $detail->refund_request == 0)
                                                            <a href="{{route('refund-request',[$detail->id])}}"
                                                            class="btn btn-primary btn-sm d-inline-block">{{\App\CPU\translate('refund_request')}}</a>
                                                        @endif
                                                    {{--@else
                                                        <a href="javascript:" onclick="review_message()"
                                                        class="btn btn-primary btn-sm d-inline-block w-100 mb-2">{{\App\CPU\translate('review')}}</a>
                                                        
                                                        @if($length <= $refund_day_limit)
                                                            <a href="javascript:" onclick="refund_message()"
                                                                class="btn btn-primary btn-sm d-inline-block">{{\App\CPU\translate('refund_request')}}</a>
                                                        @endif --}}
                                                    @endif
                                                @else
                                                    <label class="badge badge-secondary">
                                                            <a 
                                                            class="btn btn-primary btn-sm">{{\App\CPU\translate('pos_order')}}</a>
                                                        </label>
                                                @endif
                                            </td>    
                                        </div>
                                    </div>
                                </tr>
                            @endforeach
                            @php($summary=\App\CPU\OrderManager::order_summary($order))
                            </tbody>
                        </table>
                        @php($extra_discount=0)
                        <?php
                            if ($order['extra_discount_type'] == 'percent') {
                                $extra_discount = ($summary['subtotal'] / 100) * $order['extra_discount'];
                            } else {
                                $extra_discount = $order['extra_discount'];
                            }
                        ?>
                        @if($order->delivery_type !=null)
                        
                            <div class="p-2">
                                <h4>{{\App\CPU\translate('Delivery Info')}} </h4>
                                <hr>
                                <div class="m-2">
                                    @if ($order->delivery_type == 'self_delivery')
                                        <p style="color: #414141 !important ; padding-top:5px;">
                                    
                                            <span style="text-transform: capitalize">
                                                {{\App\CPU\translate('delivery_man_name')}} : {{$order->delivery_man['f_name'].' '.$order->delivery_man['l_name']}}
                                            </span>
                                            {{-- <br>
                                            <span style="text-transform: capitalize">
                                                {{\App\CPU\translate('delivery_man_phone')}} : {{$order->delivery_man['phone']}}
                                            </span> --}}
                                        </p>
                                    @else
                                    <p style="color: #414141 !important ; padding-top:5px;">
                                        <span>
                                            {{\App\CPU\translate('delivery_service_name')}} : {{$order->delivery_service_name}}
                                        </span>
                                        <br>
                                        <span>
                                            {{\App\CPU\translate('tracking_id')}} : {{$order->third_party_delivery_tracking_id}}
                                        </span>
                                    </p>
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if($order->order_note !=null)
                            <div class="p-2">
                                <h4>{{\App\CPU\translate('order_note')}}</h4>
                                <hr>
                                <div class="m-2">
                                    <p>
                                        {{$order->order_note}} 
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                
                {{--Calculation--}}
                <div class="row d-flex justify-content-end">
                    <div class="col-md-8 col-lg-5">
                        <table class="table table-borderless">
                            <tbody class="totals">
                            <tr>
                                <td>
                                    <div class="text-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}"><span
                                            class="product-qty ">{{\App\CPU\translate('Item')}}</span></div>
                                </td>
                                <td>
                                    <div class="text-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}">
                                        <span>{{$order->details->count()}}</span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="text-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}"><span
                                            class="product-qty ">{{\App\CPU\translate('Subtotal')}}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}">
                                        <span>{{\App\CPU\Helpers::currency_converter($summary['subtotal'])}}</span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="text-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}"><span
                                            class="product-qty ">{{\App\CPU\translate('text_fee')}}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}">
                                        <span>{{\App\CPU\Helpers::currency_converter($summary['total_tax'])}}</span>
                                    </div>
                                </td>
                            </tr>
                            @if($order->order_type == 'default_type')
                            <tr>
                                <td>
                                    <div class="text-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}"><span
                                            class="product-qty ">{{\App\CPU\translate('Shipping')}} {{\App\CPU\translate('Fee')}}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}">
                                        <span>{{\App\CPU\Helpers::currency_converter($summary['total_shipping_cost'])}}</span>
                                    </div>
                                </td>
                            </tr>
                            @endif

                            <tr>
                                <td>
                                    <div class="text-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}"><span
                                            class="product-qty ">{{\App\CPU\translate('Discount')}} {{\App\CPU\translate('on_product')}}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}">
                                        <span>- {{\App\CPU\Helpers::currency_converter($summary['total_discount_on_product'])}}</span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="text-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}"><span
                                            class="product-qty ">{{\App\CPU\translate('Coupon')}} {{\App\CPU\translate('Discount')}}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}">
                                        <span>- {{\App\CPU\Helpers::currency_converter($order->discount_amount)}}</span>
                                    </div>
                                </td>
                            </tr>

                            @if($order->order_type != 'default_type')
                                <tr>
                                <td>
                                    <div class="text-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}"><span
                                            class="product-qty ">{{\App\CPU\translate('extra')}} {{\App\CPU\translate('Discount')}}</span>
                                    </div>
                                </td>
                                
                                <td>
                                    <div class="text-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}">
                                        <span>- {{\App\CPU\Helpers::currency_converter($extra_discount)}}</span>
                                    </div>
                                </td>
                            </tr>
                            @endif

                            <tr class="border-top border-bottom">
                                <td>
                                    <div class="text-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}"><span
                                            class="font-weight-bold">{{\App\CPU\translate('Total')}}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}"><span
                                            class="font-weight-bold amount ">{{\App\CPU\Helpers::currency_converter($order->order_amount)}}</span>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection


@push('script')
    <script>
        function review_message() {
            toastr.info('{{\App\CPU\translate('you_can_review_after_the_product_is_delivered!')}}', {
                CloseButton: true,
                ProgressBar: true
            });
        }

        function refund_message(){
            toastr.info('{{\App\CPU\translate('you_can_refund_request_after_the_product_is_delivered!')}}', {
                CloseButton: true,
                ProgressBar: true
            });
        }
    </script>
@endpush

