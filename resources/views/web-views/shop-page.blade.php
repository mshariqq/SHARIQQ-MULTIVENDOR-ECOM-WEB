@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('Shop Page'))

@push('css_or_js')
    @if($shop['id'] != 0)
        <meta property="og:image" content="{{asset('storage/app/public/shop')}}/{{$shop->image}}"/>
        <meta property="og:title" content="{{ $shop->name}} "/>
        <meta property="og:url" content="{{route('shop-view',[$shop['id']])}}">
    @else
        <meta property="og:image" content="{{asset('storage/app/public/company')}}/{{$web_config['fav_icon']->value}}"/>
        <meta property="og:title" content="{{ $shop['name']}} "/>
        <meta property="og:url" content="{{route('shop-view',[$shop['id']])}}">
    @endif
    <meta property="og:description" content="{!! substr($web_config['about']->value,0,100) !!}">

    @if($shop['id'] != 0)
        <meta property="twitter:card" content="{{asset('storage/app/public/shop')}}/{{$shop->image}}"/>
        <meta property="twitter:title" content="{{route('shop-view',[$shop['id']])}}"/>
        <meta property="twitter:url" content="{{route('shop-view',[$shop['id']])}}">
    @else
        <meta property="twitter:card"
              content="{{asset('storage/app/public/company')}}/{{$web_config['fav_icon']->value}}"/>
        <meta property="twitter:title" content="{{route('shop-view',[$shop['id']])}}"/>
        <meta property="twitter:url" content="{{route('shop-view',[$shop['id']])}}">
    @endif
    <meta property="twitter:description" content="{!! substr($web_config['about']->value,0,100) !!}">

@endpush

@section('content')
    <!-- Page Content-->
    <div class="container mb-5">
        <div class="row">
            <!-- banner  -->
            <div class="col-lg-12 mt-2 p-0">
                <div class="col-12 p-0">
                    @if($shop['id'] != 0)
                        <div class="" style="max-height: 200px; overflow: hidden">
                            <img 
                                src="{{asset('storage/app/public/shop/banner')}}/{{$shop->banner}}"
                                onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                alt="">
                        </div>
                       
                    @else
                        @php($banner=\App\CPU\Helpers::get_business_settings('shop_banner'))
                        <div class="" style="max-height: 200px; overflow: hidden">
                            <img 
                             src="{{asset("storage/app/public/shop")}}/{{$banner??""}}"
                             onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                             alt="">
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-12 border p-3 mt-2">
                <div class="row">
                    <div class="col-md-8 col-12 row">
                            <div class="col-2">
                                @if($shop['id'] != 0)
                                    <img style="max-height: 100%;width:auto; border-radius: 5px;"
                                         src="{{asset('storage/app/public/shop')}}/{{$shop->image}}"
                                         onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                         alt="">
                                @else
                                    <img style="height: 100%;width:auto; border-radius: 5px;"
                                         src="{{asset('storage/app/public/company')}}/{{$web_config['fav_icon']->value}}"
                                         onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                         alt="">
                                @endif
                            </div>
                            <div class="col-md-10 col-12">
                                <h3>@if($shop['id'] != 0)
                                        {{ $shop->name}}
                                    @else
                                        {{ $web_config['name']->value }}
                                    @endif</h3>
                                    <p>
                                        @for($count=0; $count<5; $count++)
                                            @if($avg_rating >= $count+1)
                                                <i class="fa fa-star"></i>
                                            @else
                                                <i class="fa fa-star" style="color:#fea569 !important"></i>
                                            @endif
                                        @endfor
                                        (<span class="ml-1">{{round($avg_rating,2)}}</span>)
                                    </p>
                            </div>
                    </div>
                    <div class="col-md-4 col-12 text-right align-items-end">
                                
                                <p>
                                    {{ $total_review}} {{\App\CPU\translate('reviews')}} 
                                    </p>
                                    <p>
                                    {{ $total_order}} {{\App\CPU\translate('orders')}}
                                    </p>
                                    @if($seller_id!=0)
                                    @if (auth('customer')->check())
                                            <button class="btn btn-outline-primary btn-round" data-toggle="modal"
                                                    data-target="#exampleModal">
                                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                                {{\App\CPU\translate('Chat with seller ')}}
                                            </button>
                                    @else
                                            <a href="{{route('customer.auth.login')}}" class="btn btn-primary btn-round">
                                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                                {{\App\CPU\translate('Chat with seller ')}}
                                            </a>
                                    @endif
                                @endif
                    </div>
                </div>
            </div>
            {{-- Motal --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="card-header">
                                {{\App\CPU\translate('write_something')}}
                            </div>
                            <div class="modal-body">
                                <form action="{{route('messages_store')}}" method="post" id="chat-form">
                                    @csrf
                                    @if($shop['id'] != 0)
                                        <input value="{{$shop->id}}" name="shop_id" hidden>
                                        <input value="{{$shop->seller_id}}}" name="seller_id" hidden>
                                    @endif

                                    <textarea name="message" class="form-control" required></textarea>
                                    <br>
                                    @if($shop['id'] != 0)
                                        <button class="btn btn-primary" style="color: white;">{{\App\CPU\translate('send')}}</button>
                                    @else
                                        <button class="btn btn-primary" style="color: white;" disabled>{{\App\CPU\translate('send')}}</button>
                                    @endif
                                </form>
                            </div>
                            <div class="card-footer">
                                <a href="{{route('chat-with-seller')}}" class="btn btn-primary mx-1">
                                    {{\App\CPU\translate('go_to')}} {{\App\CPU\translate('chatbox')}}
                                </a>
                                <button type="button" class="btn btn-secondary pull-right" data-dismiss="modal">{{\App\CPU\translate('close')}}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                
            <div class="row col-12 p-0 mt-3">
                <div class="col-md-3">
                    <div class="card bg-light p-3">
                        <h5 class="">{{\App\CPU\translate('Categories')}}</h5>
                        
                        <ul class="p-3">
                            @foreach($categories as $category)
                                <li class="row justify-content-between">
                                    <span class="d-flex align-items-center">
                                    <img class="img-responsive" style="width: 20px; border-radius:5px;height:20px;"
                                                    onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                                    src="{{asset('storage/app/public/category')}}/{{$category['icon']}}">
                                    <a class="ml-3" href="{{route('shop-view',['id'=> $seller_id,'category_id'=>$category['id']])}}'">{{$category['name']}}</a>
                                    </span>
                                    <strong class="pull-right for-brand-hover" style="cursor: pointer"
                                                        onclick="$('#collapse-{{$category['id']}}').toggle(400)">
                                                    {{$category->childes->count()>0?'+':''}}
                                    </strong>
                                            <div class="col-12" id="collapse-{{$category['id']}}"
                                                 style="display: none">
                                                @foreach($category->childes as $child)
                                                    <div class="pl-3">
                                                        <label style="cursor: pointer"
                                                               onclick="location.href='{{route('shop-view',['id'=> $seller_id,'category_id'=>$child['id']])}}'">
                                                           <i class="fa fa-chevron-right"></i> {{$child['name']}}
                                                        </label>
                                                        <strong class="pull-right" style="cursor: pointer"
                                                                onclick="$('#collapse-{{$child['id']}}').toggle(400)">
                                                            {{$child->childes->count()>0?'+':''}}
                                                        </strong>
                                                    </div>
                                                    <div class="col-12" id="collapse-{{$child['id']}}"
                                                         style="display: none">
                                                        @foreach($child->childes as $ch)
                                                            <div class="col-12 pl-5">
                                                                <label class="for-hover-lable" style="cursor: pointer"
                                                                       onclick="location.href='{{route('shop-view',['id'=> $seller_id,'category_id'=>$ch['id']])}}'">
                                                                    <i class="fa fa-chevron-right"></i> {{$ch['name']}}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>
                                </li>
                            @endforeach
                        </ul>
                        
                    </div>

                </div>
                <div class="col-md-9">
                <div class="row col-12">
                            <form class="{{--form-inline--}} md-form form-sm mt-0" method="get"
                              action="{{route('shop-view',['id'=>$seller_id])}}">
                                    <div class="header-search-wrapper search-wrapper-wide d-flex">                                
                                        <input type="search" class="form-control" name="product_name" placeholder="Search product in this seller store" required="">
                                        <p><button class="btn btn-primary btn-sm" type="submit"><i class="icon-search"></i></button></p>
                                    </div><!-- End .header-search-wrapper -->
                            </form>
                </div>
                <!-- Products grid-->
                <div class="row" id="ajax-products">
                    @include('web-views.products._ajax-products',['products'=>$products])
                </div>
                </div>
            </div>
        
        </div>
    </div>

    <script>
        function productSearch(seller_id, category_id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: '{{url('/')}}/shop-view/' + seller_id + '?category_id=' + category_id,

                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (response) {
                    $('#ajax-products').html(response.view);
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        }

        function openNav() {

            document.getElementById("mySidepanel").style.width = "50%";
        }

        function closeNav() {
            document.getElementById("mySidepanel").style.width = "0";
        }

        $('#chat-form').on('submit', function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: '{{route('messages_store')}}',
                data: $('#chat-form').serialize(),
                success: function (respons) {
                    alert("Send");
                    // toastr.success('{{\App\CPU\translate("send successfully")}}', {
                    //     CloseButton: true,
                    //     ProgressBar: true
                    // });
                    $('#chat-form').trigger('reset');
                }
            });

        });
    </script>
@endsection