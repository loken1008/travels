@extends('frontend.main')
@section('title', 'Travel With Us')
@section('content')
    <section class="travels-section">
        <div class="container">
            <div class="row">
                <div class="travelus-heading">
                    <h2 class="populartrektitle layout2">Why Travel With Us</h2>
                    <div class="chooseus-box layout"></div>
                </div>
                <div class="col-md-12 col-lg-12">
                    @foreach ($getchooseus as $chooseus)
                        @if ($loop->iteration % 2 !== 0)
                            <div class="travels-single">
                                <div class="row ">
                                    <div class="col-lg-12 first-travel">
                                        <div class="col-md-6 ">
                                            <img srcset="{{ $chooseus->image }}" alt="{{ $chooseus->title }}">
                                        </div>
                                        <div class="col-md-6 content large-content travel-details">
                                            <div class="travel-title">
                                                <h2>{{ $chooseus->title }}</h2>
                                            </div>

                                            <div class="visible-content">
                                                <p class="travel-desc"> {!! Str::limit($chooseus->description, 630, '') !!}</p>
                                                {{-- <p class="travel-desc"> {!! $chooseus->description !!}</p> --}}
                                            </div>
                                            <div class="invisible-content">
                                                <p class="travel-desc">{!! $chooseus->description !!}</p>
                                            </div>
                                            <button class="travelbtn  more-less">Read More</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="travels-single">
                                <div class="row ">
                                    <div class="col-lg-12 second-travel">
                                       
                                        <div class="col-md-6 content large-content secondtravel-details">
                                            <div class="travel-title">
                                                <h2>{{ $chooseus->title }}</h2>
                                            </div>
                                         
                                            <div class="visible-content">
                                                <p class="travel-desc"> {!! Str::limit($chooseus->description, 630, '') !!}</p>
                                                {{-- <p class="travel-desc"> {!! $chooseus->description !!}</p> --}}
                                            </div>
                                            <div class="invisible-content"><p class="travel-desc">{!! $chooseus->description !!}</p></div>
                                            <button class="travelbtn  more-less">Read More</button>
                                            
                                        </div>
                                        <div class="col-md-6">
                                            <img srcset="{{ $chooseus->image }}" alt="{{ $chooseus->title }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @include('frontend.common.tour')
@endsection
