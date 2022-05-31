@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('Welcome To').' '.$web_config['name']->value)

@push('css_or_js')

<meta property="og:image" content="{{asset('storage/app/public/company')}}/{{$web_config['web_logo']->value}}" />
<meta property="og:title" content="Welcome To {{$web_config['name']->value}} Home" />
<meta property="og:url" content="{{env('APP_URL')}}">
<meta property="og:description" content="{!! substr($web_config['about']->value,0,100) !!}">

<meta property="twitter:card" content="{{asset('storage/app/public/company')}}/{{$web_config['web_logo']->value}}" />
<meta property="twitter:title" content="Welcome To {{$web_config['name']->value}} Home" />
<meta property="twitter:url" content="{{env('APP_URL')}}">
<meta property="twitter:description" content="{!! substr($web_config['about']->value,0,100) !!}">


@endpush

@section('content')


<div class="intro-slider-container mb-5">
    @include('web-views.partials._home-top-slider')

</div><!-- End .intro-slider-container -->

<div class="container">
    <h2 class="title text-center mb-4">Explore Popular Categories</h2><!-- End .title text-center -->

    <div class="cat-blocks-container">
        <div class="row">
            @foreach($categories as $key=>$category)
            <div class="col-6 col-sm-4 col-lg-2">
                <a href="{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}" class="cat-block">
                    <figure>
                        <span>
                            <img height="200px" width="auto" src="{{asset("storage/app/public/category/$category->icon")}}" alt="{{$category->name}}">
                        </span>
                    </figure>

                    <h3 class="cat-block-title">{{Str::limit($category->name, 12)}}</h3><!-- End .cat-block-title -->
                </a>
            </div><!-- End .col-sm-4 col-lg-2 -->
            <!-- @if ($key<11) 
                        <div class="text-center" style="margin: 5px;">
                            <a href="{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}">
                                <img style="vertical-align: middle; height: 100px;border-radius: 5px;" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{asset("storage/app/public/category/$category->icon")}}" alt="{{$category->name}}">
                                <p class="text-center small " style="margin-top: 5px">{{Str::limit($category->name, 12)}}</p>
                            </a>
                    </div>
                    @endif -->
            @endforeach

        </div><!-- End .row -->
    </div><!-- End .cat-blocks-container -->
</div><!-- End .container -->

<div class="mb-4"></div><!-- End .mb-4 -->

<!-- Featured products -->

@if ($featured_products->count() > 0 )
<div class="bg-light pt-5 pb-6">

<div class="container new-arrivals">
    <div class="heading heading-flex mb-3">
        <div class="heading-left">
            <h2 class="title">Featured Products</h2><!-- End .title -->
        </div><!-- End .heading-left -->

    </div><!-- End .heading -->

    <div class="tab-content tab-content-carousel just-action-icons-sm">
        <div class="tab-pane p-0 fade show active" id="new-all-tab" role="tabpanel" aria-labelledby="new-all-link">
            <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                "nav": true, 
                                "dots": false,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                                    "items":2
                                                },
                                                "480": {
                                                    "items":2
                                                },
                                                "768": {
                                                    "items":3
                                                },
                                                "992": {
                                                    "items":5
                                                }
                                }
                            }'>

                @foreach($featured_products as $product)
                    @include('web-views.partials._feature-product',['product'=>$product])
                @endforeach

            </div><!-- End .owl-carousel -->
        </div><!-- .End .tab-pane -->

    </div><!-- End .tab-content -->
</div><!-- End .container -->
</div>
@endif

<div class="container mt-3">
    <div class="row justify-content-center">

        @php($main_banner=\App\Model\Banner::where('banner_type','Main Section Banner')->where('published',1)->orderBy('id','desc')->get())
        @foreach($main_banner as $key=>$banner)

        <div class="col-md-6 col-lg-4">
            <div class="banner banner-overlay banner-overlay-light">
                <a href="#">
                    <img src="{{asset('storage/app/public/banner')}}/{{$banner['photo']}}" alt="Banner">
                </a>

                <div style="display: none" class="banner-content">
                    <h4 class="banner-subtitle"><a href="#">Smart Offer</a></h4><!-- End .banner-subtitle -->
                    <h3 class="banner-title"><a href="#">Save $150 <strong>on Samsung <br>Galaxy Note9</strong></a></h3><!-- End .banner-title -->
                    <a href="#" class="banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                </div>
            </div><!-- End .banner -->
        </div><!-- End .col-md-4 -->
        <!-- <div class="carousel-item {{$key==0?'active':''}}" style="height: 400px;background-color: #fff;">
                    <a href="{{$banner['url']}}">
                        <img class="d-block w-100" style="width: auto;height: auto;"
                            onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                            src="{{asset('storage/app/public/banner')}}/{{$banner['photo']}}"
                            alt="">
                    </a>
                </div> -->
        @endforeach

    </div><!-- End .row -->
</div><!-- End .container -->

<div class="mb-3"></div><!-- End .mb-5 -->

<!-- Brands -->
<div class="container">
    <div class="owl-carousel mt-5 mb-5 owl-simple" data-toggle="owl" data-owl-options='{
                        "nav": true, 
                        "dots": false,
                        "margin": 30,
                        "loop": true,
                        "responsive": {
                            "0": {
                                                    "items":2
                                                },
                                                "480": {
                                                    "items":2
                                                },
                                                "768": {
                                                    "items":3
                                                },
                                                "992": {
                                                    "items":6
                                                }
                        }
                    }'>
        @foreach($brands as $brand)
            <a class="brand" href="{{route('products',['id'=> $brand['id'],'data_from'=>'brand','page'=>1])}}">
                    <img style="width: auto; height: 100px" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{asset("storage/app/public/brand/$brand->image")}}" alt="{{$brand->name}}">
            </a>
        @endforeach

    </div><!-- End .owl-carousel -->
</div><!-- End .container -->

<!-- LATEST PRODUCTS -->
<div class="bg-light pt-5 pb-6">
    <div class="container trending-products">
        <div class="heading heading-flex mb-3">
            <div class="heading-left">
                <h2 class="title">Latest Products</h2><!-- End .title -->
            </div><!-- End .heading-left -->

            <div class="heading-right">
                <a href="http://" class="btn btn-primary btn-round">View All</a>
               
            </div><!-- End .heading-right -->
        </div><!-- End .heading -->

        <div class="row">
            <div class="col-xl-5col d-none d-xl-block">
                <div class="banner">
                   
                    @if($deal_of_the_day)
                    <div class="card bg-dark text-white">
                        <div class="card-header p-4">
                        {{\App\CPU\translate('Todays Deal')}}
                        </div>
                        <div class="card-body p-3">
                           
                            <div class="product product-2 col-12">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-top">
                                        @if($deal_of_the_day->product->discount > 0)
                                                @if ($deal_of_the_day->product->discount_type == 'percent')
                                                    {{round($deal_of_the_day->product->discount,2)}}%
                                                @elseif($deal_of_the_day->product->discount_type =='flat')
                                                    {{\App\CPU\Helpers::currency_converter($deal_of_the_day->product->discount)}}
                                                @endif
                                                    {{\App\CPU\translate('off')}}
                                        @else
                                        <div class="d-flex justify-content-end for-dicount-div-null">
                                            <span class="for-discoutn-value-null"></span>
                                        </div>
                                        @endif
                                    </span>

                                    <a href="{{route('product',$deal_of_the_day->product->slug)}}">
                                        <img src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$deal_of_the_day->product['thumbnail']}}" alt="{{ Str::limit($product['name'],30) }}" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a onclick="addWishlist('{{$deal_of_the_day->product->id}}')" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div>


                                    <div class="product-action">
                                        <a class="btn btn-primary btn-sm btn-block" href="javascript:" onclick="quickView('{{$deal_of_the_day->product->id}}')">
                                            <i class="fa fa-eye align-middle"></i>
                                            {{\App\CPU\translate('Quick')}} {{\App\CPU\translate('View')}}
                                        </a>
                                        <!-- <a onclick="addToCart()" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a> -->
                                        <!-- <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a> -->
                                    </div>

                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <!-- <div class="product-cat">
                                        <a href="#">Laptops</a>
                                    </div> -->
                                    <h3 class="product-title mb-1"><a href="{{route('product',$deal_of_the_day->product->slug)}}">{{ Str::limit($deal_of_the_day->product['name'], 80) }}</a></h3><!-- End .product-title -->
                                </div><!-- End .product-body -->
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            <a href="{{route('product',$deal_of_the_day->product->slug)}}" class="btn btn-primary btn-block">Shop Now <i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                    @else
                    <a href="#">
                        <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/demos/demo-4/banners/banner-4.jpg" alt="banner">
                    </a>
                    @endif
                    
                </div><!-- End .banner -->
            </div><!-- End .col-xl-5col -->

            <div class="col-xl-4-5col">
                <div class="tab-content tab-content-carousel just-action-icons-sm">
                    <div class="tab-pane p-0 fade show active" id="trending-top-tab" role="tabpanel" aria-labelledby="trending-top-link">
                        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                            "nav": true, 
                                            "dots": false,
                                            "margin": 20,
                                            "loop": false,
                                            "responsive": {
                                                "0": {
                                                    "items":2
                                                },
                                                "480": {
                                                    "items":2
                                                },
                                                "768": {
                                                    "items":3
                                                },
                                                "992": {
                                                    "items":4
                                                }
                                            }
                                        }'>
                        @foreach($latest_products as $product)
                                @include('web-views.partials._single-product',['product'=>$product])
                                
                        @endforeach

                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                   
                </div><!-- End .tab-content -->
            </div><!-- End .col-xl-4-5col -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .bg-light pt-5 pb-6 -->

<div class="mb-5"></div><!-- End .mb-5 -->


<!-- TOP SELLERS -->
@php($business_mode=\App\CPU\Helpers::get_business_settings('business_mode'))

@if ($business_mode == 'multi')
<div class="container bg-white">
    <div class="row">
        <div class="col-12">
            <div class="card border-0">
                <div class="card-header pb-3">
                    <h4 class="float-md-left">{{ \App\CPU\translate('Shop by Top Sellers')}}</h4>
                    <a class="float-md-right btn btn-outline-primary btn-round" href="{{route('sellers')}}">{{ \App\CPU\translate('view_all')}}</a>
                </div>
                <div class="card-body p-0">
                            <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow p-0" data-toggle="owl" data-owl-options='{
                                                "nav": true, 
                                                "dots": false,
                                                "margin": 20,
                                                "loop": false,
                                                "responsive": {
                                                    "0": {
                                                        "items":2
                                                    },
                                                    "480": {
                                                        "items":2
                                                    },
                                                    "768": {
                                                        "items":3
                                                    },
                                                    "992": {
                                                        "items":5
                                                    }
                                                }
                                            }'>
                                        @foreach($top_sellers as $seller)
                                            @if($seller->shop)
                                            <div class="border p-3 round bg-light">
                                                <center>
                                                    <a href="{{route('shop-view',['id'=>$seller['id']])}}">
                                                        <img style="vertical-align: middle; padding: 2%;width:100px;height: 100px;border-radius: 50%" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{asset("storage/app/public/shop")}}/{{$seller->shop->image}}">
                                                        <h6 class="text-center mt-2">{{Str::limit($seller->shop->name)}}</h6>
                                                    </a>
                                                </center>
                                            </div>
                                            @endif
                                        @endforeach

                            </div><!-- End .owl-carousel -->
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<!-- CATEGORY WISE PRODUCTS LOOP -->
@foreach($home_categories as $category)
<div class="pt-5 pb-6">
<div class="container new-arrivals">
    <div class="heading heading-flex mb-3">
        <div class="heading-left">
            <h2 class="title">{{Str::limit($category['name'])}}</h2><!-- End .title -->
        </div><!-- End .heading-left -->
        <div class="heading-right">
            <a class="btn btn-round btn-primary " href="{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}">{{ \App\CPU\translate('view_all')}}
                        <i class="fa fa-chevron-right"></i>
                    </a>
        </div><!-- End .heading-left -->

    </div><!-- End .heading -->

    <div class="tab-content tab-content-carousel just-action-icons-sm">
        <div class="tab-pane p-0 fade show active" id="new-all-tab" role="tabpanel" aria-labelledby="new-all-link">
            <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                "nav": true, 
                                "dots": false,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                                    "items":2
                                                },
                                                "480": {
                                                    "items":2
                                                },
                                                "768": {
                                                    "items":3
                                                },
                                                "992": {
                                                    "items":5
                                                }
                                }
                            }'>
                @if($category['products'] == null || count($category['products']) < 1 || empty($category['products']))
                    <p class="text-danger p-3 col-12">No Products, Coming Soon!</p>
                @else 
                    @foreach($category['products'] as $key=>$product)     
                
                        @include('web-views.partials._feature-product',['product'=>$product])
        
                    @endforeach
                @endif
                

            </div><!-- End .owl-carousel -->
        </div><!-- .End .tab-pane -->

    </div><!-- End .tab-content -->
</div><!-- End .container -->
</div>
<hr>
@endforeach


<!-- scripts -->
<script>
        $('#brands-slider').owlCarousel({
            loop: true,
            autoplay: true,
            margin: 10,
            nav: true,
            '{{session('
            direction ')}}': true,
            //navText: ["<i class='czi-arrow-left'></i>","<i class='czi-arrow-right'></i>"],
            dots: true,
            autoplayHoverPause: true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 2
                },
                360: {
                    items: 3
                },
                375: {
                    items: 3
                },
                540: {
                    items: 4
                },
                //Small
                576: {
                    items: 5
                },
                //Medium
                768: {
                    items: 7
                },
                //Large
                992: {
                    items: 9
                },
                //Extra large
                1200: {
                    items: 11
                },
                //Extra extra large
                1400: {
                    items: 12
                }
            }
        })
    </script>
@endsection