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
    .SelectColorSpan{
        width: 35px;
        height: 35px;
        border-radius: 50%;
        border: 1px solid #eee;
        margin: 5px;
        transition: ease-in-out;
        transition-duration: 0.5s;
    }
    .selectChoiceSpan{
        /* width: auto; */
        color: black;
        border: 1px solid #54595f;
        padding: 5px;
        border-radius: 30px;
        cursor: pointer;
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
                                    <input type="hidden" name="color" value="" id="colorInput" autocomplete="off"/>

                                    <div class="col-12 row align-items-center">
                                        <label class="col-md-3">Colors:</label>
                                        <div class="col-md-9">
                                        
                                            <div class="row">

                                                @foreach (json_decode($product->colors) as $key => $color)
                                                <span onclick="addColorToForm(this, '{{$color}}', 'colorInput', 'SelectColorSpan')" class="SelectColorSpan" style="background-color: {{$color}};"></span>
                                                @endforeach
                                            </div>

                                        </div><!-- End .product-nav -->
                                    </div><!-- End .details-filter-row -->
                                    <br>
                                    @foreach (json_decode($product->choice_options) as $key => $choice)
                                    <input type="hidden" id="{{ $choice->name }}-choiceFormInput" name="{{ $choice->name }}">

                                    <div class="col-12 row align-items-center mb-3">
                                        <div class="col-md-3 col-12">
                                            {{ $choice->title }}:
                                        </div>
                                        <div class="col-md-9 col-12 row align-items-center">
                                                
                                                @foreach ($choice->options as $key => $option)
                                                <!-- <span>
                                                    <input type="radio" id="{{ $choice->name }}-{{ $option }}" name="{{ $choice->name }}" value="{{ $option }}" @if($key==0) checked @endif>
                                                    <label for="{{ $choice->name }}-{{ $option }}">{{ $option }}</label>
                                                </span> -->
                                                    <span onclick="addChoiceToForm(this, '{{ $option }}', '{{ $choice->name }}-choiceFormInput', '{{ $choice->name }}-selectChoiceSpan')" class="selectChoiceSpan {{ $choice->name }}-selectChoiceSpan col-3 text-wrap text-center">{{ $option }}</span>
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
                        <a type="button" href="{{route('product',$product->slug)}}" class="mb-md-2  btn btn-dark btn-round for-hover-bg string-limit">
                            <i class="icon-eye" aria-hidden="true"></i>
                            <span class="countWishlist-{{$product['id']}}">Full Product View</span>
                        </a>
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
                            echo "<a class='p-1' href='#'>" . $ca['name'] . "</a>";
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


// choices function 
function addChoiceToForm(el, val, formID, classes){
    // change all the elements color back to normal
    var spans = $('.'+classes);
    $(spans).css('border', '1px solid #54595f');
    // change this item color
    $(el).css('border', "2px solid blue");
    // add the value to input
    var fInput = $("#"+formID).val(val);
}

function addColorToForm(el, val, formID, classes){
    // change all the elements color back to normal
    var spans = $('.'+classes);
    $(spans).css('border', '1px solid #54595f');
    $(spans).css('height', "35px");
    $(spans).css('width', "35px");

    // change this item color
    $(el).css('border', "2px solid blue");
    $(el).css('height', "40px");
    $(el).css('width', "40px");
    // add the value to input
    var fInput = $("#"+formID).val(val);
}

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
        // Product Image Zoom plugin - product pages
        if ($.fn.elevateZoom) {
            $('#product-zoom').elevateZoom({
                gallery: 'product-zoom-gallery',
                galleryActiveClass: 'active',
                zoomType: "inner",
                cursor: "crosshair",
                zoomWindowFadeIn: 400,
                zoomWindowFadeOut: 400,
                responsive: true
            });

            // On click change thumbs active item
            $('.product-gallery-item').on('click', function(e) {
                $('#product-zoom-gallery').find('a').removeClass('active');
                $(this).addClass('active');

                e.preventDefault();
            });

            var ez = $('#product-zoom').data('elevateZoom');

            // Open popup - product images
            $('#btn-product-gallery').on('click', function(e) {
                if ($.fn.magnificPopup) {
                    $.magnificPopup.open({
                        items: ez.getGalleryList(),
                        type: 'image',
                        gallery: {
                            enabled: true
                        },
                        fixedContentPos: false,
                        removalDelay: 600,
                        closeBtnInside: false
                    }, 0);

                    e.preventDefault();
                }
            });
        }

        // Product Gallery - product-gallery.html 
        if ($.fn.owlCarousel && $.fn.elevateZoom) {
            var owlProductGallery = $('.product-gallery-carousel');

            owlProductGallery.on('initialized.owl.carousel', function() {
                owlProductGallery.find('.active img').elevateZoom({
                    zoomType: "inner",
                    cursor: "crosshair",
                    zoomWindowFadeIn: 400,
                    zoomWindowFadeOut: 400,
                    responsive: true
                });
            });

            owlProductGallery.owlCarousel({
                loop: false,
                margin: 0,
                responsiveClass: true,
                nav: true,
                navText: ['<i class="icon-angle-left">', '<i class="icon-angle-right">'],
                dots: false,
                smartSpeed: 400,
                autoplay: false,
                autoplayTimeout: 15000,
                responsive: {
                    0: {
                        items: 1
                    },
                    560: {
                        items: 2
                    },
                    992: {
                        items: 3
                    },
                    1200: {
                        items: 3
                    }
                }
            });

            owlProductGallery.on('change.owl.carousel', function() {
                $('.zoomContainer').remove();
            });

            owlProductGallery.on('translated.owl.carousel', function() {
                owlProductGallery.find('.active img').elevateZoom({
                    zoomType: "inner",
                    cursor: "crosshair",
                    zoomWindowFadeIn: 400,
                    zoomWindowFadeOut: 400,
                    responsive: true
                });
            });
        }

        // Product Gallery Separeted- product-sticky.html 
        if ($.fn.elevateZoom) {
            $('.product-separated-item').find('img').elevateZoom({
                zoomType: "inner",
                cursor: "crosshair",
                zoomWindowFadeIn: 400,
                zoomWindowFadeOut: 400,
                responsive: true
            });

            // Create Array for gallery popup
            var galleryArr = [];
            $('.product-gallery-separated').find('img').each(function() {
                var $this = $(this),
                    imgSrc = $this.attr('src'),
                    imgTitle = $this.attr('alt'),
                    obj = {
                        'src': imgSrc,
                        'title': imgTitle
                    };

                galleryArr.push(obj);
            })

            $('#btn-separated-gallery').on('click', function(e) {
                if ($.fn.magnificPopup) {
                    $.magnificPopup.open({
                        items: galleryArr,
                        type: 'image',
                        gallery: {
                            enabled: true
                        },
                        fixedContentPos: false,
                        removalDelay: 600,
                        closeBtnInside: false
                    }, 0);

                    e.preventDefault();
                }
            });
        }
    });
</script>