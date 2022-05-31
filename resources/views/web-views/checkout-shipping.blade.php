@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('Shipping Address Choose'))
@section('content')
<script>
        function anotherAddress() {
            $('#sh-0').prop('checked', true);
            $("#collapseThree").collapse();
        }

        function billingAddress() {
            $('#bh-0').prop('checked', true);
            $("#billing_model").collapse();
        }
        function hide_billingAddress() {
            let check_same_as_shippping = $('#same_as_shipping_address').is(":checked");
            console.log(check_same_as_shippping);
            if (check_same_as_shippping) {
                $('#hide_billing_address').hide();
            } else {
                $('#hide_billing_address').show();
            }
        }
    
    $(document).on('ready', function () {
        initAutocomplete();

    });

    $(document).on("keydown", "input", function (e) {
        if (e.which == 13) e.preventDefault();
    });

    $(document).on('ready', function () {
        initAutocompleteBilling();

    });

    $(document).on("keydown", "input", function (e) {
        if (e.which == 13) e.preventDefault();
    });

    function proceed_to_next() {
        let billing_addresss_same_shipping = $('#same_as_shipping_address').is(":checked");

        let allAreFilled = true;
        document.getElementById("address-form").querySelectorAll("[required]").forEach(function (i) {
            if (!allAreFilled) return;
            if (!i.value) allAreFilled = false;
            if (i.type === "radio") {
                let radioValueCheck = false;
                document.getElementById("address-form").querySelectorAll(`[name=${i.name}]`).forEach(function (r) {
                    if (r.checked) radioValueCheck = true;
                });
                allAreFilled = radioValueCheck;
            }
        });

        //billing address saved
        let allAreFilled_shipping = true;

        if (billing_addresss_same_shipping != true) {

            document.getElementById("billing-address-form").querySelectorAll("[required]").forEach(function (i) {
                if (!allAreFilled_shipping) return;
                if (!i.value) allAreFilled_shipping = false;
                if (i.type === "radio") {
                    let radioValueCheck = false;
                    document.getElementById("billing-address-form").querySelectorAll(`[name=${i.name}]`).forEach(function (r) {
                        if (r.checked) radioValueCheck = true;
                    });
                    allAreFilled_shipping = radioValueCheck;
                }
            });
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.post({
            url: '{{route('customer.choose-shipping-address')}}',
            // dataType: 'json',
            data: {
                shipping: $('#address-form').serialize(),
                billing: $('#billing-address-form').serialize(),
                billing_addresss_same_shipping: billing_addresss_same_shipping
            },
            beforeSend: function () {
                $('#loading').show();
            },
            success: function (data) {
                if (data.errors) {
                    for (var i = 0; i < data.errors.length; i++) {
                        toastr.error(data.errors[i].message, {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    }
                } else {
                    location.href = '{{route('checkout-payment')}}';
                }
            },
            complete: function () {
                $('#loading').hide();
            },
            error: function () {
                toastr.error('{{\App\CPU\translate('Please fill all required fields of shipping/billing address')}}', {
                    CloseButton: true,
                    ProgressBar: true
                });
            }
        });

        /*if (allAreFilled && allAreFilled_shipping) {

        } else {
            toastr.error('{{\App\CPU\translate('Please fill all required fields of shipping/billing address')}}', {
                CloseButton: true,
                ProgressBar: true
            });
        }*/
    }
</script>

    <div class="container">
        <div class="row pt-3">
            <div class="col-12">
            @include('web-views.partials._checkout-steps',['step'=>2])
            <hr>
            </div>
            
            <section class="col-lg-8">
                <div class="checkout_details mt-3">
                    <!-- Steps-->
                <!-- Shipping methods table-->
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h4>{{ \App\CPU\translate('choose_shipping_address')}}</h4>

                            @php($shipping_addresses=\App\Model\ShippingAddress::where('customer_id',auth('customer')->id())->where('is_billing',0)->get())
                            <form method="post" action="" id="address-form">
                                <div class="card border-0 ">
                                    <ul class="list-group">
                                        @foreach($shipping_addresses as $key=>$address)
                                            <li class="list-group-item"
                                                style="cursor: pointer;background: rgba(245,245,245,0.51)"
                                                onclick="$('#sh-{{$address['id']}}').prop( 'checked', true )">
                                                <input type="radio" name="shipping_method_id"
                                                    id="sh-{{$address['id']}}"
                                                    value="{{$address['id']}}" {{$key==0?'checked':''}}>
                                                <span class="checkmark"></span>
                                                <label class="badge"
                                                    style="background: {{$web_config['primary_color']}}; color:white !important;">{{$address['address_type']}}</label>
                                                <small>
                                                    <i class="fa fa-phone"></i> {{$address['phone']}}
                                                </small>
                                                <hr>
                                                <span>{{ \App\CPU\translate('contact_person_name')}}: {{$address['contact_person_name']}}</span><br>
                                                <span>{{ \App\CPU\translate('address')}} : {{$address['address']}}, {{$address['city']}}, {{$address['zip']}}.</span>
                                            </li>
                                        @endforeach
                                        <li class="list-group-item bg-light" onclick="anotherAddress()">
                                            <input type="radio" name="shipping_method_id"
                                                id="sh-0" value="0" data-toggle="collapse"
                                                data-target="#collapseThree" {{$shipping_addresses->count()==0?'checked':''}}>
                                            <span class="checkmark"
                                                style="margin-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 10px"></span>
                                            {{-- <label class="badge"
                                                style="background: {{$web_config['primary_color']}}; color:white !important;">
                                                <i class="fa fa-plus-circle"></i></label> --}}
                                            <button type="button" class="btn btn-primary btn-round" data-toggle="collapse"
                                                    data-target="#collapseThree">{{ \App\CPU\translate('Another')}} {{ \App\CPU\translate('address')}}
                                            </button>
                                            <div id="accordion">
                                                <div id="collapseThree"
                                                    class="collapse {{$shipping_addresses->count()==0?'show':''}}"
                                                    aria-labelledby="headingThree"
                                                    data-parent="#accordion">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label
                                                                for="exampleInputEmail1">{{ \App\CPU\translate('contact_person_name')}}
                                                                <span style="color: red">*</span></label>
                                                            <input type="text" class="form-control"
                                                                name="contact_person_name" {{$shipping_addresses->count()==0?'required':''}}>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">{{ \App\CPU\translate('Phone')}}
                                                                <span
                                                                    style="color: red">*</span></label>
                                                            <input type="text" class="form-control"
                                                                name="phone" {{$shipping_addresses->count()==0?'required':''}}>
                                                        </div>
                                                        <div class="form-group">
                                                            <label
                                                                for="exampleInputPassword1">{{ \App\CPU\translate('address')}} {{ \App\CPU\translate('Type')}}</label>
                                                            <select class="form-control" name="address_type">
                                                                <option
                                                                    value="permanent">{{ \App\CPU\translate('Permanent')}}</option>
                                                                <option value="home">{{ \App\CPU\translate('Home')}}</option>
                                                                <option
                                                                    value="others">{{ \App\CPU\translate('Others')}}</option>
                                                            </select>
                                                        </div>
                                                        {{-- <div class="form-group">
                                                            <label>{{ \App\CPU\translate('Country')}} <span
                                                                    style="color: red">*</span></label>
                                                            <input type="text" class="form-control"
                                                                name="country" {{$shipping_addresses->count()==0?'required':''}}>
                                                        </div> --}}
                                                        <div class="form-group">
                                                            <label for="">{{ \App\CPU\translate('City')}}<span
                                                                    style="color: red">*</span></label>
                                                            <input type="text" class="form-control"
                                                                name="city" {{$shipping_addresses->count()==0?'required':''}}>
                                                        </div>

                                                        <div class="form-group">
                                                            <label
                                                                for="">{{ \App\CPU\translate('zip_code')}}
                                                                <span
                                                                    style="color: red">*</span></label>
                                                            <input type="text" class="form-control"
                                                                name="zip" {{$shipping_addresses->count()==0?'required':''}}>
                                                        </div>

                                                        <div class="form-group">
                                                            <label
                                                                for="">{{ \App\CPU\translate('address')}}<span
                                                                    style="color: red">*</span></label>
                                                            <textarea class="form-control" id="address"
                                                                    type="text"
                                                                    name="address" {{$shipping_addresses->count()==0?'required':''}}></textarea>
                                                        </div>
                                                        @php($default_location=\App\CPU\Helpers::get_business_settings('default_location'))
                                                        <!-- <div class="form-group">
                                                            <input id="pac-input" class="controls rounded"
                                                                style="height: 3em;width:fit-content;"
                                                                title="{{\App\CPU\translate('search_your_location_here')}}"
                                                                type="text"
                                                                placeholder="{{\App\CPU\translate('search_here')}}"/>
                                                            <div style="height: 200px;" id="location_map_canvas"></div>
                                                        </div> -->
                                                        <div class="form-check-inline">
                                                            <input type="checkbox" name="save_address" class="form-check-input"
                                                                id="exampleCheck1">
                                                            <label class="form-check-label" for="exampleCheck1">
                                                                {{ \App\CPU\translate('save_this_address')}}
                                                            </label>
                                                        </div>
                                                        <input type="hidden" id="latitude"
                                                            name="latitude" class="form-control d-inline"
                                                            placeholder="Ex : -94.22213"
                                                            value="{{$default_location?$default_location['lat']:0}}" required
                                                            readonly>
                                                        <input type="hidden"
                                                            name="longitude" class="form-control"
                                                            placeholder="Ex : 103.344322" id="longitude"
                                                            value="{{$default_location?$default_location['lng']:0}}" required
                                                            readonly>

                                                        <button type="submit" class="btn btn-primary" style="display: none"
                                                                id="address_submit"></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                            @php($billing_input_by_customer=\App\CPU\Helpers::get_business_settings('billing_input_by_customer'))
                        
                    
                        </div>
                        <!-- second column billing -->
                        <div class="col-md-6" style="display: {{$billing_input_by_customer==1?'':'none'}}">
                            <!-- billing methods table-->
                            
                                            
                            <p><b>{{ \App\CPU\translate('choose_billing_address')}}</b></p>
                            <div class="form-check form-check-inline">
                                   
                                <input type="checkbox" id="same_as_shipping_address" onclick="hide_billingAddress()"
                                    name="same_as_shipping_address" class="form-check-input" {{$billing_input_by_customer==1?'':'checked'}}>
                                <label class="form-check-label">
                                    {{ \App\CPU\translate('same_as_shipping_address')}}
                                </label>
                            </div>

                            @php($billing_addresses=\App\Model\ShippingAddress::where('customer_id',auth('customer')->id())->where('is_billing',1)->get())
                            <form method="post" action="" id="billing-address-form">

                                
                                <div id="hide_billing_address" class="card border-0">
                                    <ul class="list-group">
                                        
                                        @foreach($billing_addresses as $key=>$address)

                                            <li class="list-group-item"
                                                style="cursor: pointer;background: rgba(245,245,245,0.51)"
                                                onclick="$('#bh-{{$address['id']}}').prop( 'checked', true )">
                                                <input type="radio" name="billing_method_id"
                                                    id="bh-{{$address['id']}}"
                                                    value="{{$address['id']}}" {{$key==0?'checked':''}}>
                                                <span class="checkmark"
                                                    style="margin-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 10px"></span>
                                                <label class="badge"
                                                    style="background: {{$web_config['primary_color']}}; color:white !important;">{{$address['address_type']}}</label>
                                                <small>
                                                    <i class="fa fa-phone"></i> {{$address['phone']}}
                                                </small>
                                                <hr>
                                                <span>{{ \App\CPU\translate('contact_person_name')}}: {{$address['contact_person_name']}}</span><br>
                                                <span>{{ \App\CPU\translate('address')}} : {{$address['address']}}, {{$address['city']}}, {{$address['zip']}}.</span>
                                            </li>
                                        @endforeach
                                        <li class="list-group-item border-0 bg-light" onclick="billingAddress()">
                                            
                                            
                                            <input type="radio" name="billing_method_id"
                                                id="bh-0" value="0" data-toggle="collapse"
                                                data-target="#billing_model" {{$billing_addresses->count()==0?'checked':''}}>
                                            <span class="checkmark"
                                                style="margin-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 10px"></span>
                                            {{-- <label class="badge"
                                                style="background: {{$web_config['primary_color']}}; color:white !important;">
                                                <i class="fa fa-plus-circle"></i></label> --}}
                                            <button type="button" class="btn btn-primary btn-round" data-toggle="collapse"
                                                    data-target="#billing_model">{{ \App\CPU\translate('Another')}} {{ \App\CPU\translate('address')}}
                                            </button>
                                            <div id="accordion">
                                                <div id="billing_model"
                                                    class="collapse {{$billing_addresses->count()==0?'show':''}}"
                                                    aria-labelledby="headingThree"
                                                    data-parent="#accordion">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label
                                                                for="exampleInputEmail1">{{ \App\CPU\translate('contact_person_name')}}
                                                                <span style="color: red">*</span></label>
                                                            <input type="text" class="form-control"
                                                                name="billing_contact_person_name" {{$billing_addresses->count()==0?'required':''}}>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">{{ \App\CPU\translate('Phone')}}
                                                                <span
                                                                    style="color: red">*</span></label>
                                                            <input type="text" class="form-control"
                                                                name="billing_phone" {{$billing_addresses->count()==0?'required':''}}>
                                                        </div>
                                                        <div class="form-group">
                                                            <label
                                                                for="exampleInputPassword1">{{ \App\CPU\translate('address')}} {{ \App\CPU\translate('Type')}}</label>
                                                            <select class="form-control" name="billing_address_type">
                                                                <option
                                                                    value="permanent">{{ \App\CPU\translate('Permanent')}}</option>
                                                                <option value="home">{{ \App\CPU\translate('Home')}}</option>
                                                                <option
                                                                    value="others">{{ \App\CPU\translate('Others')}}</option>
                                                            </select>
                                                        </div>
                                                        {{-- <div class="form-group">
                                                            <label>{{ \App\CPU\translate('Country')}} <span
                                                                    style="color: red">*</span></label>
                                                            <input type="text" class="form-control"
                                                                name="billing_country" {{$billing_addresses->count()==0?'required':''}}>
                                                        </div> --}}
                                                        <div class="form-group">
                                                            <label for="">{{ \App\CPU\translate('City')}}<span
                                                                    style="color: red">*</span></label>
                                                            <input type="text" class="form-control"
                                                                name="billing_city" {{$billing_addresses->count()==0?'required':''}}>
                                                        </div>

                                                        <div class="form-group">
                                                            <label
                                                                for="">{{ \App\CPU\translate('zip_code')}}
                                                                <span
                                                                    style="color: red">*</span></label>
                                                            <input type="text" class="form-control"
                                                                name="billing_zip" {{$billing_addresses->count()==0?'required':''}}>
                                                        </div>

                                                        <div class="form-group">
                                                            <label
                                                                for="">{{ \App\CPU\translate('address')}}<span
                                                                    style="color: red">*</span></label>
                                                            <textarea class="form-control" id="billing_address"
                                                                    type="billing_text"
                                                                    name="billing_address" {{$billing_addresses->count()==0?'required':''}}></textarea>
                                                        </div>

                                                        
                                                        <div class="form-check" style="padding-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 1.25rem;">
                                                            <input type="checkbox" name="save_address_billing" class="form-check-input"
                                                                id="save_address_billing">
                                                            <label class="form-check-label" for="save_address_billing" style="padding-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 1.09rem">
                                                                {{ \App\CPU\translate('save_this_address')}}
                                                            </label>
                                                        </div>
                                                        <input type="hidden" id="billing_latitude"
                                                            name="billing_latitude" class="form-control d-inline"
                                                            placeholder="Ex : -94.22213"
                                                            value="{{$default_location?$default_location['lat']:0}}" required
                                                            readonly>
                                                        <input type="hidden"
                                                            name="billing_longitude" class="form-control"
                                                            placeholder="Ex : 103.344322" id="billing_longitude"
                                                            value="{{$default_location?$default_location['lng']:0}}" required
                                                            readonly>

                                                        <button type="submit" class="btn btn-primary" style="display: none"
                                                                id="address_submit"></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Sidebar-->
                </div>
            </section>
            @include('web-views.partials._order-summary')
            <div class="col-12 bg-light p-5 mt-3">

                    <div class="row">
                        <div class="col-md-6 col-12">
                            <h5>Everything done? Let's move to the next step</h5>
                        </div>
                        <div class="col-md-6 col-12 row justify-content-end">
                            <a class="btn btn-outline-primary btn-round mr-md-3 mb-md-0 mb-2" href="{{route('shop-cart')}}">
                                <i class="fa fa-shopping-bag"></i>
                                <span class="">{{ \App\CPU\translate('Go back to Cart')}}</span>
                            </a>
                            <a class="btn btn-primary btn-round" href="javascript:" onclick="proceed_to_next()">
                                <span class="">{{ \App\CPU\translate('Proceed to Payment')}}</span>
                                <i class="fa fa-money"></i>
                            </a>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <br>
    <br>

@endsection