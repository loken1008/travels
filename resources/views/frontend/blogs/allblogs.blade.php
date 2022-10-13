@php
function getblogThumbs($url = '')
{
    $base = basename($url);
    if (strpos($url, 'https://') !== false or strpos($url, 'http://') !== false) {
        return str_replace($base, 'thumbs/' . $base, $url);
    } else {
        $preUrl = 'storage/';
        $beforeBase = str_replace($base, '', $url);
        return $preUrl . $beforeBase . 'thumbs/' . $base;
    }
}
@endphp
@extends('frontend.main')
@section('title', 'All Blogs')
@section('content')


    <section class=" allblogs_section">
        <div class="container">
            <div class="row">
                @if ($getblogs->count() > 0)
                    <div class="allblogs-heading mt-6 mb-4">
                        <h2 class="populartrektitle layout2">Our Latest Blogs</h2>
                        <div class="chooseus-box layout"></div>
                    </div>
                @endif
                <div class="allblogs">
                    @forelse($getblogs as $blog)
                        <div class="col-md-6 col-lg-4 allblogs_item">
                            <a class="text-decoration-none" href="{{ route('blogsdetails', $blog->slug) }}">
                                <div class="allblogs_image">
                                    <img class="img-fluid" srcset="{{ getblogThumbs($blog->blog_image) }}"
                                        alt="{{ $blog->img_alt }}">
                                </div>
                                <div class="blogs_details">
                                    <div class="mt-3 mb-3">
                                        <span class="blogs_date">{{ $blog->created_at->format('Y-M-d') }}</span>
                                    </div>
                                    <h5 class="blogs_title">{{ Str::limit($blog->blog_title, 25) }}</h5>
    
                                    <div class="blogs_details">{!! Str::limit($blog->blog_description, 70) !!}</div>
                                    <div class="bbtn">
    
                                        <a href="{{ route('blogsdetails', $blog->slug) }}"
                                            class="blogsbtn text-decoration-none">Read
                                            More</a>
                                    </div>
    
                                </div>
                            </a>
                        </div>
    
                    @empty
                    @endforelse
    
                </div>
            </div>
        </div>
    </section>

    <section class="paginate text-center pt-0 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-center">
                        {{ $getblogs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.common.tour')
@endsection
