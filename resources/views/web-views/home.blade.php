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

<div class="container">
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

@if ($featured_products->count() > 0 )
<div class="bg-light pt-5 pb-6">

<div class="container new-arrivals">
    <div class="heading heading-flex mb-3">
        <div class="heading-left">
            <h2 class="title">Featured Products</h2><!-- End .title -->
        </div><!-- End .heading-left -->

        <!-- <div class="heading-right">
            <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="new-all-link" data-toggle="tab" href="#new-all-tab" role="tab" aria-controls="new-all-tab" aria-selected="true">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="new-tv-link" data-toggle="tab" href="#new-tv-tab" role="tab" aria-controls="new-tv-tab" aria-selected="false">TV</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="new-computers-link" data-toggle="tab" href="#new-computers-tab" role="tab" aria-controls="new-computers-tab" aria-selected="false">Computers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="new-phones-link" data-toggle="tab" href="#new-phones-tab" role="tab" aria-controls="new-phones-tab" aria-selected="false">Tablets & Cell Phones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="new-watches-link" data-toggle="tab" href="#new-watches-tab" role="tab" aria-controls="new-watches-tab" aria-selected="false">Smartwatches</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="new-acc-link" data-toggle="tab" href="#new-acc-tab" role="tab" aria-controls="new-acc-tab" aria-selected="false">Accessories</a>
                </li>
            </ul>
        </div> -->
        <!-- End .heading-right -->
    </div><!-- End .heading -->

    <div class="tab-content tab-content-carousel just-action-icons-sm">
        <div class="tab-pane p-0 fade show active" id="new-all-tab" role="tabpanel" aria-labelledby="new-all-link">
            <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                "nav": true, 
                                "dots": true,
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
                                    },
                                    "1200": {
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

<div class="mb-6"></div><!-- End .mb-6 -->

<div class="container">
    <div class="owl-carousel mt-5 mb-5 owl-simple" data-toggle="owl" data-owl-options='{
                        "nav": false, 
                        "dots": false,
                        "margin": 30,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "420": {
                                "items":3
                            },
                            "600": {
                                "items":4
                            },
                            "900": {
                                "items":5
                            },
                            "1024": {
                                "items":6
                            }
                        }
                    }'>
        <a href="#" class="brand">
            <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/brands/1.png" alt="Brand Name">
        </a>

        <a href="#" class="brand">
            <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/brands/2.png" alt="Brand Name">
        </a>

        <a href="#" class="brand">
            <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/brands/3.png" alt="Brand Name">
        </a>

        <a href="#" class="brand">
            <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/brands/4.png" alt="Brand Name">
        </a>

        <a href="#" class="brand">
            <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/brands/5.png" alt="Brand Name">
        </a>

        <a href="#" class="brand">
            <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/brands/6.png" alt="Brand Name">
        </a>
    </div><!-- End .owl-carousel -->
</div><!-- End .container -->

<div class="bg-light pt-5 pb-6">
    <div class="container trending-products">
        <div class="heading heading-flex mb-3">
            <div class="heading-left">
                <h2 class="title">Trending Products</h2><!-- End .title -->
            </div><!-- End .heading-left -->

            <div class="heading-right">
                <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="trending-top-link" data-toggle="tab" href="#trending-top-tab" role="tab" aria-controls="trending-top-tab" aria-selected="true">Top Rated</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="trending-best-link" data-toggle="tab" href="#trending-best-tab" role="tab" aria-controls="trending-best-tab" aria-selected="false">Best Selling</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="trending-sale-link" data-toggle="tab" href="#trending-sale-tab" role="tab" aria-controls="trending-sale-tab" aria-selected="false">On Sale</a>
                    </li>
                </ul>
            </div><!-- End .heading-right -->
        </div><!-- End .heading -->

        <div class="row">
            <div class="col-xl-5col d-none d-xl-block">
                <div class="banner">
                    <a href="#">
                        <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/demos/demo-4/banners/banner-4.jpg" alt="banner">
                    </a>
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
                            <div class="product product-2">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-top">Top</span>
                                    <a href="product.html">
                                        <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/demos/demo-4/products/product-6.jpg" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Headphones</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="product.html">Bose - SoundSport wireless headphones</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        $199.99
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 4 Reviews )</span>
                                    </div><!-- End .rating-container -->

                                    <div class="product-nav product-nav-dots">
                                        <a href="#" style="background: #69b4ff;"><span class="sr-only">Color name</span></a>
                                        <a href="#" style="background: #ff887f;"><span class="sr-only">Color name</span></a>
                                        <a href="#" class="active" style="background: #333333;"><span class="sr-only">Color name</span></a>
                                    </div><!-- End .product-nav -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            <div class="product product-2">
                                <figure class="product-media">
                                    <a href="product.html">
                                        <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/demos/demo-4/products/product-7.jpg" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Video Games</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="product.html">Microsoft - Refurbish Xbox One S 500GB</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        $279.99
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 6 Reviews )</span>
                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            <div class="product product-2">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-new">New</span>
                                    <a href="product.html">
                                        <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/demos/demo-4/products/product-8.jpg" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Smartwatches</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="product.html">Apple Watch Series 4 Gold Aluminum Case</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        $499.99
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 4 Reviews )</span>
                                    </div><!-- End .rating-container -->

                                    <div class="product-nav product-nav-dots">
                                        <a href="#" style="background: #edd2c8;"><span class="sr-only">Color name</span></a>
                                        <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                                        <a href="#" class="active" style="background: #333333;"><span class="sr-only">Color name</span></a>
                                    </div><!-- End .product-nav -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            <div class="product product-2">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-top">Top</span>
                                    <span class="product-label label-circle label-sale">Sale</span>
                                    <a href="product.html">
                                        <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/demos/demo-4/products/product-9.jpg" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">TV & Home Theater</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="product.html">Sony - Class LED 2160p Smart 4K Ultra HD</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        <span class="new-price">$1,699.99</span>
                                        <span class="old-price">Was $1,999.99</span>
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 10 Reviews )</span>
                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            <div class="product product-2">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-new">New</span>
                                    <a href="product.html">
                                        <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/demos/demo-4/products/product-3.jpg" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Tablets</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="product.html">Apple - 11 Inch iPad Pro with Wi-Fi 256GB </a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        $899.99
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 4 Reviews )</span>
                                    </div><!-- End .rating-container -->

                                    <div class="product-nav product-nav-dots">
                                        <a href="#" style="background: #edd2c8;"><span class="sr-only">Color name</span></a>
                                        <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                                        <a href="#" class="active" style="background: #333333;"><span class="sr-only">Color name</span></a>
                                    </div><!-- End .product-nav -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane p-0 fade" id="trending-best-tab" role="tabpanel" aria-labelledby="trending-best-link">
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
                            <div class="product product-2">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-new">New</span>
                                    <a href="product.html">
                                        <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/demos/demo-4/products/product-3.jpg" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Tablets</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="product.html">Apple - 11 Inch iPad Pro with Wi-Fi 256GB </a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        $899.99
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 4 Reviews )</span>
                                    </div><!-- End .rating-container -->

                                    <div class="product-nav product-nav-dots">
                                        <a href="#" style="background: #edd2c8;"><span class="sr-only">Color name</span></a>
                                        <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                                        <a href="#" class="active" style="background: #333333;"><span class="sr-only">Color name</span></a>
                                    </div><!-- End .product-nav -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            <div class="product product-2">
                                <figure class="product-media">
                                    <a href="product.html">
                                        <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/demos/demo-4/products/product-2.jpg" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Audio</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="product.html">Bose - SoundLink Bluetooth Speaker</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        $79.99
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 6 Reviews )</span>
                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            <div class="product product-2">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-top">Top</span>
                                    <span class="product-label label-circle label-sale">Sale</span>
                                    <a href="product.html">
                                        <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/demos/demo-4/products/product-4.jpg" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Cell Phone</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="product.html">Google - Pixel 3 XL 128GB</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        <span class="new-price">$35.41</span>
                                        <span class="old-price">Was $41.67</span>
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 10 Reviews )</span>
                                    </div><!-- End .rating-container -->

                                    <div class="product-nav product-nav-dots">
                                        <a href="#" class="active" style="background: #edd2c8;"><span class="sr-only">Color name</span></a>
                                        <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                                        <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                                    </div><!-- End .product-nav -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            <div class="product product-2">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-top">Top</span>
                                    <a href="product.html">
                                        <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/demos/demo-4/products/product-5.jpg" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">TV & Home Theater</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="product.html">Samsung - 55" Class LED 2160p Smart</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        $899.99
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 5 Reviews )</span>
                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            <div class="product product-2">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-top">Top</span>
                                    <a href="product.html">
                                        <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/demos/demo-4/products/product-1.jpg" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Laptops</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="product.html">MacBook Pro 13" Display, i5</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        $1,199.99
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 4 Reviews )</span>
                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane p-0 fade" id="trending-sale-tab" role="tabpanel" aria-labelledby="trending-sale-link">
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
                            <div class="product product-2">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-new">New</span>
                                    <a href="product.html">
                                        <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/demos/demo-4/products/product-8.jpg" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Smartwatches</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="product.html">Apple Watch Series 4 Gold Aluminum Case</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        $499.99
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 4 Reviews )</span>
                                    </div><!-- End .rating-container -->

                                    <div class="product-nav product-nav-dots">
                                        <a href="#" style="background: #edd2c8;"><span class="sr-only">Color name</span></a>
                                        <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                                        <a href="#" class="active" style="background: #333333;"><span class="sr-only">Color name</span></a>
                                    </div><!-- End .product-nav -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            <div class="product product-2">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-top">Top</span>
                                    <a href="product.html">
                                        <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/demos/demo-4/products/product-6.jpg" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Headphones</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="product.html">Bose - SoundSport wireless headphones</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        $199.99
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 4 Reviews )</span>
                                    </div><!-- End .rating-container -->

                                    <div class="product-nav product-nav-dots">
                                        <a href="#" style="background: #69b4ff;"><span class="sr-only">Color name</span></a>
                                        <a href="#" style="background: #ff887f;"><span class="sr-only">Color name</span></a>
                                        <a href="#" class="active" style="background: #333333;"><span class="sr-only">Color name</span></a>
                                    </div><!-- End .product-nav -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            <div class="product product-2">
                                <figure class="product-media">
                                    <a href="product.html">
                                        <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/demos/demo-4/products/product-7.jpg" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Video Games</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="product.html">Microsoft - Refurbish Xbox One S 500GB</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        $279.99
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 6 Reviews )</span>
                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            <div class="product product-2">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-new">New</span>
                                    <a href="product.html">
                                        <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/demos/demo-4/products/product-3.jpg" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Tablets</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="product.html">Apple - 11 Inch iPad Pro with Wi-Fi 256GB </a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        $899.99
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 4 Reviews )</span>
                                    </div><!-- End .rating-container -->

                                    <div class="product-nav product-nav-dots">
                                        <a href="#" style="background: #edd2c8;"><span class="sr-only">Color name</span></a>
                                        <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                                        <a href="#" class="active" style="background: #333333;"><span class="sr-only">Color name</span></a>
                                    </div><!-- End .product-nav -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .col-xl-4-5col -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .bg-light pt-5 pb-6 -->

<div class="mb-5"></div><!-- End .mb-5 -->

<div class="container for-you">
    <div class="heading heading-flex mb-3">
        <div class="heading-left">
            <h2 class="title">Recommendation For You</h2><!-- End .title -->
        </div><!-- End .heading-left -->

        <div class="heading-right">
            <a href="#" class="title-link">View All Recommendadion <i class="icon-long-arrow-right"></i></a>
        </div><!-- End .heading-right -->
    </div><!-- End .heading -->

    <div class="products">
        <div class="row justify-content-center">
            <div class="col-6 col-md-4 col-lg-3">
                <div class="product product-2">
                    <figure class="product-media">
                        <span class="product-label label-circle label-sale">Sale</span>
                        <a href="product.html">
                            <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/demos/demo-4/products/product-10.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                        </div><!-- End .product-action -->

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                            <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Headphones</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product.html">Beats by Dr. Dre Wireless Headphones</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            <span class="new-price">$279.99</span>
                            <span class="old-price">Was $349.99</span>
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 40%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 4 Reviews )</span>
                        </div><!-- End .rating-container -->

                        <div class="product-nav product-nav-dots">
                            <a href="#" class="active" style="background: #666666;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #ff887f;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #6699cc;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #f3dbc1;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                        </div><!-- End .product-nav -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

            <div class="col-6 col-md-4 col-lg-3">
                <div class="product product-2">
                    <figure class="product-media">
                        <a href="product.html">
                            <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/demos/demo-4/products/product-11.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                        </div><!-- End .product-action -->

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                            <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Cameras & Camcorders</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product.html">GoPro - HERO7 Black HD Waterproof Action</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            $349.99
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 2 Reviews )</span>
                        </div><!-- End .rating-container -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

            <div class="col-6 col-md-4 col-lg-3">
                <div class="product product-2">
                    <figure class="product-media">
                        <span class="product-label label-circle label-new">New</span>
                        <a href="product.html">
                            <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/demos/demo-4/products/product-12.jpg" alt="Product image" class="product-image">
                            <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/demos/demo-4/products/product-12-2.jpg" alt="Product image" class="product-image-hover">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                        </div><!-- End .product-action -->

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                            <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Smartwatches</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product.html">Apple - Apple Watch Series 3 with White Sport Band</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            $214.49
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 0%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 0 Reviews )</span>
                        </div><!-- End .rating-container -->

                        <div class="product-nav product-nav-dots">
                            <a href="#" class="active" style="background: #e2e2e2;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #f2bc9e;"><span class="sr-only">Color name</span></a>
                        </div><!-- End .product-nav -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

            <div class="col-6 col-md-4 col-lg-3">
                <div class="product product-2">
                    <figure class="product-media">
                        <a href="product.html">
                            <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/demos/demo-4/products/product-13.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                        </div><!-- End .product-action -->

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                            <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Laptops</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product.html">Lenovo - 330-15IKBR 15.6"</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            <span class="out-price">$339.99</span>
                            <span class="out-text">Out Of Stock</span>
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 11 Reviews )</span>
                        </div><!-- End .rating-container -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

            <div class="col-6 col-md-4 col-lg-3">
                <div class="product product-2">
                    <figure class="product-media">
                        <a href="product.html">
                            <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/demos/demo-4/products/product-14.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                        </div><!-- End .product-action -->

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                            <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Digital Cameras</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product.html">Sony - Alpha a5100 Mirrorless Camera</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            $499.99
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 50%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 11 Reviews )</span>
                        </div><!-- End .rating-container -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

            <div class="col-6 col-md-4 col-lg-3">
                <div class="product product-2">
                    <figure class="product-media">
                        <a href="product.html">
                            <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/demos/demo-4/products/product-15.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                        </div><!-- End .product-action -->

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                            <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Laptops</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product.html">Home Mini - Smart Speaker with Google Assistant</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            $49.00
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 24 Reviews )</span>
                        </div><!-- End .rating-container -->

                        <div class="product-nav product-nav-dots">
                            <a href="#" class="active" style="background: #ef837b;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #e2e2e2;"><span class="sr-only">Color name</span></a>
                        </div><!-- End .product-nav -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

            <div class="col-6 col-md-4 col-lg-3">
                <div class="product product-2">
                    <figure class="product-media">
                        <span class="product-label label-circle label-sale">Sale</span>
                        <a href="product.html">
                            <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/demos/demo-4/products/product-16.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                        </div><!-- End .product-action -->

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                            <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Audio</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product.html">WONDERBOOM Portable Bluetooth Speaker</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            <span class="new-price">$99.99</span>
                            <span class="old-price">Was $129.99</span>
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 40%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 4 Reviews )</span>
                        </div><!-- End .rating-container -->

                        <div class="product-nav product-nav-dots">
                            <a href="#" class="active" style="background: #666666;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #ff887f;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #6699cc;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #f3dbc1;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                        </div><!-- End .product-nav -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

            <div class="col-6 col-md-4 col-lg-3">
                <div class="product product-2">
                    <figure class="product-media">
                        <a href="product.html">
                            <img src="{{asset('public/assets/front-end/v91f')}}/assets/images/demos/demo-4/products/product-17.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                        </div><!-- End .product-action -->

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                            <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Smart Home</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product.html">Google - Home Hub with Google Assistant</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            $149.00
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 2 Reviews )</span>
                        </div><!-- End .rating-container -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .products -->
</div><!-- End .container -->

<div class="mb-4"></div><!-- End .mb-4 -->

<div class="container">
    <hr class="mb-0">
</div><!-- End .container -->

<div class="icon-boxes-container bg-transparent">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="icon-box icon-box-side">
                    <span class="icon-box-icon text-dark">
                        <i class="icon-rocket"></i>
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Free Shipping</h3><!-- End .icon-box-title -->
                        <p>Orders $50 or more</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-sm-6 col-lg-3 -->

            <div class="col-sm-6 col-lg-3">
                <div class="icon-box icon-box-side">
                    <span class="icon-box-icon text-dark">
                        <i class="icon-rotate-left"></i>
                    </span>

                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Free Returns</h3><!-- End .icon-box-title -->
                        <p>Within 30 days</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-sm-6 col-lg-3 -->

            <div class="col-sm-6 col-lg-3">
                <div class="icon-box icon-box-side">
                    <span class="icon-box-icon text-dark">
                        <i class="icon-info-circle"></i>
                    </span>

                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Get 20% Off 1 Item</h3><!-- End .icon-box-title -->
                        <p>when you sign up</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-sm-6 col-lg-3 -->

            <div class="col-sm-6 col-lg-3">
                <div class="icon-box icon-box-side">
                    <span class="icon-box-icon text-dark">
                        <i class="icon-life-ring"></i>
                    </span>

                    <div class="icon-box-content">
                        <h3 class="icon-box-title">We Support</h3><!-- End .icon-box-title -->
                        <p>24/7 amazing services</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-sm-6 col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .icon-boxes-container -->

<!-- <link rel="stylesheet" href="{{asset('public/assets/front-end')}}/css/home.css" /> -->
<!-- <style>
    .media {
        background: white;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
    }

    .cz-countdown-days {
        color: white !important;
        background-color: #ffffff30;

        border: .5px solid {
                {
                $web_config['primary_color']
            }
        }

        ;
        padding: 0px 6px;
        border-radius: 3px;
        margin-right: 0px !important;
        display: flex;
        flex-direction: column;
        -ms-flex: .4;
        /* IE 10 */
        flex: 1;

    }

    .cz-countdown-hours {
        color: white !important;
        background-color: #ffffff30;

        border: .5px solid {
                {
                $web_config['primary_color']
            }
        }

        ;
        padding: 0px 6px;
        border-radius: 3px;
        margin-right: 0px !important;
        display: flex;
        flex-direction: column;
        -ms-flex: .4;
        /* IE 10 */
        flex: 1;
    }

    .cz-countdown-minutes {
        color: white !important;
        background-color: #ffffff30;

        border: .5px solid {
                {
                $web_config['primary_color']
            }
        }

        ;
        padding: 0px 6px;
        border-radius: 3px;
        margin-right: 0px !important;
        display: flex;
        flex-direction: column;
        -ms-flex: .4;
        /* IE 10 */
        flex: 1;
    }

    .cz-countdown-seconds {
        color: white !important;
        background-color: #ffffff30;

        border: .5px solid {
                {
                $web_config['primary_color']
            }
        }

        ;
        padding: 0px 6px;
        border-radius: 3px;
        display: flex;
        flex-direction: column;
        -ms-flex: .4;
        /* IE 10 */
        flex: 1;
    }

    .flash_deal_product_details .flash-product-price {
        font-weight: 700;
        font-size: 18px;

        color: {
                {
                $web_config['primary_color']
            }
        }

        ;
    }

    .featured_deal_left {
        height: 130px;

        background: {
                {
                $web_config['primary_color']
            }
        }

        0% 0% no-repeat padding-box;
        padding: 10px 13px;
        text-align: center;
    }

    .category_div:hover {
        color: {
                {
                $web_config['secondary_color']
            }
        }

        ;
    }

    .deal_of_the_day {

        /* filter: grayscale(0.5); */
        /* opacity: .8; */
        background: {
                {
                $web_config['secondary_color']
            }
        }

        ;
        border-radius: 3px;
    }

    .deal-title {
        font-size: 12px;

    }

    .for-flash-deal-img img {
        max-width: none;
    }

    .best-selleing-image {
        background: {
                {
                $web_config['primary_color']
            }
        }

        10;
        width:30%;
        display:flex;
        align-items:center;
        border-radius: 5px;
    }

    .best-selling-details {
        padding: 10px;
        width: 50%;
    }

    .top-rated-image {
        background: {
                {
                $web_config['primary_color']
            }
        }

        10;
        width:30%;
        display:flex;
        align-items:center;
        border-radius: 5px;
    }

    .top-rated-details {
        padding: 10px;
        width: 70%;
    }

    @media (max-width: 375px) {
        .cz-countdown {
            display: flex !important;

        }

        .cz-countdown .cz-countdown-seconds {

            margin-top: -5px !important;
        }

        .for-feature-title {
            font-size: 20px !important;
        }
    }

    @media (max-width: 600px) {
        .flash_deal_title {
            /*font-weight: 600;*/
            /*font-size: 18px;*/
            /*text-transform: uppercase;*/

            font-weight: 700;
            font-size: 25px;
            text-transform: uppercase;
        }

        .cz-countdown .cz-countdown-value {
            /* font-family: "Roboto", sans-serif; */
            font-size: 11px !important;
            font-weight: 700 !important;

        }

        .featured_deal {
            opacity: 1 !important;
        }

        .cz-countdown {
            display: inline-block;
            flex-wrap: wrap;
            font-weight: normal;
            margin-top: 4px;
            font-size: smaller;
        }

        .view-btn-div-f {

            margin-top: 6px;
            float: right;
        }

        .view-btn-div {
            float: right;
        }

        .viw-btn-a {
            font-size: 10px;
            font-weight: 600;
        }


        .for-mobile {
            display: none;
        }

        .featured_for_mobile {
            max-width: 100%;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .best-selleing-image {
            width: 50%;
            border-radius: 5px;
        }

        .best-selling-details {
            width: 50%;
        }

        .top-rated-image {
            width: 50%;
        }

        .top-rated-details {
            width: 50%;
        }
    }


    @media (max-width: 360px) {
        .featured_for_mobile {
            max-width: 100%;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .featured_deal {
            opacity: 1 !important;
        }
    }

    @media (max-width: 375px) {
        .featured_for_mobile {
            max-width: 100%;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .featured_deal {
            opacity: 1 !important;
        }

    }

    @media (min-width: 768px) {
        .displayTab {
            display: block !important;
        }

    }

    @media (max-width: 800px) {

        .latest-product-margin {
            margin-left: 0px !important;
        }

        .for-tab-view-img {
            width: 40%;
        }

        .for-tab-view-img {
            width: 105px;
        }

        .widget-title {
            font-size: 19px !important;
        }

        .flash-deal-view-all-web {
            display: none !important;
        }

        .categories-view-all {
                {
                    {
                    session('direction')==="rtl"? 'margin-left: 10px;': 'margin-right: 6px;'
                }
            }
        }

        .categories-title {
                {
                    {
                    Session: :get('direction')==="rtl"? 'margin-right: 0px;': 'margin-left: 6px;'
                }
            }
        }

        .seller-list-title {
                {
                    {
                    Session: :get('direction')==="rtl"? 'margin-right: 0px;': 'margin-left: 10px;'
                }
            }
        }

        .seller-list-view-all {
                {
                    {
                    Session: :get('direction')==="rtl"? 'margin-left: 20px;': 'margin-right: 10px;'
                }
            }
        }

        .seller-card {
            padding-left: 0px !important;
        }

        .category-product-view-title {
                {
                    {
                    Session: :get('direction')==="rtl"? 'margin-right: 16px;': 'margin-left: -8px;'
                }
            }
        }

        .category-product-view-all {
                {
                    {
                    Session: :get('direction')==="rtl"? 'margin-left: -7px;': 'margin-right: 5px;'
                }
            }
        }

        .recomanded-product-card {
            background: #F8FBFD;
            margin: 20px;
            height: 535px;
            border-radius: 5px;
        }

        .recomanded-buy-button {
            text-align: center;
            margin-top: 30px;
        }
    }

    @media(min-width:801px) {
        .flash-deal-view-all-mobile {
            display: none !important;
        }

        .categories-view-all {
                {
                    {
                    session('direction')==="rtl"? 'margin-left: 30px;': 'margin-right: 27px;'
                }
            }
        }

        .categories-title {
                {
                    {
                    Session: :get('direction')==="rtl"? 'margin-right: 25px;': 'margin-left: 25px;'
                }
            }
        }

        .seller-list-title {
                {
                    {
                    Session: :get('direction')==="rtl"? 'margin-right: 6px;': 'margin-left: 10px;'
                }
            }
        }

        .seller-list-view-all {
                {
                    {
                    Session: :get('direction')==="rtl"? 'margin-left: 12px;': 'margin-right: 10px;'
                }
            }
        }

        .seller-card {
                {
                    {
                    Session: :get('direction')==="rtl"? 'padding-left:0px !important;': 'padding-right:0px !important;'
                }
            }
        }

        .category-product-view-title {
                {
                    {
                    Session: :get('direction')==="rtl"? 'margin-right: 10px;': 'margin-left: -12px;'
                }
            }
        }

        .category-product-view-all {
                {
                    {
                    Session: :get('direction')==="rtl"? 'margin-left: -20px;': 'margin-right: 0px;'
                }
            }
        }

        .recomanded-product-card {
            background: #F8FBFD;
            margin: 20px;
            height: 475px;
            border-radius: 5px;
        }

        .recomanded-buy-button {
            text-align: center;
            margin-top: 63px;
        }

    }

    .featured_deal_carosel .carousel-inner {
        width: 100% !important;
    }

    .badge-style2 {
        color: black !important;
        background: transparent !important;
        font-size: 11px;
    }

    .countdown-card {
        background: {
                {
                $web_config['primary_color']
            }
        }

        10;
        height: 150px !important;
        border-radius:5px;

    }

    .flash-deal-text {
        color: {
                {
                $web_config['primary_color']
            }
        }

        ;
        text-transform: uppercase;
        text-align:center;
        font-weight:700;
        font-size:20px;
        border-radius:5px;
        margin-top:25px;
    }

    .countdown-background {
        background: {
                {
                $web_config['primary_color']
            }
        }

        ;
        padding: 5px 5px;
        border-radius:5px;
        margin-top:15px;
    }

    .carousel-wrap {
        position: relative;
    }

    .owl-nav {
        top: 40%;
        position: absolute;
        display: flex;
        justify-content: space-between;
        width: 100%;
    }
    }

    .owl-prev {
        float: left;

    }

    .owl-next {
        float: right;
    }

    .czi-arrow-left {
        color: {
                {
                $web_config['primary_color']
            }
        }

        ;

        background: {
                {
                $web_config['primary_color']
            }
        }

        10;
        padding: 5px;
        border-radius: 50%;
        margin-left: -12px;
        font-weight: bold;
        font-size: 12px;
    }

    .czi-arrow-right {
        color: {
                {
                $web_config['primary_color']
            }
        }

        ;

        background: {
                {
                $web_config['primary_color']
            }
        }

        10;
        padding: 5px;
        border-radius: 50%;
        margin-right: -15px;
        font-weight: bold;
        font-size: 12px;
    }

    .owl-carousel .nav-btn .czi-arrow-left {
        height: 47px;
        position: absolute;
        width: 26px;
        cursor: pointer;
        top: 100px !important;
    }

    .flash-deals-background-image {
        background: {
                {
                $web_config['primary_color']
            }
        }

        10;
        border-radius:5px;
        width:125px;
        height:125px;
    }

    .view-all-text {
        color: {
                {
                $web_config['secondary_color']
            }
        }

         !important;
        font-size:14px;
    }

    .feature-product-title {
        text-align: center;
        font-size: 22px;
        margin-top: 15px;
        font-style: normal;
        font-weight: 700;
    }

    .feature-product .czi-arrow-left {
        color: {
                {
                $web_config['primary_color']
            }
        }

        ;

        background: {
                {
                $web_config['primary_color']
            }
        }

        10;
        padding: 5px;
        border-radius: 50%;
        margin-left: -80px;
        font-weight: bold;
        font-size: 12px;
    }

    .feature-product .owl-nav {
        top: 40%;
        position: absolute;
        display: flex;
        justify-content: space-between;
        /* width: 100%; */
    }

    .feature-product .czi-arrow-right {
        color: {
                {
                $web_config['primary_color']
            }
        }

        ;

        background: {
                {
                $web_config['primary_color']
            }
        }

        10;
        padding: 5px;
        border-radius: 50%;
        margin-right: -80px;
        font-weight: bold;
        font-size: 12px;
    }

    .shipping-policy-web {
        background: #ffffff;
        width: 100%;
        border-radius: 5px;
    }

    .shipping-method-system {
        height: 130px;
        width: 70%;
        margin-top: 15px;
    }

    .flex-between {
        display: flex;
        justify-content: space-between;
    }
</style> -->

<!-- <link rel="stylesheet" href="{{asset('public/assets/front-end')}}/css/owl.carousel.min.css" />
<link rel="stylesheet" href="{{asset('public/assets/front-end')}}/css/owl.theme.default.min.css" /> -->


<!-- Hero (Banners + Slider)-->
<!-- <section class="bg-transparent mb-3">
    <div class="container">
        <div class="row ">
            <div class="col-12">
                @include('web-views.partials._home-top-slider')
            </div>
        </div>
    </div>
</section> -->

{{--flash deal--}}
@php($flash_deals=\App\Model\FlashDeal::with(['products'=>function($query){
$query->with('product')->whereHas('product',function($q){
$q->where('status',1);
});
}])->where(['status'=>1])->where(['deal_type'=>'flash_deal'])->whereDate('start_date','<=',date('Y-m-d'))->whereDate('end_date','>=',date('Y-m-d'))->first())

    @if (isset($flash_deals))
    <div class="container">
        <div class="flash-deal-view-all-web row d-flex justify-content-{{Session::get('direction') === "rtl" ? 'start' : 'end'}}" style="{{Session::get('direction') === "rtl" ? 'margin-left: 2px;' : 'margin-right:2px;'}}">
            <a class="text-capitalize view-all-text" href="{{route('flash-deals',[isset($flash_deals)?$flash_deals['id']:0])}}">
                {{ \App\CPU\translate('view_all')}}
                <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left-circle mr-1 ml-n1 mt-1 float-left' : 'right-circle ml-1 mr-n1'}}"></i>
            </a>
        </div>
        <div class="row d-flex {{Session::get('direction') === "rtl" ? 'flex-row-reverse' : 'flex-row'}}">


            <div class="col-md-3 mt-2 countdown-card">
                <div class="m-2">
                    <div class="flash-deal-text">
                        <span>{{ \App\CPU\translate('flash deal')}}</span>
                    </div>
                    <div style=" text-align: center;color: #ffffff !important;">
                        <div class="countdown-background">
                            <span class="cz-countdown d-flex justify-content-center align-items-center" data-countdown="{{isset($flash_deals)?date('m/d/Y',strtotime($flash_deals['end_date'])):''}} 11:59:00 PM">
                                <span class="cz-countdown-days">
                                    <span class="cz-countdown-value"></span>
                                    <span>{{ \App\CPU\translate('day')}}</span>
                                </span>
                                <span class="cz-countdown-value p-1">:</span>
                                <span class="cz-countdown-hours">
                                    <span class="cz-countdown-value"></span>
                                    <span>{{ \App\CPU\translate('hrs')}}</span>
                                </span>
                                <span class="cz-countdown-value p-1">:</span>
                                <span class="cz-countdown-minutes">
                                    <span class="cz-countdown-value"></span>
                                    <span>{{ \App\CPU\translate('min')}}</span>
                                </span>
                                <span class="cz-countdown-value p-1">:</span>
                                <span class="cz-countdown-seconds">
                                    <span class="cz-countdown-value"></span>
                                    <span>{{ \App\CPU\translate('sec')}}</span>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flash-deal-view-all-mobile col-md-12" style="{{Session::get('direction') === "rtl" ? 'margin-left: 2px;' : 'margin-right:2px;'}}">
                <a class="{{Session::get('direction') === "rtl" ? 'float-left' : 'float-right'}} mt-2 text-capitalize view-all-text" href="{{route('flash-deals',[isset($flash_deals)?$flash_deals['id']:0])}}">
                    {{ \App\CPU\translate('view_all')}}
                    <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left-circle mr-1 ml-n1 mt-1 float-left' : 'right-circle ml-1 mr-n1'}}"></i>
                </a>
            </div>
            <div class="col-md-9 {{Session::get('direction') === "rtl" ? 'pr-md-4' : 'pl-md-4'}}">
                <div class="carousel-wrap">
                    <div class="owl-carousel owl-theme mt-2" id="flash-deal-slider">
                        @foreach($flash_deals->products as $key=>$deal)
                        @if( $deal->product)
                        @include('web-views.partials._product-card-1',['product'=>$deal->product])
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    {{--brands--}}
    <section class="container rtl mt-3">
        <!-- Heading-->
        <div class="section-header">
            <div style="color: black;font-weight: 700;
            font-size: 22px;">
                <span> {{\App\CPU\translate('brands')}}</span>
            </div>
            <div style="margin-right:2px;">
                <a class="text-capitalize view-all-text" href="{{route('brands')}}">
                    {{ \App\CPU\translate('view_all')}}
                    <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left-circle mr-1 ml-n1 mt-1 float-left' : 'right-circle ml-1 mr-n1'}}"></i>
                </a>
            </div>
        </div>
        {{--<hr class="view_border">--}}
        <!-- Grid-->

        <div class="mt-3 mb-3 brand-slider">
            <div class="owl-carousel owl-theme p-2" id="brands-slider">
                @foreach($brands as $brand)
                <div class="text-center">
                    <a href="{{route('products',['id'=> $brand['id'],'data_from'=>'brand','page'=>1])}}">
                        <div class="d-flex align-items-center justify-content-center" style="height:100px;margin:5px;">
                            <img style="border-radius: 50%;" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{asset("storage/app/public/brand/$brand->image")}}" alt="{{$brand->name}}">
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Products grid (featured products)-->
    @if ($featured_products->count() > 0 )
    <div class="container mb-4">
        <div class="row" style="background: white;box-shadow: 0px 3px 6px #0000000d;border-radius: 5px;">
            <div class="col-md-12">
                <div class="feature-product-title">
                    {{ \App\CPU\translate('featured_products')}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="feature-product" style="padding-left:55px;padding-right: 55px;padding-top: 10px;">
                    <div class="carousel-wrap p-1">
                        <div class="owl-carousel owl-theme " id="featured_products_list">
                            @foreach($featured_products as $product)
                            <div style="margin:5px;margin-bottom: 30px;">
                                @include('web-views.partials._feature-product',['product'=>$product])

                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    {{--featured deal--}}
    @php($featured_deals=\App\Model\FlashDeal::with(['products'=>function($query_one){
    $query_one->with('product.reviews')->whereHas('product',function($query_two){
    $query_two->where('status',1);
    });
    }])
    ->where(['status'=>1])->where(['deal_type'=>'feature_deal'])
    ->first())

    @if(isset($featured_deals))
    <section class="container featured_deal rtl mb-2">
        <div class="row" style="background: {{$web_config['primary_color']}};padding:5px;padding-bottom: 25px; border-radius:5px;">
            <div class="col-12 pb-2">
                <a class="text-capitalize mt-2 mt-md-0 {{Session::get('direction') === "rtl" ? 'float-left' : 'float-right'}}" href="{{route('products',['data_from'=>'featured_deal'])}}" style="color: white !important;{{Session::get('direction') === "rtl" ? 'margin-left: 21px;' : 'margin-right: 21px;'}}">
                    {{ \App\CPU\translate('view_all')}}
                    <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left-circle mr-1 ml-n1 mt-1 float-left' : 'right-circle ml-1 mr-n1'}}"></i>
                </a>
            </div>
            <div class="col-xl-3 col-md-4 d-flex align-items-center justify-content-center right">
                <div class="m-4">
                    <span class="featured_deal_title" style="padding-top: 12px">{{ \App\CPU\translate('featured_deal')}}</span>
                    <br>

                    <span style="color: white;text-align: left !important;">{{ \App\CPU\translate('See the latest deals and exciting new offers ')}}!</span>

                </div>

            </div>

            <div class="col-xl-9 col-md-8 d-flex align-items-center justify-content-center {{Session::get('direction') === "rtl" ? 'pl-4' : 'pr-4'}}">
                <div class="owl-carousel owl-theme" id="web-feature-deal-slider">
                    @foreach($featured_deals->products as $key=>$product)
                    @include('web-views.partials._feature-deal-product',['product'=>$product->product])
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif
    {{--deal of the day--}}
    <div class="container rtl">
        <div class="row">
            {{-- Deal of the day/Recommended Product --}}
            <div class="col-xl-3 col-md-4 pb-4 mt-3 pl-0 pr-0">
                <div class="deal_of_the_day" style="background: {{$web_config['primary_color']}};height: 784px;">
                    @if(isset($deal_of_the_day))
                    <div class="d-flex justify-content-center align-items-center" style="width: 70%;margin:auto;">
                        <h1 class="align-items-center" style="color: white"> {{ \App\CPU\translate('deal_of_the_day') }}</h1>
                    </div>
                    <div class="recomanded-product-card">

                        <div class="d-flex justify-content-center align-items-center" style="margin:20px 20px -20px 20px;padding-top: 20px;">
                            <img style="border-radius:5px 5px 0px opx;" src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$deal_of_the_day->product['thumbnail']}}" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" alt="">
                        </div>
                        <div style="background:#ffffff;margin:20px;padding-top: 10px;height: 200px;border-radius: 0px 0px 5px 5px;">
                            <div style="text-align: left; padding: 20px;">

                                @php($overallRating = \App\CPU\ProductManager::get_overall_rating($deal_of_the_day->product['reviews']))
                                <div class="rating-show" style="height:125px; ">
                                    <h5 style="font-weight: 600; color: {{$web_config['primary_color']}}">
                                        {{\Illuminate\Support\Str::limit($deal_of_the_day->product['name'],30)}}
                                    </h5>
                                    <span class="d-inline-block font-size-sm text-body">
                                        @for($inc=0;$inc<5;$inc++) @if($inc<$overallRating[0]) <i class="sr-star czi-star-filled active"></i>
                                            @else
                                            <i class="sr-star czi-star" style="color:#fea569 !important"></i>
                                            @endif
                                            @endfor
                                            <label class="badge-style">( {{$deal_of_the_day->product->reviews_count}} )</label>
                                    </span>
                                </div>
                                <div class="float-right">

                                    @if($deal_of_the_day->product->discount > 0)
                                    <strike style="font-size: 12px!important;color: #E96A6A!important;">
                                        {{\App\CPU\Helpers::currency_converter($deal_of_the_day->product->unit_price)}}
                                    </strike>
                                    @endif
                                    <span class="text-accent" style="margin: 10px;font-size: 22px !important;">
                                        {{\App\CPU\Helpers::currency_converter(
                                                $deal_of_the_day->product->unit_price-(\App\CPU\Helpers::get_product_discount($deal_of_the_day->product,$deal_of_the_day->product->unit_price))
                                            )}}
                                    </span>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="recomanded-buy-button">
                        <button class="buy_btn" style="color:{{$web_config['primary_color']}}" onclick="location.href='{{route('product',$deal_of_the_day->product->slug)}}'">{{\App\CPU\translate('buy_now')}}
                        </button>
                    </div>
                    @else
                    @php($product=\App\Model\Product::active()->inRandomOrder()->first())
                    @if(isset($product))
                    <div class="d-flex justify-content-center align-items-center">
                        <h1 style="color: white"> {{ \App\CPU\translate('recommended_product') }}</h1>
                    </div>
                    <div class="recomanded-product-card">

                        <div class="d-flex justify-content-center align-items-center" style="margin:20px 20px -20px 20px;padding-top: 20px;">
                            <img style="" src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$product['thumbnail']}}" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" alt="">
                        </div>
                        <div style="background:#ffffff;margin:20px;padding-top: 10px;height: 200px;border-radius: 0px 0px 5px 5px;">
                            <div style="text-align: left; padding: 20px;">

                                @php($overallRating = \App\CPU\ProductManager::get_overall_rating($product['reviews']))
                                <div class="rating-show" style="height:125px; ">
                                    <h5 style="font-weight: 600; color: {{$web_config['primary_color']}}">
                                        {{\Illuminate\Support\Str::limit($product['name'],40)}}
                                    </h5>
                                    <span class="d-inline-block font-size-sm text-body">
                                        @for($inc=0;$inc<5;$inc++) @if($inc<$overallRating[0]) <i class="sr-star czi-star-filled active"></i>
                                            @else
                                            <i class="sr-star czi-star" style="color:#fea569 !important"></i>
                                            @endif
                                            @endfor
                                            <label class="badge-style">( {{$product->reviews_count}} )</label>
                                    </span>
                                </div>
                                <div class="float-right">

                                    @if($product->discount > 0)
                                    <strike style="font-size: 12px!important;color: #E96A6A!important;">
                                        {{\App\CPU\Helpers::currency_converter($product->unit_price)}}
                                    </strike>
                                    @endif
                                    <span class="text-accent" style="margin: 10px;font-size: 22px !important;">
                                        {{\App\CPU\Helpers::currency_converter(
                                                    $product->unit_price-(\App\CPU\Helpers::get_product_discount($product,$product->unit_price))
                                                )}}
                                    </span>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="recomanded-buy-button">
                        <button class="buy_btn" style="color:{{$web_config['primary_color']}}" onclick="location.href='{{route('product',$product->slug)}}'">{{\App\CPU\translate('buy_now')}}
                        </button>
                    </div>

                    @endif
                    @endif
                </div>

            </div>
            {{-- Latest products --}}
            <div class="col-xl-9 col-md-8 mt-2 pl-0 pr-0">
                <div class="latest-product-margin" style="margin-{{Session::get('direction') === "rtl" ? 'right:30px' : 'left:30px'}}">
                    <div class="d-flex justify-content-between">
                        <div class="" style="text-align: center;">
                            <span class="for-feature-title" style="text-align: center;font-size:22px !important; font-weight:700">{{ \App\CPU\translate('latest_products')}}</span>
                        </div>
                        <div style="margin-right: 4px;">
                            <a class="text-capitalize view-all-text" href="{{route('products',['data_from'=>'latest'])}}">
                                {{ \App\CPU\translate('view_all')}}
                                <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left-circle mr-1 ml-n1 mt-1 float-left' : 'right-circle ml-1 mr-n1'}}"></i>
                            </a>
                        </div>
                    </div>

                    <div class="row mt-2">
                        @foreach($latest_products as $product)
                        <div class="col-xl-3 col-sm-6 col-md-6 col-6 mb-4">
                            <div style="margin:2px;">
                                @include('web-views.partials._single-product',['product'=>$product])
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    @php($main_section_banner = \App\Model\Banner::where('banner_type','Main Section Banner')->where('published',1)->orderBy('id','desc')->latest()->first())
    @if (isset($main_section_banner))
    <div class="container rtl mb-3">
        <div class="row">
            <div class="col-12 pl-0 pr-0">
                <a href="{{$main_section_banner->url}}" style="cursor: pointer;">
                    <img class="d-block footer_banner_img" style="width: 100%;border-radius: 5px;height: auto !important;" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{asset('storage/app/public/banner')}}/{{$main_section_banner['photo']}}">
                </a>
            </div>
        </div>
    </div>
    @endif

    @php($business_mode=\App\CPU\Helpers::get_business_settings('business_mode'))
    {{--categries--}}
    <div class="container rtl">
        <div class="row">
            @if ($business_mode == 'multi')
            <div class="col-md-6 {{Session::get('direction') === "rtl" ? 'pr-0' : 'pl-0'}}">
                <div class="card" style="min-height: 380px;">
                    <div class="card-body">
                        <div class="row d-flex justify-content-between">
                            <div class="categories-title">
                                <span style="font-weight: 600;font-size: 16px;">{{ \App\CPU\translate('categories')}}</span>
                            </div>
                            <div class="categories-view-all">
                                <a class="text-capitalize view-all-text" href="{{route('categories')}}">{{ \App\CPU\translate('view_all')}}
                                    <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left-circle mr-1 ml-n1 mt-1 float-left' : 'right-circle ml-1 mr-n1'}}"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center mt-3">
                            @foreach($categories as $key=>$category)

                            @if ($key<10) <div class="text-center" style="margin: 5px;">
                                <a href="{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}">
                                    <img style="vertical-align: middle; height: 100px;border-radius: 5px;" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{asset("storage/app/public/category/$category->icon")}}" alt="{{$category->name}}">
                                    <p class="text-center small " style="margin-top: 5px">{{Str::limit($category->name, 12)}}</p>
                                </a>
                        </div>
                        @endif

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="col-md-12 pl-0 pr-0">
            <div class="card" style="min-height: 232px;">
                <div class="card-body">
                    <div class="row d-flex justify-content-between">
                        <div style="{{Session::get('direction') === "rtl" ? 'margin-right: 20px;' : 'margin-left: 22px;'}}">
                            <span style="font-weight: 600;font-size: 16px;">{{ \App\CPU\translate('categories')}}</span>
                        </div>
                        <div style="{{Session::get('direction') === "rtl" ? 'margin-left: 15px;' : 'margin-right: 13px;'}}">
                            <a class="text-capitalize view-all-text" href="{{route('categories')}}">{{ \App\CPU\translate('view_all')}}
                                <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left-circle mr-1 ml-n1 mt-1 float-left' : 'right-circle ml-1 mr-n1'}}"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center mt-3">
                        @foreach($categories as $key=>$category)
                        @if ($key<11) <div class="text-center" style="margin: 5px;">
                            <a href="{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}">
                                <img style="vertical-align: middle; height: 100px;border-radius: 5px;" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{asset("storage/app/public/category/$category->icon")}}" alt="{{$category->name}}">
                                <p class="text-center small " style="margin-top: 5px">{{Str::limit($category->name, 12)}}</p>
                            </a>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- top sellers -->

    @if ($business_mode == 'multi')
    @if(count($top_sellers) > 0)
    <div class="col-md-6 mt-2 mt-md-0 seller-card">
        <div class="card" style="min-height: 383px;">
            <div class="card-body">
                <div class="row d-flex justify-content-between">
                    <div class="seller-list-title">
                        <span style="font-weight: 600;font-size: 18px;">{{ \App\CPU\translate('sellers')}}</span>
                    </div>
                    <div class="seller-list-view-all">
                        <a class="text-capitalize view-all-text" href="{{route('sellers')}}">{{ \App\CPU\translate('view_all')}}
                            <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left-circle mr-1 ml-n1 mt-1 float-left' : 'right-circle ml-1 mr-n1'}}"></i>
                        </a>
                    </div>
                </div>
                <div class="row d-flex justify-content-between mt-3">
                    @foreach($top_sellers as $seller)
                    @if($seller->shop)
                    <div style="margin: 5px;">
                        <center>
                            <a href="{{route('shopView',['id'=>$seller['id']])}}">
                                <img style="vertical-align: middle; padding: 2%;width:100px;height: 100px;border-radius: 50%" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{asset("storage/app/public/shop")}}/{{$seller->shop->image}}">
                                <p class="text-center small ">{{Str::limit($seller->shop->name, 14)}}</p>
                            </a>
                        </center>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
    @endif
    </div>
    </div>


    <div class="container rtl mt-3">
        <div class="row d-flex justify-content-center">
            <div style="height: 90px;width:90px;">
                <img src="{{asset("public/assets/front-end/png/new-arrivals.png")}}" alt="">

            </div>
            <div style="margin-top:24px;font-weight: 700;font-size: 26px;">
                <p style="float: right">{{ \App\CPU\translate('ARRIVALS')}}</p>
            </div>
        </div>
    </div>
    <div class="container rtl mb-3" style="padding-left: 5px !important; padding-right:11px !important;">
        <div class="col-md-12">
            <div class="carousel-wrap">
                <div class="owl-carousel owl-theme mt-2" id="new-arrivals-product">
                    @foreach($latest_products as $key=>$product)

                    @include('web-views.partials._product-card-1',['product'=>$product])

                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container rtl">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-between m-3">
                            <div>
                                <img style="height:30px;width:30px;" src="{{asset("public/assets/front-end/png/best sellings.png")}}" alt="">
                                <span style="margin-left:10px;text-transform: uppercase;font-weight: 700;">{{ \App\CPU\translate('best sellings')}}</span>
                            </div>
                            <div>
                                <a class="text-capitalize view-all-text" href="{{route('products',['data_from'=>'best-selling','page'=>1])}}">{{ \App\CPU\translate('view_all')}}
                                    <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left-circle mr-1 ml-n1 mt-1 float-left' : 'right-circle ml-1 mr-n1'}}"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row ml-2 mr-3 mb-2">
                            @foreach($bestSellProduct as $key=>$bestSell)
                            @if($bestSell->product && $key<3) <div class="col-12 m-1" style="border-style: solid;
                                    border-color: #0000000d; border-radius:5px;" data-href="{{route('product',$bestSell->product->slug)}}">
                                @if($bestSell->product->discount > 0)
                                <div class="d-flex" style="top:0;position:absolute;{{Session::get('direction') === "rtl" ? 'right:0;' : 'left:0;'}}">
                                    <span class="for-discoutn-value p-1 pl-2 pr-2" style="{{Session::get('direction') === "rtl" ? 'border-radius:0px 5px' : 'border-radius:5px 0px'}};">
                                        @if ($bestSell->product->discount_type == 'percent')
                                        {{round($bestSell->product->discount)}}%
                                        @elseif($bestSell->product->discount_type =='flat')
                                        {{\App\CPU\Helpers::currency_converter($bestSell->product->discount)}}
                                        @endif {{\App\CPU\translate('off')}}
                                    </span>
                                </div>
                                @endif
                                <div class="row" style="padding:8px;">

                                    <div class="best-selleing-image">
                                        <a class="d-block d-flex justify-content-center" style="width:100%;height:100%;" href="{{route('product',$bestSell->product->slug)}}">
                                            <img style="border-radius:5px;" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$bestSell->product['thumbnail']}}" alt="Product" />
                                        </a>
                                    </div>
                                    <div class="best-selling-details" style="">
                                        <h6 class="widget-product-title">
                                            <a class="ptr" href="{{route('product',$bestSell->product->slug)}}">
                                                {{\Illuminate\Support\Str::limit($bestSell->product['name'],100)}}
                                            </a>
                                        </h6>
                                        @php($bestSell_overallRating = \App\CPU\ProductManager::get_overall_rating($bestSell->product['reviews']))
                                        <div class="rating-show">
                                            <span class="d-inline-block font-size-sm text-body">
                                                @for($inc=0;$inc<5;$inc++) @if($inc<$bestSell_overallRating[0]) <i class="sr-star czi-star-filled active"></i>
                                                    @else
                                                    <i class="sr-star czi-star" style="color:#fea569 !important"></i>
                                                    @endif
                                                    @endfor
                                                    <label class="badge-style">( {{$bestSell->product->reviews_count}} )</label>
                                            </span>
                                        </div>
                                        <div>
                                            @if($bestSell->product->discount > 0)
                                            <strike style="font-size: 12px!important;color: #E96A6A!important;">
                                                {{\App\CPU\Helpers::currency_converter($bestSell->product->unit_price)}}
                                            </strike>
                                            @endif
                                        </div>
                                        <div class="widget-product-meta">
                                            <span class="text-accent">
                                                {{\App\CPU\Helpers::currency_converter(
                                                        $bestSell->product->unit_price-(\App\CPU\Helpers::get_product_discount($bestSell->product,$bestSell->product->unit_price))
                                                        )}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-2 mt-md-0">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex justify-content-between m-3">
                        <div>
                            <img style="height:30px;width:30px;" src="{{asset("public/assets/front-end/png/top-rated.png")}}" alt="">
                            <span style="margin-left:10px;text-transform: uppercase;font-weight: 700;">{{ \App\CPU\translate('top rated')}}</span>
                        </div>
                        <div>
                            <a class="text-capitalize view-all-text" href="{{route('products',['data_from'=>'top-rated','page'=>1])}}">{{ \App\CPU\translate('view_all')}}
                                <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left-circle mr-1 ml-n1 mt-1 float-left' : 'right-circle ml-1 mr-n1'}}"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row ml-2 mr-3 mb-2">
                        @foreach($topRated as $key=>$top)
                        @if($top->product && $key<3) <div class="col-12 m-1" style="border-style: solid;
                                    border-color: #0000000d; border-radius:5px;" data-href="{{route('product',$top->product->slug)}}">
                            @if($top->product->discount > 0)
                            <div class="d-flex" style="top:0;position:absolute;{{Session::get('direction') === "rtl" ? 'right:0;' : 'left:0;'}}">
                                <span class="for-discoutn-value p-1 pl-2 pr-2" style="{{Session::get('direction') === "rtl" ? 'border-radius:0px 5px' : 'border-radius:5px 0px'}};">
                                    @if ($top->product->discount_type == 'percent')
                                    {{round($top->product->discount)}}%
                                    @elseif($top->product->discount_type =='flat')
                                    {{\App\CPU\Helpers::currency_converter($top->product->discount)}}
                                    @endif {{\App\CPU\translate('off')}}
                                </span>
                            </div>
                            @endif
                            <div class="row" style="padding:8px;">

                                <div class="top-rated-image">
                                    <a class="d-block d-flex justify-content-center" style="width:100%;height:100%;" href="{{route('product',$top->product->slug)}}">
                                        <img style="border-radius:5px;" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$top->product['thumbnail']}}" alt="Product" />
                                    </a>
                                </div>
                                <div class="top-rated-details">
                                    <h6 class="widget-product-title">
                                        <a class="ptr" href="{{route('product',$top->product->slug)}}">
                                            {{\Illuminate\Support\Str::limit($top->product['name'],100)}}
                                        </a>
                                    </h6>
                                    @php($top_overallRating = \App\CPU\ProductManager::get_overall_rating($top->product['reviews']))
                                    <div class="rating-show">
                                        <span class="d-inline-block font-size-sm text-body">
                                            @for($inc=0;$inc<5;$inc++) @if($inc<$top_overallRating[0]) <i class="sr-star czi-star-filled active"></i>
                                                @else
                                                <i class="sr-star czi-star" style="color:#fea569 !important"></i>
                                                @endif
                                                @endfor
                                                <label class="badge-style">( {{$top->product->reviews_count}} )</label>
                                        </span>
                                    </div>
                                    <div>
                                        @if($top->product->discount > 0)
                                        <strike style="font-size: 12px!important;color: #E96A6A!important;">
                                            {{\App\CPU\Helpers::currency_converter($top->product->unit_price)}}
                                        </strike>
                                        @endif
                                    </div>
                                    <div class="widget-product-meta">
                                        <span class="text-accent">
                                            {{\App\CPU\Helpers::currency_converter(
                                                        $top->product->unit_price-(\App\CPU\Helpers::get_product_discount($top->product,$top->product->unit_price))
                                                        )}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                    </div>
                    @endif
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>

    {{-- Banner  --}}
    <div class="container rtl mt-3 mb-3">
        <div class="row">
            @foreach(\App\Model\Banner::where('banner_type','Footer Banner')->where('published',1)->orderBy('id','desc')->take(2)->get() as $banner)
            <div class="col-md-6 mt-2 mt-md-0">
                <a href="{{$banner->url}}" style="cursor: pointer;">
                    <img class="" style="width: 100%; border-radius:5px;height:auto;" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{asset('storage/app/public/banner')}}/{{$banner['photo']}}">
                </a>
            </div>
            @endforeach
        </div>
    </div>
    {{-- Categorized product --}}
    @foreach($home_categories as $category)
    <section class="container rtl mb-3">
        <!-- Heading-->
        <div style="background: #ffffff; padding:20px;border-radius:5px;">
            <div class="flex-between pl-4">
                <div class="category-product-view-title">
                    <span class="for-feature-title {{Session::get('direction') === "rtl" ? 'float-right' : 'float-left'}}" style="font-weight: 700;font-size: 20px;text-transform: uppercase;{{Session::get('direction') === "rtl" ? 'text-align:right;' : 'text-align:left;'}}">
                        {{Str::limit($category['name'],18)}}
                    </span>
                </div>
                <div class="category-product-view-all">
                    <a class="text-capitalize view-all-text " href="{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}">{{ \App\CPU\translate('view_all')}}
                        <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left-circle mr-1 ml-n1 mt-1 float-left' : 'right-circle ml-1 mr-n1'}}"></i>
                    </a>

                </div>
            </div>

            <div class="row mt-2 mb-3 d-flex justify-content-between">
                <div class="col-md-3 col-12 pl-3 pr-3">
                    <a href="{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}" style="cursor: pointer;">
                        <img class="" style="width: 100%; border-radius:5px;height: 300px;" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" src="{{asset('storage/app/public/category')}}/{{$category['icon']}}">
                    </a>
                </div>
                <div class="col-md-9 col-12 ">
                    <div class="row d-flex">
                        @foreach($category['products'] as $key=>$product)
                        @if ($key<4) <div class="col-md-3 col-6 mt-2 mt-md-0" style="">
                            @include('web-views.partials._category-single-product',['product'=>$product])
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>


        </div>
        </div>
    </section>
    @endforeach

    {{--delivery type --}}

    <div class="container rtl mb-3">
        <div class="row shipping-policy-web" style="margin-right: 0px; margin-left:0px;">
            <div class="col-md-3 d-flex justify-content-center">
                <div class="shipping-method-system">
                    <div style="text-align: center;">
                        <img style="height: 60px;width:60px;" src="{{asset("public/assets/front-end/png/delivery.png")}}" alt="">
                    </div>
                    <div style="text-align: center;">
                        <p>
                            {{ \App\CPU\translate('Fast Delivery all accross the country')}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center">
                <div class="shipping-method-system">
                    <div style="text-align: center;">
                        <img style="height: 60px;width:60px;" src="{{asset("public/assets/front-end/png/Payment.png")}}" alt="">
                    </div>
                    <div style="text-align: center;">
                        <p>
                            {{ \App\CPU\translate('Safe Payment')}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center">
                <div class="shipping-method-system">
                    <div style="text-align: center;">
                        <img style="height: 60px;width:60px;" src="{{asset("public/assets/front-end/png/money.png")}}" alt="">
                    </div>
                    <div style="text-align: center;">
                        <p>
                            {{ \App\CPU\translate('7 Days Return Policy')}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center">
                <div class="shipping-method-system">
                    <div style="text-align: center;">
                        <img style="height: 60px;width:60px;" src="{{asset("public/assets/front-end/png/Genuine.png")}}" alt="">
                    </div>
                    <div style="text-align: center;">
                        <p>
                            {{ \App\CPU\translate('100% Authentic Products')}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @push('script')
    {{-- Owl Carousel --}}
    <script src="{{asset('public/assets/front-end')}}/js/owl.carousel.min.js"></script>

    <script>
        $('#flash-deal-slider').owlCarousel({
            loop: false,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left'></i>", "<i class='czi-arrow-right'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('
            direction ')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 2
                },
                //Small
                576: {
                    items: 2
                },
                //Medium
                768: {
                    items: 2
                },
                //Large
                992: {
                    items: 2
                },
                //Extra large
                1200: {
                    items: 2
                },
                //Extra extra large
                1400: {
                    items: 3
                }
            }
        })

        $('#web-feature-deal-slider').owlCarousel({
            loop: false,
            autoplay: true,
            margin: 5,
            nav: false,
            //navText: ["<i class='czi-arrow-left'></i>", "<i class='czi-arrow-right'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('
            direction ')}}': true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 2
                },
                //Small
                576: {
                    items: 2
                },
                //Medium
                768: {
                    items: 2
                },
                //Large
                992: {
                    items: 2
                },
                //Extra large
                1200: {
                    items: 2
                },
                //Extra extra large
                1400: {
                    items: 2
                }
            }
        })

        $('#new-arrivals-product').owlCarousel({
            loop: true,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-{{Session::get('direction') === "
                rtl " ? 'right' : 'left'}}'></i>", "<i class='czi-arrow-{{Session::get('direction') === "
                rtl " ? 'left' : 'right'}}'></i>"
            ],
            dots: false,
            autoplayHoverPause: true,
            '{{session('
            direction ')}}': true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 2
                },
                //Small
                576: {
                    items: 2
                },
                //Medium
                768: {
                    items: 2
                },
                //Large
                992: {
                    items: 2
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        })
    </script>
    <script>
        $('#featured_products_list').owlCarousel({
            loop: true,
            autoplay: false,
            margin: 5,
            nav: true,
            navText: ["<i class='czi-arrow-left'></i>", "<i class='czi-arrow-right'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{session('
            direction ')}}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 2
                },
                //Small
                576: {
                    items: 2
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 5
                },
                //Extra extra large
                1400: {
                    items: 5
                }
            }
        });
    </script>
    <script>
        $('#brands-slider').owlCarousel({
            loop: false,
            autoplay: false,
            margin: 10,
            nav: false,
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

    <script>
        $('#category-slider, #top-seller-slider').owlCarousel({
            loop: false,
            autoplay: false,
            margin: 5,
            nav: false,
            // navText: ["<i class='czi-arrow-left'></i>","<i class='czi-arrow-right'></i>"],
            dots: true,
            autoplayHoverPause: true,
            '{{session('
            direction ')}}': true,
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
                    items: 6
                },
                //Large
                992: {
                    items: 8
                },
                //Extra large
                1200: {
                    items: 10
                },
                //Extra extra large
                1400: {
                    items: 11
                }
            }
        })
    </script>
    @endpush