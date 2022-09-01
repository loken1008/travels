@extends('frontend.main')
@section('title', 'Payment Method')
@section('content')



    <section class="payment-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="global-area">
                        <div class="inner-title">
                            <div class="allblogs-heading">
                                @if (isset($getpaymentmethod->title))
                                    <h2 class="populartrektitle layout2">{{ $getpaymentmethod->title }}</h2>
                                    <div class="chooseus-box layout"></div>
                                @endif
                            </div>

                        </div>
                        @if (isset($getpaymentmethod->description))
                            <p class="payment-desc">{!! $getpaymentmethod->description !!}</p>
                        @endif

                    </div>
                </div>
    </section>
    @include('frontend.common.tour')

@endsection
