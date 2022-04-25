@extends('admin.body.master')
@section('title', 'Hotel')
@section('content')
    <section class="content">

        <!-- Step wizard -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h4 class="box-title">Add Hotel</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body wizard-content">
                <form action="{{route('hotel.store')}}" method="post" class="tab-wizard wizard-circle" enctype="multipart/form-data">
                   @csrf
                  
                    <section>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="firstName5">Country Name :</label>
                                    <select class="form-control" id="firstName5" name="country_id">
                                        <option value="">Select Country</option>
                                        @foreach($getcountry as $country)
                                        <option value="{{$country->id}}">{{$country->country_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="firstName5">Tour Name :</label>
                                    <select class="form-control" id="firstName5" name="tour_id">
                                        <option value="">Select Tour</option>
                                        @foreach($gettour as $tour)
                                        <option value="{{$tour->id}}">{{$tour->tour_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="firstName5">Hotel Name :</label>
                                    <input type="text" class="form-control" id="firstName5" value="{{@old('hotel_name')}}" name="hotel_name">
                                    @error('hotel_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="firstName5">Address :</label>
                                    <input type="text" class="form-control" id="firstName5" value="{{@old('hotel_address')}}" name="hotel_address">
                                    @error('hotel_address')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="firstName5">Phone :</label>
                                    <input type="text" class="form-control" id="firstName5" value="{{@old('hotel_phone')}}" name="hotel_phone">
                                    @error('hotel_phone')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="firstName5">Map Link :</label>
                                    <input type="text" class="form-control" id="firstName5" value="{{@old('map_link')}}" name="map_link">
                                    @error('map_link')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">

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
                                <img id="holder1" style="margin-top:15px;max-height:100px;">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="firstName5"> Description :</label>
                        <textarea id="my-editor"  class="form-control" name="hotel_description"></textarea>
                        @error('hotel_description')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-rounded btn-info pull-right" value="Add Hotel">
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
        var route_prefix = "/laravel-filemanager";
        $('#clfm').filemanager('images', {
            prefix: route_prefix
        });
    </script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace('my-editor', options);
    </script>
@endsection
