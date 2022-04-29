@extends('admin.body.master')
@section('title', 'Update Terms')
@section('content') 


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update TermsConditions/Privacy Policies/Payment Method</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table">
                                <form action="{{ route('update.termsandconditions',$edittermsandconditions->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>Title<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="title" class="form-control" value="{{$edittermsandconditions->title}}">
                                                    @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Type<span class="text-danger">*</span></label>
                                                <div class="controls">
                                                    <select  name="type" class="form-control">
                                                        <option value="">Select Type</option>
                                                        <option value="TermsConditions" {{$edittermsandconditions->type=='TermsConditions'?'selected':''}}>TermsConditions</option>
                                                        <option value="PrivacyPolicies" {{$edittermsandconditions->type=='PrivacyPolicies'?'selected':''}}>PrivacyPolicies</option>
                                                        <option value="PaymentMethod" {{$edittermsandconditions->type=='PaymentMethod'?'selected':''}}>PaymentMethod</option>
                                                    </select>
                                                    @error('type')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="firstName5"> Description :</label>
                                                  <textarea id="my-editor"  class="form-control" name="description" value="{{$edittermsandconditions->description}}">{{$edittermsandconditions->description}}</textarea>
                                                  @error('description')
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
            var route_prefix = "/laravel-filemanager";
            $('#blfm').filemanager('images', {
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