@extends('admin.body.master')
@section('title', 'Tour')
@section('content')
    <section class="content">

        <!-- Step wizard -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h4 class="box-title">Update Tour Place</h4>
                <a class="btn btn-primary " href="{{ route('tour.viewdetails', $edittour->id) }}" style="width:5rem"
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
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5">Place Name :<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="placeid" value="{{$edittour->place_id}}"
                                    name="place_id">
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
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5"> Category :<span class="text-danger">*</span></label>
                                    <select class="form-control" id="firstName5" name="category_id">
                                        <option value="">Select Category</option>
                                        @foreach ($getcategory as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $edittour->category_id ? 'selected' : '' }}>
                                                {{ $category->category_name }}</option>
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
                                        <option value="">Select Sub category</option>
                                        @foreach ($getsubcategory as $subcategory)
                                            <option value="{{ $subcategory->id }}"
                                                {{ $subcategory->id == $edittour->subcategory_id ? 'selected' : '' }}>
                                                {{ $subcategory->sub_category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('subcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
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
                                <img id="holder1" style="margin-top:15px;max-height:100px;"
                                    src={{ $edittour->mainImage }}>
                                @error('mainImage')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">

                                <label for="firstName5"> Related Images :</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="elfm" data-input="thumbnail" data-preview="holder"
                                            class="btn btn-primary">
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
                            <textarea id="my-editor" class="form-control" name="description" value="{{ $edittour->description }}">{{ $edittour->description }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <hr>
                        <div class="row">
                            @php
                                $ecost_include = json_decode($edittour->cost_include);
                                // dd($ecost_include);
                            @endphp
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="costexclude">Cost Include :</label>
                                    <select name="cost_include[]" multiple id="" class="form-control"
                                        style="overflow: auto;height:140px">
                                        <option value="">Select Cost Include Values</option>


                                        @if (!empty($edittour->cost_include))
                                            @foreach ($costinclude as $key => $costi)
                                                <option value="{{ $costi->cost_include }}"
                                                    @if (!empty($ecost_include)) @foreach ($ecost_include as $ecost_includes){{ $ecost_includes == $costi->cost_include ? 'selected' : '' }} @endforeach @endif>
                                                    {{ $key + 1 }}.{{ $costi->cost_include }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target=".cibd-example-modal-lg">Add Cost Include</a>
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target=".ecibd-example-modal-lg">Update Cost Include</a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="costexclude">Cost Exclude :</label>
                                    <select name="cost_exclude[]" multiple id="" class="form-control"
                                        style="overflow: auto;height:140px">
                                        <option value="">Select Cost Exclude Values </option>
                                        @php
                                            $ecost_exclude = json_decode($edittour->cost_exclude);
                                        @endphp
                                        @if (!empty($edittour->cost_exclude))
                                            @foreach ($costexclude as $key => $coste)
                                                <option value="{{ $coste->cost_exclude }}"
                                                    @if (!empty($ecost_exclude)) @foreach ($ecost_exclude as $ecost_excludes){{ $ecost_excludes == $coste->cost_exclude ? 'selected' : '' }} @endforeach @endif>
                                                    {{ $key + 1 }}.{{ $coste->cost_exclude }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target=".cebd-example-modal-lg">Add Cost Exclude</a>
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target=".ecebd-example-modal-lg">Update Cost Exclude</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        {{-- dateprice --}}


                        @foreach ($edittour->dateprice as $key => $dateprice)
                            <h6 class="font-weight-bold">Dates/Price {{ $key + 1 }} Section</h6>
                            <div class="row dateprice" id="dynamicAddRemove">
                                <input type="hidden" name="dateid[]" value="{{ $dateprice->id }}">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName5">Start Date :</label>
                                        <input class="form-control" id="firstName5" "
                                                                    name=" start_date[]" type="date"
                                                value="{{ $dateprice->start_date }}">


                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstName5"> End Date :</label>
                                            <input class="form-control" id="firstName5" " name=" end_date[]"
                                            type="date" value="{{ $dateprice->end_date }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName5">Seats Available :</label>
                                        <input type="text" class="form-control" id="firstName5"
                                            name="seats_available[]" value="{{ $dateprice->seats_available }}">


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName5"> Price :</label>
                                        <input type="text" class="form-control" id="firstName5" name="price[]"
                                            value="{{ $dateprice->price }}">


                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('dateprice.delete', $dateprice->id) }}" class="btn btn-warning mt-1"
                                style="width:5rem;" id="delete" title="trash"><i class="fa fa-trash"></i></a>
                        @endforeach
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            Add More Dates/Price
                        </a>


                        <hr>


                        {{-- equipment --}}
                        @foreach ($edittour->equipment as $key => $equipment)
                            <input type="hidden" name="equipmentid[]" value="{{ $equipment->id }}">

                            <h6 class="font-weight-bold">Equipments {{ $key + 1 }} Section</h6>
                            <div class="row " id="equipment">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName5">Equipment Name :</label>
                                        <input type="text" class="form-control" id="firstName5"
                                            name="equipment_name[]" value="{{ $equipment->equipment_name }}">


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName5"> Description :</label>
                                        <textarea id="editor5" class="editor5" name="equipment_description[]" rows="10" cols="80"
                                            value="{{ $equipment->equipment_description }}">
                                        {{ $equipment->equipment_description }}
                                    </textarea>

                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('equipment.delete', $equipment->id) }}" class="btn btn-warning mt-1"
                                style="width:5rem;" id="delete" title="trash"><i class="fa fa-trash"></i></a>
                        @endforeach
                        <a href="#" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModalLongequipment">
                            Add More Equipments
                        </a>
                        <hr>
                        {{-- itineries --}}
                        @foreach ($edittour->itinerary as $key => $itineries)
                            <input type="hidden" name="itineraryid[]" value="{{ $itineries->id }}">

                            <h6 class="font-weight-bold">Itinierary {{ $key + 1 }} Section</h6>
                            <div class="row" id="itinerary">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName5">Day Title :</label>
                                        <input type="text" class="form-control" id="firstName5" name="day_title[]"
                                            value="{{ $itineries->day_title }}">


                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName6"> Long Description :</label>
                                        <textarea id="editor6" name="long_description[]" rows="10" cols="80"
                                            value="{{ $itineries->long_description }}">
                                        {{ $itineries->long_description }}
                                    </textarea>


                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('itineries.delete', $itineries->id) }}" class="btn btn-warning mt-1"
                                style="width:5rem;" id="delete" title="trash"><i class="fa fa-trash"></i></a>
                        @endforeach
                        <a href="#" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModalLongitineries">
                            Add More Itineries
                        </a>
                        <hr>

                        {{-- faq --}}
                        @foreach ($edittour->fqa as $key => $fqas)
                            <input type="hidden" name="faqid[]" value="{{ $fqas->id }}">

                            <h6 class="font-weight-bold">FAQ {{ $key + 1 }} Section</h6>
                            <div class="row" id="faq">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="question">Question :</label>
                                        <input type="text" class="form-control" id="question" name="question[]"
                                            value="{{ $fqas->question }}">

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="answer"> Answer :</label>
                                        <textarea name="answer[]" rows="10" cols="80" value="{{ $fqas->answer }}">
                                        {{ $fqas->answer }}
                                    </textarea>

                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('faq.delete', $fqas->id) }}" class="btn btn-warning mt-1"
                                style="width:5rem;" id="delete" title="trash"><i class="fa fa-trash"></i></a>
                        @endforeach
                        <a href="#" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModalLongfaq">
                            Add More FAQ
                        </a>
                        <hr>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-rounded btn-info pull-right" value="Update Place">
                        </div>

                </form>
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content bg-white">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add Dates/Price</h5>
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </div>
                            <form action="{{ route('tour.dateprice', $edittour->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="tour_id" value="{{ $edittour->id }}">
                                <div class="modal-body">
                                    <div class="row dateprice" id="dynamicAddRemove2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstName5">Start Date :</label>
                                                <input class="form-control" id="firstName5" "
                                                                        name=" start_date[]" type="date">


                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="firstName5"> End Date :</label>
                                                    <input class="form-control" id="firstName5" " name=" end_date[]"
                                                    type="date">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstName5">Seats Available :</label>
                                                <input type="text" class="form-control" id="firstName5"
                                                    name="seats_available[]">


                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstName5"> Price :</label>
                                                <input type="text" class="form-control" id="firstName5"
                                                    name="price[]">


                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="">
                                    <a href="javascript:void(0)" id="dynamic-ar"
                                        class="btn btn-success pull-right mr-3 addMore"></span>
                                        Add More</a>
                                </div>
                                <hr>
                                <div class="modal-footer" style="float:right;width:100%">

                                    <input type="submit" class="btn btn-primary" value="Add Date/Price"
                                        style="float: right">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="exampleModalLongequipment" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content bg-white">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add Equipment</h5>
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </div>
                            <form action="{{ route('tour.equipment', $edittour->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="tour_id" value="{{ $edittour->id }}">
                                <div class="modal-body">
                                    <div class="row " id="equipmentAdd">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="firstName5">Equipment Name :</label>
                                                <input type="text" class="form-control" id="firstName5"
                                                    name="equipment_name[]">


                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="firstName5"> Description :</label>
                                                <textarea id="editor5" class="editor5" name="equipment_description[]" rows="10" cols="80">
                                    
                                        </textarea>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="">
                                    <a href="javascript:void(0)" id="equipment-add"
                                        class="btn btn-success pull-right mr-3 addMore"></span>
                                        Add More</a>
                                </div>
                                <hr>
                                <div class="modal-footer" style="float:right;width:100%">

                                    <input type="submit" class="btn btn-primary" value="Add Equipment"
                                        style="float: right">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="exampleModalLongitineries" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content bg-white">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add Itineries</h5>
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </div>
                            <form action="{{ route('tour.itineries', $edittour->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="tour_id" value="{{ $edittour->id }}">
                                <div class="modal-body">
                                    <div class="row" id="itineraryAdd">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="firstName5">Day Title :</label>
                                                <input type="text" class="form-control" id="firstName5"
                                                    name="day_title[]">


                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="firstName6"> Long Description :</label>
                                                <textarea id="editor6" name="long_description[]" rows="10" cols="80">
                                          
                                        </textarea>


                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="">
                                    <a href="javascript:void(0)" id="add-itineries"
                                        class="btn btn-success pull-right mr-3 addMore"></span>
                                        Add More</a>
                                </div>
                                <hr>
                                <div class="modal-footer" style="float:right;width:100%">

                                    <input type="submit" class="btn btn-primary" value="Add Itineries"
                                        style="float: right">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="exampleModalLongfaq" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content bg-white">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add FAQ</h5>
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </div>
                            <form action="{{ route('tour.faq', $edittour->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="tour_id" value="{{ $edittour->id }}">
                                <div class="modal-body">
                                    <div class="row" id="faqAdd">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="question">Question :</label>
                                                <input type="text" class="form-control" id="question"
                                                    name="question[]">

                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="answer"> Answer :</label>
                                                <textarea name="answer[]" rows="10" cols="80">
                                           
                                        </textarea>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <a href="javascript:void(0)" id="faq-add"
                                        class="btn btn-success pull-right mr-3 addMore"></span>
                                        Add More</a>
                                </div>
                                <hr>
                                <div class="modal-footer" style="float:right;width:100%">

                                    <input type="submit" class="btn btn-primary" value="Add FAQ" style="float: right">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @include('admin.costdetails.costinclude')
                @include('admin.costdetails.costexclude')
                @include('admin.costdetails.costincludeedit')
                @include('admin.costdetails.costexcludeedit')
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    {{-- <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script> --}}
    <script src="{{ asset('assets/vendor_components/ckeditor/ckeditor.js') }}"></script>
    <script type='text/javascript'></script>
    <script>
        var route_prefix = "/mountainguide-filemanager";
        $('#elfm').filemanager('images', {
            prefix: route_prefix
        });
    </script>

    <script>
        CKEDITOR.replaceAll();

        //  filemanager 
        var route_prefix = "/mountainguide-filemanager";
        $('#elfms').filemanager('images', {
            prefix: route_prefix
        });
        var options = {
            filebrowserImageBrowseUrl: '/mountainguide-filemanager?type=Images',
            filebrowserImageUploadUrl: '/mountainguide-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/mountainguide-filemanager?type=Files',
            filebrowserUploadUrl: '/mountainguide-filemanager/upload?type=Files&_token='
        };

        CKEDITOR.replace('my-editor', options);
    </script>

@endsection
