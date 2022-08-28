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
                                    <input type="text" class="form-control" id="tourname"
                                        value="{{ old('tour_name') }}" name="tour_name">
                                    @error('tour_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="checkbox" name="is_best_selling" value="1"> Is Best Selling
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="firstName5">Type :</label>
                                    <select class="form-control" id="firstName5" name="type">
                                        <option value="">Select Type </option>
                                        <option value="tripofthemonth" >Trip Of The Month</option>
                                        <option value="group" >Group</option>
                                        <option value="bestsell" >Best Seller</option>
                                        <option value="private" >Private</option>
                                        <option value="family" >Family</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="grade">Activity :</label>
                                    <input type="text" class="form-control" id="activity"
                                        value="{{ old('activity') }}" name="activity">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="grade">Grade :</label>
                                    <input type="text" class="form-control" id="grade"
                                        value="{{ old('grade') }}" name="grade">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="region">Region :</label>
                                    <input type="text" class="form-control" id="region"
                                        value="{{ old('region') }}" name="region">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="meal">Meal :</label>
                                    <input type="text" class="form-control" id="meal"
                                        value="{{ old('meal') }}" name="meal">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bestmonth">Best Month :</label>
                                    <input type="text" class="form-control" id="best_month"
                                        value="{{ old('best_month') }}" name="best_month">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="startend">Start End Day :</label>
                                    <input type="text" class="form-control" id="start_end"
                                        value="{{ old('start_end') }}" name="start_end">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="groupsize">Group Size :</label>
                                    <input type="text" class="form-control" id="group_size"
                                        value="{{ old('group_size') }}" name="group_size">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="altitude">Altitude :</label>
                                    <input type="text" class="form-control" id="altitude"
                                        value="{{ old('altitude') }}" name="altitude">

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
                                    <input type="text" class="form-control" id="price"
                                        value="{{ old('main_price') }}" name="main_price">
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
                                <label for="firstName5"> Image Alt Text :</label>
                                <div class="input-group">

                                    <input id="img_alt" class="form-control" type="text" name="img_alt">

                                </div>
                            </div>
                            <div class="col-md-6">

                                <label for="firstName5"> Related Images :</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder"
                                            class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="images">
                                </div>
                                <img id="holder" style="margin-top:15px;max-height:100px;">

                            </div>
                            <div class="col-md-6">
                                <label for="firstName5"> Trip Map :</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                            <a id="tlfms" data-input="tripthumbnail" data-preview="holder2"
                                                class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                    </span>
                                    <input  id="tripthumbnail" class="form-control" type="text" name="trip_map">
    
                                </div>
                                <img id="holder2" style="margin-top:15px;max-height:100px;">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="mapurl"> Map Url :</label>
                            <input type="text" class="form-control" id="mapurl" value="{{ old('map_url') }}"
                                name="map_url">
                        </div>

                        <div class="form-group ">
                            <label for="description">Short Description :<span class="text-danger">*</span></label>
                            <textarea class="form-control " name="short_description" value={{ old('short_description') }}>{{ old('short_description') }}</textarea>

                            @error('short_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label for="description"> Description :<span class="text-danger">*</span></label>
                            <textarea id="my-editor" class="form-control " name="description" value={{ old('description') }}>{{ old('description') }}</textarea>

                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <hr>
                        <h6 class="font-weight-bold">Cost Include/Exclude Section</h6>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="costinclude">Cost Include :</label>
                                    <textarea id="editor1" name="cost_include" rows="10" cols="80" value={{ old('cost_include') }}>
                                        {{ old('cost_include') }}
                                    </textarea>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="costexclude">Cost Exclude :</label>
                                    <textarea id="editor2" name="cost_exclude" rows="10" cols="80" value={{ old('cost_exclude') }}>
                                        {{ old('cost_exclude') }}
                                  </textarea>

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
                                        <input type="text" class="form-control" id="seatsavailable"
                                            name="seats_available[]">

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
                        <div style="margin-top:60px">
                            <h6 class="font-weight-bold">Equipments Section</h6>
                            <div class="row " id="equipment">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="equipmentname">Equipment Name :</label>
                                        <input type="text" class="form-control" id="equipmentname"
                                            name="equipment_name[]">

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
                            <h6 class="font-weight-bold">Itinerary Section</h6>
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
                                <a href="javascript:void(0)" class="btn btn-rounded btn-success pull-left "
                                    id="add_field_button"></span>
                                    Add More</a>
                            </div>
                        </div>
                        <div style="margin-top:80px">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="metatitle"> Meta Title :</label>
                                        <input type="text" class="form-control" id="metatitle"
                                            value="{{ old('meta_title') }}" name="meta_title">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="metakeywords"> Meta Keywords :</label>
                                        <input type="text" class="form-control" id="metakeywords"
                                            value="{{ old('meta_keywords') }}" name="meta_keywords">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="metadescription"> Meta Description :</label>
                                        <textarea type="text" class="form-control" id="metadescription" value="{{ old('meta_description') }}"
                                            name="meta_description">{{ old('meta_description') }}</textarea>
                                    </div>
                                </div>
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

    {{-- <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script> --}}
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/mgiadmin/mountainguide-filemanager?type=Images',
            filebrowserImageUploadUrl: '/mgiadmin/mountainguide-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/mgiadmin/mountainguide-filemanager?type=Files',
            filebrowserUploadUrl: '/mgiadmin/mountainguide-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace('my-editor', options);
    </script>

    <script>
        var route_prefix = "/mgiadmin/mountainguide-filemanager";
        $('#lfm').filemanager('images', {
            prefix: route_prefix
        });
        $('#lfms').filemanager('images', {
            prefix: route_prefix
        });
        $('#tlfms').filemanager('images', {
            prefix: route_prefix
        });
    </script>
    <script>
        var i = 0;
        var x = 1;

        $("#dynamic-ar").click(function() {
            i++;
            $("#dynamicAddRemove").append(
                '<div class="box-body wizard-content"><section><div class="row dateprices" ><div class="col-md-6"><div class="form-group"><label for="firstName5">Start Date :</label><input class="form-control" id="id_ct' +
                i +
                '" name="start_date[]" type="date" ></div></div><div class="col-md-6"><div class="form-group"><label for="firstName5"> End Date :</label><input class="form-control" id="id_ed' +
                i +
                '" name="end_date[]" type="date" ></div> </div><div class="col-md-6"><div class="form-group"><label for="firstName5">Seats Available :</label><input type="text" class="form-control" id="firstName5"name="seats_available[]"></div></div> <div class="col-md-6"><div class="form-group"> <label for="firstName5"> Price :</label><input type="text" class="form-control" id="firstName5"name="price[]"></div></div> <div class="">  <a href="#" class="btn btn-rounded btn-danger pull-right remove-input-field">Remove</a></div></div></section></div>'

            );
        });

        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('.dateprices').remove();
        });


        $("#addequipment").click(function(e) {

            i++;
            var editorId = "editor3" + i;
            $("#equipment").append(
                '<div class="box-body wizard-content"> <section><div class="row equipmentCopy"> <div class="col-md-6">  <div class="form-group"> <label for="firstName5">Equipment Name :</label> <input type="text" class="form-control" id="firstName5" name="equipment_name[]"></div></div><div class="col-md-6"><div class="form-group"><label for="firstName5"> Description :</label> <textarea id="' +
                editorId +
                '"  name="equipment_description[]" rows="10" cols="80"></textarea></div> </div><div class=""> <a href="javascript:void(0)" class="btn btn-rounded btn-danger pull-right remove-equipment-field">Remove</a></div> </div> </section></div>'
            );
            CKEDITOR.replace(editorId);
        });

        $(document).on('click', '.remove-equipment-field', function() {
            $(this).parents('.equipmentCopy').remove();
        });


        $("#addMoreitinerary").click(function(e) {

            i++;
            var editorId1 = "editor4" + i;
            $("#itinerary").append(

                '<div class="box-body wizard-content"><section><div class="row itineraryCopy"><div class="col-md-6"><div class="form-group"><label for="firstName5">Day Title :</label><input type="text" class="form-control" id="firstName5" name="day_title[]"></div>  </div><div class="col-md-6"><div class="form-group"><label for="firstName5"> Long Description :</label><textarea id="' +
                editorId1 +
                '" name="long_description[]" rows="10" cols="80"> </textarea></div></div>  <div class=""> <a href="javascript:void(0)" class="btn btn-rounded btn-danger pull-right removeitinerary">Remove</a></div></div></section> </div>'
            );
            CKEDITOR.replace(editorId1);

        });

        $(document).on('click', '.removeitinerary', function() {
            $(this).parents('.itineraryCopy').remove();
        });


        $("#add_field_button").click(function(e) {


            x++;
            $("#faq").append(
                '<div class="box-body wizard-content"><section><div class="row faqcopy"> <div class="col-md-6"> <div class="form-group"> <label for="question">Question</label><input type="text" name="question[]"  id="id_ct' +
                x +
                '" class="form-control"> </div></div> <div class="col-md-6"> <div class="form-group"> <label for="answer"> Answer :</label> <textarea id="id_ct' +
                x +
                '" class="form-control" name="answer[]" rows="10" cols="10"></textarea></div> </div><div class=""><a href="#" class="remove_field btn btn-rounded btn-danger pull-right">Remove</a> </div></div>  </section> </div>'
            ); //add input box

        });


        $(document).on('click', '.remove_field', function() {
            $(this).parents('.faqcopy').remove();
        });


        //editpart

        $("#dynamic-ar").click(function() {
            i++;
            $("#dynamicAddRemove2").append(
                '<div class="box-body wizard-content"><section><div class="row dateprices" ><div class="col-md-6"><div class="form-group"><label for="firstName5">Start Date :</label><input class="form-control" id="id_ct' +
                i +
                '" name="start_date[]" type="date" ></div></div><div class="col-md-6"><div class="form-group"><label for="firstName5"> End Date :</label><input class="form-control" id="id_ed' +
                i +
                '" name="end_date[]" type="date" ></div> </div><div class="col-md-6"><div class="form-group"><label for="firstName5">Seats Available :</label><input type="text" class="form-control" id="firstName5"name="seats_available[]"></div></div> <div class="col-md-6"><div class="form-group"> <label for="firstName5"> Price :</label><input type="text" class="form-control" id="firstName5"name="price[]"></div></div> <div class="">  <a href="#" class="btn btn-rounded btn-danger pull-right remove-input-field">Remove</a></div></div></section></div>'

            );
        });
        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('.dateprices').remove();
        });


        $("#equipment-add").click(function(e) {

            i++;
            var editorId = "editor5" + i;
            $("#equipmentAdd").append(
                '<div class="box-body wizard-content"> <section><div class="row editequipmentCopy"> <div class="col-md-12">  <div class="form-group"> <label for="firstName5">Equipment Name :</label> <input type="text" class="form-control" id="firstName5" name="equipment_name[]"></div></div><div class="col-md-12"><div class="form-group"><label for="firstName5"> Description :</label> <textarea id="' +
                editorId +
                '"  name="equipment_description[]" rows="10" cols="80"></textarea></div> </div><div class=""> <a href="javascript:void(0)" class="btn btn-rounded btn-danger pull-right remove-equipment-field">Remove</a></div> </div> </section></div>'
            );
            CKEDITOR.replace(editorId);
        });

        $(document).on('click', '.remove-equipment-field', function() {
            $(this).parents('.editequipmentCopy').remove();
        });


        $("#add-itineries").click(function(e) {

            i++;
            var editorId1 = "editor6" + i;
            $("#itineraryAdd").append(

                '<div class="box-body wizard-content"><section><div class="row eitineraryCopy"><div class="col-md-12"><div class="form-group"><label for="firstName5">Day Title :</label><input type="text" class="form-control" id="firstName5" name="day_title[]"></div>  </div><div class="col-md-12"><div class="form-group"><label for="firstName5"> Long Description :</label><textarea id="' +
                editorId1 +
                '" name="long_description[]" rows="10" cols="80"> </textarea></div></div>  <div class=""> <a href="javascript:void(0)" class="btn btn-rounded btn-danger pull-right removeitinerary">Remove</a></div></div></section> </div>'
            );
            CKEDITOR.replace(editorId1);

        });

        $(document).on('click', '.removeitinerary', function() {
            $(this).parents('.eitineraryCopy').remove();
        });


        $("#faq-add").click(function(e) {


            x++;
            $("#faqAdd").append(
                '<div class="box-body wizard-content"><section><div class="row efaqcopy"> <div class="col-md-12"> <div class="form-group"> <label for="question">Question</label><input type="text" name="question[]"  id="id_ct' +
                x +
                '" class="form-control"> </div></div> <div class="col-md-12"> <div class="form-group"> <label for="answer"> Answer :</label> <textarea id="id_ct' +
                x +
                '" class="form-control" name="answer[]" rows="10" cols="10"></textarea></div> </div><div class=""><a href="#" class="remove_field btn btn-rounded btn-danger pull-right">Remove</a> </div></div>  </section> </div>'
            ); //add input box

        });


        $(document).on('click', '.remove_field', function() {
            $(this).parents('.efaqcopy').remove();
        });

        // costincludes
        $("#addMoreCostinclude").click(function(e) {


            x++;
            $("#costincludeAdd").append(
                '<div class="ecostncludecopy"> <div class="col-md-12 mt-4"> <div class="form-group"> <input type="text" class="form-control" id ="costinclude" name="cost_include[]" /> </div > </div > <div class= "" >  <a href="#"class="removecostinclude_field btn btn-rounded btn-danger pull-right" style="float:left;margin-bottom:10px"> Remove </a> </div> </div> '
            ); //add input box

        });


        $(document).on('click', '.removecostinclude_field', function() {
            $(this).parents('.ecostncludecopy').remove();
        });

        // costexlude
        $("#addMoreCostexclude").click(function(e) {


            x++;
            $("#costexcludeAdd").append(
                '<div class="ecostexcludecopy"> <div class="col-md-12 mt-4"> <div class="form-group"> <input type="text" class="form-control" id ="costinclude" name="cost_exclude[]" /> </div > </div > <div class= "" >  <a href="#"class="removecostexclude_field btn btn-rounded btn-danger pull-right" style="float:left;margin-bottom:10px"> Remove </a> </div> </div> '
            ); //add input box

        });


        $(document).on('click', '.removecostexclude_field', function() {
            $(this).parents('.ecostexcludecopy').remove();
        });
    </script>
@endsection
