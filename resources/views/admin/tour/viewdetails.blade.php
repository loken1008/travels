@extends('admin.body.master')
@section('title', 'Tour Details')
@section('content')
    <section class="content">

        <!-- Step wizard -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h4 class="box-title">View Details</h4>
                <a class="btn btn-info mt-1 "
                href="{{ route('tour.edit', $detailstour->id) }}" style="width:5rem"
                title="edit"><i class="fa fa-pencil"></i></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body wizard-content">

                <section>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Country Name :</label>
                                <span>{{ $detailstour->country->country_name }}</span>
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Place Name :</label>
                                <span>{{ $detailstour->place->place_name }}</span>
                            </div>
                        </div> --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Category Name :</label>
                                <span>{{ $detailstour->category->category_name }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Sub Category Name :</label>
                                <span>@if(!empty($detailstour->subcategory->sub_category_name)){{ $detailstour->subcategory->sub_category_name }}@endif</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Tour Name :</label>
                                <span>{{ $detailstour->tour_name }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Tour Slug :</label>
                                <span>{{ $detailstour->slug }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Altitude :</label>
                                <span>{{ $detailstour->altitude }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Tour Days :</label>
                                <span>{{ $detailstour->tour_days }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Accomodation :</label>
                                <span>{{ $detailstour->accomodation }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Transport :</label>
                                <span>{{ $detailstour->transport }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5"> Price :</label>
                                <span>{{ $detailstour->main_price }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <label for="firstName5"> Main Image :</label>
                            <div class="input-group">

                                <a href="{{ $detailstour->mainImage }}" target="_blank"><img id="holder1" style="margin-top:15px;max-height:200px;width:200px"
                                    src={{ $detailstour->mainImage }}></a>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Image Alt text :</label>
                                <span>{{ $detailstour->img_alt }}</span>
                            </div>
                        </div>
                        <div class="col-md-6 ">

                            <label for="firstName5"> Related Images :</label>

                            @forelse($detailstour->images as $image)
                                @php
                                    $imagess = explode(',', $image->images);
                                    
                                @endphp
                                <div class="d-flex">
                                @foreach ($imagess as $images)
                                <div class="input-group d-flex">
                                    <a href="{{ $images }}" target="_blank"><img src="{{ $images }}" alt="" width="200px" height="100px"
                                        style="padding-top:10px">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            @empty
                                <p>No Image</p>
                            @endforelse
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstName5">Cost Map :</label>
                              <iframe src="{{$detailstour->map_url}}" height="400" width="100%" frameborder="0"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstName5">Place Description/Image :</label>
                        <span>{!! $detailstour->description !!}</span>
                    </div>
                    <hr>
                    <h6 class="font-weight-bold">Cost Include/Exclude Section</h6>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Cost Include :</label>
                                <span>{!! $detailstour->cost_include !!}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Cost Exclude :</label>
                                <span>{!! $detailstour->cost_exclude !!}</span>
                               
                            </div>
                        </div>
                        
                    </div>
                    <hr>
                    {{-- dateprice --}}

                    @foreach ($detailstour->dateprice as $key => $dateprice)
                        <hr>
                        <h6 class="font-weight-bold">Dates/Price {{ $key + 1 }} Section</h6>
                        <div class="row dateprice" id="dynamicAddRemove">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5">Start Date :</label>
                                    <span>{{ $dateprice->start_date }}</span>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5"> End Date :</label>
                                    <span>{{ $dateprice->end_date }}</span>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5">Seats Available :</label>
                                    <span>{{ $dateprice->seats_available }}</span>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5"> Price :</label>
                                    <span>{{ $dateprice->price }}</span>

                                </div>
                            </div>
                        </div>
                    @endforeach

                    <hr>
                    {{-- equipment --}}
                    @foreach ($detailstour->equipment as $key => $equipment)
                        <hr>
                        <h6 class="font-weight-bold">Equipments {{ $key + 1 }} Section</h6>
                        <div class="row " id="equipment">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5">Equipment Name :</label>
                                    <span>{{ $equipment->equipment_name }}</span>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5"> Description :</label>
                                    <span>{!! $equipment->equipment_description !!}</span>

                                </div>
                            </div>
                        </div>
                    @endforeach

                    <hr>
                    {{-- itineries --}}
                    @foreach ($detailstour->itinerary as $key => $itineries)
                        <hr>
                        <h6 class="font-weight-bold">Itinierary {{ $key + 1 }} Section</h6>
                        <div class="row" id="itinerary">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5">Day Title :</label>
                                    <span>{{ $itineries->day_title }}</span>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName6"> Long Description :</label>
                                    <span>{!! $itineries->long_description !!}</span>

                                </div>
                            </div>
                        </div>
                    @endforeach
                     {{-- faq --}}
                     <h6 class="font-weight-bold">FAQ  Section</h6>
                     @foreach ($detailstour->fqa as $key3 => $fqas)
                     <hr>
                    
                     <div class="row" id="faq">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label for="firstName5">Question :</label>
                                 <span>{{ $fqas->question }}</span>

                             </div>
                         </div>

                         <div class="col-md-6">
                             <div class="form-group">
                                 <label for="firstName6"> Answer :</label>
                                 <span>{!! $fqas->answer !!}</span>

                             </div>
                         </div>
                     </div>
                 @endforeach
                 <div class="col-md-12">
                    <div class="form-group">
                        <label for="firstName5">Meta Title :</label>
                        <span>{{ $detailstour->meta_title }}</span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="firstName5">Meta Keywords :</label>
                        <span>{{ $detailstour->meta_keywords }}</span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="firstName5">Meta Description :</label>
                        <span>{{ $detailstour->tour_name }}</span>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </section>

@endsection
