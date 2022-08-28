@extends('admin.body.master')
@section('title', 'Site Setting')
@section('content') 


        <!-- Main content -->
        <section class="content">
            <div class="row">
                @if($sitelogo->count() > 0)
                <div class="col-12">
                    @else 
                <div class="col-8">
                    @endif
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Site List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Site Logo</th>
                                            <th>Facebook</th>
                                            <th>Viber</th>
                                            <th>Whatapps</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($sitelogo as $logo)
                                            <tr>
                                                <td><img src="{{asset($logo->logo)}}"
                                                        style="height:100px;width:100px" alt="">
                                                    </td>
                                                <td>{{$logo->facebook}}</td>
                                                <td>{{$logo->linkedin}}</td>
                                                <td>{{$logo->google}}</td>
                                                   
                                                <td>
                                                    <a href="{{route('edit.logo',$logo->id)}}" class="btn btn-info" style="width:5rem" title="edit"><i class="fa fa-pencil"></i></a>
                                                    {{-- <a href="{{route('delete.logo',$logo->id)}}" class="btn btn-danger mt-2" style="width:5rem" id="delete" title="delete"><i class="fa fa-trash"></i></a> --}}
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>
                @if($sitelogo->count() < 1)
                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Logo</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table">
                                <form action="{{ route('store.logo') }}" method="post" enctype="multipart/form-data" id="siteForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            
                                            <div>
                                                <label for="firstName5"> Logo Image :<span class="text-danger">*</span> :</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a id="blfm" data-input="mainthumbnail" data-preview="holder"
                                                            class="btn btn-primary">
                                                            <i class="fa fa-picture-o"></i> Choose
                                                        </a>
                                                    </span>
                                                    <input id="mainthumbnail" class="form-control" type="text" name="logo">
                
                                                </div>
                                                <img id="holder1" style="margin-top:15px;max-height:100px;">
                                                @error('logo')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <h5>Facebook :</h5>
                                                <div class="controls">
                                                    <input type="url" name="facebook" class="form-control">
                                                   
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Instagram :</h5>
                                                <div class="controls">
                                                    <input type="url" name="instagram" class="form-control">
                                                   
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Twitter :</h5>
                                                <div class="controls">
                                                    <input type="url" name="twitter" class="form-control">
                                                   
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Viber :</h5>
                                                <div class="controls">
                                                    <input type="url" name="linkedin" class="form-control" placeholder="viber://chat?number=98********">
                                                   
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Whatapps :</h5>
                                                <div class="controls">
                                                    <input type="url" name="google" class="form-control" placeholder="https://wa.me/98********">
                                                   
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Youtube :</h5>
                                                <div class="controls">
                                                    <input type="url" name="youtube" class="form-control">
                                                   
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Pinterest :</h5>
                                                <div class="controls">
                                                    <input type="url" name="pinterest" class="form-control">
                                                   
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Add Setting"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
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
    </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
      <script>
          $(document).ready(function(){
              $('#siteForm').validate({
                  rules:{
                      logo:{
                          required:true,
                      },
                     
                  },
                  messages:{
                      logo:{
                          required:'Please upload logo',
                      },
                     
                  }
              });
          });
      </script>
@endsection