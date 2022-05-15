@extends('admin.body.master')
@section('title', 'Category')
@section('content')
        <section class="content">
            <div class="row">

                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table">
                                <form action="{{ route('update.category',$editcategory->id) }}" method="post" id="editcategoryForm">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$editcategory->id}}">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>Category Name<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="category_name" value="{{$editcategory->category_name}}" class="form-control">
                                                    @error('category_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                            </div>
                                            
                                        </div>

                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Update Category"/>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#editcategoryForm").validate({
                    rules: {
                        category_name: {
                            required: true,
                        },
                    },
                    messages: {
                        category_name: {
                            required: "Please enter Category title",
                        },
                    },
                });
            });
        </script>
@endsection
