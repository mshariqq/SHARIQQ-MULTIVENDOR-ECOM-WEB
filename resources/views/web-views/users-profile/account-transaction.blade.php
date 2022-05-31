@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('My Transaction History'))
@push('css_or_js')
<style>
    td{
        padding: 10px;
    }
    th{
        padding: 10px;
    }
</style>
@endpush
@section('content')
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4 mt-3 ">
        <div class="row">
            <!-- Sidebar-->
        @include('web-views.partials._profile-aside')
        <!-- Content  -->
            <section class="col-lg-9 mt-3">
            <h5>{{\App\CPU\translate('Transactions & Purchases')}}</h5>

                <div class="card box-shadow-sm">

                    <table class="col-12 table-striped table-bordered">
                        <thead>
                        <tr class="bg-dark text-white">
                            <td class="tdBorder">
                                <div class="py-2"><span class="d-block spandHeadO ">{{\App\CPU\translate('Tranx')}} {{\App\CPU\translate('ID')}}</span></div>
                            </td>
                            <td class="tdBorder">
                                <div class="py-2"><span class="d-block spandHeadO ">{{\App\CPU\translate('payment_method')}}</span></div>
                            </td>
                            <td class="tdBorder">
                                <div class="py-2"><span class="d-block spandHeadO">{{\App\CPU\translate('Status')}} </span></div>
                            </td>
                            <td class="tdBorder">
                                <div class="py-2"><span class="d-block spandHeadO"> {{\App\CPU\translate('Total')}}</span></div>
                            </td>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($transactionHistory as $history)
                            <tr>
                                <td class="bodytr font-weight-bold text-info"><span
                                        class="marl">{{$history['id']}}</span></td>
                                <td class="sellerName bodytr "><span
                                        class="">{{$history['payment_method']}}</span></td>
                                <td class="bodytr"><span class="">{{$history['payment_status']}}</span>
                                </td>
                                <td class="bodytr"><span class=" amount ">{{\App\CPU\Helpers::currency_converter($history->order->order_amount)}}</span></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
        <!-- Orders list-->
    </div>
@endsection

@push('script')
    <script src="{{asset('public/assets/front-end')}}/vendor/nouislider/distribute/nouislider.min.js"></script>
@endpush
