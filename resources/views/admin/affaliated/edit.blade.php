@extends('admin.body.master')
@section('title', 'Affilated/Payment Method')
@section('content') 


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Affilated/Pay</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table">
                                <form action="{{ route('update.affaliated',$editaffilated->id) }}" method="post" enctype="multipart/form-data" id="editAffilatedForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>Type :<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="type" class="form-control">
                                                        <option value="">Select  Type</option>
                                                        <option value="affilated-member" {{$editaffilated->type=="affilated-member"?'selected':''}}>Affilated Member</option>
                                                        <option value="pay-method" {{$editaffilated->type=="pay-method"?'selected':''}}>Pay Method</option>
                                                    </select>
                                                    @error('type')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="">

                                                <label for="firstName5">  Image :<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a id="tlfm" data-input="mainthumbnail" data-preview="holder"
                                                            class="btn btn-primary">
                                                            <i class="fa fa-picture-o"></i> Choose
                                                        </a>
                                                    </span>
                                                    <input id="mainthumbnail" class="form-control" type="text" name="image">
                
                                                </div>
                                                <img src="{{ asset($editaffilated->image) }}"
                                                style="height:100px;width:100px" alt="">
                                               
                                            </div>
                                        </div>
                                        

                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Update "/>
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
    <script>
        var route_prefix = "/mgiadmin/mountainguide-filemanager";
        $('#tlfm').filemanager('images', {
            prefix: route_prefix
        });
    </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
     <script>
        $(document).ready(function() {
          
            $("#editAffilatedForm").validate({
                    ignore: [],
                    rules: {
                        type: {
                            required: true,
                        },
                       
                       
                    },
 
                    messages: {
                        type: {
                            required: "Please enter type",
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