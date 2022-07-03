@extends('admin.body.master')
@section('title', 'Category')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">


            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Categories List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Category Name</th>
                                        <th>Category Type</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($categories as $key=> $category)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>{{$category->category_type}}</td>
                                            <td>
                                                <a href="{{ route('edit.category', $category->id) }}" class="btn btn-info"
                                                    style="width:5rem" title="edit"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('delete.category', $category->id) }}"
                                                    class="btn btn-danger " style="width:5rem" id="delete" title="delete"><i
                                                        class="fa fa-trash"></i></a>
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
            <div class="col-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table">
                            <form action="{{ route('store.category') }}" method="post" id="categoryForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Category Name: <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="category_name" class="form-control">
                                                @error('category_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Category Type:</h5>
                                            <div class="controls">
                                                <select  name="category_type" class="form-control">
                                                    <option value=""> Select Category Type</option>
                                                    <option value="trekking">Trekking</option>
                                                    <option value="tour">Tour</option>
                                                    <option value="adventure">Adventure</option>
                                                    <option value="peakclimbing">Peak Climbing</option>
                                                    <option value="natural">Natural Realism</option>
                                                </select>
                                              
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Add New" />
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
            $("#categoryForm").validate({
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
