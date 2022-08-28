@extends('admin.body.master')
@section('title', 'Update Logo')
@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update SiteSetting</h3>
                        <div class="col-12 mt-4">
                            <form action="{{ route('update.logo', $editlogo->id) }}" method="post"
                                enctype="multipart/form-data" >
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div>
                                            <label for="firstName5"> Header Logo  
                                                :</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="blfm" data-input="mainthumbnail" data-preview="holder"
                                                        class="btn btn-primary">
                                                        <i class="fa fa-picture-o"></i> Choose
                                                    </a>
                                                </span>
                                                <input id="mainthumbnail" class="form-control" type="text" name="logo">

                                            </div>
                                            <img id="holder1" style="margin-top:15px;max-height:100px;"
                                                src="{{ $editlogo->logo }}">
                                            @error('logo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="firstName5"> Footer Logo  
                                                :</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="blfm1" data-input="mainthumbnail1" data-preview="holder"
                                                        class="btn btn-primary">
                                                        <i class="fa fa-picture-o"></i> Choose
                                                    </a>
                                                </span>
                                                <input id="mainthumbnail1" class="form-control" type="text" name="footer_logo">

                                            </div>
                                            <img id="holder1" style="margin-top:15px;max-height:100px;"
                                                src="{{ $editlogo->footer_logo }}">
                                            @error('footer_logo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <h5>Facebook :</h5>
                                            <div class="controls">
                                                <input type="url" name="facebook" class="form-control"
                                                    value="{{ $editlogo->facebook }}">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Instagram :</h5>
                                            <div class="controls">
                                                <input type="url" name="instagram" class="form-control"
                                                    value="{{ $editlogo->instagram }}">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Twitter :</h5>
                                            <div class="controls">
                                                <input type="url" name="twitter" class="form-control"
                                                    value="{{ $editlogo->twitter }}">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Viber :</h5>
                                            <div class="controls">
                                                <input type="url" name="linkedin" class="form-control" value="{{$editlogo->linkedin}}">
                                               
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Whatapps :</h5>
                                            <div class="controls">
                                                <input type="url" name="google" class="form-control" value="{{$editlogo->google}}">
                                               
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Youtube :</h5>
                                            <div class="controls">
                                                <input type="url" name="youtube" class="form-control"
                                                    value="{{ $editlogo->youtube }}">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Pinterest :</h5>
                                            <div class="controls">
                                                <input type="url" name="pinterest" class="form-control"
                                                    value="{{ $editlogo->pinterest }}">

                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Update Setting" />
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
        $('#blfm').filemanager('images', {
            prefix: route_prefix
        });
        $('#blfm1').filemanager('images', {
            prefix: route_prefix
        });
    </script>
    
@endsection
