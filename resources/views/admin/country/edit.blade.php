@extends('admin.body.master')
@section('title', 'Country')
@section('content')
    <section class="content">

        <!-- Step wizard -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h4 class="box-title">Update Country</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body wizard-content">
                <form action="{{route('country.update',$editcountry->id)}}" method="post" class="tab-wizard wizard-circle" enctype="multipart/form-data" id="ecategoryForm">
                   @csrf
                  
                    <section>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="firstName5">Country Name :<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="firstName5" value="{{$editcountry->country_name}}" name="country_name">
                                    @error('country_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                    <label for="firstName5">Start Price :</label>
                                    <input type="text" class="form-control" id="firstName5" value="{{$editcountry->start_price}}" name="start_price">
                                    @error('start_price')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> --}}
                            </div>
                            <div class="col-md-12">

                                <label for="firstName5"> Country Image :</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="celfm" data-input="mainthumbnail" data-preview="holder1"
                                            class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                    </span>
                                    <input id="mainthumbnail" class="form-control" type="text" name="country_image">

                                </div>
                                <img id="holder1" style="margin-top:15px;max-height:100px;" src={{$editcountry->country_image}}>
                                @error('country_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="firstName5">Country Description :<span class="text-danger">*</span></label>
                        <textarea id="my-editor"  class="form-control" name="description" value={{$editcountry->description}}>{!!$editcountry->description!!}</textarea>
                        @error('description')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-rounded btn-info pull-right" value="Update Country">
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
        var route_prefix = "/mountainguide-filemanager";
        $('#celfm').filemanager('images', {
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
              $.validator.addMethod('crequired', function(value, element, params) {
                  var idname = jQuery(element).attr('id');
                  var messageLength = jQuery.trim(CKEDITOR.instances[idname].getData());
                  return !params || messageLength.length !== 0;
              }, "Description field is required");
  
  
              $("#ecategoryForm").validate({
                      ignore: [],
                      rules: {
                          country_name: {
                              required: true,
                          },
                          
                          description: {
                              crequired: true,
                          },
                      },
  
                      messages: {
                          country_name: {
                              required: "Please enter country name",
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
