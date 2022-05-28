<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        @yield('title')
    </title>

    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('storage/app/public/company')}}/{{$web_config['fav_icon']->value}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('storage/app/public/company')}}/{{$web_config['fav_icon']->value}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('storage/app/public/company')}}/{{$web_config['fav_icon']->value}}">

    <link rel="manifest" href="{{asset('public/assets/front-end/v91f')}}/assets/images/icons/site.html">
    <link rel="mask-icon" href="{{asset('public/assets/front-end/v91f/')}}assets/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="{{asset('public/assets/front-end/v91f/')}}assets/images/icons/favicon.ico">

    <meta name="apple-mobile-web-app-title" content="@yield('title')">
    <meta name="application-name" content="@yield('title')">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{asset('public/assets/front-end/v91f')}}/assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="{{asset('public/assets/front-end/v91f')}}/assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css">

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('public/assets/front-end/v91f')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('public/assets/front-end/v91f')}}/assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('public/assets/front-end/v91f')}}/assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('public/assets/front-end/v91f')}}/assets/css/plugins/jquery.countdown.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('public/assets/front-end/v91f')}}/assets/css/style.css">
    <link rel="stylesheet" href="{{asset('public/assets/front-end/v91f')}}/assets/css/skins/skin-demo-4.css">
    <link rel="stylesheet" href="{{asset('public/assets/front-end/v91f')}}/assets/css/demos/demo-4.css">
    @stack('css_or_js')
    <!-- token -->
    <meta name="_token" content="{{csrf_token()}}">

    <!-- font awesome icons -->
    <link rel="stylesheet" media="screen" href="{{asset('public/assets/front-end')}}/css/font-awesome.min.css">

    <script src="{{asset('public/assets/front-end/v91f')}}/assets/js/jquery.min.js"></script>

    <!-- Analytics -->
    {!! \App\CPU\Helpers::get_business_settings('pixel_analytics') !!}
</head>

<body>
    <div class="page-wrapper">
        <!-- anouncements if available -->
        @php($announcement=\App\CPU\Helpers::get_business_settings('announcement'))
        @if (isset($announcement) && $announcement['status']==1)
        <div class="d-flex justify-content-between align-items-center" id="anouncement" style="background-color: {{ $announcement['color'] }};color:{{$announcement['text_color']}}">
            <span></span>
            <span style="text-align:center; font-size: 15px;">{{ $announcement['announcement'] }} </span>
            <span class="ml-3 mr-3" style="font-size: 12px;cursor: pointer;color: darkred" onclick="myFunction()">X</span>
        </div>
        @endif

        <!-- header -->
        <header class="header header-intro-clearance header-3">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <a href="tel:{{$web_config['phone']->value}}"><i class="icon-phone"></i>Call: {{$web_config['phone']->value}}</a>
                    </div><!-- End .header-left -->

                    <div class="header-right">

                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul>
                                    <li>
                                        <div class="header-dropdown">
                                            @php($currency_model = \App\CPU\Helpers::get_business_settings('currency_model'))
                                            @if($currency_model=='multi_currency')

                                            <a href="#">{{session('currency_code')}} {{session('currency_symbol')}}</a>
                                            <div class="header-menu">
                                                <ul>
                                                    @foreach (\App\Model\Currency::where('status', 1)->get() as $key => $currency)
                                                    <li class="" onclick="currency_change('{{$currency['code']}}')">
                                                        <a href="#">{{ $currency->name }}</a>
                                                    </li>
                                                    @endforeach

                                                </ul>
                                            </div><!-- End .header-menu -->


                                            <!-- <div class="topbar-text dropdown disable-autohide {{Session::get('direction') === "rtl" ? 'ml-4' : 'mr-4'}}">
                                                <a class="topbar-link dropdown-toggle" href="#" data-toggle="dropdown">
                                                    <span>{{session('currency_code')}} {{session('currency_symbol')}}</span>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}" style="min-width: 160px!important;text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                                    @foreach (\App\Model\Currency::where('status', 1)->get() as $key => $currency)
                                                    <li style="cursor: pointer" class="dropdown-item" onclick="currency_change('{{$currency['code']}}')">
                                                        {{ $currency->name }}
                                                    </li>
                                                    @endforeach
                                                </ul>


                                            </div> -->
                                            @endif

                                        </div>
                                    </li>
                                    <li>
                                        <div class="header-dropdown">
                                            @php( $local = \App\CPU\Helpers::default_lang())
                                            <a href="#" class="text-uppercase">
                                                @foreach(json_decode($language['value'],true) as $data)
                                                @if($data['code']==$local)
                                                <img class="{{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}" width="20" src="{{asset('public/assets/front-end')}}/img/flags/{{$data['code']}}.png" alt="Eng">
                                                {{$data['name']}}
                                                @endif
                                                @endforeach
                                            </a>
                                            <div class="header-menu">
                                                <ul>
                                                    @foreach(json_decode($language['value'],true) as $key =>$data)
                                                    @if($data['status']==1)
                                                    <li>
                                                        <a class="dropdown-item pb-1" href="{{route('lang',[$data['code']])}}">
                                                            <img width="20" src="{{asset('public/assets/front-end')}}/img/flags/{{$data['code']}}.png" alt="{{$data['name']}}" />
                                                            <span style="text-transform: capitalize">{{$data['name']}}</span>
                                                        </a>
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                    <!-- <li><a href="#">English</a></li>
                                                    <li><a href="#">French</a></li>
                                                    <li><a href="#">Spanish</a></li> -->
                                                </ul>
                                            </div><!-- End .header-menu -->
                                        </div>
                                    </li>
                                    <li><a href="#signin-modal" data-toggle="modal"> <i class="icon-user"></i> Sign in / Sign up</a></li>
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->

                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="index.html" class="logo">
                            <img 
                            src="{{asset("storage/app/public/company")."/".$web_config['web_logo']->value}}"
                         onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                         alt="{{$web_config['name']->value}}" width="70" height="auto">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="{{route('products')}}" type="submit">
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <label for="q" class="sr-only">{{\App\CPU\translate('search')}}</label>
                                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                    <input autocomplete="off" type="search" class="form-control search-bar-input" name="q" id="q" placeholder="Search product ..." required>
                                    <input name="data_from" value="search" hidden>
                                    <input name="page" value="1" hidden>
                                    <diV class="card search-card" style="margin-top: 40px;position: absolute;background: white;z-index: 999;width: 100%;display: none">
                                        <div class="card-body search-result-box" id="" style="overflow:scroll; height:400px;overflow-x: hidden"></div>
                                    </diV>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div>

                    <div class="header-right">
                        <div style="display: none;" class="dropdown compare-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Compare Products" aria-label="Compare Products">
                                <div class="icon">
                                    <i class="icon-random"></i>
                                </div>
                                <p>Compare</p>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <ul class="compare-products">
                                    <li class="compare-product">
                                        <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                        <h4 class="compare-product-title"><a href="product.html">Blue Night Dress</a></h4>
                                    </li>
                                    <li class="compare-product">
                                        <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                        <h4 class="compare-product-title"><a href="product.html">White Long Skirt</a></h4>
                                    </li>
                                </ul>

                                <div class="compare-actions">
                                    <a href="#" class="action-link">Clear All</a>
                                    <a href="#" class="btn btn-outline-primary-2"><span>Compare</span><i class="icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                            <!-- End .dropdown-menu -->
                        </div><!-- End .compare-dropdown -->

                        <div class="wishlist">
                            <a href="{{route('wishlists')}}" title="Wishlist">
                                <div class="icon">
                                    <i class="icon-heart-o"></i>
                                    <span class="wishlist-count badge">{{session()->has('wish_list')?count(session('wish_list')):0}}</span>
                                </div>
                                <p>Wishlist</p>
                            </a>
                        </div><!-- End .compare-dropdown -->

                        <div class="dropdown cart-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <div class="icon">
                                    <i class="icon-shopping-cart"></i>
                                    <span class="cart-count">
                                        @php($cart=\App\CPU\CartManager::get_cart())
                                        {{$cart->count()}}
                                    </span>
                                </div>
                                <p>
                                    Cart
                                    <b>{{\App\CPU\Helpers::currency_converter(\App\CPU\CartManager::cart_total_applied_discount(\App\CPU\CartManager::get_cart()))}}</b>
                                </p>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-cart-products">
                                    @if($cart->count() > 0)
                                        @php($sub_total=0)
                                        @php($total_tax=0)
                                        @foreach($cart as $cartItem)
                                        <div class="product">
                                            <div class="product-cart-details">
                                                <h4 class="product-title">
                                                    <a href="{{route('product',$cartItem['slug'])}}">{{Str::limit($cartItem['name'],30)}}</a>
                                                </h4>

                                                @foreach(json_decode($cartItem['variations'],true) as $key =>$variation)
                                                        <span>{{$key}} : {{$variation}}</span><br>
                                                @endforeach

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">{{$cartItem['quantity']}}</span>
                                                    {{\App\CPU\Helpers::currency_converter(($cartItem['price']-$cartItem['discount'])*$cartItem['quantity'])}}
                                                </span>
                                            </div><!-- End .product-cart-details -->

                                            <figure class="product-image-container">
                                                <a href="{{route('product',$cartItem['slug'])}}" class="product-image">
                                                    <img src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$cartItem['thumbnail']}}" alt="{{Str::limit($cartItem['name'],30)}}">
                                                </a>
                                            </figure>
                                            <a href="#"
                                                onclick="removeFromCart({{ $cartItem['id'] }})" 
                                                type="button" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                        </div>
                                            
                                            @php($sub_total+=($cartItem['price']-$cartItem['discount'])*$cartItem['quantity'])
                                            @php($total_tax+=$cartItem['tax']*$cartItem['quantity'])
                                        @endforeach
            
                                    @else
                                    <p class="text-secondary">No items in cart</p>
                                    @endif

                                </div><!-- End .cart-product -->

                                <div class="dropdown-cart-total">
                                    <span>Total</span>

                                    <span class="cart-total-price">{{\App\CPU\Helpers::currency_converter($sub_total ?? 0)}}</span>
                                </div><!-- End .dropdown-cart-total -->

                                <div class="dropdown-cart-action">
                                    <a href="{{route('shop-cart')}}" class="btn btn-primary">View Cart</a>
                                    <a href="{{route('checkout-details')}}" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .dropdown-cart-total -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .cart-dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->

            <div class="header-bottom sticky-header">
                <div class="container">
                    <div class="header-left">
                        <div class="dropdown category-dropdown">
                            @php($categories=\App\Model\Category::with(['childes.childes'])->where('position', 0)->priority()->paginate(15))
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                                Browse Categories <i class="icon-angle-down"></i>
                            </a>

                            <div class="dropdown-menu">
                                <nav class="side-nav">
                                    <ul class="menu-vertical sf-arrows">
                                    @foreach($categories as $key=>$category)
                                        <li class="item-lead dropdown">
                                                <a class="dropdown-item d-flex flex-between"
                                                   <?php if ($category->childes->count() > 0) echo "data-toggle='dropdown'"?> href="javascript:"
                                                   onclick="location.href='{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}'">
                                                   {{$category['name']}}
                                                </a>
                                                @if($category->childes->count()>0)
                                                    <ul class="dropdown-menu"
                                                        style="position: absolute; left: 100%;text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                                        @foreach($category['childes'] as $subCategory)
                                                            <li class="dropdown">
                                                                <a class="dropdown-item flex-between"
                                                                   <?php if ($subCategory->childes->count() > 0) echo "data-toggle='dropdown'"?> href="javascript:"
                                                                   onclick="location.href='{{route('products',['id'=> $subCategory['id'],'data_from'=>'category','page'=>1])}}'">
                                                                   {{$subCategory['name']}}
                                                                </a>
                                                                @if($subCategory->childes->count()>0)
                                                                    <ul class="dropdown-menu"
                                                                        style="position: absolute; left: 100%;text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                                                        @foreach($subCategory['childes'] as $subSubCategory)
                                                                            <li>
                                                                                <a class="dropdown-item"
                                                                                   href="{{route('products',['id'=> $subSubCategory['id'],'data_from'=>'category','page'=>1])}}">{{$subSubCategory['name']}}</a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                        </li>
                                    @endforeach
                                        <li class="">
                                            <a href="{{route('categories')}}" class="btn btn-light text-primary font-weight-bold">
                                                {{\App\CPU\translate('view_more')}}
                                                <i class="icon-plus"></i>
                                            </a>
                                        
                                        </li>
                                        
                                    </ul><!-- End .menu-vertical -->
                                </nav><!-- End .side-nav -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .category-dropdown -->
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="active">
                                    <a href="{{url('/')}}" class="{{request()->is('/')?'active':''}}">Home</a>
                                </li>
                                @php($business_mode=\App\CPU\Helpers::get_business_settings('business_mode'))
                                @if ($business_mode == 'multi')
                                <li class="{{request()->is('/sellers')?'active':''}}">
                                    <a href="{{route('sellers')}}" class="">Browse Sellers</a>
                                </li>
                                    
                                @endif

                                
                                <li>
                                    <a href="product.html" class="">Latest</a>

                                </li>
                                
                                <li>
                                    <a href="blog.html" class="">Best Sellings</a>
                                </li>
                                <li>
                                    <a href="#" class="sf-with-ul">Company</a>

                                    <ul class="font-weight-normal">
                                        <li><a href="elements-products.html">About us</a></li>
                                        <li><a href="elements-typography.html">Contact Us</a></li>
                                        <li><a href="elements-titles.html">Policies</a></li>
                                        <li><a href="elements-banners.html">Disclaimer</a></li>
                                        <li><a href="elements-product-category.html">Support</a></li>
                                        <li><a href="elements-product-category.html">Become Seller</a></li>
                                        <li><a class="btn btn-sm btn-secondary btn-round text-white" href="elements-product-category.html">Seller Login</a></li>
                                       
                                    </ul>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-center -->

                    <div class="header-right">
                        <i class="la la-headphones"></i>
                        <a class="btn btn-primary btn-sm btn-round" href="http://">Help / Support</a>
                    </div>
                </div><!-- End .container -->
            </div><!-- End .header-bottom -->
        </header><!-- End .header -->

        <main class="main">

        @yield('content')
        @include('layouts.front-end.partials._quick-view-modal')

        @include('layouts.front-end.partials._footer')

        </body>
</html>

        