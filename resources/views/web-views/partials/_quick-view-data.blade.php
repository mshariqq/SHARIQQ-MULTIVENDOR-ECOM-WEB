@php
use App\Model\Category;
$overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews);
$rating = \App\CPU\ProductManager::get_rating($product->reviews);
$productReviews = \App\CPU\ProductManager::get_product_review($product->id);
@endphp

<style>
    .product-image-gallery {
        max-height: 400px;
        overflow: scroll;
    }
</style>
<!-- <div class="modal-header rtl">
    <div>
        <h4 class="modal-title product-title">
            <a class="product-title2" href="{{route('product',$product->slug)}}" data-toggle="tooltip" data-placement="right" title="Go to product page">{{$product['name']}}
                <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left mr-2' : 'right ml-2'}} font-size-lg" style="margin-right: 0px !important;"></i>
            </a>
        </h4>
    </div>
    <div>
        <button class="close call-when-done" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div> -->



<div class="product-details-top p-5">
    <div class="row">
        <div class="col-md-12">
            <div class="product-gallery product-gallery-vertical">
                <div class="row">
                    @if($product->images!=null && json_decode($product->images)>0)
                    <?


                    $photo = json_decode($product->images);
                    $photo = $photo['0'];
                    ?>
                    <figure class="product-main-image">
                        <img id="product-zoom" src="{{asset("storage/app/public/product/$photo")}}" data-zoom-image="assets/images/products/single/1-big.jpg" alt="product image">

                        <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                            <i class="icon-arrows"></i>
                        </a>
                    </figure><!-- End .product-main-image -->
                    <!-- End .product-main-image -->

                    @endif

                    <div id="product-zoom-gallery" class="product-image-gallery">
                        @if($product->images!=null && json_decode($product->images)>0)
                        @foreach (json_decode($product->images) as $key => $photo)
                        <a class="product-gallery-item active" href="#" data-image="assets/images/products/single/1.jpg" data-zoom-image="assets/images/products/single/1-big.jpg">
                            <img src="{{asset("storage/app/public/product/$photo")}}" alt="product side">
                        </a>
                        @endforeach
                        @endif

                    </div><!-- End .product-image-gallery -->
                </div><!-- End .row -->
            </div><!-- End .product-gallery -->
        </div><!-- End .col-md-6 -->

        <div class="col-md-12">
            <div class="product-details">
                <h4 class="product-title">{{$product['name']}}</h4><!-- End .product-title -->

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

                <div class="product-price">
                    <span class="font-weight-normal" style="font-size: 18px">
                        {{\App\CPU\Helpers::get_price_range($product) }}
                    </span>
                    @if($product->discount > 0)
                    <strike class="text-danger ml-2" style="font-size: 18px;">
                        {{\App\CPU\Helpers::currency_converter($product->unit_price)}}
                    </strike>
                    @endif
                </div><!-- End .product-price -->
                @if($product->discount > 0)

                <div class="col-12 border border-success">
                    <p>
                        <span>{{\App\CPU\translate('discount')}} applied</span> :
                        <span id="set-discount-amount" class="mx-2 text-primary"></span>
                    </p>

                </div>
                @endif

                <form id="add-to-cart-form" class="mb-2">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">

                    <!-- colors -->

                    <div class="details-filter-row details-row-size mt-2">
                        <label>Color:</label>

                        <div class="product-nav product-nav-thumbs">
                            <div class="row">
                                @foreach (json_decode($product->colors) as $key => $color)

                                <div class="col-2">
                                    <div class="card" style="background-color: {{ $color }};">
                                        <input type="radio" id="{{ $product->id }}-color-{{ $key }}" name="color" value="{{ $color }}" @if($key==0) checked @endif>
                                        <label class="btn" for="{{ $product->id }}-color-{{ $key }}" data-toggle="tooltip"></label>

                                    </div>

                                </div>
                                @endforeach
                            </div>

                        </div><!-- End .product-nav -->
                    </div><!-- End .details-filter-row -->
                    <hr>

                    <!-- Quantity + Add to cart -->
                    @php
                            $qty = 0;
                            foreach (json_decode($product->variation) as $key => $variation) {
                            $qty += $variation->qty;
                            }
                            @endphp
                    <div class="row no-gutters">
                        <div class="col-2">
                            <div class="product-description-label">{{\App\CPU\translate('Quantity')}}:</div>
                        </div>
                        <div class="col-10">
                            <div class="product-quantity d-flex align-items-center">
                                <div class="d-flex col-6 justify-content-between align-items-centre">
                                    <span class="input-group-btn">
                                        <button class="btn btn-number bt-sm btn-round btn-light border border-dark" type="button" data-type="minus" data-field="quantity" disabled="disabled">
                                            -
                                        </button>
                                    </span>
                                    <input type="text" name="quantity" class="form-control btn btn-round btn-white col-6 input-number text-center cart-qty-field" placeholder="1" value="1" min="1" max="100">
                                    <span class="input-group-btn">
                                        <button class="btn btn-number btn-sm btn-round btn-light border border-dark" type="button" data-type="plus" data-field="quantity">
                                            +
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @foreach (json_decode($product->choice_options) as $key => $choice)
                    <div class="flex-start">
                        <div class="product-description-label mt-2 ">
                            {{ $choice->title }}:
                        </div>
                        <div>
                            <ul class=" checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2">
                                @foreach ($choice->options as $key => $option)
                                <span>
                                    <input type="radio" id="{{ $choice->name }}-{{ $option }}" name="{{ $choice->name }}" value="{{ $option }}" @if($key==0) checked @endif>
                                    <label for="{{ $choice->name }}-{{ $option }}">{{ $option }}</label>
                                </span>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endforeach

                    <hr>
                    <div class="row no-gutters d-none mt-2" id="chosen_price_div">
                        <div class="col-2">
                            <div class="product-description-label">{{\App\CPU\translate('Total Price')}}:</div>
                        </div>
                        <div class="col-10">
                            <div class="product-price">
                                <strong class="text-primary" id="chosen_price"></strong>
                            </div>
                        </div>
                        <div class="col-12">
                            @if($product['current_stock']<=0) <h5 class="mt-3" style="color: red">{{\App\CPU\translate('out_of_stock')}}</h5>
                                @endif
                        </div>
                    </div>
                    <div class="d-flex justify-content-space-around mt-2">
                        <button class="btn btn-secondary btn-round mr-md-2" onclick="buy_now()" type="button">
                            {{\App\CPU\translate('buy_now')}}
                        </button>
                        <button class="btn btn-secondary btn-round string-limit mr-md-2" onclick="addToCart()" type="button">
                            <i class="icon-cart"></i>
                            {{\App\CPU\translate('add_to_cart')}}
                        </button>
                        <button type="button" onclick="addWishlist('{{$product['id']}}')" class="btn btn-dark btn-round for-hover-bg string-limit">
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
                            echo "<a class='p-1' href='#'>".$ca['name']."</a>";
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

<script type="text/javascript">
    cartQuantityInitialize();
    getVariantPrice();
    $('#add-to-cart-form input').on('change', function() {
        getVariantPrice();
    });

    $(document).ready(function() {
        $('.click-img').click(function() {
            var idimg = $(this).attr('id');
            var srcimg = $(this).attr('src');
            $(".show-imag").attr('src', srcimg);
        });
    });
</script>