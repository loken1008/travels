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
                @foreach ($getallteam as $getteam)
                       
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="team-col">
                        <div class="thumb">
                            <img src="{{ $getteam->image }}" alt="{{$getteam->name}}" style="height:260px; width:255px">
                        </div>
                        <div class="content text-center">
                            <h4><a href="{{ route('ourteam.details', Str::slug($getteam->name)) }}">{{ $getteam->name }}</a></h4>
                            <h5>{{ $getteam->post }}</h5>
                        </div>
                    </div>
                </div>
                @endforeach


              
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
@endsection
