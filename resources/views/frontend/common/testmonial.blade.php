@php
$gettestmonial=App\Models\Testmonial::where('status',1)->orderBy('id','desc')->get();

@endphp

<div class="inner-title mt-25">
    <h2 class="text-center">Our Client's Say</h2>
    <div class="sec-line mb-40"></div>
</div>
<div class="testimonials-post testimonials_slide owl-carousel owl-theme owl-navst st-three">
    @forelse($gettestmonial as $testmonial)
    <div class="testimonials-item">
        <div class="thumb">
            <img src="{{$testmonial->image}}" alt="">
        </div>
        <div class="content">
            <h5>{{$testmonial->name}} <small>- {{$testmonial->message_title}}</small></h5>
            <ul>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
                <li><a href="#"><i class="fa  fa-star-o"></i></a></li>
            </ul>
            <p><i class="fa fa-quote-left"></i> {{$testmonial->message_description}}</p>
        </div>
    </div>
  @empty
  @endforelse
</div>