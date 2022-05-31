
<div class="sidebarR col-lg-3 col-md-3">
    <!--Price Sidebar-->
    <div class="price_sidebar rounded-lg box-shadow-sm" id="shop-sidebar">
        <div class="box-shadow-sm">

        </div>
        <div class="list-group">
            <a class="list-group-item list-group-item-action {{Request::is('account-oder*') || Request::is('account-order-details*') ? 'active-menu active' :''}}" href="{{route('account-oder') }} ">{{\App\CPU\translate('my_order')}}</a>
            <a class="list-group-item list-group-item-action {{Request::is('track-order*')?'active-menu active':''}}" href="{{route('track-order.index') }} ">{{\App\CPU\translate('track_your_order')}}</a>
            <a class="list-group-item list-group-item-action {{Request::is('wishlists*')?'active-menu active':''}}" href="{{route('wishlists')}}"> {{\App\CPU\translate('wish_list')}}  </a></h3>
            @php($business_mode=\App\CPU\Helpers::get_business_settings('business_mode'))
            @if ($business_mode == 'multi')
            <a class="list-group-item list-group-item-action {{Request::is('chat*')?'active-menu active':''}}" href="{{route('chat-with-seller')}}">{{\App\CPU\translate('chat_with_seller')}}</a>
            @endif
            <a class="list-group-item list-group-item-action {{Request::is('user-account*')?'active-menu active':''}}" href="{{route('user-account')}}">
                        {{\App\CPU\translate('profile_info')}}
            </a>
            <a class="list-group-item list-group-item-action {{Request::is('account-address*')?'active-menu active':''}}" href="{{ route('account-address') }}">{{\App\CPU\translate('address')}} </a>
            <a class="list-group-item list-group-item-action {{(Request::is('account-ticket*') || Request::is('support-ticket*'))?'active-menu active':''}}"
                       href="{{ route('account-tickets') }}">{{\App\CPU\translate('support_ticket')}}
            </a>
            <a class="list-group-item list-group-item-action {{Request::is('account-transaction*')?'active-menu active':''}}"
                       href="{{ route('account-transaction') }}">
                       {{\App\CPU\translate('tansction_history')}}
            </a>
                    
        </div>
    </div>

</div>


















