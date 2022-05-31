@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('My Order List'))
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9 mt-2 sidebar_heading">
                <h4>{{\App\CPU\translate('My Orders')}}</h4>
            </div>
        </div>
    </div>

    <!-- Page Content-->
    <div class="container">
        <div class="row">
            <!-- Sidebar-->
            @include('web-views.partials._profile-aside')
            <!-- Content  -->
            <section class="col-lg-9 col-md-9 row">
                @foreach($orders as $order)
                    <div class="col-md-4">
                        <div class="card border">
                            <div class="card-header bg-light p-3">
                            {{\App\CPU\translate('ID')}}: {{$order['id']}}
                            <br>
                            {{$order['created_at']->diffForHumans()}}
                            </div>
                            <div class="card-body p-3">
                                @foreach ($order->details as $key=>$detail)
                                    @php($product=json_decode($detail->product_details,true))
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <img onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$product['thumbnail']}}"
                                                     alt="VR Collection"
                                                     style="width: 100%;"
                                                     >
                                        </div>
                                        <div class="col-md-9">
                                            <a href="{{route('product',[$product['slug']])}}">
                                                    {{isset($product['name']) ? Str::limit($product['name'],40) : ''}}
                                                </a>                                         
                                        </div>
                                    </div>
                                @endforeach
                                
                                    @if($order['order_status']=='failed' || $order['order_status']=='canceled')
                                            <span class="badge badge-danger text-capitalize p-2">
                                                {{\App\CPU\translate($order['order_status'])}}
                                            </span>
                                        @elseif($order['order_status']=='confirmed' || $order['order_status']=='processing' || $order['order_status']=='delivered')
                                            <span class="badge badge-success text-capitalize p-2">
                                                {{\App\CPU\translate($order['order_status'])}}
                                            </span>
                                        @else
                                            <span class="badge badge-warning text-capitalize p-2">
                                                {{\App\CPU\translate($order['order_status'])}}
                                            </span>
                                    @endif
                                    <p class="font-weight-bold text-primary">{{\App\CPU\Helpers::currency_converter($order['order_amount'])}}</p>
                                   
                            </div>
                            <div class="card-footer">
                              
                                        <a href="{{ route('account-order-details', ['id'=>$order->id]) }}"
                                           class="btn btn-block btn-primary btn-sm mb-1 col-12">
                                            <i class="fa fa-eye"></i> {{\App\CPU\translate('view')}}
                                        </a>
                                        @if($order['payment_method']=='cash_on_delivery' && $order['order_status']=='pending')
                                            <a href="javascript:" onclick="route_alert('{{ route('order-cancel',[$order->id]) }}','{{\App\CPU\translate('want_to_cancel_this_order?')}}')"
                                               class=" col-12 btn btn-danger btn-sm btn-clock">
                                                <i class="fa fa-trash"></i> {{\App\CPU\translate('cancel')}}
                                            </a>
                                        @else
                                            <button class="btn btn-block btn-danger btn-sm top-margin" onclick="cancel_message()">
                                                <i class="fa fa-trash"></i> {{\App\CPU\translate('cancel')}}
                                            </button>
                                        @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </section>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function cancel_message() {
            toastr.info('{{\App\CPU\translate('order_can_be_canceled_only_when_pending.')}}', {
                CloseButton: true,
                ProgressBar: true
            });
        }
    </script>
@endpush
