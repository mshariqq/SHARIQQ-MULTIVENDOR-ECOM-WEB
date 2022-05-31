@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('My Address'))

@section('content')

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <div class="col-md-12"><h5 class="modal-title font-name ">{{\App\CPU\translate('add_new_address')}}</h5></div>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="{{route('address-store')}}" method="post" class="col-12 p-3">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Nav pills -->
                                <h6>Address Type</h6>
                                <ul class="donate-now bg-light p-2 border">
                                    <li>
                                        <input type="radio" id="a25" name="addressAs" value="permanent"/>
                                        <label for="a25" class="component">{{\App\CPU\translate('permanent')}}</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="a50" name="addressAs" value="home"/>
                                        <label for="a50" class="component">{{\App\CPU\translate('Home')}}</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="a75" name="addressAs" value="office" checked="checked"/>
                                        <label for="a75" class="component">{{\App\CPU\translate('Office')}}</label>
                                    </li>

                                </ul>
                            </div>

                            <div class="col-md-6">
                                <!-- Nav pills -->
                                <h6>Address Action</h6>
                                <ul class="donate-now bg-light p-3">
                                    <li>
                                        <input type="radio" name="is_billing" id="b25" value="0"/>
                                        <label for="b25" class="billing_component">{{\App\CPU\translate('shipping')}}</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="is_billing" id="b50" value="1"/>
                                        <label for="b50" class="billing_component">{{\App\CPU\translate('billing')}}</label>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-12">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">{{\App\CPU\translate('contact_person_name')}}</label>
                                        <input class="form-control" type="text" id="name" name="name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="firstName">{{\App\CPU\translate('Phone')}}</label>
                                        <input class="form-control" type="text" id="phone" name="phone" required>
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="address-city">{{\App\CPU\translate('City')}}</label>
                                        <input class="form-control" type="text" id="address-city" name="city" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="zip">{{\App\CPU\translate('zip_code')}}</label>
                                        <input class="form-control" type="text" id="zip" name="zip" required>
                                    </div>
                                </div>                                
                                {{-- <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="state">{{\App\CPU\translate('State')}}</label>
                                        <input type="text" class="form-control" id="state" name="state" placeholder="" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="country">{{\App\CPU\translate('Country')}}</label>
                                        <input type="text" class="form-control" id="country" name="country"
                                               placeholder="" required>
                                    </div>
                                </div> --}}
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="address">{{\App\CPU\translate('address')}}</label>
                                        {{-- <input class="form-control" type="text" id="address" name="address" required> --}}
                                        <textarea class="form-control" id="address"
                                                            type="text"  name="address" required></textarea>
                                    </div>
                                    @php($default_location=\App\CPU\Helpers::get_business_settings('default_location'))
                                    
                                </div>
                            
                            <div class="modal-footer bg-light">
                                <button type="button" class="btn btn-dark btn-round" data-dismiss="modal">{{\App\CPU\translate('Cancel')}}</button>
                                <button type="submit" class="btn btn-primary btn-round">{{\App\CPU\translate('Save Now')}}  </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4 mt-3">
        <div class="row">
            <!-- Sidebar-->
        @include('web-views.partials._profile-aside')
        <!-- Content  -->
            <section class="col-lg-9 mt-3 col-md-9">

                <!-- Addresses list-->
                <div class="row">
                    <div class="col-lg-12 col-md-12 d-flex justify-content-between align-items-center overflow-hidden">
                        <div class="col-sm-4">
                            <h5 class="m-0">{{\App\CPU\translate('List of saved addresses')}}</h5>
                        </div>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary btn-round float-right" data-toggle="modal"
                                data-target="#exampleModal" id="add_new_address"> <i class="fa fa-plus" aria-hidden="true"></i> {{\App\CPU\translate('add_new_address')}}
                            </button>
                        </div>
                    </div>
                    @foreach($shippingAddresses as $shippingAddress)
                        <section class="col-lg-6 col-md-6">
                            <div class="card border">
                                {{-- <div class="card cardColor"> --}}
                                    <div class="card-header row justify-content-between align-items-center p-4 bg-light">
                                        <div class="col-md-1">
                                            <i class="fa fa-thumb-tack fa-2x iconHad" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-md-9">
                                            <span> {{$shippingAddress['address_type']}} {{\App\CPU\translate('address')}} ({{$shippingAddress['is_billing']==1?\App\CPU\translate('Billing_address'):\App\CPU\translate('shipping_address')}}) </span>
                                        </div>
                                        {{-- <div> --}}
                                        <div class="row justify-content-between col-md-2">
        
                                                {{-- <a class="" id="edit" data-toggle="modal" data-target="#editAddress_{{$shippingAddress->id}}">
                                                    <i class="fa fa-edit fa-lg"></i>
                                                </a> --}}
                                                <a class="" id="edit" href="{{route('address-edit',$shippingAddress->id)}}">
                                                    <i class="fa fa-edit fa-lg text-info"></i>
                                                </a>
    
                                                <a class="" href="{{ route('address-delete',['id'=>$shippingAddress->id])}}" onclick="return confirm('{{\App\CPU\translate('Are you sure you want to Delete')}}?');" id="delete">
                                                    <i class="fa fa-trash fa-lg text-danger"></i>
                                                </a>
                                            
                                        </div>
                                    </div>
                                        {{-- </div> --}}

                                    {{-- Modal Address Edit --}}
                                    <div class="modal fade" id="editAddress_{{$shippingAddress->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog  modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <div class="row">
                                                    <div class="col-md-12"> <h5 class="modal-title font-name ">{{\App\CPU\translate('update')}} {{\App\CPU\translate('address')}}  </h5></div>
                                                </div>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="updateForm">
                                                        @csrf
                                                        <div class="row pb-1">
                                                            <div class="col-md-6" style="display: flex">
                                                                <!-- Nav pills -->
                                                                <input type="hidden" id="defaultValue" class="add_type" value="{{$shippingAddress->address_type}}">
                                                                <ul class="donate-now">
                                                                    <li class="address_type_li">
                                                                        <input type="radio" class="address_type" id="a25" name="addressAs" value="permanent"  {{ $shippingAddress->address_type == 'permanent' ? 'checked' : ''}} />
                                                                        <label for="a25" class="component">{{\App\CPU\translate('permanent')}}</label>
                                                                    </li>
                                                                    <li class="address_type_li">
                                                                        <input type="radio" class="address_type" id="a50" name="addressAs" value="home" {{ $shippingAddress->address_type == 'home' ? 'checked' : ''}} />
                                                                        <label for="a50" class="component">{{\App\CPU\translate('Home')}}</label>
                                                                    </li>
                                                                    <li class="address_type_li">
                                                                        <input type="radio" class="address_type" id="a75" name="addressAs" value="office" {{ $shippingAddress->address_type == 'office' ? 'checked' : ''}}/>
                                                                        <label for="a75" class="component">{{\App\CPU\translate('Office')}}</label>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            
                                                        </div>
                                                        <!-- Tab panes -->
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="person_name">{{\App\CPU\translate('contact_person_name')}}</label>
                                                                <input class="form-control" type="text" id="person_name"
                                                                    name="name"
                                                                    value="{{$shippingAddress->contact_person_name}}"
                                                                    required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="own_phone">{{\App\CPU\translate('Phone')}}</label>
                                                                <input class="form-control" type="text" id="own_phone" name="phone" value="{{$shippingAddress->phone}}" required="required">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="city">{{\App\CPU\translate('City')}}</label>

                                                                <input class="form-control" type="text" id="city" name="city" value="{{$shippingAddress->city}}" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="zip_code">{{\App\CPU\translate('zip_code')}}</label>
                                                                <input class="form-control" type="number" id="zip_code" name="zip" value="{{$shippingAddress->zip}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                            <label for="own_state">{{\App\CPU\translate('State')}}</label>
                                                                <input type="text" class="form-control" name="state" value="{{ $shippingAddress->state }}" id="own_state"  placeholder="" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                            <label for="own_country">{{\App\CPU\translate('Country')}}</label>
                                                                <input type="text" class="form-control" id="own_country" name="country" value="{{ $shippingAddress->country }}" placeholder="" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label for="own_address">{{\App\CPU\translate('address')}}</label>
                                                                <input class="form-control" type="text" id="own_address"
                                                                    name="address"
                                                                    value="{{$shippingAddress->address}}" required>
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="modal-footer">
                                                            <button type="button" class="closeB btn btn-secondary" data-dismiss="modal">{{\App\CPU\translate('close')}}</button>
                                                            <button type="submit" class="btn btn-primary" id="addressUpdate" data-id="{{$shippingAddress->id}}">{{\App\CPU\translate('update')}}  </button>
                                                        </div>
                                                    </form>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body" style="padding: {{Session::get('direction') === "rtl" ? '0 13px 15px 15px' : '0 15px 15px 13px'}};">
                                        <div class="font-name"><span>{{$shippingAddress['contact_person_name']}}</span>
                                        </div>
                                        <div><span class="font-nameA"> <strong>{{\App\CPU\translate('Phone')}}  :</strong>  {{$shippingAddress['phone']}}</span>
                                        </div>
                                        <div><span class="font-nameA"> <strong>{{\App\CPU\translate('City')}}  :</strong>  {{$shippingAddress['city']}}</span>
                                        </div>
                                        <div><span class="font-nameA"> <strong> {{\App\CPU\translate('zip_code')}} :</strong> {{$shippingAddress['zip']}}</span>
                                        </div>
                                        <div><span class="font-nameA"> <strong>{{\App\CPU\translate('address')}} :</strong> {{$shippingAddress['address']}}</span>
                                        </div>
                                        
                                    </div>
                                {{-- </div> --}}
                            </div>
                        </section>
                    @endforeach
                </div>

            </section>

        </div>
    </div>

@endsection

@push('script')
    <script>
        $(document).ready(function (){
            $('.address_type_li').on('click', function (e) {
                // e.preventDefault();
                $('.address_type_li').find('.address_type').removeAttr('checked', false);
                $('.address_type_li').find('.component').removeClass('active_address_type');
                $(this).find('.address_type').attr('checked', true);
                $(this).find('.address_type').removeClass('add_type');
                $('#defaultValue').removeClass('add_type');
                $(this).find('.address_type').addClass('add_type');

                $(this).find('.component').addClass('active_address_type');
            });
        })

        $('#addressUpdate').on('click', function(e){
            e.preventDefault();
            let addressAs, address, name, zip, city, state, country, phone;

            addressAs = $('.add_type').val();

            address = $('#own_address').val();
            name = $('#person_name').val();
            zip = $('#zip_code').val();
            city = $('#city').val();
            state = $('#own_state').val();
            country = $('#own_country').val();
            phone = $('#own_phone').val();

            let id = $(this).attr('data-id');

            if (addressAs != '' && address != '' && name != '' && zip != '' && city != '' && state != '' && country != '' && phone != '') {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('address-update')}}",
                    method: 'POST',
                    data: {
                        id : id,
                        addressAs: addressAs,
                        address: address,
                        name: name,
                        zip: zip,
                        city: city,
                        state: state,
                        country: country,
                        phone: phone
                    },
                    success: function () {
                        toastr.success('{{\App\CPU\translate('Address Update Successfully')}}.');
                        location.reload();
                        // $('#name').val('');
                        // $('#link').val('');
                        // $('#icon').val('');
                        // $('#image-set').val('');

                    }
                });
            }else{
                toastr.error('{{\App\CPU\translate('All input field required')}}.');
            }

        });
    </script>
    <style>
        .modal-backdrop {
            z-index: 0 !important;
            display: none;
        }
    </style>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key={{\App\CPU\Helpers::get_business_settings('map_api_key')}}&libraries=places&v=3.45.8"></script> -->
    <script>

        $(document).on('ready', function () {
            initAutocomplete();

        });

        $(document).on("keydown", "input", function(e) {
          if (e.which==13) e.preventDefault();
        });
    </script>
@endpush
