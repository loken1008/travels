@extends('frontend.main')
@section('title', 'Book Your Trip')
@section('content')
    <!-- Inner Section Start -->
    <section class="onlinebook-section">
        <div class="container">
            <div class="booksection-content">
                <div class="row">
                    <div class="col-12 mt-4 mb-4 online-booksection">
                        <h2 class="populartrektitle layout2">Booking</h2>
                        <div class="chooseus-box layout"></div>
                       @if(!empty($tour->mainImage))
                        <div class="book-image">
                            <div class="onlineimage-section">
                                <img srcset="{{ $tour->mainImage }}" alt="{{$tour->tour_name}}">
                                <div class="booktourdetails">
                                    <h4 class="booktourtitle">{{ $tour->tour_name }}</h4>
                                    <p class="bookdate">Duration: <span>{{ $tour->tour_days }}</span></p>
                                    @if (!empty($tour->group_size))
                                        <p class="bookdate">Number Of Person: <span>{{ $tour->group_size }}</span></p>
                                    @endif
                                </div>
                            </div>
                            <div class="booktotal-price">
                                <h4>Total Price</h4>
                                @if ($getcoupon)
                                    <h5 class="onlinebook-price">
                                        <strike class="text-danger"><span>$</span>{{ $tour->main_price }}</strike>
                                        <span>$</span>{{ $tour->main_price - ($getcoupon->discount_amount / 100) * $tour->main_price }}
                                    </h5>
                                @else
                                    <h5 class="onlinebook-price">
                                        ${{ $tour->main_price }}</h5>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <form class="booking-form" method="POST" action="{{ route('store.booking') }}" id="bookingForm">
                        @csrf
                        @if(!empty($tour->id))
                        <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                        @endif
                        <div class="form-group col-md-6">
                            @if (Auth()->guard('customer')->check() &&
                                Auth()->guard('customer')->user()->id)
                                <input type="hidden" name="customer_id"
                                    value="{{ Auth()->guard('customer')->user()->id }}">
                            @else
                                <input type="hidden" name="customer_id" value="">
                            @endif
                        </div>
                        <div class=" " id="" role="" aria-labelledby="nav-packagesbk-tab">
                            <div class="row form-row">
                                @if (!empty($tour->tour_name))
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Tour Name <span class="text-danger">*</span> </label>
                                        <input type="text" name="" id="package_name" class="form-control"
                                            value="{{ $tour->tour_name }}" readonly>
                                    </div>
                                @else
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Tour Name <span class="text-danger">*</span> </label>
                                        <input type="text" id="package_name" class="form-control" name="tour_id"
                                            placeholder="Tour Name">
                                        @error('tour_id')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                @endif

                                <div class="form-group col-md-6">
                                    <label for="tourName">Full Name <span class="text-danger">*</span> </label>
                                    @if (Auth()->guard('customer')->check() &&
                                        Auth()->guard('customer')->user()->first_name &&
                                        Auth()->guard('customer')->check() &&
                                        Auth()->guard('customer')->user()->last_name)
                                        <input type="text" name="full_name" id="full_name" class="form-control"
                                            value="{{ Auth()->guard('customer')->user()->first_name }} {{ Auth()->guard('customer')->user()->last_name }}"
                                            readonly>
                                    @else
                                        <input type="text" name="full_name" id="full_name" class="form-control"
                                            value="" placeholder="Full Name">
                                    @endif
                                    @error('full_name')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tourName">Email <span class="text-danger">*</span> </label>
                                    @if (Auth()->guard('customer')->check() &&
                                        Auth()->guard('customer')->user()->email)
                                        <input type="email" name="email" id="email" class="form-control"
                                            value="{{ Auth()->guard('customer')->user()->email }}" readonly>
                                    @else
                                        <input type="email" name="email" id="email" class="form-control"
                                            value="" placeholder="Valid Email">
                                    @endif
                                    @error('email')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tourName">Current Address</label>
                                    @if (Auth()->guard('customer')->check() &&
                                        Auth()->guard('customer')->user()->address)
                                        <input type="text" name="address" id="address" class="form-control"
                                            value="{{ Auth()->guard('customer')->user()->address }}" readonly>
                                    @else
                                        <input type="text" name="address" id="address" class="form-control"
                                            value="" placeholder="Current Address">
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tourName">Mobile <span class="text-danger">*</span> </label>
                                    @if (Auth()->guard('customer')->check() &&
                                        Auth()->guard('customer')->user()->mobile)
                                        <input type="text" name="mobile" id="mobile" class="form-control"
                                            value="{{ Auth()->guard('customer')->user()->mobile }}" readonly>
                                    @else
                                        <input type="text" name="mobile" id="mobile" class="form-control"
                                            value="" placeholder="Mobile Number">
                                    @endif
                                    @error('mobile')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="tourName">Country <span class="text-danger">*</span> </label>
                                    @if (Auth()->guard('customer')->check() &&
                                        Auth()->guard('customer')->user()->country)
                                        <input type="text" name="country" id="country" class="form-control"
                                            value="{{ Auth()->guard('customer')->user()->country }}" readonly>
                                    @else
                                        <input type="text" name="country" id="country" class="form-control"
                                            value="" placeholder="Country Name">
                                    @endif
                                    @error('country')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tourName">Number Of Person <span class="text-danger">*</span> </label>
                                    <input type="text" name="number_people" id="number_people" class="form-control"
                                        value="" placeholder="Number Of people">
                                    @error('number_people')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                @if (!empty($tour->tour_name))
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Arrival Date </label>
                                        <input type="date" name="arrival_date" id="arrival_date" class="form-control"
                                            value="" placeholder="Arrival date">

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Departure Date </label>
                                        <input type="date" name="departure_date" id="departure_date"
                                            class="form-control" value="" placeholder="Departure date">

                                    </div>
                                @else
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Start Date </label>
                                        <input type="date" name="start_date" id="start_date" class="form-control"
                                            value="" placeholder="Start date">

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Tour Days</label>
                                        <input type="number" name="tour_days" id="tour_days" class="form-control"
                                            value="" placeholder="Tour Days">

                                    </div>
                                @endif
                                <div class="form-group col-md-12">
                                    <label for="tourName">Message </label>
                                    <textarea name="message" id="message" class="form-control" value="" style="height:200px"></textarea>

                                </div>
                                <div class="form-group col-md-12 mt-2">

                                    {!! NoCaptcha::renderJs() !!}
                                    {!! NoCaptcha::display() !!}
                                    @error('g-recaptcha-response')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 mt-2">
                                    <button class="book-btn" type="submit" value="Submit Form">Book
                                        Now</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
    </section>
    <!-- Inner Section End -->

    <!-- Special Places Section Start -->
    @include('frontend.common.tour')
    <!-- Special Places Section End -->

@endsection
