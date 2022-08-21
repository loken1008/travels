@php
$gettestmonial = App\Models\Testmonial::where('status', 1)
    ->orderBy('id', 'desc')
    ->get();

@endphp
@if ($gettestmonial->count() > 0)
    <section class="testimonials-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="populartrekheading mt-6 mb-4">
                        <h2 class="populartrektitle layout2">Our Customer Reviews</h2>
                        <div class="chooseus-box layout"></div>
                    </div>
                    <div id="testimonial-slider" class=" testimonials_slide owl-carousel owl-theme">
                        @forelse($gettestmonial as $testmonial)
                            <div class="testimonials-item">

                                <div class="content">
                                    
                                    <div class="testmonial-head-section">
                                        <h5 class="testimonial-title"> <small>"{{ $testmonial->message_title }}</small></h5>
                                        @if($testmonial->type=='tripadvisor')
                                        <img src="{{asset('tripadvisor.svg')}}" class="testimonial-icon"  alt="testimonialicon" title="{{$testmonial->type}}">
                                        @elseif($testmonial->type=='google')
                                        <img src="{{asset('google.png')}}" class="testimonial-icon" alt="testimonialicon"  title="{{$testmonial->type}}">
                                        @elseif($testmonial->type=='facebook')
                                        <img src="{{asset('facebook.svg')}}" class="testimonial-icon" alt="testimonialicon"  title="{{$testmonial->type}}">
                                        @else
                                        <img src="{{asset('mg.png')}}" class="testimonial-icon" alt="testimonialicon" title="{{$testmonial->type}}">
                                        @endif
                                    </div>
                                    
                                    <div class="testimonial-desc mt-4">
                                        <img  class="testimonial-image " src="{{ $testmonial->image }}" alt="image">
                                        <p class="testimonial-message ">{{ Str::limit($testmonial->message_description,150) }}</p>
                                    </div>


                                    <div class=" d-flex mt-2 justify-content-between" >
                                        <h5 class="font-weight-bold mr-2"> 
                                            <span class="tname">{{ $testmonial->name }}, {{$testmonial->country}}<span/><br>
                                        <span class="tdate">{{ $testmonial->created_at->format('M d, Y') }}</span>
                                        </h5>
                                        <ul class="d-flex">
                                            @for ($i = 1; $i <= $testmonial->rating; $i++)
                                                <li class="d-flex"><a href="#"><i class="fa fa-star"></i></a></li>
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
@endif
