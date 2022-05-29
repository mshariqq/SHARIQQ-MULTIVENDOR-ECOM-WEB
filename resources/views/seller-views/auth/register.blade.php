@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('Seller Apply'))

@push('css_or_js')
<link href="{{asset('public/assets/back-end')}}/css/select2.min.css" rel="stylesheet"/>
<link href="{{asset('public/assets/back-end/css/croppie.css')}}" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush


@section('content')

<div class="container  mt-5">
    <div class="card">
        <div class="card-header bg-light p-5">
            <h3>Apply for a new Shop</h3>
            <h5 class="" > {{\App\CPU\translate('Shop')}} {{\App\CPU\translate('Application')}}</h5>
            <!-- errors -->
            @if($errors->any())
                                    <div class="col-12">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                            <p class="text-white">
                                            {{$errors->first()}}
                                            </p>
                                        </div>
                                    </div>
                        @endif
        </div>
        <div class="card-body p-0">
            <form class="user col-12" action="{{route('shop.apply')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- left -->
                                <div class="col-md-6">
                                    <br>
                                    <h5>{{\App\CPU\translate('Seller Info')}}</h5>
                                    <div class="row">

                                        <div class="col-md-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="exampleFirstName" name="f_name" value="{{old('f_name')}}" placeholder="{{\App\CPU\translate('first_name')}}" required>
                                        </div>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control form-control-user" id="exampleLastName" name="l_name" value="{{old('l_name')}}" placeholder="{{\App\CPU\translate('last_name')}}" required>
                                        </div>

                                        <div class="col-sm-6 mb-3">
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" value="{{old('email')}}" placeholder="{{\App\CPU\translate('email_address')}}" required>
                                        </div>

                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-user" id="exampleInputPhone" name="phone" value="{{old('phone')}}" placeholder="{{\App\CPU\translate('phone_number')}}" required>
                                        </div>

                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user" minlength="6" id="exampleInputPassword" name="password" placeholder="{{\App\CPU\translate('password')}}" required>
                                        </div>

                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user" minlength="6" id="exampleRepeatPassword" placeholder="{{\App\CPU\translate('repeat_password')}}" required>
                                            <div class="pass invalid-feedback">{{\App\CPU\translate('Repeat')}}  {{\App\CPU\translate('password')}} {{\App\CPU\translate('not match')}} .</div>
                                        </div>

                                        <div class="col-md-6">
                                        
                                            <div class="form-group">
                                            <img style="width: auto;border: 1px solid; border-radius: 10px; max-height:100px;" id="viewer"
                                                        src="{{asset('public\assets\back-end\img\400x400\img2.jpg')}}" alt="banner image"/>
                                                <div class="custom-file" style="text-align: left">
                                                    
                                                    <input type="file" name="image" id="customFileUpload" class="custom-file-input"
                                                        accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                                    <label class="custom-file-label" for="customFileUpload">{{\App\CPU\translate('Upload')}} {{\App\CPU\translate('image')}}</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">

                                            <div class="form-group mb-1">
                                                <strong>
                                                    <input type="checkbox" class="mr-1"
                                                        name="remember" id="inputCheckd">
                                                </strong>
                                                <label class="" for="remember">{{\App\CPU\translate('i_agree_to_Your_terms')}}<a
                                                        class="font-size-sm" target="_blank" href="{{route('terms')}}">
                                                        {{\App\CPU\translate('terms_and_condition')}}
                                                    </a></label>
                                            </div>

                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary btn-user btn-block btn-round" id="apply" disabled>{{\App\CPU\translate('Apply for')}} {{\App\CPU\translate('Shop')}} </button>
                                        </div>

                                    </div>
                                </div>
                                <!-- right -->
                                <div class="col-md-6 p-4 bg-light">
                                    <br>
                                    <h5>Shop Info</h5>
                                    <div class="row">

                                        <div class="col-md-12 mb-3 mb-sm-0 form-group">
                                            <label for="">Shop Name</label>
                                            <input type="text" class="form-control form-control-user" id="shop_name" name="shop_name" placeholder="{{\App\CPU\translate('shop_name')}}" value="{{old('shop_name')}}"required>
                                        </div>

                                        <div class="col-md-12 form-group">
                                            <label for="">Shop Address</label>
                                            <textarea name="shop_address" class="form-control" id="shop_address"rows="1" placeholder="{{\App\CPU\translate('shop_address')}}">{{old('shop_address')}}</textarea>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                            <img style="width: auto;border: 1px solid; border-radius: 10px; max-height:100px;" id="viewerLogo"
                                                        src="{{asset('public\assets\back-end\img\400x400\img2.jpg')}}" alt="banner image"/>
                                                <div class="custom-file" style="text-align: left">
                                                    <input type="file" name="logo" id="LogoUpload" class="custom-file-input"
                                                        accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                                    <label class="custom-file-label" for="LogoUpload">{{\App\CPU\translate('Upload')}} {{\App\CPU\translate('logo')}}</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <img style="width: auto;border: 1px solid; border-radius: 10px; max-height:100px;" id="viewerBanner"
                                                        src="{{asset('public\assets\back-end\img\400x400\img2.jpg')}}" alt="banner image"/>
                                                <div class="custom-file" style="text-align: left">
                                                    <input type="file" name="banner" id="BannerUpload" class="custom-file-input"
                                                        accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" style="overflow: hidden; padding: 2%">
                                                    <label class="custom-file-label" for="BannerUpload">{{\App\CPU\translate('Upload')}} {{\App\CPU\translate('Banner')}}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <!-- <button type="submit" class="btn btn-primary btn-user btn-block" id="apply" disabled>{{\App\CPU\translate('Apply')}} {{\App\CPU\translate('Shop')}} </button> -->
                        </form>
        </div>
        <div class="card-footer bg-light p-5 text-center">
            <h3 class="text-center">Already have an account?</h3>
            <a class="btn btn-primary"  href="{{route('seller.auth.login')}}">{{\App\CPU\translate('Login Now')}}</a>

        </div>
    </div>
</div>
<script>
    $('#inputCheckd').change(function () {
            // console.log('jell');
            if ($(this).is(':checked')) {
                $('#apply').removeAttr('disabled');
            } else {
                $('#apply').attr('disabled', 'disabled');
            }

        });

    $('#exampleInputPassword ,#exampleRepeatPassword').on('keyup',function () {
        var pass = $("#exampleInputPassword").val();
        var passRepeat = $("#exampleRepeatPassword").val();
        if (pass==passRepeat){
            $('.pass').hide();
        }
        else{
            $('.pass').show();
        }
    });
    $('#apply').on('click',function () {

        var image = $("#image-set").val();
        if (image=="")
        {
            $('.image').show();
            return false;
        }
        var pass = $("#exampleInputPassword").val();
        var passRepeat = $("#exampleRepeatPassword").val();
        if (pass!=passRepeat){
            $('.pass').show();
            return false;
        }


    });
    function Validate(file) {
        var x;
        var le = file.length;
        var poin = file.lastIndexOf(".");
        var accu1 = file.substring(poin, le);
        var accu = accu1.toLowerCase();
        if ((accu != '.png') && (accu != '.jpg') && (accu != '.jpeg')) {
            x = 1;
            return x;
        } else {
            x = 0;
            return x;
        }
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#viewer').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#customFileUpload").change(function () {
        readURL(this);
    });

    function readlogoURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#viewerLogo').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function readBannerURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#viewerBanner').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#LogoUpload").change(function () {
        readlogoURL(this);
    });
    $("#BannerUpload").change(function () {
        readBannerURL(this);
    });
</script>

@endsection
