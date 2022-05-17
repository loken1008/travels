@extends('admin.body.master')
@section('title', 'HomePage')
@section('content')
<?php 
$tours=App\Models\Tour::count();
$category=App\Models\Category::count();
$country=App\Models\Country::count();
$places=App\Models\Place::count();
$booking=App\Models\Booking::count();
$blog=App\Models\Blog::count();
$gallery=App\Models\Gallery::count();
?>
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xl-2 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-primary-light rounded w-60 h-60">
                                <i class="fa  fa-institution"></i>
                            </div>
                            <div>
                                <p class="text-dark mt-20 mb-0 font-size-16">Total Tours</p>
                                <h3 class="text-white mb-0 font-weight-500">{{$tours}}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-warning-light rounded w-60 h-60">
                                <i class="fa fa-bars"></i>
                            </div>
                            <div>
                                <p class="text-dark mt-20 mb-0 font-size-16">Total Category</p>
                                <h3 class="text-white mb-0 font-weight-500">{{$category}}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-info-light rounded w-60 h-60">
                                <i class="fa fa-address-book"></i>
                            </div>
                            <div>
                                <p class="text-dark mt-20 mb-0 font-size-16">Total Country</p>
                                <h3 class="text-white mb-0 font-weight-500">{{$country}}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-info-light rounded w-60 h-60">
                                <i class="fa fa-address-book"></i>
                            </div>
                            <div>
                                <p class="text-dark mt-20 mb-0 font-size-16">Total Place</p>
                                <h3 class="text-white mb-0 font-weight-500">{{$places}}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-danger-light rounded w-60 h-60">
                                <i class="fa fa-book"></i>
                            </div>
                            <div>
                                <p class="text-dark mt-20 mb-0 font-size-16">Total Booking </p>
                                <h3 class="text-white mb-0 font-weight-500">{{$booking}}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-success-light rounded w-60 h-60">
                                <i class="fa fa-newspaper-o"></i>
                            </div>
                            <div>
                                <p class="text-dark mt-20 mb-0 font-size-16">Total Blog</p>
                                <h3 class="text-white mb-0 font-weight-500">{{$blog}}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-light rounded w-60 h-60">
                                <i class="fa fa-cloud-upload"></i>
                            </div>
                            <div>
                                <p class="text-dark mt-20 mb-0 font-size-16">Gallery</p>
                                <h3 class="text-white mb-0 font-weight-500">{{$gallery}}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
             
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
