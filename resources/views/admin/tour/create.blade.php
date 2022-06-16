@extends('admin.body.master')
@section('title', 'Tour')
@section('content')
    <section class="content">

        <!-- Step wizard -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h4 class="box-title">Add Tour Place</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body wizard-content">
                <form action="{{ route('tour.store') }}" method="post" class="tab-wizard wizard-circle"
                    enctype="multipart/form-data" id="tourForm" name="tourForm">
                    @csrf

                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5">Country Name :<span class="text-danger">*</span></label>
                                    <select class="form-control" id="country" name="country_id">
                                        <option value="">Select Country</option>
                                        @foreach ($getcountry as $country)
                                            <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="place">Place Name :</label>
                                    <select class="form-control" id="firstName5" name="place_id">

                                    </select>
                                    @error('place_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input type="text" class="form-control" id="place" value="{{ old('place_id') }}"
                                    name="place_id">
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5"> Category :<span class="text-danger">*</span></label>
                                    <select class="form-control" id="category" name="category_id">
                                        <option value="">Select Category</option>
                                        @foreach ($getcategory as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5">SubCategory Name :</label>
                                    <select class="form-control" id="firstName5" name="subcategory_id">
                                        <option value="">Select Sub Category</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tourname"> Tour Name :<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="tourname" value="{{ old('tour_name') }}"
                                        name="tour_name">
                                    @error('tour_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5">Tour Type :<span class="text-danger">*</span></label>
                                    <select class="form-control" id="firstName5" name="type">
                                        <option value="">Select Tours </option>
                                        <option value="trip">Trip</option>
                                        <option value="package">Package</option>
                                        <option value="activities">Activities</option>
                                    </select>
                                    @error('type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="altitude">Altitude :</label>
                                    <input type="text" class="form-control" id="altitude" value="{{ old('altitude') }}"
                                        name="altitude">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tourdays">Tour Days :<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="tourdays"
                                        value="{{ old('tour_days') }}" name="tour_days">
                                    @error('tour_days')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="accomodation">Accomodation :</label>
                                    <input type="text" class="form-control" id="accomodation"
                                        value="{{ old('accomodation') }}" name="accomodation">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="transport">Transport :</label>
                                    <input type="text" class="form-control" id="transport"
                                        value="{{ old('transport') }}" name="transport">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price"> Price :<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="price" value="{{ old('main_price') }}"
                                        name="main_price">
                                    @error('main_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">

                                <label for="firstName5"> Main Image :<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfms" data-input="mainthumbnail" data-preview="holder"
                                            class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                    </span>
                                    <input id="mainthumbnail" class="form-control" type="text" name="mainImage">

                                </div>
                                <img id="holder1" style="margin-top:15px;max-height:100px;">
                                @error('mainImage')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">

                                <label for="firstName5"> Related Images :</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="images">
                                </div>
                                <img id="holder" style="margin-top:15px;max-height:100px;">

                            </div>
                        </div>
                       
                            <div class="form-group">
                                <label for="mapurl"> Map Url :</label>
                                <input type="text" class="form-control" id="mapurl" value="{{ old('map_url') }}"
                                    name="map_url">
                                {{-- @error('map_url')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror --}}
                            </div>
                       

                        <div class="form-group ">
                            <label for="description">Place Description/Image :<span class="text-danger">*</span></label>
                            <textarea id="my-editor" class="form-control " name="description" value={{ old('description') }}>{{ old('description') }}</textarea>

                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="costexclude">Cost Include :</label>
                                    <select name="cost_include[]" multiple id=""  class="form-control" style="overflow: auto;height:140px">
                                        <option value="">Select Cost Include Values</option>
                                       @foreach($costinclude as $key=> $costi)
                                        <option value="{{ $costi->cost_include }}">{{$key+1}}.{{ $costi->cost_include }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="costexclude">Cost Exclude :</label>
                                    <select name="cost_exclude[]" multiple id=""  class="form-control" style="overflow: auto;height:140px">
                                        <option value="">Select Cost Exclude Values </option>
                                       @foreach($costexclude as $key=> $coste)
                                        <option value="{{ $coste->cost_exclude }}">{{$key+1}}.{{ $coste->cost_exclude  }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <hr>
                        {{-- dateprice --}}
                        <div>
                        <h6 class="font-weight-bold">Dates/Price</h6>
                        <div class="row dateprice" id="dynamicAddRemove">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="startdate">Start Date :</label>
                                    <input class="form-control" name="start_date[]" type="date"
                                        min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" id="id_ct">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="enddate"> End Date :</label>
                                    <input class="form-control" id="id_ed" name="end_date[]" type="date"
                                        min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="seatsavailable">Seats Available :</label>
                                    <input type="text" class="form-control" id="seatsavailable" name="seats_available[]">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price"> Price :</label>
                                    <input type="text" class="form-control" id="price" name="price[]">

                                </div>
                            </div>

                        </div>


                        <div class="" style="margin-left:-9px !important ">
                            <a href="javascript:void(0)" id="dynamic-ar"
                                class="btn btn-rounded btn-success pull-left addMore"></span>
                                Add More</a>
                            {{-- <a href="#" name="add" id="dynamic-ar" class="btn btn-rounded btn-success pull-right">Add
                            </a> --}}
                        </div>
                    </div>
                        <hr>
                        {{-- equipment --}}
                        <div  style="margin-top:60px">
                        <h6 class="font-weight-bold">Equipments Section</h6>
                        <div class="row " id="equipment">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="equipmentname">Equipment Name :</label>
                                    <input type="text" class="form-control" id="equipmentname" name="equipment_name[]">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edescription"> Description :</label>
                                    <textarea id="editor3" name="equipment_description[]" rows="10" cols="80">

                                    </textarea>

                                </div>
                            </div>
                           
                        </div>
                        <div class="" style="margin-left:-9px !important">
                            <a href="javascript:void(0)" id="addequipment"
                                class="btn btn-rounded btn-success pull-left addMoreequipment"></span>
                                Add More</a>
                        </div>
                    </div>
                        <hr>
                        {{-- itineries --}}
                        <div style="margin-top:60px">
                        <h6 class="font-weight-bold">Itinierary Section</h6>
                        <div class="row" id="itinerary">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="daytitle">Day Title :</label>
                                    <input type="text" class="form-control" id="daytitle" name="day_title[]">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="longdescription"> Long Description :<span
                                            class="text-danger">*</span></label>
                                    <textarea id="editor4" name="long_description[]" rows="10" cols="80">

                                    </textarea>

                                </div>
                            </div>
                            
                        </div>
                        <div class="" style="margin-left:-9px !important">
                            <a href="javascript:void(0)" class="btn btn-rounded btn-success pull-left "
                                id="addMoreitinerary"></span>
                                Add More</a>
                        </div>
                    </div>
                        {{-- itineries --}}
                        <div style="margin-top:60px">
                        <h6 class="font-weight-bold mt-4">FAQ</h6>
                        <div class="row " id="faq">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Question :</label>

                                    <input type="text" name="question[]" class=" form-control" id="id_ct0">


                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5"> Answer :</label>
                                    <textarea class="form-control" name="answer[]" rows="10" cols="10"></textarea>

                                </div>
                            </div>
                           
                        </div>

                        <div class="" style="margin-left:-9px !important">
                            <a href="javascript:void(0)" 
                                class="btn btn-rounded btn-success pull-left " id="add_field_button"></span>
                                Add More</a>
                        </div>
                    </div>
                        <div class="box-footer" style="margin-top:60px">
                            <input id="submit-templateeditor" type="submit" class="btn btn-rounded btn-info pull-right"
                                value="Add Tour">
                        </div>
                    </section>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('assets/vendor_components/ckeditor/ckeditor.js') }}"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/mountainguide-filemanager?type=Images',
            filebrowserImageUploadUrl: '/mountainguide-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/mountainguide-filemanager?type=Files',
            filebrowserUploadUrl: '/mountainguide-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace('my-editor', options);
    </script>

    <script>
        var route_prefix = "mountainguide-filemanager";
        $('#lfm').filemanager('images', {
            prefix: route_prefix
        });
         $('#lfms').filemanager('images', {
            prefix: route_prefix
        });
    </script>

@endsection
