@extends('frontend.main')
@section('title', 'Our Team')
@section('content')



    <!-- Contact Section Start -->
    @if($getteamdetails->count()>0)
    <section class="team-section">
        <div class="container">
            <div class="allblogs-heading">
                <h2 class="populartrektitle layout2">Our Team</h2>
                <div class="chooseus-box layout"></div>
            </div>
            @foreach ($getteamdetails as $teamdetails)
                @if ($loop->iteration % 2 !== 0)
                    <div class="row ">
                        <div class="col-md-12 allteam-first">
                            <div class="col-md-6">
                                <img class="team-image" srcset="{{ $teamdetails->image }}" alt="{{ $teamdetails->name }}" >
                            </div>
                                    <div class="col-md-6 team-content">
                                            <h6 class="team-post" > {{ $teamdetails->post }}
                                            </h6>
                                            <h5 class="team-name" >{{ $teamdetails->name }}</h5>
                                            <h6 class="team-lang" >Language:
                                                {{ $teamdetails->language }}</h6>
                                            <h6 class="team-exp" >Experiences:
                                                {{ $teamdetails->experiences }} </h6>
                                        <div class="tab-content teamlarge-content" id="nav-tabContent" >
                                            <div class="visible-content">
                                                <p class="team-para"> {!! Str::limit($teamdetails->description, 400, '') !!}</p>
                                            </div>
                                            <div class="teaminvisible-content">
                                                <p class="team-para">{!! $teamdetails->description !!}</p>
                                            </div>
                                            <button  class="teambtn more-less">Read More</button>
                                        </div>
                                    </div>
                        </div>
                        
                    </div>
                @else
                <div class="row ">
                    <div class="col-md-12 allteam-first allteam-first-reverse">
                       
                                <div class="col-md-6 team-content">
                                        <h6 class="team-post" > {{ $teamdetails->post }}
                                        </h6>
                                        <h5 class="team-name" >{{ $teamdetails->name }}</h5>
                                        <h6 class="team-lang" >Language:
                                            {{ $teamdetails->language }}</h6>
                                        <h6 class="team-exp" >Experiences:
                                            {{ $teamdetails->experiences }} </h6>
                                    <div class="tab-content teamlarge-content" id="nav-tabContent" >
                                        <div class="visible-content">
                                            <p class="team-para"> {!! Str::limit($teamdetails->description, 400, '') !!}</p>
                                        </div>
                                        <div class="teaminvisible-content">
                                            <p class="team-para">{!! $teamdetails->description !!}</p>
                                        </div>
                                        <button  class="teambtn more-less">Read More</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <img class="team-image" srcset="{{ $teamdetails->image }}" alt="{{ $teamdetails->name }}" >
                                </div>
                    </div>
                    
                </div>
                @endif
            @endforeach
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-center">
                        {{ $getteamdetails->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- Contact Section End -->

    <!-- Special Places Section Start -->
    @include('frontend.common.tour')
    <!-- Special Places Section End -->
@endsection
