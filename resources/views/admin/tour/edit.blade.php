@extends('admin.body.master')
@section('title', 'Tour')
@section('content')
    <section class="content">

        <!-- Step wizard -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h4 class="box-title">Update Tour Place</h4>
                <a class="btn btn-primary "
                href="{{ route('tour.viewdetails', $edittour->id) }}" style="width:5rem"
                title="edit"><i class="fa fa-eye"></i></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body wizard-content">
                <form action="{{ route('tour.update', $edittour->id) }}" method="post" class="tab-wizard wizard-circle"
                    enctype="multipart/form-data" id="edittourForm">
                    @csrf

                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5">Country Name :<span class="text-danger">*</span></label>
                                    <select class="form-control" id="firstName5" name="country_id">
                                        @foreach ($getcountry as $country)
                                            <option value="{{ $country->id }}"
                                                {{ $edittour->country_id == $country->id ? 'selected' : '' }}>
                                                {{ $country->country_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5">Place Name :<span class="text-danger">*</span></label>
                                    <select class="form-control" id="firstName5" name="place_id">
                                        @foreach ($getplace as $place)
                                            <option value="{{ $place->id }}"
                                                {{ $edittour->place_id == $place->id ? 'selected' : '' }}>{{ $place->place_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('place_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5"> Category :<span class="text-danger">*</span></label>
                                    <select class="form-control" id="firstName5" name="category_id">
                                        <option value="">Select Category</option>
                                        @foreach ($getcategory as $category)
                                            <option value="{{ $category->id }}" {{$category->id==$edittour->category_id?'selected':''}}>{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5">SubCategory Name :<span class="text-danger">*</span></label>
                                    <select class="form-control" id="firstName5" name="subcategory_id">
                                        @foreach ($getsubcategory as $subcategory)
                                        <option value="{{ $subcategory->id }}"{{$subcategory->id==$edittour->subcategory_id?'selected':''}}>{{ $subcategory->sub_category_name }}</option>
                                    @endforeach
                                    </select>
                                    @error('subcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5">Tour Name :<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="firstName5"
                                        value="{{ $edittour->tour_name }}" name="tour_name">
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
                                        <option value="trip" {{ $edittour->type=="trip"?'selected':'' }}>Trip</option>
                                        <option value="package" {{ $edittour->type=="package"?'selected':'' }}>Package</option>
                                        <option value="activities" {{ $edittour->type=="activities"?'selected':'' }}>Activities</option>
                                    </select>
                                    @error('type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5">Altitude :<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="firstName5"
                                        value="{{ $edittour->altitude }}" name="altitude">
                                  
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5">Tour Days :<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="firstName5"
                                        value="{{ $edittour->tour_days }}" name="tour_days">
                                    @error('tour_days')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5">Accomodation :<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="firstName5"
                                        value="{{ $edittour->accomodation }}" name="accomodation">
                                   
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5">Transport :<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="firstName5"
                                        value="{{ $edittour->transport }}" name="transport">
                                   
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5"> Price :<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="firstName5"
                                        value="{{ $edittour->main_price }}" name="main_price">
                                    @error('main_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">

                                <label for="firstName5"> Main Image :</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="elfms" data-input="mainthumbnail" data-preview="holder"
                                            class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                    </span>
                                    <input id="mainthumbnail" class="form-control" type="text" name="mainImage">

                                </div>
                                <img id="holder1" style="margin-top:15px;max-height:100px;" src={{$edittour->mainImage}}>
                                @error('mainImage')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">

                                <label for="firstName5"> Related Images :</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="elfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="images">
                                </div>
                                @forelse($edittour->images as $image)
                                @php
                                    $imagess = explode(',', $image->images);
                                    
                                @endphp
                                @foreach ($imagess as $images)
                                    <img src="{{ $images }}" alt="" width="100px" height="100px"
                                        style="padding-top:10px">
                                @endforeach
                            @empty
                                <p>No Image</p>
                            @endforelse
                               
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstName5"> Map Url :<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="firstName5"
                                    value="{{ $edittour->map_url }}" name="map_url">
                               
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firstName5">Place Description/Image :<span class="text-danger">*</span></label>
                            <textarea id="my-editor" class="form-control" name="description"
                                value="{{ $edittour->description }}">{{ $edittour->description }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <hr>
                        <h6 class="font-weight-bold">Cost Include/Exclude Section</h6>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5">Cost Include :</label>
                                    <textarea id="editor1" name="cost_include" rows="10" cols="80" value="{{$edittour->cost_include}}">
                                        {{$edittour->cost_include}}
                                    </textarea>
                                  
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5">Cost Exclude :</label>
                                    <textarea id="editor2" name="cost_exclude" rows="10" cols="80" value="{{$edittour->cost_exclude}}">
                                        {{$edittour->cost_exclude}}
                                  </textarea>
                                   
                                </div>
                            </div>
                        </div>
                        <hr>
                        {{-- dateprice --}}
                        
                        @foreach($edittour->dateprice as $key=> $dateprice)
                        <input type="hidden" name="dateid[]" value="{{$dateprice->id}}">
                        <h6 class="font-weight-bold">Dates/Price {{$key+1}} Section</h6>
                        <div class="row dateprice" id="dynamicAddRemove">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5">Start Date :</label>
                                    <input class="form-control" id="firstName5" "
                                                    name=" start_date[]" type="date"
                                        min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" value="{{$dateprice->start_date}}">
                                        

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5"> End Date :</label>
                                    <input class="form-control" id="firstName5" "
                                                    name=" end_date[]" type="date"
                                        min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" value="{{$dateprice->end_date}}">
                                        @error('end_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5">Seats Available :</label>
                                    <input type="text" class="form-control" id="firstName5" name="seats_available[]" value="{{$dateprice->seats_available}}">
                                       

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5"> Price :</label>
                                    <input type="text" class="form-control" id="firstName5" name="price[]" value="{{$dateprice->price}}">
                                       

                                </div>
                            </div>
                        </div>
                        <hr>
                        @endforeach

                        <hr>
                        {{-- equipment --}}
                        @foreach($edittour->equipment as $key=> $equipment)
                        <input type="hidden" name="equipmentid[]" value="{{$equipment->id}}">

                        <h6 class="font-weight-bold">Equipments {{$key+1}} Section</h6>
                        <div class="row " id="equipment">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5">Equipment Name :</label>
                                    <input type="text" class="form-control" id="firstName5" name="equipment_name[]" value="{{$equipment->equipment_name}}">
                                       

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5"> Description :</label>
                                    <textarea id="editor5" class="editor5" name="equipment_description[]" rows="10" cols="80" value="{{$equipment->equipment_description}}">
                                        {{$equipment->equipment_description}}
                                    </textarea>
                                        
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <hr>
                        {{-- itineries --}}
                        @foreach($edittour->itinerary as $key=> $itineries)
                        <input type="hidden" name="itineraryid[]" value="{{$itineries->id}}">

                        <h6 class="font-weight-bold">Itinierary {{$key+1}} Section</h6>
                        <div class="row" id="itinerary">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5">Day Title :</label>
                                    <input type="text" class="form-control" id="firstName5" name="day_title[]" value="{{$itineries->day_title}}">
                                        

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName6"> Long Description :</label>
                                    <textarea id="editor6"  name="long_description[]" rows="10" cols="80" value="{{$itineries->long_description}}">
                                        {{$itineries->long_description}}
                                    </textarea>
                                       

                                </div>
                            </div>
                        </div>
                          @endforeach

                           {{-- faq --}}
                        @foreach($edittour->fqa as $key=> $fqas)
                        <input type="hidden" name="faqid[]" value="{{$fqas->id}}">

                        <h6 class="font-weight-bold">FAQ {{$key+1}} Section</h6>
                        <div class="row" id="itinerary">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="question">Question :</label>
                                    <input type="text" class="form-control" id="question" name="question[]" value="{{$fqas->question}}">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName6"> Answer :</label>
                                    <textarea id="editor6"  name="answer[]" rows="10" cols="80" value="{{$fqas->answer}}">
                                        {{$fqas->answer}}
                                    </textarea>

                                </div>
                            </div>
                        </div>
                          @endforeach

                        <div class="box-footer">
                            <input type="submit" class="btn btn-rounded btn-info pull-right" value="Update Place">
                        </div>

                </form>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    {{-- <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script> --}}
    <script src="{{asset('assets/vendor_components/ckeditor/ckeditor.js')}}"></script>
    <script type='text/javascript'>
        CKEDITOR.replaceAll();
    </script>
    <script>
        var route_prefix = "/mountainguide-filemanager";
        $('#elfm').filemanager('images', {
            prefix: route_prefix
        });
    </script>

    <script>
        var route_prefix = "/mountainguide-filemanager";
        $('#elfms').filemanager('images', {
            prefix: route_prefix
        });
    </script>
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
@endsection
