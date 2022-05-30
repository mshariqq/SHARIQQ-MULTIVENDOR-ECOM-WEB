@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('My Shopping Cart'))

@push('css_or_js')
<meta property="og:image" content="{{asset('storage/app/public/company')}}/{{$web_config['web_logo']->value}}" />
<meta property="og:title" content="{{$web_config['name']->value}} " />
<meta property="og:url" content="{{env('APP_URL')}}">
<meta property="og:description" content="{!! substr($web_config['about']->value,0,100) !!}">

<meta property="twitter:card" content="{{asset('storage/app/public/company')}}/{{$web_config['web_logo']->value}}" />
<meta property="twitter:title" content="{{$web_config['name']->value}}" />
<meta property="twitter:url" content="{{env('APP_URL')}}">
<meta property="twitter:description" content="{!! substr($web_config['about']->value,0,100) !!}">
<link rel="stylesheet" href="{{asset('public/assets/front-end')}}/css/shop-cart.css" />
@endpush

@section('content')
<div class="page-header text-center bg-light">
    <div class="container">
        <h1 class="page-title">{{ \App\CPU\translate('shopping_cart')}}</h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">{{ \App\CPU\translate('Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{route('shop-cart')}}">{{ \App\CPU\translate('shopping_cart')}}</a>
            </li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="cart">
        <div class="container" id="cart-summary">
        @include('layouts.front-end.partials.cart_details')
        </div><!-- End .container -->
    </div><!-- End .cart -->
</div><!-- End .page-content -->


<!-- <div class="container pb-5 mb-2 mt-3 rtl" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};" id="cart-summary">
    @include('layouts.front-end.partials.cart_details')
</div> -->
<script>
    cartQuantityInitialize();
</script>
@endsection