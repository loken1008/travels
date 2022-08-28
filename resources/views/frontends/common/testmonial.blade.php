@php
$gettestmonial = App\Models\Testmonial::where('status', 1)
    ->orderBy('id', 'desc')
    ->get();

@endphp
@if ($gettestmonial->count() > 0)
    <section class="testimonials-section pt-55 pb-35">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 crt">
                    <h5 class="font-weight-bold mt-5 ml-2">Customer rating</h5>
                    <ul class="d-flex crating mt-3">
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                    <p class="ml-2 pt-2">Based on {{$gettestmonial->count()}} Reviews</p>
                    <a href="{{route('all.reviews')}}" class="font-weight-bold text-primary ml-2 pt-2">Read All Reviews </a>
                </div>
                <div class="col-lg-9">
                    <div class="section-title mt-25">

                        <h2 class="text-left" >Our Customer <span> Review</span></h2><div id="underdiv"></div>

                    </div>
                    <div class="testimonials-post testimonials_slide owl-carousel owl-theme owl-navst st-three">
                        @forelse($gettestmonial as $testmonial)
                            <div class="testimonials-item">

                                <div class="content">
                                    <ul>
                                        @for ($i = 1; $i <= $testmonial->rating; $i++)
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        @endfor
                                        <li class="ml-4">{{ $testmonial->created_at->format('M d, Y') }}</li>
                                    </ul>
                                    <div class="d-flex" style="justify-content: space-between;">
                                        <h5> <small>- {{ $testmonial->message_title }}</small></h5>
                                        @if($testmonial->type=='tripadvisor')
                                        <img src="{{asset('tripadvisor.svg')}}" alt=""
                                        style="width:25px;height:25px;border-radius:50%" title="{{$testmonial->type}}">
                                        @elseif($testmonial->type=='google')
                                        <img src="{{asset('google.png')}}" alt=""
                                        style="width:25px;height:25px;border-radius:50%" title="{{$testmonial->type}}">
                                        @elseif($testmonial->type=='facebook')
                                        <img src="{{asset('facebook.svg')}}" alt=""
                                        style="width:25px;height:25px;border-radius:50%" title="{{$testmonial->type}}">
                                        @else
                                        <img src="{{asset('mg.png')}}" alt=""
                                        style="width:25px;height:25px;border-radius:50%" title="{{$testmonial->type}}">
                                        @endif
                                    </div>
                                    
                                    <div class="scroll">
                                        <p>{{ $testmonial->message_description }}</p>
                                    </div>


                                    <div class=" d-flex mt-2" style="align-items: center;justify-content: space-between;">
                                        <h5 class="font-weight-bold mr-2"> <small>{{ $testmonial->name }}, {{$testmonial->country}}</small></h5>
                                        <img src="{{ $testmonial->image }}" alt=""
                                            style="width:45px;height:45px;border-radius:50%">
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
