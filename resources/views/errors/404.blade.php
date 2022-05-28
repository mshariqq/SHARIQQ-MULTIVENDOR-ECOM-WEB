@extends('errors::minimal')

{{--@section('title', __('Not Found'))
@section('code', '404')--}}

@section('message')
    <div class="container" style="width: 100%;">
        <div class="row">
            <div class="col-md-12 col-12 text-left">
                <div class="card col shadow">
                    <div class="card-header">
                        Not Found
                    </div>
                    <div class="card-body">
                        <h2>404</h2>
                        <p>The page your are looking doesn't exist</p>
                        <a href="{{url('/')}}" class="btn btn-primary btn-round"> <i class="fa fa-home"></i> Go to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
