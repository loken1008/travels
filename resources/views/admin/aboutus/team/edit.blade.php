@extends('admin.body.master')
@section('title', 'Our Team')
@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Our Team</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table">
                            <form action="{{ route('update.team',$editteam->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Name<span class="text-danger">*</span></label>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" value="{{$editteam->name}}">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Post<span class="text-danger">*</span></label>
                                            <div class="controls">
                                                <input type="text" name="post" class="form-control" value="{{$editteam->post}}">
                                                @error('post')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Language<span class="text-danger">*</span></label>
                                            <div class="controls">
                                                <input type="text" name="language" class="form-control"  value="{{$editteam->language}}">
                                                @error('language')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Experiences<span class="text-danger">*</span></label>
                                            <div class="controls">
                                                <input type="text" name="experiences" class="form-control"  value="{{$editteam->experiences}}">
                                                @error('experiences')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Field Type<span class="text-danger">*</span></label>
                                            <div class="controls">
                                                <select  name="type" class="form-control">
                                                    <option value="">Select Field Type</option>
                                                    <option value="Administration" {{$editteam->type=="Administration"?'selected':''}}>Administration</option>
                                                    <option value="Hiking" {{$editteam->type=="Hiking"?'selected':''}}>Hiking/Trekking</option>
                                                    <option value="Mountainer" {{$editteam->type=="Mountainer"?'sellected':''}}>Mountainer</option>
                                                    <option value="Safari" {{$editteam->type=="Safari"?'selected':''}}>Safari</option>
                                                    <option value="Tourguide" {{$editteam->type=="Tourguide"?'selected':''}}>Tour Guide</option>
                                                </select>
                                                @error('type')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                            <label for="firstName5"> Image :</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="blfm" data-input="mainthumbnail" data-preview="holder"
                                                        class="btn btn-primary">
                                                        <i class="fa fa-picture-o"></i> Choose
                                                    </a>
                                                </span>
                                                <input id="mainthumbnail" class="form-control" type="text" name="image">

                                            </div>
                                            <img id="holder1" style="margin-top:15px;max-height:100px;" src="{{$editteam->image}}">
                                            <div class="form-group">
                                                <label for="firstName5"> Description :</label>
                                                <textarea id="my-editor" class="form-control" name="description" value={{$editteam->description}}>{{$editteam->description}}</textarea>
                                                @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Update Team" />
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
