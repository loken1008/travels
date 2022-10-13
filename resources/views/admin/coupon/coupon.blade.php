@extends('admin.body.master')
@section('title', 'Coupon')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">


            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Coupon List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Coupon Name</th>
                                        <th>Coupon Discount</th>
                                        <th>Coupon Validity</th>
                                        <th>Validity Status</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($coupons as $coupon)
                                        <tr>
                                            <td>{{ $coupon->coupon_name }}</td>
                                            <td>{{ $coupon->discount_amount }} %</td>
                                            <td>{{ Carbon\Carbon::parse($coupon->coupon_validity)->format('D,d F Y') }}
                                            </td>
                                            <td>
                                                @if ($coupon->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                                    <span class="badge badge-success">Valid</span>
                                                @else
                                                    <span class="badge badge-danger">Expired</span>
                                                @endif
                                            </td>
                                            <td>
                                                <input type="checkbox" class="coupon-input" data-toggle="toggle"
                                                    data-id="{{ $coupon->id }}" {{ $coupon->status ? 'checked' : '' }}
                                                    data-on="Enabled" data-off="Disabled" data-onstyle="success"
                                                    data-offstyle="danger" onchange="changeStatus({{ $coupon->id }})">
                                            </td>
                                            <td>
                                                <a href="{{ route('coupon.edit', $coupon->id) }}" class="btn btn-info"
                                                    style="width:5rem" title="edit"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('coupon.delete', $coupon->id) }}"
                                                    class="btn btn-warning" style="width:5rem" id="delete" title="delete"><i
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
            @if ($coupons->count() == 0)
                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Coupon</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table">
                                <form action="{{ route('coupon.store') }}" method="post" id="couponForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>Coupon Name :<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="coupon_name" class="form-control"
                                                        value="{{ old('coupon_name') }}">
                                                    @error('coupon_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5> Discount Amount :<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="discount_amount" class="form-control"
                                                        value="{{ old('discount_amount') }}">
                                                    @error('discount_amount')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Coupon Validity :<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="date" name="coupon_validity" class="form-control"
                                                        min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                                        value="{{ old('coupon_validity') }}">
                                                    @error('coupon_validity')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Add Coupon" />
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

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        $(function() {
            $('.coupon-input').change(function(e) {
                e.preventDefault();
                var status = $(this).prop('checked') == true ? 1 : 0;
                var coupon_id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Change Status!',
                    // location.reload();
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: '/mgiadmin/coupon/changeStatus',
                            data: {
                                'status': status,
                                'coupon_id': coupon_id
                            },
                            success: function(data) {
                                Swal.fire(
                                    'Status!',
                                    'Status has been changed.',
                                    'success',
                                )
                                window.location.href = '/mgiadmin/coupon/view'
                            }
                        });
                    } else {
                        window.location.href = '/mgiadmin/coupon/view'
                    }
                })
                $('#example1 .coupon-input').bootstrapToggle();
            })
        })
    </script>
     
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
     <script>
         $(document).ready(function() {
             $("#couponForm").validate({
                 rules: {
                     coupon_name: {
                         required: true,
                     },
                     discount_amount: {
                         required: true
 
                     },
                     coupon_validity: {
                         required: true
                     },
                 },
                 messages: {
                    coupon_name: {
                         required: "Enter Coupon Name",
                     },
                     discount_amount: {
                         required: "Enter Discount Amount",
                     },
                     coupon_validity: {
                         required: "Enter Coupon Validity",
                     },
 
                 },
             });
 
         });
     </script>
@endsection
