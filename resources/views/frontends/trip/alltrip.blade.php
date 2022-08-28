@php
 function getThumbs($url=""){
            $base = basename($url);
            if (strpos($url, 'https://') !== false or strpos($url, 'http://') !== false) {
                return str_replace($base, "thumbs/".$base, $url);
            }else{
                $preUrl = "storage/";
                $beforeBase = str_replace($base, "",$url);
                return $preUrl.$beforeBase.'thumbs/'.$base;
            }
        }
@endphp
@extends('frontend.main')
@section('title', 'Mountain Guide Trekking')
@section('content')



    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg"
        @if (!empty($tourbanner->page_banner)) data-background="{{ asset($tourbanner->page_banner) }}" @endif data-type="parallax"
        data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        <h4>
                            @if (!empty($getsubcat->sub_category_name))
                                {{ $getsubcat->sub_category_name }}
                            @endif
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner Section End -->

    <!-- Special Packages Section Start -->
    <section class="special-packages-sec pt-85 pb-60">

        <div class="container">
            <div class="row grid-mb" style="justify-content: space-around;">
                @if (count($getTourdetails) > 0)
                    @forelse($getTourdetails as $tourdetails)
                    <div class="item" style="width:340px">
                        <div class="special-packages">
                            <div class="thumb">
                                <a href="{{ route('tourdetails', $tourdetails->slug) }}">
                                    <img src="{{ getThumbs($tourdetails->mainImage) }}" alt="{{ $tourdetails->img_alt }}"
                                        style="height:185px !important"></a>

                                
                            </div>
                            <div class="content" >
                                <h1 style="color:black;font-size:15px;font-weight:bold">
                                    {{ $tourdetails->tour_name }}</h1>
                                    <p>{{Str::limit($tourdetails->short_description,80,'.')}}</p>
                                <ul class="info ">
                                    <li><i class="fa fa-calendar mr-2"></i>{{ $tourdetails->tour_days }}
                                            Days
                                        </li>
                                    <li>  
                                        @if ($getcoupon)
                                        <p>
                                            <strike  class="text-danger"><span>$ </span>{{ $tourdetails->main_price }}</strike> <span>$ </span>{{ $tourdetails->main_price - ($getcoupon->discount_amount / 100) * $tourdetails->main_price }}
                                        </p>
                                      
                                    @else
                                        <p><span>$ </span>{{ $tourdetails->main_price }}</p>
                                    @endif
                                </li>
                                   

                                </ul>
                                <a class="btn-theme" style="float:left !important;"
                                    href="{{ route('booking', $tourdetails->slug) }}">Book
                                    Now</a>
                                <a class="btn-theme" style=""
                                    href="{{ route('tourdetails', $tourdetails->slug) }}">View
                                    Details</a>
                            </div>
                        </div>
                    </div>
                    @empty
                        <span>Not found</span>
                    @endforelse
                @endif
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-center">
                        {{ $getTourdetails->links() }}
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Special Packages Section End -->

@endsection