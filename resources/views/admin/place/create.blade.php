@extends('admin.body.master')
@section('title', 'Country')
@section('content')
    <section class="content">

        <!-- Step wizard -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h4 class="box-title">Add Destination Place</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body wizard-content">
                <form action="{{route('place.store')}}" method="post" class="tab-wizard wizard-circle" enctype="multipart/form-data" id="placeForm">
                   @csrf
                  
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5">Country Name :<span class="text-danger">*</span></label>
                                    <select class="form-control" id="country"  name="country_id">
                                    <option value="">Select Country</option>
                                    @foreach($getcountry as $country)
                                    <option value="{{$country->id}}">{{$country->country_name}}</option>
                                    @endforeach
                                    </select>
                                    @error('country_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName5">Place Name :<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="placename" value="{{@old('place_name')}}" name="place_name">
                                    @error('place_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="firstName5">Place Description/Image :<span class="text-danger">*</span></label>
                          <textarea id="my-editor"  class="form-control" name="description"></textarea>
                        @error('description')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-rounded btn-info pull-right" value="Add Place">
                        </div>

                </form>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </section>

    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
  
      <script>
          $(document).ready(function() {
              $.validator.addMethod('prequired', function(value, element, params) {
                  var idname = jQuery(element).attr('id');
                  var messageLength = jQuery.trim(CKEDITOR.instances[idname].getData());
                  return !params || messageLength.length !== 0;
              }, "Description field is required");
  
  
              $("#placeForm").validate({
                      ignore: [],
                      rules: {
                          country_id: {
                              required: true,
                          },
                            place_name: {
                                required: true,
                            },
                            description: {
                                prequired: true,
                            },
                      },
  
                      messages: {
                          country_id: {
                              required: "Please select country name",
                          },
                            place_name: {
                                required: "Please enter place name",
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
