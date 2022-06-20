@extends('frontend.main')
<style>
    .read-more-show {
        cursor: pointer;
        color: #ed8323;
    }

    .read-more-hide {
        cursor: pointer;
        color: #ed8323;
    }

    .hide_content {
        display: none;
    }
</style>
@section('title', 'Team Details')
@section('content')


    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg" @if(!empty($teambanner->page_banner))data-background="{{asset($teambanner->page_banner)}}" @endif data-type="parallax" data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        <h4>Our Team</h4>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner Section End -->

    <!-- Contact Section Start -->
    <section class="contact-section pt-90 pb-80">
        <div class="container">
            <h2 class="text-dark">Our Experienced and Skilled Team</span></h2>
            @foreach ($getteamdetails as $teamdetails)
                @if ($loop->iteration % 2 !== 0)
                    <div class="row ">
                        <div class="col-md-12 col-lg-4 p-0">
                            <div class="">

                                <div class="sec-line mb-20"></div>
                                <img class="mt-1" src="{{ $teamdetails->image }}"
                                    alt="{{ $teamdetails->name }}" style="height:300px;padding-top:11px">

                            </div>
                        </div>
                        <div class="col-md-12 col-lg-8 style-2 mt-3">
                            <div class="ml-4 mt-4">
                                <h5 class="font-weight-bold" style="width:100%!important">{{ $teamdetails->name }}</h5>
                                <h6 class="font-weight-bold pt-2" style="width:100%!important"> {{ $teamdetails->post }}
                                </h6>
                                <h6 class="font-weight-bold pt-2" style="width:100%!important">Language:
                                    {{ $teamdetails->language }}</h6>
                                <h6 class="font-weight-bold pt-2" style="width:100%!important">Experiences:
                                    {{ $teamdetails->experiences }} </h6>
                            </div>
                            <div class="tab-content large-content" id="nav-tabContent" style="    text-align: justify;
                                padding: 0px 0px 20px 27px;">
                                <div class="visible-content" style="text-align: justify">
                                    <p class="mb-25" style="text-align: justify"> {!! Str::limit($teamdetails->description, 400, '') !!}</p>
                                </div>
                                <div class="invisible-content">
                                    <p>{!! $teamdetails->description !!}</p>
                                </div>
                                <button style="border-radius:0px" class="btn-theme more-less">Read More</button>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row ">
                        <div class="col-md-12 col-lg-8 style-2 mt-3">
                            <div class=" mt-4">
                                <h5 class="font-weight-bold" style="width:100%!important">{{ $teamdetails->name }}</h5>
                                <h6 class="font-weight-bold pt-2" style="width:100%!important"> {{ $teamdetails->post }}
                                </h6>
                                <h6 class="font-weight-bold pt-2" style="width:100%!important">Language:
                                    {{ $teamdetails->language }}</h6>
                                <h6 class="font-weight-bold pt-2" style="width:100%!important">Experiences:
                                    {{ $teamdetails->experiences }} </h6>
                            </div>
                            <div class="tab-content large-content" id="nav-tabContent" style="text-align: justify;
                                padding: 0px 27px 20px 0px;">
                                <div class="visible-content" style="text-align: justify">
                                    <p class="mb-25" style="text-align: justify"> {!! Str::limit($teamdetails->description, 400, '') !!}</p>
                                </div>
                                <div class="invisible-content">
                                    <p>{!! $teamdetails->description !!}</p>
                                </div>
                                <button style="border-radius:0px" class="btn-theme more-less">Read More</button>
                            </div>

                        </div>
                        <div class="col-md-12 col-lg-4 p-0">
                            <div class="">

                                <div class="sec-line mb-20"></div>
                                <img class="mt-1" src="{{ $teamdetails->image }}"
                                    alt="{{ $teamdetails->name }}" style="height:300px;padding-top:11px">

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
    <!-- Contact Section End -->

    <!-- Special Places Section Start -->
    @include('frontend.common.tour')
    <!-- Special Places Section End -->

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".invisible-content").hide();
            $(document).on('click', '.btn-theme', function() {
                var moreLessButton = $(".invisible-content").is(':visible') ? 'Read More' : 'Read Less';
                $(this).text(moreLessButton);
                $(this).parent('.large-content').find(".invisible-content").toggle();
                $(this).parent('.large-content').find(".visible-content").toggle();
            });
        });
    </script>


@endsection
