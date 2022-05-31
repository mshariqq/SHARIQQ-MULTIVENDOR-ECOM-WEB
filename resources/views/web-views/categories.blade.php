@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('All Category Page'))
@push('css_or_js')
    <meta property="og:image" content="{{asset('storage/app/public/company')}}/{{$web_config['web_logo']->value}}"/>
    <meta property="og:title" content="Categories of {{$web_config['name']->value}} "/>
    <meta property="og:url" content="{{env('APP_URL')}}">
    <meta property="og:description" content="{!! substr($web_config['about']->value,0,100) !!}">

    <meta property="twitter:card" content="{{asset('storage/app/public/company')}}/{{$web_config['web_logo']->value}}"/>
    <meta property="twitter:title" content="Categories of {{$web_config['name']->value}}"/>
    <meta property="twitter:url" content="{{env('APP_URL')}}">
    <meta property="twitter:description" content="{!! substr($web_config['about']->value,0,100) !!}">

@endpush

@section('content')
    <!-- Page Content-->
    <div class="jumbotron bg-light text-center">
        <h4>{{\App\CPU\translate('Browse by Categories')}}</h4>
        <p>{{\App\CPU\translate('Select your desired category to view the products based on that category')}}</p>
    </div>
    <div class="container">
        <div class="row">
            <!-- Sidebar-->
            <div class="col-lg-3 col-md-4">
                <div class="list-group">
                @foreach(\App\CPU\CategoryManager::parents() as $category)
                    <a onclick="get_categories('{{route('category-ajax',[$category['id']])}}')" href="#" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
                        <span class="d-flex align-items-center">
                            <img class="" src="{{asset("storage/app/public/category/$category->icon")}}" onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" style="width: 20%; height: auto;">
                            <span class="p-3"></span>
                            <span class="">{{$category['name']}}</span>
                        </span>
                        <span class="text-right">
                            <i class="fa fa-chevron-right"></i>
                        </span>
                    </a>
                @endforeach
                    
                </div>
                
            </div>
            <!-- Content  -->
            <div class="col-lg-9 col-md-8">
                <!-- Products grid-->
                <div class="row" id="ajax-categories">
                    <label class="col-md-12 text-center mt-5">{{\App\CPU\translate('Select a category from sidebar menu')}}.</label>
                </div>
                <!-- Pagination-->
            </div>
        </div>
    </div>
    <br>
    <br>

<!-- script -->
<script>
        $(document).ready(function () {
            $('.card-header').click(function() {
                $('.card-header').removeClass('active');
                $(this).addClass('active');
            });

        });
        function get_categories(route) {
            $.get({
                url: route,
                dataType: 'json',
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (response) {
                    $('html,body').animate({scrollTop: $("#ajax-categories").offset().top}, 'slow');
                    $('#ajax-categories').html(response.view);
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        }
    </script>
@endsection