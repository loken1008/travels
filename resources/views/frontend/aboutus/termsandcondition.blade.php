@extends('frontend.main')
@section('title', 'Terms and Condition')
@section('content')
    <section class="payment-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="global-area">
                        <div class="inner-title">
                            <div class="allblogs-heading">
                                @if(isset($gettermsandcondition->title))
                                    <h2 class="populartrektitle layout2">{{$gettermsandcondition->title}}</h2>
                                    <div class="chooseus-box layout"></div>
                                @endif
                            </div>
                        </div>
                        @if(isset($gettermsandcondition->description))
                        <p >{!! $gettermsandcondition->description !!}</p>
                        @endif
                        
                    </div>
                </div>
               
            </div>
        </div>
    </section>
    @include('frontend.common.tour')
@endsection
