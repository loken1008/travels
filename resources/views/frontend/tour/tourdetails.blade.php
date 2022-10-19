@php
function getThumbs($url = '')
{
    $base = basename($url);
    if (strpos($url, 'https://') !== false or strpos($url, 'http://') !== false) {
        return str_replace($base, 'thumbs/' . $base, $url);
    } else {
        $preUrl = 'storage/';
        $beforeBase = str_replace($base, '', $url);
        return $preUrl . $beforeBase . 'thumbs/' . $base;
    }
}
@endphp
@extends('frontend.main')
@section('title', "$getTourdetails->tour_name ")
@section('meta_title', $getTourdetails->meta_title)
@section('meta_keywords', $getTourdetails->meta_keywords)
@section('meta_description', $getTourdetails->meta_description)
@section('og_title', $getTourdetails->tour_name)
@section('og_description', $getTourdetails->meta_description)
@section('og_image', $getTourdetails->mainImage)
@section('og_url', url()->current())
@section('twitter_title', $getTourdetails->tour_name)
@section('twitter_description', $getTourdetails->meta_description)
@section('twitter_image', $getTourdetails->mainImage)
@section('twitter_url', url()->current())
@section('content')

    <!-- Inner Section Start -->
    <section class="detailsbanner">
        <img class="details-image" srcset="{{ $getTourdetails->mainImage }}" alt="{{ $getTourdetails->img_alt }}">
        <div class="container">
            <div class="detailssection-content">
                <div class="detailsheading">
                    <h3 class="details-country">{{ $getTourdetails->country->country_name }}</h3>
                    <h1 class="details-tourname">{{ $getTourdetails->tour_name }}</h1>
                </div>
                <div class="detailsprice">
                    @if ($getcoupon)
                        <h5 class="details-price ">
                            <span class="discount-price">${{ $getTourdetails->main_price }}</span>
                            ${{ $getTourdetails->main_price - ($getcoupon->discount_amount / 100) * $getTourdetails->main_price }}

                        </h5>
                    @else
                        <h5 class="details-price">${{ $getTourdetails->main_price }}</h5>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Inner Section End -->
    <div class="container-fluid details-first-nav" id="frames">

        <div class="fixeddetails-nav">
            <div class="details-nav" id="navbar-example2">

                <a class="item1 toverview " href="#toverview">Overview</a>
                @if ($getTourdetails->images->count() > 0)
                    <a class="item1 tphoto" href="#tphoto">Photos</a>
                @endif
                @if ($getTourdetails->itinerary->count() > 0)
                    <a class="item1 titinery" href="#titinery">Itinerary</a>
                @endif
                @if ($getTourdetails->cost_include == 'null' || $getTourdetails->cost_exclude == '')
                @else
                    <a class="item1 tcostdetails" href="#tcostdetails">Include/Exclude</a>
                @endif
                @if ($getTourdetails->equipment->count() > 0)
                    <a class="item1 tequipment" href="#tequipment">Equipment</a>
                @endif
                @if ($getTourdetails->dateprice->count() > 0)
                    <a class="item1 tdateprice" href="#tdateprice">Date & Price</a>
                @endif
                {{-- @if ($getTourdetails->map_url != null)
                    <a class="item1 tmap" href="#tmap">Map</a>
                @endif --}}
                @if ($getTourdetails->fqa->count() > 0)
                    <a class="item1 tfaq" href="#tfaq">FAq</a>
                @endif
            </div>
            <div class="details-book">
                <a href="{{ route('booking', $getTourdetails->slug) }}">Book Now</a>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row scrollheight">
            <div class="reverse-col d-flex">
                <div class="col-md-8 reverse-first">

                    <div class="key-facts">
                        @if (!empty($getTourdetails->country->country_name))
                            <div class="col-md-6 col-sm-12 col-xsm-12 duration">
                                <div class="icon">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div class="text">
                                    <h4 class="text-duration">Destination</h4>
                                    <h4 class="text-value"> {{ $getTourdetails->country->country_name }}</h4>
                                </div>
                            </div>
                        @endif
                        @if (!empty($getTourdetails->activity))
                            <div class="col-md-6 col-sm-12 duration">
                                <div class="icon">
                                    <i class="fa-solid fa-person-hiking"></i>
                                </div>
                                <div class="text">
                                    <h4 class="text-duration">Activity</h4>
                                    <h4 class="text-value"> {{ $getTourdetails->activity }}</h4>
                                </div>
                            </div>
                        @endif
                        @if (!empty($getTourdetails->region))
                            <div class="col-md-6 col-sm-12 duration">
                                <div class="icon">
                                    <i class="fa-solid fa-map-location-dot"></i>
                                </div>
                                <div class="text">
                                    <h4 class="text-duration">Region</h4>
                                    <h4 class="text-value"> {{ $getTourdetails->region }}</h4>
                                </div>
                            </div>
                        @endif
                        @if (!empty($getTourdetails->tour_days))
                            <div class="col-md-6 col-sm-12 duration">
                                <div class="icon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <div class="text">
                                    <h4 class="text-duration">Duration</h4>
                                    <h4 class="text-value"> {{ $getTourdetails->tour_days }}</h4>
                                </div>
                            </div>
                        @endif
                        @if (!empty($getTourdetails->altitude))
                            <div class="col-md-6 col-sm-12 altitude">
                                <div class="icon">
                                    <i class="fa fa-arrow-trend-up"></i>

                                </div>
                                <div class="text">
                                    <h4 class="text-duration">Altitude</h4>
                                    <h4 class="text-value"> {{ $getTourdetails->altitude }}</h4>
                                </div>
                            </div>
                        @endif
                        @if (!empty($getTourdetails->accomodation))
                            <div class="col-md-6 col-sm-12 accomodation">
                                <div class="icon">
                                    <i class="fa fa-hotel"></i>
                                </div>
                                <div class="text">
                                    <h4 class="text-duration">Accomodation</h4>
                                    <h4 class="text-value"> {{ $getTourdetails->accomodation }}</h4>
                                </div>
                            </div>
                        @endif
                        @if (!empty($getTourdetails->meal))
                            <div class="col-md-6 col-sm-12 accomodation">
                                <div class="icon">
                                    <i class="fa-solid fa-utensils"></i>
                                </div>
                                <div class="text">
                                    <h4 class="text-duration">Meal</h4>
                                    <h4 class="text-value"> {{ $getTourdetails->meal }}</h4>
                                </div>
                            </div>
                        @endif
                        @if (!empty($getTourdetails->transport))
                            <div class="col-md-6 col-sm-12 transportation">
                                <div class="icon">
                                    <i class="fa fa-bus"></i>
                                </div>
                                <div class="text">
                                    <h4 class="text-duration">Transportation</h4>
                                    <h4 class="text-value"> {{ $getTourdetails->transport }}</h4>
                                </div>
                            </div>
                        @endif
                        @if (!empty($getTourdetails->start_end))
                            <div class="col-md-6 col-sm-12 transportation">
                                <div class="icon">
                                    <i class="fa-solid fa-arrows-turn-to-dots"></i>
                                </div>
                                <div class="text">
                                    <h4 class="text-duration">Start From-End To </h4>
                                    <h4 class="text-value"> {{ $getTourdetails->start_end }}</h4>
                                </div>
                            </div>
                        @endif
                        @if (!empty($getTourdetails->best_month))
                            <div class="col-md-6 col-sm-12 transportation">
                                <div class="icon">
                                    <i class="fa-solid fa-cloud"></i>
                                </div>
                                <div class="text">
                                    <h4 class="text-duration">Best Seasons</h4>
                                    <h4 class="text-value"> {{ $getTourdetails->best_month }}</h4>
                                </div>
                            </div>
                        @endif
                        @if (!empty($getTourdetails->group_size))
                            <div class="col-md-6 col-sm-12 transportation">
                                <div class="icon">
                                    <i class="fa-solid fa-people-group"></i>
                                </div>
                                <div class="text">
                                    <h4 class="text-duration">Group Size</h4>
                                    <h4 class="text-value"> {{ $getTourdetails->group_size }}</h4>
                                </div>
                            </div>
                        @endif
                        @if (!empty($getTourdetails->grade))
                            <div class="col-md-6 col-sm-12 transportation">
                                <div class="icon">
                                    <i class="fa-solid fa-route"></i>
                                </div>
                                <div class="text">
                                    <h4 class="text-duration">Grade</h4>
                                    <h4 class="text-value"> {{ $getTourdetails->grade }}</h4>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4  reverse-second">
                    <div class="book-card" id="bookprice">
                        <div class="card-body mb-2">
                            <h5 class="book-price-title">price per person</h5>

                            @if ($getcoupon)
                                <div class="book-details-price">
                                    <p class="bookdetails-price"> $
                                        {{ $getTourdetails->main_price - ($getcoupon->discount_amount / 100) * $getTourdetails->main_price }}
                                        <strike class="strike-price">${{ $getTourdetails->main_price }}</strike>

                                    </p>

                                </div>
                            @else
                                <p class="bookdetails-price">$ {{ $getTourdetails->main_price }}</p>
                            @endif
                            <div class="tobookbtn text-center">
                                <a href="{{ route('booking', $getTourdetails->slug) }}" class="tripbook-btn">Book
                                    Trip</a>
                                <a href="{{ route('online.book') }}" class="owntrip-book">Make Your Own Trip</a>
                            </div>
                        </div>
                        @if (!empty($getTourdetails->trip_map))
                            <div class="tripmap">
                                <h5 class="inquiry-title">Trip Map</h5>
                                <a href="{{ $getTourdetails->trip_map }}" data-lightbox="photos"><img
                                        srcset="{{ $getTourdetails->trip_map }}" alt="{{ $getTourdetails->img_alt }}"></a>
                            </div>
                        @endif
                        <div class="quickinquery">
                            <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
                                aria-controls="offcanvasScrolling">Quick Inquiry for Trip</a>
                        </div>
                    </div>
                    <div class="offcanvas offcanvas-end book-card mt-2" data-bs-scroll="true" data-bs-backdrop="false"
                        tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel"
                        style="z-index:99999">
                        <div class="card-body">
                            <div class="offcanvas-header">
                                <h5 class="inquiry-title">Send an inquiry</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>

                            <form method="post" action="{{ route('user.message') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        @if (Auth()->guard('customer')->check() &&
                                            Auth()->guard('customer')->user()->first_name &&
                                            Auth()->guard('customer')->user()->last_name)
                                            <input type="text" name="f_name" id="f_name" class="form-control"
                                                value="{{ Auth()->guard('customer')->user()->first_name }} {{ Auth()->guard('customer')->user()->last_name }}"
                                                readonly>
                                        @else
                                            <input type="text" name="f_name" id="f_name" class="form-control"
                                                placeholder="Full Name" required>
                                        @endif
                                        @error('f_name')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <input type="hidden" name="l_name" value="mountaintour">
                                    <div class="form-group col-md-12">
                                        @if (Auth()->guard('customer')->check() &&
                                            Auth()->guard('customer')->user()->email)
                                            <input type="email" name="email" id="email" class="form-control"
                                                value="{{ Auth()->guard('customer')->user()->email }}" readonly
                                                style="opacity:1 !important">
                                        @else
                                            <input type="email" name="email" id="email" class="form-control"
                                                placeholder="Your Email" required style="opacity:1 !important">
                                        @endif
                                        @error('email')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        @if (Auth()->guard('customer')->check() &&
                                            Auth()->guard('customer')->user()->mobile)
                                            <input type="text" name="phone" id="phone" class="form-control"
                                                value="{{ Auth()->guard('customer')->user()->mobile }}" readonly
                                                style="opacity:1 !important">
                                        @else
                                            <input type="number" name="phone" id="phone" class="form-control"
                                                placeholder="Your Contact Number" required style="opacity:1 !important">
                                        @endif
                                        @error('phone')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        @if (Auth()->guard('customer')->check() &&
                                            Auth()->guard('customer')->user()->country)
                                            <input type="text" name="country" id="country" class="form-control"
                                                value="{{ Auth()->guard('customer')->user()->country }}" readonly>
                                        @else
                                            <input type="text" name="country" class="form-control"
                                                placeholder="Country" id="country" required>
                                        @endif
                                        @error('country')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="form-group col-md-12 text-center">
                                        <div class="contact-textarea">
                                            <textarea class="form-control" rows="6" placeholder="Write Message" id="message" name="message" required></textarea>
                                            <div class="mt-4">

                                                {!! NoCaptcha::renderJs() !!}
                                                {!! NoCaptcha::display() !!}
                                                @error('g-recaptcha-response')
                                                    <span class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="text-center">
                                        <button class="send-message" type="submit">Send
                                            Message</button>
                                    </div>
                                    <div id="form-messages"></div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>

            </div>

            <div class="col-md-8 col-lg-8">
                {{-- <div class="short-desc">
                    <p>{!! $getTourdetails->short_description !!}</p>
                </div> --}}
                <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example"
                    tabindex="0">
                    <section class="mt-4" id="toverview">
                        <h4 class="key-heading"><i class="fa-solid fa-eye"></i> Overview</h4>
                        <p>{!! $getTourdetails->description !!}</p>
                    </section>
                    @if ($getTourdetails->images->count() > 0)
                        <section class="mt-4" id="tphoto">
                            <h4 class="key-heading1"><i class="fa-solid fa-photo-film"></i> Photos</h4>

                            @forelse($getTourdetails->images as $image)
                                @php
                                    $imagess = explode(',', $image->images);
                                    
                                @endphp

                                <div class="col-md-12 d-flex image-flex">

                                    <div class="col-md-5 first-image">
                                        @if ($imagess)
                                            <a href="{{ $imagess[0] }}" data-lightbox="photos">
                                                <img class="main-image" srcset="{{ $imagess[0] }}"
                                                    alt="{{ $getTourdetails->img_alt }}" />
                                            </a>
                                        @endif
                                    </div>

                                    <!-- Image -->

                                    <div class="col-md-7 otherrelated-image">
                                        @foreach ($imagess as $key => $rimages)
                                            @if ($key > 0 && $key < 5)
                                                @if ($rimages == !null)
                                                    <a href="{{ $rimages }}" data-lightbox="photos">
                                                        <img class="other-image" srcset="{{ $rimages }}"
                                                            alt="{{ $getTourdetails->img_alt }}" />
                                                    </a>
                                                @else 
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>

                                </div>
                            @empty
                                <p>No Image</p>
                            @endforelse
                        </section>
                    @endif

                    @if ($getTourdetails->itinerary->count() > 0)
                        <section class="mt-4" id="titinery">
                            <h4 class="key-heading2"> <i class="fa-solid fa-chart-bar"></i> Itinerary</h4>
                            @foreach ($getTourdetails->itinerary as $itin)
                                @if ($itin->day_title == !null)
                                    <div class="itinerary-desc">

                                        <h6 class="day-title">
                                            <i class="fa-solid fa-hand-point-right"></i> {{ $itin->day_title }}
                                        </h6>
                                        <p class="itinery-para">{!! $itin->long_description !!}</p>

                                    </div>
                                @endif
                            @endforeach
                        </section>
                    @endif

                    @if ($getTourdetails->cost_include == 'null' || $getTourdetails->cost_exclude == '')
                    @else
                        <section class="mt-4" id="tcostdetails">
                            <h4 class="key-heading3"><i class="fa-solid fa-money-bill-1-wave"></i> Cost Details</h4>
                            <div class="itinerary-desc">

                                <h6 class="cost-title">
                                    <i class="fa-solid fa-list-check"></i> Includes
                                </h6>
                                <div class="cost-include">
                                    {!! $getTourdetails->cost_include !!}
                                </div>

                                <h6 class="cost-title">
                                    <i class="fa-solid fa-square-xmark"></i> Exclude
                                </h6>
                                <div class="cost-exclude">
                                    {!! $getTourdetails->cost_exclude !!}
                                </div>


                            </div>
                        </section>
                    @endif
                    @if ($getTourdetails->equipment->count() > 0)
                        <section class="mt-4" id="tequipment">
                            <h4 class="key-heading4"> <i class="fa-solid fa-chart-bar"></i>Equipment</h4>
                            @foreach ($getTourdetails->equipment as $equipment)
                                @if ($equipment->equipment_name == !null)
                                    <div class="equipment-desc">

                                        <h6 class="day-title">
                                            <i class="fa-solid fa-hand-point-right"></i> {{ $equipment->equipment_name }}
                                        </h6>
                                        {!! $equipment->equipment_description !!}

                                    </div>
                                @endif
                            @endforeach
                        </section>
                    @endif
                    @if ($getTourdetails->dateprice->count() > 0)
                        <section class="mt-4" id="tdateprice">
                            <h4 class="key-heading5"> <i class="fa-solid fa-chart-bar"></i>Dates & Price</h4>
                            <div class="table-responsive-lg">
                                <table class="table align-middle" style="width:100% !important">
                                    <thead class="thead-light">
                                        <tr class="text-center">
                                            <th scope="col">Start Date</th>
                                            <th scope="col">End Date</th>
                                            <th scope="col">Seats Available</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Book</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getTourdetails->dateprice as $dateprice)
                                            @if ($dateprice->start_date == !null)
                                                <tr class="text-center">
                                                    <td>{{ $dateprice->start_date }}</td>
                                                    <td>{{ $dateprice->end_date }}</td>
                                                    <td>{{ $dateprice->seats_available }}</td>
                                                    <td>{{ $dateprice->price }}</td>
                                                    <td> <a class="datebtn"
                                                            href="{{ route('booking', $getTourdetails->slug) }}">Book
                                                            Now</a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    @endif
                    {{-- @if (!empty($getTourdetails->map_url))
                        <section class="mt-4" id="tmap">
                            <h4 class="key-heading6"> <i class="fa-solid fa-chart-bar"></i>Map</h4>
                            <div class="equipment-desc">

                                <iframe src="{{ $getTourdetails->map_url }}" width="100%" height="600"
                                    frameborder="0"></iframe>

                            </div>
                        </section>
                    @endif --}}
                    @if ($getTourdetails->fqa->count() > 0)
                        <section class="mt-4" id="tfaq">
                            <h4 class="key-heading7"> <i class="fa-solid fa-chart-bar"></i>FAQ's</h4>
                            @foreach ($getTourdetails->fqa as $fqas)
                                @if ($fqas->question == !null)
                                    <div class="equipment-desc">
                                        <div class="accordion" id="accordionFlushExample{{ $fqas->id }}">
                                            <div class="accordion-header day-title" id="headingOne{{ $fqas->id }}">
                                                <h2 class="accordion-button collapsed" data-bs-toggle="collapse"
                                                    data-bs-target="#flush-collapseOne{{ $fqas->id }}"
                                                    aria-expanded="false" aria-controls="flush-collapseOne">
                                                    <i class="fa-solid fa-hand-point-right"></i>Q.{{ $fqas->question }}
                                                </h2>
                                            </div>
                                            <div id="flush-collapseOne{{ $fqas->id }}"
                                                class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                                                data-bs-parent="#accordionFlushExample{{ $fqas->id }}">
                                                <div class="accordion-body">
                                                    {!! $fqas->answer !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </section>
                    @endif
                </div>
            </div>
            <div class="share">
                <p class="share-text">Share with others</p>
                <div class="sharethis-inline-share-buttons"></div>

            </div>
        </div>
    </div>



    <!-- Special Places Section Start -->
    @if ($getTour->count() > 0)

        <div class="container network_wrapper col-sm  ">
            <div class=" country-card">
                <div class="country-header">
                    <div class="countrytabmainheading layout">
                        <div>
                            <h2 class="countrytab-title layout">Related Tour</h2>
                            <div class="countrytab-box layout"></div>
                        </div>

                    </div>

                </div>

                <div class="mountainguide-block45-item1 " id="country">
                    <div id="country-slide" class="country-details owl-carousel owl-theme">
                        @forelse ($getTour as $key2 => $ctour)
                             <div class="mountainguide-block48 layout1">
                                <a class="text-decoration-none" href="{{ route('tourdetails', $ctour->slug) }}">
                                    <div class="mountainguide-block49 layout">
                                        <div class="mountainguide-image8 layout">
                                            <img class="first-section-image"
                                                srcset="{{ getThumbs($ctour->mainImage) }}"
                                                alt="{{ $ctour->img_alt }}">
                                                @if (!empty($ctour->type))
                                                <p class="popularhead-tag">
                                                    @if ($ctour->type == 'group')
                                                        <i class="fa-solid fa-people-group"></i> Group
                                                    @elseif($ctour->type == 'family')
                                                        <i class="fa-solid fa-people-roof"></i> Family
                                                    @elseif($ctour->type == 'bestsell')
                                                        <i class="fa-solid fa-award"></i> Best Sell
                                                    @elseif($ctour->type == 'private')
                                                        <i class="fa-solid fa-lock"></i> Private
                                                    @elseif($ctour->type == 'tripofthemonth')
                                                        <i class="fa-solid fa-award"></i> Trip Of The Month
                                                    @else
                                                    @endif
                                                </p>
                                            @endif
                                            <div class="first-section-price">
                                                @if ($getcoupon)
                                                    <h4 class="mountainguide-highlights4 layout">
                                                        <span
                                                            class="discount-price">${{ $ctour->main_price }}</span>
                                                        ${{ $ctour->main_price - ($getcoupon->discount_amount / 100) * $ctour->main_price }}
                                                    </h4>
                                                @else
                                                    <h4 class="mountainguide-highlights4 layout">
                                                        $ {{ $ctour->main_price }}</h4>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mountainguide-block50 layout">
                                            <div class="mountainguide-block51 layout">

                                                <h3 class="mountainguide-subtitle2 layout">
                                                    {{ $ctour->tour_name }}
                                                </h3>
                                            </div>
                                            <div class="mountainguide-block52 layout">
                                                <h4 class="text-value"><i class="fa-solid fa-route"></i>
                                                    {{ $ctour->grade }}</h4>
                                                <h4 class="text-value d-flex"><img
                                                        src="{{ asset('frontend/altitude.png') }}" alt=""
                                                        class="altitude-img">
                                                    {{ $ctour->altitude }}</h4>
                                                <span class="best-day"><i class="fa-solid fa-calendar-days"></i>
                                                    {{ $ctour->tour_days }}
                                                    days</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- Special Places Section End -->
    <!-- Blog Section Start -->

    @if ($getTourdetails->blog->count() > 0)
        <section class="container blogs_section ">
            <div class="populartrekheading mt-6 mb-4">
                <div>
                    <h2 class="populartrektitle layout2">Our Latest Blogs</h2>
                    <div class="chooseus-box layout"></div>
                </div>
               
            </div>

            <div id="blog-slider" class="owl-carousel owl-theme">
                @forelse($getTourdetails->blog as $blog)
                    <div class="blogs_item">
                        <a class="text-decoration-none" href="{{ route('blogsdetails', $blog->slug) }}">
                            <div class="blogs_image">
                                <img class="img-fluid" srcset="{{ getThumbs($blog->blog_image) }}"
                                    alt="{{ $blog->img_alt }}">
                            </div>
                            <div class="blogs_details">
                                <div class="mt-3 mb-3">
                                    <span class="blogs_date">{{ $blog->created_at->format('Y-M-d') }}</span>
                                </div>
                                <h5 class="blogs_title">{{ Str::limit($blog->blog_title, 25) }}</h5>

                                <div class="blogs_details">{!! Str::limit($blog->blog_description, 70) !!}</div>
                                <div class="bbtn">

                                    <a href="{{ route('blogsdetails', $blog->slug) }}"
                                        class="blogsbtn text-decoration-none">Read
                                        More</a>
                                </div>

                            </div>
                        </a>
                    </div>

                @empty
                @endforelse
            </div>
        </section>
    @endif
    <!-- Blog Section End -->
    <!-- Testimonials Section Start -->
    @include('frontend.common.testmonial')
    <!-- Testimonials Section End -->

    <div class="details-footer-fixed mountainguide-block17-item">
       
        <div class="mountainguide-block18 layout">
            
            <div class="mountainguide-block19 layout">
                @if (!empty($sitesetting->google))
                    <a href="{{ $sitesetting->google }}">
                        <i class="fa-brands fa-whatsapp whatsapp"></i>
                    </a>
                @endif
                @if (!empty($sitesetting->linkedin))
                    <a href="{{ $sitesetting->linkedin }}">
    
                        <i class="fa-brands fa-viber viber"></i>
                    </a>
                @endif
                @if (!empty($getcontact->phone))
                    <a href="tel:{{ $getcontact->mobile }}" class="mountainguide-highlights layout"><i class="fa-solid fa-phone phones"></i></a>
                @endif
            </div>
        </div>
        @if (!empty($getcontact->profile_image))
            <img class="profile-image" srcset="{{ asset($getcontact->profile_image) }}" alt="profile">
        @endif
        <div class="details-book">
            <a href="{{ route('booking', $getTourdetails->slug) }}">Book Now</a>
        </div>
    </div>
@endsection
