@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('My Address'))

@section('content')
<div class="container pb-5 mb-2 mb-md-4 mt-3 rtl" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
    <div class="row">
        <!-- Sidebar-->
    @include('web-views.partials._profile-aside')
    <section class="col-lg-9 mt-3 col-md-9">
        <div class="row">
            <div class="col-lg-12 col-md-12  d-flex justify-content-between overflow-hidden">
                <div class="col-md-4">
                    <h5>{{\App\CPU\translate('Edit Address')}}</h5>
                </div>
            </div>
        </div>

            <div class="card border-0">
                <div class="card-body">
                    <div class="col-12">
                        <form action="{{route('address-update')}}" method="post">
                            @csrf
                            <div class="row pb-1">
                                <div class="col-md-6">
                                    <!-- Nav pills -->
                                    <input type="hidden" name="id" value="{{$shippingAddress->id}}">
                                    <ul class="donate-now bg-light p-3">
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
                                <div class="col-md-6">
                                    <!-- Nav pills -->
                                    <input type="hidden" id="is_billing" value="{{$shippingAddress->is_billing}}">
                                    <ul class="donate-now bg-light p-3">
                                        <li class="address_type_bl">
                                            <input type="radio" class="bill_type" id="b25" name="is_billing" value="0"  {{ $shippingAddress->is_billing == '0' ? 'checked' : ''}} />
                                            <label for="b25" class="component">{{\App\CPU\translate('shipping')}}</label>
                                        </li>
                                        <li class="address_type_bl">
                                            <input type="radio" class="bill_type" id="b50" name="is_billing" value="1" {{ $shippingAddress->is_billing == '1' ? 'checked' : ''}} />
                                            <label for="b50" class="component">{{\App\CPU\translate('billing')}}</label>
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
                            {{-- <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="own_state">{{\App\CPU\translate('State')}}</label>
                                    <input type="text" class="form-control" name="state" value="{{ $shippingAddress->state }}" id="own_state"  placeholder="" required>
                                </div>
                                <div class="form-group col-md-6">
                                <label for="own_country">{{\App\CPU\translate('Country')}}</label>
                                    <input type="text" class="form-control" id="own_country" name="country" value="{{ $shippingAddress->country }}" placeholder="" required>
                                </div>
                            </div> --}}
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="own_address">{{\App\CPU\translate('address')}}</label>
                                    <textarea class="form-control" id="address"
                                        type="text"  name="address" required>{{$shippingAddress->address}}</textarea>
                                </div>
                               
                            </div>
                            @php($shipping_latitude=$shippingAddress->latitude)
                            @php($shipping_longitude=$shippingAddress->longitude)
                           
                            <div class="modal-footer white border-0 p-3">
                                <button type="button" class="closeB btn btn-dark btn-round" data-dismiss="modal">{{\App\CPU\translate('Cancel')}}</button>
                                <button type="submit" class="btn btn-success btn-round">{{\App\CPU\translate('Update Now')}}  </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    </section>
</div>
@endsection

@push('script')
<script src="https://maps.googleapis.com/maps/api/js?key={{\App\CPU\Helpers::get_business_settings('map_api_key')}}&libraries=places&v=3.45.8"></script>
<script>

    function initAutocomplete() {
        var myLatLng = { lat: {{$shipping_latitude??'-33.8688'}}, lng: {{$shipping_longitude??'151.2195'}} };

        const map = new google.maps.Map(document.getElementById("location_map_canvas"), {
            center: { lat: {{$shipping_latitude??'-33.8688'}}, lng: {{$shipping_longitude??'151.2195'}} },
            zoom: 13,
            mapTypeId: "roadmap",
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
        });

        marker.setMap( map );
        var geocoder = geocoder = new google.maps.Geocoder();
        google.maps.event.addListener(map, 'click', function (mapsMouseEvent) {
            var coordinates = JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2);
            var coordinates = JSON.parse(coordinates);
            var latlng = new google.maps.LatLng( coordinates['lat'], coordinates['lng'] ) ;
            marker.setPosition( latlng );
            map.panTo( latlng );

            document.getElementById('latitude').value = coordinates['lat'];
            document.getElementById('longitude').value = coordinates['lng'];

            geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[1]) {
                        document.getElementById('address').value = results[1].formatted_address;
                        console.log(results[1].formatted_address);
                    }
                }
            });
        });

        // Create the search box and link it to the UI element.
        const input = document.getElementById("pac-input");
        const searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);
        // Bias the SearchBox results towards current map's viewport.
        map.addListener("bounds_changed", () => {
            searchBox.setBounds(map.getBounds());
        });
        let markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener("places_changed", () => {
            const places = searchBox.getPlaces();

            if (places.length == 0) {
            return;
            }
            // Clear out the old markers.
            markers.forEach((marker) => {
            marker.setMap(null);
            });
            markers = [];
            // For each place, get the icon, name and location.
            const bounds = new google.maps.LatLngBounds();
            places.forEach((place) => {
                if (!place.geometry || !place.geometry.location) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                var mrkr = new google.maps.Marker({
                    map,
                    title: place.name,
                    position: place.geometry.location,
                });

                google.maps.event.addListener(mrkr, "click", function (event) {
                    document.getElementById('latitude').value = this.position.lat();
                    document.getElementById('longitude').value = this.position.lng();

                });

                markers.push(mrkr);

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    };
    $(document).on('ready', function () {
        initAutocomplete();

    });

    $(document).on("keydown", "input", function(e) {
      if (e.which==13) e.preventDefault();
    });
</script>
@endpush
