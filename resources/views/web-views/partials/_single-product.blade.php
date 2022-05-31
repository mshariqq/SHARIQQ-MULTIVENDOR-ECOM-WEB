@php($overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews))

<div class="product product-2">
    <figure class="product-media">
        <span class="product-label label-circle label-top">
            @if($product->discount > 0)
                    @if ($product->discount_type == 'percent')
                        {{round($product->discount,2)}}%
                    @elseif($product->discount_type =='flat')
                        {{\App\CPU\Helpers::currency_converter($product->discount)}}
                    @endif
                        {{\App\CPU\translate('off')}}
            @else
            <div class="d-flex justify-content-end for-dicount-div-null">
                <span class="for-discoutn-value-null"></span>
            </div>
            @endif
        </span>

        <a href="{{route('product',$product->slug)}}">
            <img src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$product['thumbnail']}}" alt="{{ Str::limit($product['name'],30) }}" class="product-image">
        </a>

        <div class="product-action-vertical">
            <a onclick="addWishlist('{{$product->id}}')" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
        </div>



        <div class="product-action">
            <a class="btn btn-primary btn-sm btn-block" href="javascript:" onclick="quickView('{{$product->id}}')">
                <i class="czi-eye align-middle {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"></i>
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
        <h3 class="product-title mb-1"><a href="{{route('product',$product->slug)}}">{{ Str::limit($product['name'], 35) }}</a></h3><!-- End .product-title -->
        <div class="product-price">
            <span class="text-success">{{\App\CPU\Helpers::currency_converter(
                        $product->unit_price-(\App\CPU\Helpers::get_product_discount($product,$product->unit_price))
                    )}}</span>
            <br>
            <del class="text-danger">{{\App\CPU\Helpers::currency_converter($product->unit_price)}}</del>
        </div><!-- End .product-price -->
        <div class="ratings-container">
            <div class="ratings">
                @for($inc=0;$inc<5;$inc++) @if($inc<$overallRating[0]) <i class="sr-star czi-star-filled active"></i>
                    @else
                        <i class="sr-star czi-star" style="color:#fea569 !important"></i>
                    @endif
                @endfor
            </div><!-- End .ratings -->
            <span class="ratings-text">( {{$product->reviews_count}} Reviews )</span>
        </div><!-- End .rating-container -->
    </div><!-- End .product-body -->
</div>