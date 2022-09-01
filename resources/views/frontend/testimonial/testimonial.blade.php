@extends('frontend.main')
@section('title', 'All Reviews')
@section('content')

<section class="readall-review">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="populartrekheading mt-6 mb-4">
                    <h2 class="populartrektitle layout2">Read All Reviews</h2>
                    <div class="chooseus-box layout"></div>
                </div>
                <div class="all-testimonials_slide testimonials_slide">
                    @forelse($gettestimonials as $testmonial)
                        <div class="testimonials-item">

                            <div class="content">

                                <div class="testmonial-head-section">
                                    <h5 class="testimonial-title"> <small>"{{ $testmonial->message_title }}</small>
                                    </h5>
                                    @if ($testmonial->type == 'tripadvisor')
                                        <img src="{{ asset('tripadvisor.svg') }}" class="testimonial-icon"
                                            alt="testicon" title="{{ $testmonial->type }}">
                                    @elseif($testmonial->type == 'google')
                                        <img src="{{ asset('google.webp') }}" class="testimonial-icon"
                                            alt="testicon" title="{{ $testmonial->type }}">
                                    @elseif($testmonial->type == 'facebook')
                                        <img src="{{ asset('facebook.svg') }}" class="testimonial-icon"
                                            alt="testicon" title="{{ $testmonial->type }}">
                                    @else
                                        <img src="{{ asset('mg.webp') }}" class="testimonial-icon" alt="testicon"
                                            title="{{ $testmonial->type }}">
                                    @endif
                                </div>

                                <div class="testimonial-desc mt-4">
                                    <img class="testimonial-image " src="{{ $testmonial->image }}" alt="image">
                                    <p class="testimonial-message ">
                                        {{ Str::limit($testmonial->message_description, 150) }}</p>
                                </div>


                                <div class="star-review  mt-2 ">
                                    <h5 class="font-weight-bold mr-2">
                                        <span class="tname">{{ $testmonial->name }},
                                            {{ $testmonial->country }}<span /><br>
                                            <span
                                                class="tdate">{{ $testmonial->created_at->format('M d, Y') }}</span>
                                    </h5>
                                    <ul class="show-star ">
                                        @for ($i = 1; $i <= $testmonial->rating; $i++)
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        @endfor
                                    </ul>

                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
<section class="paginate text-center pt-0 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-center">
                    {{ $gettestimonials->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
