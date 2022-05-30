<!-- <style>
    .steps-light .step-item.active .step-count, .steps-light .step-item.active .step-progress {
        color: #fff;
        background-color: {{$web_config['primary_color']}};
    }

    .steps-light .step-count, .steps-light .step-progress {
        color: #4f4f4f;
        background-color: rgba(225, 225, 225, 0.67);
    }

    .steps-light .step-item.active.current {
        color: {{$web_config['primary_color']}}  !important;
        pointer-events: none;
    }

    .steps-light .step-item {
        color: #4f4f4f;
        font-size: 14px;
        font-weight: 400;
    }
</style> -->
<div class="steps steps-light pt-2 pb-2">
    <a class="step-item btn btn-round border {{$step>=1?'border-success':''}} {{$step==1?'current btn-primary':''}}" href="{{route('checkout-details')}}">
        <div class="step-progress">
            <span class="step-count"><i class="fa fa-user"></i></span>
        </div>
        <div class="step-label">
            {{\App\CPU\translate('sing_in')}} / {{\App\CPU\translate('sing_up')}} (<small>Step 1</small>)
            
        </div>
    </a>
    <a class="step-item btn btn-round border {{$step>=2?'active ':''}} {{$step==2?'current btn-primary':''}}" href="{{route('checkout-details')}}">
        <div class="step-progress">
            <span class="step-count"><i class="fa fa-shopping-bag"></i></span>
        </div>
        <div class="step-label">
            {{\App\CPU\translate('Shipping_and_billing')}} (Step 2)
            
        </div>
    </a>
    <a class="step-item btn btn-round border {{$step>=3?'border':''}} {{$step==3?'current btn-primary':''}}" href="{{route('checkout-payment')}}">
        <div class="step-progress">
            <span class="step-count"><i class="fa fa-money"></i></span>
        </div>
        <div class="step-label">
            {{\App\CPU\translate('Payment')}} (Step 3)
            
        </div>
    </a>
</div>
