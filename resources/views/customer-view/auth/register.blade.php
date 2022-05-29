@extends('layouts.front-end.app')

@section('title', \App\CPU\translate('Register'))
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 mt-4">
                <div class="card border-0">
                    <div class="card-header bg-light p-5">
                        <h2 class="h4 mb-1">{{\App\CPU\translate('no_account')}}?</h2>
                    </div>
                    <div class="card-body p-0">
                        <p class="font-size-sm text-muted mb-4">{{\App\CPU\translate('register_control_your_order')}}</p>
                        <form class="needs-validation_ col-12 p-2" action="{{route('customer.auth.register')}}"
                              method="post" id="sign-up-form">
                            @csrf
                            <div class="row">
                                <div class="col-12" id="FormErrors" style="display: none;">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                      <p class="text-white" id="FormErrorsContent"></p> 
                                    </div>
                                    

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="reg-fn">{{\App\CPU\translate('first_name')}}</label>
                                        <input class="form-control" value="{{old('f_name')}}" type="text" name="f_name"
                                               style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"
                                               required>
                                        <div class="invalid-feedback">{{\App\CPU\translate('Please enter your first name')}}!</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="reg-ln">{{\App\CPU\translate('last_name')}}</label>
                                        <input class="form-control" type="text" value="{{old('l_name')}}" name="l_name"
                                               style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                        <div class="invalid-feedback">{{\App\CPU\translate('Please enter your last name')}}!</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="reg-email">{{\App\CPU\translate('email_address')}}</label>
                                        <input class="form-control" type="email" value="{{old('email')}}"  name="email"
                                               style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};" required>
                                        <div class="invalid-feedback">{{\App\CPU\translate('Please enter valid email address')}}!</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="reg-phone">{{\App\CPU\translate('phone_number')}}
                                            <small class="text-primary">( * {{\App\CPU\translate('country_code_is_must')}} )</small></label>
                                        <input class="form-control" type="text"  value="{{old('phone')}}"  name="phone"
                                               placeholder="Ex: 91 XXXXXXXXXX"
                                               required>
                                        <div class="invalid-feedback">{{\App\CPU\translate('Please enter your phone number')}}!</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="si-password">{{\App\CPU\translate('password')}}</label>
                                        <div class="password-toggle">
                                            <input class="form-control" name="password" type="password" id="si-password"
                                                   style="text-align:"
                                                   placeholder="{{\App\CPU\translate('minimum_8_characters_long')}}"
                                                   autocomplete="false"
                                                   required>
                                            <label class="password-toggle-btn">
                                                <input class="custom-control-input" type="checkbox"><i
                                                    class="czi-eye password-toggle-indicator"></i><span
                                                    class="sr-only">{{\App\CPU\translate('Show')}} {{\App\CPU\translate('password')}} </span>
                                            </label>
                                        </div>
                                    </div>

                                    {{-- <div class="form-group">
                                        <label for="reg-password">{{\App\CPU\translate('password')}}</label>
                                        <input class="form-control" type="password" name="password">
                                        <div class="invalid-feedback">Please enter password!</div>
                                    </div> --}}
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="si-password">{{\App\CPU\translate('confirm_password')}}</label>
                                        <div class="password-toggle">
                                            <input class="form-control" name="con_password" type="password"
                                                   style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"
                                                   placeholder="{{\App\CPU\translate('minimum_8_characters_long')}}"
                                                   id="si-password"
                                                   required>
                                            <label class="password-toggle-btn">
                                                <input class="custom-control-input" type="checkbox"
                                                       style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"><i
                                                    class="czi-eye password-toggle-indicator"></i><span
                                                    class="sr-only">{{\App\CPU\translate('Show')}} {{\App\CPU\translate('password')}} </span>
                                            </label>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="reg-password-confirm">{{\App\CPU\translate('confirm_password')}}</label>
                                        <input class="form-control" type="password" name="con_password">
                                        <div class="invalid-feedback">Passwords do not match!</div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="form-group d-flex flex-wrap justify-content-between">

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
                            <div class="row">
                                <div class="mx-1">
                                    <div class="text-right">
                                        <button class="btn btn-primary btn-round" id="sign-up" type="submit" disabled>
                                            <i class="icon-plus"></i>
                                            {{\App\CPU\translate('sing_up')}}
                                        </button>
                                    </div>
                                </div>
                                <div class="mx-1">
                                    <a class="btn btn-outline-info btn-round" href="{{route('customer.auth.login')}}">
                                        <i class="fa fa-sign-in"></i> {{\App\CPU\translate('sing_in')}}
                                    </a>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                    <div class="card-footer bg-light p-3">
                        <p class="col-12 text-center mt-2">You can also sign up with social accounts</p>
                                <div class="col-12 mt-3 mb-3">
                                    <div class="row justify-content-between">
                                        @foreach (\App\CPU\Helpers::get_business_settings('social_login') as $socialLoginService)
                                            @if (isset($socialLoginService) && $socialLoginService['status']==true)
                                                <div class="col-sm-6 p-0">
                                                    <a class="btn btn-dark btn-round col-11"
                                                       href="{{route('customer.auth.service-login', $socialLoginService['login_medium'])}}"
                                                       >
                                                        <i class="czi-{{ $socialLoginService['login_medium'] }}"></i>
                                                        {{\App\CPU\translate('sing_up_with_'.$socialLoginService['login_medium'])}}
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#inputCheckd').change(function () {
            // console.log('jell');
            if ($(this).is(':checked')) {
                $('#sign-up').removeAttr('disabled');
            } else {
                $('#sign-up').attr('disabled', 'disabled');
            }

        });
        $('#sign-up-form').submit(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '{{route('customer.auth.register')}}',
                dataType: 'json',
                data: $('#sign-up-form').serialize(),
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function () {
                    alert("Success, Please wait...");
                        // toastr.success(data.message, {
                        //     CloseButton: true,
                        //     ProgressBar: true
                        // });
                        setInterval(function () {
                            location.href = data.url;
                        }, 2000);
                },
                complete: function () {
                    $('#loading').hide();
                },
                error: function (data) {
                    $('#FormErrors').show();
                        var edata = "<ul class='text-white'>";
                            // edata += data.errors[i].message; 
                            // console.log(data.responseJSON.errors);

                        $(data.responseJSON.errors).each(function(index, value){
                            $(value).each(function(i, k){
                                if(k.email){
                                    console.log("YES EMAIL IS THERE");
                                    for (var i = 0; i < k.email.length; i++) {
                                        edata += "<li>"+k.email[i] + "</li>"; 
                                    }
                                }
                                if(k.phone){
                                    for (var i = 0; i < k.phone.length; i++) {
                                        edata += "<li>"+k.phone[i] + "</p>"; 
                                    }
                                }
                                if(k.password){
                                    for (var i = 0; i < k.password.length; i++) {
                                        edata += "<li>"+k.password[i] + "</p>"; 
                                    }
                                }
                            });
                        });
                        edata += "</ul>";
                        $('#FormErrorsContent').html(edata);
                        $('#loading').hide();
                }
            });
        });
    </script>
@endsection
