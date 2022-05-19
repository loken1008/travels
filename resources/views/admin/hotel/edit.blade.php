@extends('admin.body.master')
@section('title', 'Hotel')
@section('content')
    <section class="content">

        <!-- Step wizard -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h4 class="box-title">Update Hotel</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body wizard-content">
                <form action="{{route('hotel.update',$edithotel->id)}}" method="post" class="tab-wizard wizard-circle" enctype="multipart/form-data" id="ehotelForm">
                   @csrf
                  
                    <section>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="firstName5">Country Name :<span class="text-danger">*</span></label>
                                    <select class="form-control" id="countryname" name="country_id">
                                        <option value="">Select Country</option>
                                        @foreach($getcountry as $country)
                                        <option value="{{$country->id}}" {{$edithotel->country_id==$country->id?'selected':''}}>{{$country->country_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="firstName5">Tour Name :<span class="text-danger">*</span></label>
                                    <select class="form-control" id="tourname" name="tour_id">
                                        <option value="">Select Tour</option>
                                        @foreach($gettour as $tour)
                                        <option value="{{$tour->id}}" {{$edithotel->tour_id==$tour->id?'selected':''}}>{{$tour->tour_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="firstName5">Hotel Name :<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="hotelname" value="{{$edithotel->hotel_name}}" name="hotel_name">
                                    @error('hotel_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="firstName5">Address :<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="address" value="{{$edithotel->hotel_address}}" name="hotel_address">
                                    @error('hotel_address')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="firstName5">Phone :<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="phone" value="{{$edithotel->hotel_phone}}" name="hotel_phone">
                                    @error('hotel_phone')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="firstName5">Map Link :<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="maplink" value="{{$edithotel->map_link}}" name="map_link">
                                    @error('map_link')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">

                                <label for="firstName5">  Image :</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="clfm" data-input="mainthumbnail" data-preview="holder"
                                            class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                    </span>
                                    <input id="mainthumbnail" class="form-control" type="text" name="image">

                                </div>
                                <img id="holder1" style="margin-top:15px;max-height:100px;" src="{{$edithotel->image}}">
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="firstName5"> Description :<span class="text-danger">*</span></label>
                        <textarea id="my-editor"  class="form-control" name="hotel_description" value="{{$edithotel->hotel_description}}">{{$edithotel->hotel_description}}</textarea>
                        @error('hotel_description')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-rounded btn-info pull-right" value="Update Hotel">
                        </div>

                </form>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        var route_prefix = "mountainguide-filemanager";
        $('#clfm').filemanager('images', {
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
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
    <script>
       $(document).ready(function() {
           $.validator.addMethod('hrequired', function(value, element, params) {
               var idname = $(element).attr('id');
               var messageLength = jQuery.trim(CKEDITOR.instances[idname].getData());
               return !params || messageLength.length !== 0;
           }, "Description field is required");


           $("#ehotelForm").validate({
                   ignore: [],
                   rules: {
                          country_id: {
                            required: true,
                          },
                          tour_id: {
                            required: true,
                          },
                          hotel_name: {
                            required: true,
                          },
                          hotel_address: {
                            required: true,
                          },
                          hotel_phone: {
                            required: true,
                          },
                          
                          hotel_description: {
                            hrequired: true,
                          },
                          map_link: {
                            required: true,
                          },
                   },

                   messages: {
                            country_id: {
                                required: "Please select country",
                            },
                            tour_id: {
                                required: "Please select tour",
                            },
                            hotel_name: {
                                required: "Please enter hotel name",
                            },
                            hotel_address: {
                                required: "Please enter hotel address",
                            },
                            hotel_phone: {
                                required: "Please enter hotel phone",
                            },
                            map_link: {
                                required: "Please enter map link",
                            },
                   },
               submitHandler: function() {
                   //you can add code here to recombine the variants into one value if you like, before doing a $.post
                   form.submit();
                   alert('successful submit');
                   return false;
               }
           });
       });
   </script>
@endsection
