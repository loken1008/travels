@extends('frontend.main')
@section('title', 'Our Team')
@section('content')


    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg" data-background="images/bg/px-1.jpg" data-type="parallax" data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        <h4>Our team</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner Section End -->

    <!-- team Section Start -->
    <section class="team-section">
        <div class="container">
            <div class="row">



                <div class="tab-style">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link " id="plc-asia-tab" data-toggle="tab" href="#Administration"
                                role="tab" aria-controls="plc-asia" aria-selected="true">Administration</a>
                            <a class="nav-item nav-link " id="plc-asia-tab" data-toggle="tab" href="#Mountainer" role="tab"
                                aria-controls="plc-asia" aria-selected="true">Mountainer Guid</a>
                            <a class="nav-item nav-link " id="plc-asia-tab" data-toggle="tab" href="#Hiking" role="tab"
                                aria-controls="plc-asia" aria-selected="true">Hiking/Treeking</a>
                            <a class="nav-item nav-link " id="plc-asia-tab" data-toggle="tab" href="#Tourguide" role="tab"
                                aria-controls="plc-asia" aria-selected="true">Tour Guide</a>
                            <a class="nav-item nav-link " id="plc-asia-tab" data-toggle="tab" href="#Safari" role="tab"
                                aria-controls="plc-asia" aria-selected="true">Safari</a>

                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <!-- item start -->

                        @foreach ($getallteam as $getteam)
                            @if ($getteam->type == 'Administration')
                                <a href="{{ route('ourteam.details', $getteam->name) }}">
                                    <div class="tab-pane fade show " id="Administration" role="tabpanel"
                                        aria-labelledby="plc-asia-tab">
                                        <div class="item">
                                            <div class="col-lg-3 col-md-4 col-sm-6" style="max-width: 35% !important">
                                                <div class="team-col">
                                                    <div class="thumb">
                                                        <img src="{{ $getteam->image }}" alt=""
                                                            style="width:255px;height:260px">
                                                    </div>
                                                    <div class="content text-center">
                                                        <h4><a href="{{ route('ourteam.details', $getteam->name) }}">{{ $getteam->name }}</a></h4>
                                                        <h5>{{ $getteam->post }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endforeach

                        @foreach ($getallteam as $getteam)
                            @if ($getteam->type == 'Mountainer')
                                <a href="{{ route('ourteam.details', $getteam->name) }}">
                                    <div class="tab-pane fade show " id="Mountainer" role="tabpanel"
                                        aria-labelledby="plc-asia-tab">
                                        <div class="item">
                                            <div class="col-lg-3 col-md-4 col-sm-6" style="max-width: 35% !important">
                                                <div class="team-col">
                                                    <div class="thumb">
                                                        <img src="{{ $getteam->image }}" alt=""
                                                            style="width:255px;height:260px">
                                                    </div>
                                                    <div class="content text-center">
                                                        <h4><a href="{{ route('ourteam.details', $getteam->name) }}">{{ $getteam->name }}</a></h4>
                                                        <h5>{{ $getteam->post }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                        @foreach ($getallteam as $getteam)
                            @if ($getteam->type == 'Safari')
                                <a href="{{ route('ourteam.details', $getteam->name) }}">
                                    <div class="tab-pane fade show " id="Safari" role="tabpanel"
                                        aria-labelledby="plc-asia-tab">
                                        <div class="item">
                                            <div class="col-lg-3 col-md-4 col-sm-6" style="max-width: 35% !important">
                                                <div class="team-col">
                                                    <div class="thumb">
                                                        <img src="{{ $getteam->image }}" alt=""
                                                            style="width:255px;height:260px">
                                                    </div>
                                                    <div class="content text-center">
                                                        <h4><a href="{{ route('ourteam.details', $getteam->name) }}">{{ $getteam->name }}</a></h4>
                                                        <h5>{{ $getteam->post }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                        @foreach ($getallteam as $getteam)
                            @if ($getteam->type == 'Hiking')
                                <a href="{{ route('ourteam.details', $getteam->name) }}">
                                    <div class="tab-pane fade show " id="Hiking" role="tabpanel"
                                        aria-labelledby="plc-asia-tab">
                                        <div class="item">
                                            <div class="col-lg-3 col-md-4 col-sm-6" style="max-width: 35% !important">
                                                <div class="team-col">
                                                    <div class="thumb">
                                                        <img src="{{ $getteam->image }}" alt=""
                                                            style="width:255px;height:260px">
                                                    </div>
                                                    <div class="content text-center">
                                                        <h4><a href="{{ route('ourteam.details', $getteam->name) }}">{{ $getteam->name }}</a></h4>
                                                        <h5>{{ $getteam->post }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endforeach

                        @foreach ($getallteam as $getteam)
                            @if ($getteam->type == 'Tourguide')
                                <a href="{{ route('ourteam.details', $getteam->name) }}">
                                    <div class="tab-pane fade show " id="Tourguide" role="tabpanel"
                                        aria-labelledby="plc-asia-tab">
                                        <div class="item">
                                            <div class="col-lg-3 col-md-4 col-sm-6" style="max-width: 35% !important">
                                                <div class="team-col">
                                                    <div class="thumb">
                                                        <img src="{{ $getteam->image }}" alt=""
                                                            style="width:255px;height:260px">
                                                    </div>
                                                    <div class="content text-center">
                                                        <h4><a href="{{ route('ourteam.details', $getteam->name) }}">{{ $getteam->name }}</a></h4>
                                                        <h5>{{ $getteam->post }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                        <!-- item end -->


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- team Section End -->

    <section class="text-center pt-0 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-center">
                        {{ $getallteam->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Client Section Start -->
    <section class="client-section bg-f8 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="client_carousel" class="owl-carousel">
                        <div class="item">
                            <div class="client-img-item">
                                <img src="images/partner/1.png" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-img-item">
                                <img src="images/partner/2.png" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-img-item">
                                <img src="images/partner/3.png" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-img-item">
                                <img src="images/partner/4.png" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-img-item">
                                <img src="images/partner/5.png" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-img-item">
                                <img src="images/partner/6.png" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-img-item">
                                <img src="images/partner/2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Client Section End -->




@endsection
