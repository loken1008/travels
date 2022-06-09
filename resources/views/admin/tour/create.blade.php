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
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="mapurl"> Map Url :</label>
                                <input type="text" class="form-control" id="mapurl" value="{{ old('map_url') }}"
                                    name="map_url">
                                {{-- @error('map_url')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror --}}
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="description">Place Description/Image :<span class="text-danger">*</span></label>
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
                                    <label for="seatsavailable">Seats Available :<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="seatsavailable" name="seats_available[]">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price"> Price :</label>
                                    <input type="text" class="form-control" id="price" name="price[]">

                                </div>
                            </div>

                            <div class="">
                                <a href="javascript:void(0)" id="dynamic-ar"
                                    class="btn btn-rounded btn-success pull-right addMore"></span>
                                    Add More</a>
                                {{-- <a href="#" name="add" id="dynamic-ar" class="btn btn-rounded btn-success pull-right">Add
                                </a> --}}
                            </div>
                        </div>


                        <hr>
                        {{-- equipment --}}
                        <h6 class="font-weight-bold">Equipments Section</h6>
                        <div class="row " id="equipment">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="equipmentname">Equipment Name :<span
                                            class="text-danger">*</span></label>
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
                            <div class="">
                                <a href="javascript:void(0)" id="addequipment"
                                    class="btn btn-rounded btn-success pull-right addMoreequipment"></span>
                                    Add More</a>
                            </div>
                        </div>


                        <hr>
                        {{-- itineries --}}
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
                            <div class="">
                                <a href="javascript:void(0)" class="btn btn-rounded btn-success pull-right "
                                    id="addMoreitinerary"></span>
                                    Add More</a>
                            </div>
                        </div>
                        {{-- itineries --}}
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
                            <div class="col-md-12" >
                                <a href="javascript:void(0)" style="float:left"
                                    class="btn btn-rounded btn-success pull-right " id="add_field_button"></span>
                                    Add More</a>
                            </div>

                        </div>


                        <div class="box-footer">
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
    <script src="{{asset('assets/vendor_components/ckeditor/ckeditor.js')}}"></script>
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
    </script>

    <script>
        var route_prefix = "mountainguide-filemanager";
        $('#lfms').filemanager('images', {
            prefix: route_prefix
        });
    </script>
    
    <script>
        $(document).ready(function() {
            $('select[name="country_id"]').on('change', function() {
                var country_id = $(this).val();
                if (country_id) {
                    $.ajax({
                        url: "/place/ajax/" + country_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="place_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="place_id"]').append(
                                    
                                    '<option value="' + value.id + '">' + value
                                    .place_name + '</option>');
                            });
                        }
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "/subcategory/ajax/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="subcategory_id"]').empty();
                            $('select[name="subcategory_id"]').append(
                                '<option value="">Select Sub Category</option>');
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                   
                                    '<option value="' + value.id + '">' + value
                                    .sub_category_name + '</option>');
                            });
                        }
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>

  <script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function() {
        i++;
        $("#dynamicAddRemove").append('<div class="box-body wizard-content"><section><div class="row dateprices" ><div class="col-md-6"><div class="form-group"><label for="firstName5">Start Date :</label><input class="form-control" id="id_ct' + i + '" name="start_date[]" type="date" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"></div></div><div class="col-md-6"><div class="form-group"><label for="firstName5"> End Date :</label><input class="form-control" id="id_ed' + i + '" name="end_date[]" type="date" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"></div> </div><div class="col-md-6"><div class="form-group"><label for="firstName5">Seats Available :</label><input type="text" class="form-control" id="firstName5"name="seats_available[]"></div></div> <div class="col-md-6"><div class="form-group"> <label for="firstName5"> Price :</label><input type="text" class="form-control" id="firstName5"name="price[]"></div></div> <div class=""><a href="#" class="btn btn-rounded btn-danger pull-right remove-input-field">Remove</a></div></div></section></div>'

        );
    });
    $(document).on('click', '.remove-input-field', function() {
        $(this).parents('.dateprices').remove();
    });
</script>

<script type="text/javascript">
    var max_fields = 20;
    var i = 1;
    $("#addequipment").click(function(e) {
                e.preventDefault();
                if (i < max_fields) {
                    i++;
                    var editorId = "editor3" +i;
                    $("#equipment").append(
                        '<div class="box-body wizard-content"> <section><div class="row equipmentCopy"> <div class="col-md-6">  <div class="form-group"> <label for="firstName5">Equipment Name :</label> <input type="text" class="form-control" id="firstName5" name="equipment_name[]"></div></div><div class="col-md-6"><div class="form-group"><label for="firstName5"> Description :</label> <textarea id="'+editorId+'"  name="equipment_description[]" rows="10" cols="80"></textarea></div> </div><div class=""> <a href="javascript:void(0)" class="btn btn-rounded btn-danger pull-right remove-equipment-field">Remove</a></div> </div> </section></div>'
                    );
                    CKEDITOR.replace(editorId);
                }

                }); $(document).on('click', '.remove-equipment-field', function() {
                $(this).parents('.equipmentCopy').remove();
            });
</script>

<script type="text/javascript">
  var max_fields = 20;
    var i = 1;
    $("#addMoreitinerary").click(function(e) {
        e.preventDefault();
                if (i < max_fields) {
                    i++;
                    var editorId1 = "editor4" +i;
        $("#itinerary").append(

            '<div class="box-body wizard-content"><section><div class="row itineraryCopy"><div class="col-md-6"><div class="form-group"><label for="firstName5">Day Title :</label><input type="text" class="form-control" id="firstName5" name="day_title[]"></div>  </div><div class="col-md-6"><div class="form-group"><label for="firstName5"> Long Description :</label><textarea id="'+editorId1+'" name="long_description[]" rows="10" cols="80"> </textarea></div></div>  <div class=""> <a href="javascript:void(0)" class="btn btn-rounded btn-danger pull-right removeitinerary">Remove</a></div></div></section> </div>'
        );
        CKEDITOR.replace(editorId1);
        }
    });
    $(document).on('click', '.removeitinerary', function() {
        $(this).parents('.itineraryCopy').remove();
    });
</script>
<script>
     var max_fields = 10; 
          
            var x = 1; 
            $("#add_field_button").click(function(e) { 
                e.preventDefault();
                if (x < max_fields) { 
                    x++; 
                    $("#faq").append('<div class="box-body wizard-content"><section><div class="row faqcopy"> <div class="col-md-12"> <div class="form-group"> <label for="question">Question</label><input type="text" name="question[]"  id="id_ct' + x + '" class="form-control"> </div></div> <div class="col-md-12"> <div class="form-group"> <label for="answer"> Answer :</label> <textarea id="id_ct' + x + '" class="form-control" name="answer[]" rows="10" cols="10"></textarea></div> </div><div class=""> <a href="#" class="remove_field btn btn-rounded btn-danger pull-right">Remove</a> </div></div>  </section> </div>'); //add input box
                }
            });


            $(document).on('click', '.remove_field', function() {
        $(this).parents('.faqcopy').remove();
    });
</script>

@endsection
