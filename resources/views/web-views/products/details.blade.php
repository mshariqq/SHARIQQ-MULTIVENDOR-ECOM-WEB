<?php

use App\Model\Category; ?>
@extends('layouts.front-end.app')

@section('title',$product['name'])
@push('css_or_js')
<meta name="description" content="{{$product->slug}}">
<meta name="keywords" content="@foreach(explode(' ',$product['name']) as $keyword) {{$keyword.' , '}} @endforeach">
@if($product->added_by=='seller')
<meta name="author" content="{{ $product->seller->shop?$product->seller->shop->name:$product->seller->f_name}}">
@elseif($product->added_by=='admin')
<meta name="author" content="{{$web_config['name']->value}}">
@endif
<!-- Viewport-->

@if($product['meta_image']!=null)
<meta property="og:image" content="{{asset("storage/app/public/product/meta")}}/{{$product->meta_image}}" />
<meta property="twitter:card" content="{{asset("storage/app/public/product/meta")}}/{{$product->meta_image}}" />
@else
<meta property="og:image" content="{{asset("storage/app/public/product/thumbnail")}}/{{$product->thumbnail}}" />
<meta property="twitter:card" content="{{asset("storage/app/public/product/thumbnail/")}}/{{$product->thumbnail}}" />
@endif

@if($product['meta_title']!=null)
<meta property="og:title" content="{{$product->meta_title}}" />
<meta property="twitter:title" content="{{$product->meta_title}}" />
@else
<meta property="og:title" content="{{$product->name}}" />
<meta property="twitter:title" content="{{$product->name}}" />
@endif
<meta property="og:url" content="{{route('product',[$product->slug])}}">

@if($product['meta_description']!=null)
<meta property="twitter:description" content="{!! $product['meta_description'] !!}">
<meta property="og:description" content="{!! $product['meta_description'] !!}">
@else
<meta property="og:description" content="@foreach(explode(' ',$product['name']) as $keyword) {{$keyword.' , '}} @endforeach">
<meta property="twitter:description" content="@foreach(explode(' ',$product['name']) as $keyword) {{$keyword.' , '}} @endforeach">
@endif
<meta property="twitter:url" content="{{route('product',[$product->slug])}}">

<link rel="stylesheet" href="{{asset('public/assets/front-end/css/product-details.css')}}" />


<!-- new style -->
<style>
    .SelectColorSpan {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        border: 1px solid #eee;
        margin: 5px;
        transition: ease-in-out;
        transition-duration: 0.5s;
        cursor: pointer;
    }

    .selectChoiceSpan {
        /* width: auto; */
        color: black;
        border: 1px solid #54595f;
        padding: 5px;
        border-radius: 30px;
        cursor: pointer;
    }
</style>
@endpush
<script>
    // choices function 
    function addChoiceToForm(el, val, formID, classes, spanID) {
        // change all the elements color back to normal
        var spans = $('.' + classes);
        $(spans).css('border', '1px solid #54595f');
        // change this item color
        $('#' + spanID).css('border', "2px solid green");
        // add the value to input
        var fInput = $("#" + formID).val(val);

    }

    function addColorToForm(el, val, formID, classes, spanID) {
        // change all the elements color back to normal
        var spans = $('.' + classes);
        $(spans).css('border', '1px solid #54595f');
        $(spans).css('height', "35px");
        $(spans).css('width', "35px");

        // change this item color
        $('#' +spanID).css('border', "4px solid orange");
        $('#' +spanID).css('height', "40px");
        $('#' +spanID).css('width', "40px");

        // add the value to input
        var fInput = $("#" + formID).val(val);
    }
</script>
@section('content')
<?php
$overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews);
$rating = \App\CPU\ProductManager::get_rating($product->reviews);
?>
<nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-2 mt-2">
    <div class="container d-flex align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('product',[$product->slug])}}">{{$product->name}}</a></li>
            <!-- <li class="breadcrumb-item active" aria-current="page">Default</li> -->
        </ol>

        <!-- Next and prev -->
        <!-- <nav class="product-pager ml-auto" aria-label="Product">
            <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                <i class="icon-angle-left"></i>
                <span>Prev</span>
            </a>

            <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                <span>Next</span>
                <i class="icon-angle-right"></i>
            </a>
        </nav> -->
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="container">
        <div class="product-details-top">
            <div class="row">
                <div class="col-md-6">
                    <div class="product-gallery product-gallery-vertical">
                        <div class="row">
                            @if($product->images!=null && json_decode($product->images)>0)
                            <?
                            $photo = json_decode($product->images);
                            $photo = $photo['0'];
                            ?>
                            <figure class="product-main-image">
                                <img id="product-zoom" src="{{asset("storage/app/public/product/$photo")}}" data-zoom-image="{{asset("storage/app/public/product/$photo")}}" alt="{{$product['name']}}">
                                <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                    <i class="icon-arrows"></i>
                                </a>
                            </figure><!-- End .product-main-image -->
                            <!-- End .product-main-image -->

                            @endif
                            <div id="product-zoom-gallery" class="product-image-gallery">
                                @if($product->images!=null && json_decode($product->images)>0)
                                @foreach (json_decode($product->images) as $key => $photo)
                                <a class="product-gallery-item" href="#" data-image="{{asset("storage/app/public/product/$photo")}}" data-zoom-image="{{asset("storage/app/public/product/$photo")}}">
                                    <img src="{{asset("storage/app/public/product/$photo")}}" alt="{{$product['name']}}">
                                </a>

                                @endforeach
                                @endif

                            </div><!-- End .product-image-gallery -->

                        </div><!-- End .row -->
                    </div><!-- End .product-gallery -->
                </div><!-- End .col-md-6 -->

                <div class="col-md-6">
                    <div class="product-details">
                        <h1 class="product-title">{{$product->name}}</h1><!-- End .product-title -->

                        <div class="ratings-container">
                            <div class="ratings">
                                @for($inc=0;$inc<5;$inc++) @if($inc<$overallRating[0]) <i class="sr-star czi-star-filled active"></i>
                                    @else
                                    <i class="sr-star czi-star"></i>
                                    @endif
                                    @endfor
                            </div><!-- End .ratings -->

                            <a class="ratings-text" href="#product-review-link" id="review-link">( {{$overallRating[0]}} Reviews )</a>
                        </div><!-- End .rating-container -->

                        <div class="product-price" id="productPriceEL">
                            <!-- {{\App\CPU\Helpers::get_price_range($product) }} -->
                            {{\App\CPU\Helpers::currency_converter($product->unit_price)}}

                        </div><!-- End .product-price -->

                        <div class="product-content">
                            <p>{!! $product['meta_description'] !!}</p>
                        </div><!-- End .product-content -->

                        <hr>

                        <form id="add-to-cart-form" class="mb-2">
                            @csrf
                            <input type="hidden" id="FormHiddenUnitPrice" value="{{$product->unit_price}}">
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="color" value="" id="colorInput" autocomplete="off" />

                            <div class="col-12 row align-items-center">
                                <label class="col-md-4">Select Color:</label>
                                <div class="col-md-8">

                                    <div class="row">

                                        @foreach (json_decode($product->colors) as $key => $color)
                                            <span id="ColorSpan-{{$key}}" 
                                            onclick="addColorToForm(this, '{{$color}}', 'colorInput', 'SelectColorSpan', 'ColorSpan-{{$key}}')" 
                                            class="SelectColorSpan" style="background-color: {{$color}};"></span>
                                            @if($key == 0 || $key == "0")
                                        
                                            <script>
                                                addColorToForm(this, '{{$color}}', 'colorInput', 'SelectColorSpan', 'ColorSpan-{{$key}}');                                         
                                            </script>
                                        
                                            @endif
                                        @endforeach
                                    </div>

                                </div><!-- End .product-nav -->
                            </div><!-- End .details-filter-row -->
                            <br>
                            @foreach (json_decode($product->choice_options) as $key => $choice)
                            <input type="hidden" id="{{ $choice->name }}-choiceFormInput" name="{{ $choice->name }}">

                            <div class="col-12 row align-items-center mb-3">
                                <div class="col-md-4 col-12">
                                    Select {{ $choice->title }}:
                                </div>
                                <div class="col-md-8 col-12 row align-items-center">

                                    @foreach ($choice->options as $key => $option)
                                    
                                    <!-- <span>
                                                    <input type="radio" id="{{ $choice->name }}-{{ $option }}" name="{{ $choice->name }}" value="{{ $option }}" @if($key==0) checked @endif>
                                                    <label for="{{ $choice->name }}-{{ $option }}">{{ $option }}</label>
                                                </span> -->
                                    <span 
                                    id="{{ $choice->name }}-selectChoiceSpan-{{$key}}" 
                                    onclick="addChoiceToForm(this, '{{ $option }}', '{{ $choice->name }}-choiceFormInput', '{{ $choice->name }}-selectChoiceSpan', '{{ $choice->name }}-selectChoiceSpan-{{$key}}')" 
                                    class="selectChoiceSpan {{ $choice->name }}-selectChoiceSpan col-3 text-wrap text-center">{{ $option }}</span>
                                    @if($key == 0 || $key == "0")
                                        
                                            <script>
                                                addChoiceToForm("this", '{{ $option }}', '{{ $choice->name }}-choiceFormInput', '{{ $choice->name }}-selectChoiceSpan', '{{ $choice->name }}-selectChoiceSpan-{{$key}}');
                                            </script>
                                        
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            @endforeach

                            <!-- Quantity + Add to cart -->
                            @php
                            $qty = 0;
                            foreach (json_decode($product->variation) as $key => $variation) {
                            $qty += $variation->qty;
                            }
                            @endphp

                            <div class="details-filter-row details-row-size">
                                <label for="qty">Qty:</label>
                                <div class="product-details-quantity">
                                    <input name="quantity" type="number" class="form-control" value="1" min="1" max="500" step="1" data-decimals="0" required>
                                </div>
                            </div>

                            <div class="col-12">
                            @if($product['current_stock']<=0) <p class="mt-3 text-body text-danger" >{{\App\CPU\translate('out_of_stock')}}</p>
                                        @endif
                            </div>

                            <div class="row justify-content-space-around mt-2">
                                <button class="btn btn-secondary btn-round mr-md-2 mb-md-2" onclick="buy_now()" type="button">
                                    {{\App\CPU\translate('buy_now')}}
                                </button>
                                <button class="btn btn-secondary btn-round string-limit mr-md-2 mb-md-2" onclick="addToCart()" type="button">
                                    <i class="icon-cart"></i>
                                    {{\App\CPU\translate('add_to_cart')}}
                                </button>
                                <button type="button" onclick="addWishlist('{{$product['id']}}')" class="mb-md-2 btn btn-dark btn-round for-hover-bg string-limit">
                                    <i class="icon-heart" aria-hidden="true"></i>
                                    <span class="countWishlist-{{$product['id']}}">{{$countWishlist}}</span>
                                </button>

                            </div>

                        </form>

                        <div class="product-details-footer">
                            <div class="product-cat">
                                <span>Category:</span>
                                <?php
                                $cats = json_decode($product['category_ids']);
                                $categories = [];

                                foreach ($cats as $cat) {
                                    $ca = Category::find($cat->id);
                                    echo " - <a class='p-1' href='#'>" . $ca['name'] . "</a>";
                                }

                                ?>
                            </div><!-- End .product-cat -->

                            <div class="social-icons social-icons-sm">
                                <span class="social-label">Share:</span>
                                <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                            </div>
                        </div><!-- End .product-details-footer -->
                    </div><!-- End .product-details -->
                </div><!-- End .col-md-6 -->
            </div><!-- End .row -->
        </div><!-- End .product-details-top -->
        <div class="product-details-tab">
            <ul class="nav nav-pills justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews ({{$overallRating[1]}})</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                </li>
            </ul>
            <div class="tab-content">
                <!-- description -->
                <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                    <div class="product-desc-content">
                        @if($product->video_url!=null)
                        <div class="col-12 mb-4">
                            <iframe width="420" height="315" src="{{$product->video_url}}">
                            </iframe>
                        </div>
                        @endif

                        <div class="text-body col-lg-12 col-md-12" style="overflow: scroll;">
                            {!! $product['details'] !!}
                        </div>
                    </div><!-- End .product-desc-content -->
                </div><!-- .End .tab-pane -->

                <!-- reviews -->
                <?php
                $reviews_of_product = App\Model\Review::where('product_id', $product->id)->paginate(2);

                ?>
                <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-info-link">
                    <div class="row pt-2 pb-3">
                        <div class="col-lg-4 col-md-5 ">
                            <div class=" row d-flex justify-content-center align-items-center">
                                <div class="col-12 d-flex justify-content-center align-items-center">
                                    <h2 class="overall_review mb-2" style="font-weight: 500;font-size: 50px;">
                                        {{$overallRating[1]}}
                                    </h2>
                                </div>
                                <div class="d-flex justify-content-center align-items-center star-rating ">
                                    @if (round($overallRating[0])==5)
                                    @for ($i = 0; $i < 5; $i++) <i class="czi-star-filled font-size-sm text-accent {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"></i>
                                        @endfor
                                        @endif
                                        @if (round($overallRating[0])==4)
                                        @for ($i = 0; $i < 4; $i++) <i class="czi-star-filled font-size-sm text-accent {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"></i>
                                            @endfor
                                            <i class="czi-star font-size-sm text-muted {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"></i>
                                            @endif
                                            @if (round($overallRating[0])==3)
                                            @for ($i = 0; $i < 3; $i++) <i class="czi-star-filled font-size-sm text-accent {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"></i>
                                                @endfor
                                                @for ($j = 0; $j < 2; $j++) <i class="czi-star font-size-sm text-accent {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"></i>
                                                    @endfor
                                                    @endif
                                                    @if (round($overallRating[0])==2)
                                                    @for ($i = 0; $i < 2; $i++) <i class="czi-star-filled font-size-sm text-accent {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"></i>
                                                        @endfor
                                                        @for ($j = 0; $j < 3; $j++) <i class="czi-star font-size-sm text-accent {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"></i>
                                                            @endfor
                                                            @endif
                                                            @if (round($overallRating[0])==1)
                                                            @for ($i = 0; $i < 4; $i++) <i class="czi-star font-size-sm text-accent {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"></i>
                                                                @endfor
                                                                <i class="czi-star-filled font-size-sm text-accent {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"></i>
                                                                @endif
                                                                @if (round($overallRating[0])==0)
                                                                @for ($i = 0; $i < 5; $i++) <i class="czi-star font-size-sm text-muted {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"></i>
                                                                    @endfor
                                                                    @endif
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center mt-2">
                                    <span class="text-center">
                                        {{$reviews_of_product->total()}} {{\App\CPU\translate('ratings')}}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7 pt-sm-3 pt-md-0">
                            <div class="row d-flex align-items-center mb-2 font-size-sm">
                                <div class="col-3 text-nowrap "><span class="d-inline-block align-middle text-body">{{\App\CPU\translate('Excellent')}}</span>
                                </div>
                                <div class="col-8">
                                    <div class="progress text-body" style="height: 5px;">
                                        <div class="progress-bar " role="progressbar" style="background-color: {{$web_config['primary_color']}} !important;width: <?php echo $widthRating = ($rating[0] != 0) ? ($rating[0] / $overallRating[1]) * 100 : (0); ?>%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-1 text-body">
                                    <span class=" {{Session::get('direction') === "rtl" ? 'mr-3 float-left' : 'ml-3 float-right'}} ">
                                        {{$rating[0]}}
                                    </span>
                                </div>
                            </div>

                            <div class="row d-flex align-items-center mb-2 text-body font-size-sm">
                                <div class="col-3 text-nowrap "><span class="d-inline-block align-middle ">{{\App\CPU\translate('Good')}}</span>
                                </div>
                                <div class="col-8">
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="background-color: {{$web_config['primary_color']}} !important;width: <?php echo $widthRating = ($rating[1] != 0) ? ($rating[1] / $overallRating[1]) * 100 : (0); ?>%; background-color: #a7e453;" aria-valuenow="27" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <span class="{{Session::get('direction') === "rtl" ? 'mr-3 float-left' : 'ml-3 float-right'}}">
                                        {{$rating[1]}}
                                    </span>
                                </div>
                            </div>

                            <div class="row d-flex align-items-center mb-2 text-body font-size-sm">
                                <div class="col-3 text-nowrap"><span class="d-inline-block align-middle ">{{\App\CPU\translate('Average')}}</span>
                                </div>
                                <div class="col-8">
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="background-color: {{$web_config['primary_color']}} !important;width: <?php echo $widthRating = ($rating[2] != 0) ? ($rating[2] / $overallRating[1]) * 100 : (0); ?>%; background-color: #ffda75;" aria-valuenow="17" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <span class="{{Session::get('direction') === "rtl" ? 'mr-3 float-left' : 'ml-3 float-right'}}">
                                        {{$rating[2]}}
                                    </span>
                                </div>
                            </div>

                            <div class="row d-flex align-items-center mb-2 text-body font-size-sm">
                                <div class="col-3 text-nowrap "><span class="d-inline-block align-middle">{{\App\CPU\translate('Below Average')}}</span>
                                </div>
                                <div class="col-8">
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="background-color: {{$web_config['primary_color']}} !important;width: <?php echo $widthRating = ($rating[3] != 0) ? ($rating[3] / $overallRating[1]) * 100 : (0); ?>%; background-color: #fea569;" aria-valuenow="9" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <span class="{{Session::get('direction') === "rtl" ? 'mr-3 float-left' : 'ml-3 float-right'}}">
                                        {{$rating[3]}}
                                    </span>
                                </div>
                            </div>

                            <div class="row d-flex align-items-center text-body font-size-sm">
                                <div class="col-3 text-nowrap"><span class="d-inline-block align-middle ">{{\App\CPU\translate('Poor')}}</span>
                                </div>
                                <div class="col-8">
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="background-color: {{$web_config['primary_color']}} !important;backbround-color:{{$web_config['primary_color']}};width: <?php echo $widthRating = ($rating[4] != 0) ? ($rating[4] / $overallRating[1]) * 100 : (0); ?>%;" aria-valuenow="4" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <span class="{{Session::get('direction') === "rtl" ? 'mr-3 float-left' : 'ml-3 float-right'}}">
                                        {{$rating[4]}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-4 mb-3">
                        <div style="display: block;width:100%;text-align: center;background: #F3F4F5;border-radius: 5px;padding:5px;">
                            <span class="text-capitalize">{{\App\CPU\translate('Product Review')}}</span>
                        </div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-12" id="product-review-list">
                            {{-- @foreach($reviews_of_product as $productReview) --}}
                            {{-- @include('web-views.partials.product-reviews',['productRevie'=>$productRevie]) --}}
                            {{-- @endforeach --}}
                            @if(count($product->reviews)==0)
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="text-danger text-center">{{\App\CPU\translate('product_review_not_available')}}</h6>
                                </div>
                            </div>
                            @endif

                        </div>
                        <div class="col-12">
                            <div class="card-footer d-flex justify-content-center align-items-center">
                                
                                <button class="btn btn-primary btn-round" onclick="load_review()">{{\App\CPU\translate('view more')}}</button>
                            </div>
                        </div>
                    </div>
                </div><!-- .End .tab-pane -->

                <!-- policies TAB -->
                <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                    <div class="product-desc-content">
                        <p>7 Day return policy</p>
                    </div><!-- End .product-desc-content -->
                </div><!-- .End .tab-pane -->
                
            </div><!-- End .tab-content -->
        </div><!-- End .product-details-tab -->

        <br>
        <!-- Seller Info if available -->
        @if($product->added_by=='seller')
            @if(isset($product->seller->shop))
            <div class="row">
                <div class="col-md-3 col-12 ">
                    <?
                    $products_for_review = App\Model\Product::where('added_by',$product->added_by)->where('user_id',$product->user_id)->withCount('reviews')->get();

                    $total_reviews = 0;
                    foreach ($products_for_review as $item) {
                        $total_reviews += $item->reviews_count;
                    }
                    ?>
                    <div class="card border">
                        <div class="card-header bg-light text-primary p-3">
                            Seller Info
                        </div>
                        <div class="card-body p-4">
                            <img class="round" style="height: auto;width: 100px" src="{{asset('storage/app/public/shop')}}/{{$product->seller->shop->image}}" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" alt="">
                            <br>
                            <h4>{{$product->seller->shop->name}}</h4>
                            <p>Reviews ( {{$total_reviews}} )</p>
                            <p>Products ( {{$products_for_review->count()}} )</p>
                            
                        </div>
                        <div class="card-footer">
                            <p class="mb-1">You can Browse all products listed by this seller on their store below</p>
                            
                            <!-- <p class="mb-1">
                                <a href="{{route('customer.auth.login')}}" class="btn btn-outline-primary btn-round">
                                        <i class="fa fa-envelope"></i>
                                        <span>{{\App\CPU\translate('Chat with Seller')}}</span>
                                </a>
                            </p> -->
                            
                            <p>
                            <a class="btn btn-round btn-secondary" href="{{ route('shop-view',[$product->seller->id]) }}">
                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                    {{\App\CPU\translate('Visit Store')}}
                            </a>
                            </p>
                        </div>
                        
                    </div>
                    
                </div>
                <div class="col-md-9 col-12">
                    <h4>More Products by this Seller</h4>
                    <?
                    $more_product_from_seller = App\Model\Product::where('added_by',$product->added_by)->where('user_id',$product->user_id)->latest()->take(3)->get();
                    ?>

                        @foreach($more_product_from_seller as $item)

                        @include('web-views.partials.seller-products-product-details',['product'=>$item])
                        

                        @endforeach

                 </div>
            </div>
            @endif
        @else
        <?php 
                $products_for_review = App\Model\Product::where('added_by','admin')->where('user_id',$product->user_id)->withCount('reviews')->get();

                $total_reviews = 0;
                foreach ($products_for_review as $item) {
                    $total_reviews += $item->reviews_count;
                }
                ?>
            <div class="row">
                <div class="col-md-3 col-12 ">
                    <div class="card border">
                        <div class="card-header bg-light text-primary p-3">
                            Seller Info
                        </div>
                        <div class="card-body p-4">
                            <img 
                            class="img-responsive border rounded"
                            width="100px"
                            height="auto" 
                            src="{{asset("storage/app/public/company")}}/{{$web_config['fav_icon']->value}}" 
                            onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" 
                            alt="{{$web_config['name']->value}}" />
                            <br>
                            <h4>
                            {{$web_config['name']->value}}
                            </h4>
                            <p class="">
                                <span>Reviews  ( {{$total_reviews}} )</span>
                            </p>
                            <p class="">
                                <span>Products  ( {{$products_for_review->count()}} )</span>
                            </p>
                        
                        </div>
                        <div class="card-footer">
                            <p>You can Browse all products listed by this seller on their store below</p>
                            <br>
                            <a class="btn btn-round btn-secondary" href="{{ route('shop-view',[0]) }}">
                                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                        {{\App\CPU\translate('Visit Store')}}
                            </a>
                        </div>
                        
                    </div>
                    
                </div>
                <div class="col-md-9 col-12">
                    <h4>More Products by this Seller</h4>
                    <?
                    $more_product_from_seller = App\Model\Product::where('added_by',$product->added_by)->where('user_id',$product->user_id)->latest()->take(3)->get();
                    ?>

                        @foreach($more_product_from_seller as $item)

                        @include('web-views.partials.seller-products-product-details',['product'=>$item])
                        

                        @endforeach

                 </div>
            </div>
       
        @endif


    </div><!-- End .container -->
</div><!-- End .page-content -->

<!-- Product carousel (You may also like)-->
<div class="container  mb-3 rtl" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
    <div class="row flex-between">
        <div class="text-capitalize" style="font-weight: 700; font-size: 30px;{{Session::get('direction') === "rtl" ? 'margin-right: 5px;' : 'margin-left: 5px;'}}">
            <span>{{ \App\CPU\translate('similar_products')}}</span>
        </div>

        <div class="view_all d-flex justify-content-center align-items-center">
            <div>
                @php($category=json_decode($product['category_ids']))
                <a class="text-capitalize view-all-text" style="color:{{$web_config['primary_color']}} !important;{{Session::get('direction') === "rtl" ? 'margin-left:10px;' : 'margin-right: 8px;'}}" href="{{route('products',['id'=> $category[0]->id,'data_from'=>'category','page'=>1])}}">{{ \App\CPU\translate('view_all')}}
                    <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left-circle mr-1 ml-n1 mt-1 ' : 'right-circle ml-1 mr-n1'}}"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- Grid-->

    <!-- Product-->
    <div class="row mt-4">
        @if (count($relatedProducts)>0)
        @foreach($relatedProducts as $key => $relatedProduct)
        <div class="col-xl-2 col-sm-3 col-6" style="margin-bottom: 20px;">
            @include('web-views.partials._single-product',['product'=>$relatedProduct])
        </div>
        @endforeach
        @else
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="text-danger text-center">{{\App\CPU\translate('similar')}} {{\App\CPU\translate('product_not_available')}}</h6>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<div class="modal fade rtl" id="show-modal-view" tabindex="-1" role="dialog" aria-labelledby="show-modal-image" aria-hidden="true" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body" style="display: flex;justify-content: center">
                <button class="btn btn-default" style="border-radius: 50%;margin-top: -25px;position: absolute;{{Session::get('direction') === "rtl" ? 'left' : 'right'}}: -7px;" data-dismiss="modal">
                    <i class="fa fa-close"></i>
                </button>
                <img class="element-center" id="attachment-view" src="">
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')

<script type="text/javascript">
    cartQuantityInitialize();
    getVariantPrice();
    $('#add-to-cart-form input').on('change', function() {
        getVariantPrice();
    });

    function showInstaImage(link) {
        $("#attachment-view").attr("src", link);
        $('#show-modal-view').modal('toggle')
    }

    $(document).ready(function() {
        load_review();

    });


    let load_review_count = 1;

    function load_review() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: '{{route('review-list-product')}}',
            data: {
                product_id: {
                    {
                        $product->id
                    }
                },
                offset: load_review_count
            },
            success: function(data) {
                $('#product-review-list').append(data.productReview)
                if (data.not_empty == 0 && load_review_count > 2) {
                    // toastr.info('{{\App\CPU\translate('
                    //     no more review remain to load ')}}', {
                    //         CloseButton: true,
                    //         ProgressBar: true
                    //     });
                    console.log('iff');
                }
            }
        });
        load_review_count++
    }

    $('#contact-seller').on('click', function(e) {
        // $('#seller_details').css('height', '200px');
        $('#seller_details').animate({
            'height': '276px'
        });
        $('#msg-option').css('display', 'block');
    });
    $('#sendBtn').on('click', function(e) {
        e.preventDefault();
        let msgValue = $('#msg-option').find('textarea').val();
        let data = {
            message: msgValue,
            shop_id: $('#msg-option').find('textarea').attr('shop-id'),
            seller_id: $('.msg-option').find('.seller_id').attr('seller-id'),
        }
        if (msgValue != '') {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: '{{route('messages_store')}}',
                data: data,
                success: function(respons) {
                    console.log('send successfully');
                }
            });
            $('#chatInputBox').val('');
            $('#msg-option').css('display', 'none');
            $('#contact-seller').find('.contact').attr('disabled', '');
            $('#seller_details').animate({
                'height': '125px'
            });
            $('#go_to_chatbox').css('display', 'block');
        } else {
            console.log('say something');
        }
    });
    $('#cancelBtn').on('click', function(e) {
        e.preventDefault();
        $('#seller_details').animate({
            'height': '114px'
        });
        $('#msg-option').css('display', 'none');
    });
</script>

<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5f55f75bde227f0012147049&product=sticky-share-buttons" async="async"></script>
@endpush