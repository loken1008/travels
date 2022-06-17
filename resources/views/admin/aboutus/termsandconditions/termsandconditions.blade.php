@extends('admin.body.master')
@section('title', 'Terms ')
@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="row">


            <div class="col-7">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">TermsConditions/Privacy Policies/Payment Section </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th> Title</th>
                                        <th>Description </th>
                                        <th>Type</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($termsandconditions as $terms)
                                        <tr>
                                            <td>{{ $terms->title }}</td>
                                            <td>{!! Str::limit($terms->description,100) !!}</td>
                                            <td>{{ $terms->type }}</td>
                                            <td>
                                                <a href="{{ route('view.termsandconditions', $terms->id) }}"
                                                    class="btn btn-primary" style="width:5rem" title="view"><i
                                                        class="fa fa-eye"></i></a>
                                                <a href="{{ route('edit.termsandconditions', $terms->id) }}"
                                                    class="btn btn-info mt-2" style="width:5rem" title="edit"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="{{ route('delete.termsandconditions', $terms->id) }}"
                                                    class="btn btn-danger mt-2" style="width:5rem" id="delete"
                                                    title="delete"><i class="fa fa-trash"></i></a>
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

            <div class="col-5">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add TermsConditions/Privacy Policies/Payment Method</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table">
                            <form action="{{ route('store.termsandconditions') }}" method="post" enctype="multipart/form-data" id="termForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Title: <span class="text-danger">*</span></label>
                                            <div class="controls">
                                                <input type="text" name="title" class="form-control">
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        @php  
                                        $gettype=App\Models\TermsandCondition::pluck('type')->toArray();
                                        @endphp

                                        <div class="form-group">
                                            <label>Type: <span class="text-danger">*</span></label>
                                            <div class="controls">
                                                <select  name="type" class="form-control">
                                                    <option value="">Select Type</option>
                                                    <option value="TermsConditions">TermsConditions</option>
                                                    <option value="PrivacyPolicies">PrivacyPolicies</option>
                                                    <option value="PaymentMethod">PaymentMethod</option>
                                                </select>
                                                @error('type')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="firstName5"> Description :<span class="text-danger">*</span></label>
                                            <textarea id="my-editor" class="form-control" name="description"></textarea>
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                @if ($termsandconditions->count() < 3)
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Add" />
                                    </div>
                                @endif
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
        var route_prefix = "/mountainguide-filemanager";
        $('#blfm').filemanager('images', {
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
                $.validator.addMethod('trequired', function(value, element, params) {
                    var idname = jQuery(element).attr('id');
                    var messageLength = jQuery.trim(CKEDITOR.instances[idname].getData());
                    return !params || messageLength.length !== 0;
                }, "Description field is required");
     
     
                $("#termForm").validate({
                        ignore: [],
                        rules: {
                            title: {
                                required: true,
                            },
                            type: {
                                required: true,
                            },
                            description: {
                                trequired: true,
                            },
                        },
     
                        messages: {
                            title: {
                                required: "Title is required",
                            },
                            type: {
                                required: "Type is required",
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
