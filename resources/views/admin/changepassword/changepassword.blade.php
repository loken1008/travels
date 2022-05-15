@extends('admin.body.master')
@section('title', 'Change Password')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Change Password</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table">
                            <form action="{{ route('admin.change.password.post') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Old Password<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="old_password" class="form-control">
                                                @error('old_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>New Password<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="new_password" class="form-control">
                                                @error('new_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Confirm Password<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="confirm_password" class="form-control">
                                                @error('confirm_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Change Password" />
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
@endsection
