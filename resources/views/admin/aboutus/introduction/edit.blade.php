@extends('admin.body.master')
@section('title', 'Update About Us')
@section('content') 


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update About Us</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table">
                                <form action="{{ route('update.introduction',$editintroduction->id) }}" method="post" enctype="multipart/form-data" id="eintroForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>About Us Title: <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="aboutus_title" class="form-control" value="{{$editintroduction->aboutus_title}}">
                                                    @error('aboutus_title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">

                                                <label for="firstName5"> Image :</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a id="blfm" data-input="mainthumbnail" data-preview="holder"
                                                            class="btn btn-primary">
                                                            <i class="fa fa-picture-o"></i> Choose
                                                        </a>
                                                    </span>
                                                    <input id="mainthumbnail" class="form-control" type="text" name="aboutus_image">
                
                                                </div>
                                                <img id="holder1" style="margin-top:15px;max-height:100px;" src="{{$editintroduction->aboutus_image}}">
                                               
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="firstName5"> Description : <span class="text-danger">*</span></label>
                                                  <textarea id="my-editor"  class="form-control" name="aboutus_description" value="{{$editintroduction->aboutus_description}}">{{$editintroduction->aboutus_description}}</textarea>
                                                  @error('aboutus_description')
                                                  <span class="text-danger">{{$message}}</span>
                                                  @enderror
                                                  </div>
                                                </div>
                                        </div>

                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Update"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
        <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    
        <script>
            var route_prefix = "/mgiadmin/mountainguide-filemanager";
            $('#blfm').filemanager('images', {
                prefix: route_prefix
            });
        </script>
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
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
       
          <script>
              $(document).ready(function() {
                  $.validator.addMethod('irequired', function(value, element, params) {
                      var idname = jQuery(element).attr('id');
                      var messageLength = jQuery.trim(CKEDITOR.instances[idname].getData());
                      return !params || messageLength.length !== 0;
                  }, "About Us Description field is required");
       
       
                  $("#eintroForm").validate({
                          ignore: [],
                          rules: {
                                 aboutus_title: {
                                   required: true,
                                   maxlength: 50
                                 },
                                 aboutus_description: {
                                   irequired: true
                                 },
                          },
       
                          messages: {
                                 aboutus_title: {
                                   required: "Please enter title",
                                   maxlength: "Title should not be more than 50 characters"
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