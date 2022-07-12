@extends('admin.body.master')
@section('title', 'Contact')
@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="row">


            <div class="col-8">

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
                                        <th>Address</th>
                                        <th>Map Link</th>
                                        <th>Phone</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Fax</th>
                                        <th>GPO Box</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($contacts as $contact)
                                        <tr>
                                            {{-- <td><img src="{{asset($logo->logo)}}"
                                                        style="height:100px;width:100px" alt="">
                                                    </td> --}}
                                            <td>{{ $contact->address }}</td>
                                            <td>{{ $contact->map_url }}</td>
                                            <td>{{ $contact->phone }}</td>
                                            <td>{{ $contact->mobile }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->fax }}</td>
                                            <td>{{ $contact->gpo_box }}</td>

                                            <td>
                                                <a href="{{ route('edit.contact', $contact->id) }}" class="btn btn-info"
                                                    style="width:5rem" title="edit"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('delete.contact', $contact->id) }}"
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
            <div class="col-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Contact</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table">
                            <form action="{{ route('store.contact') }}" method="post" enctype="multipart/form-data" id="contact-form">
                                @csrf
                                <div class="row">
                                    <div class="col-12">

                                        {{-- <div>
                                                <label for="firstName5"> Logo Image <span class="text-danger">*</span> :</label>
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
                                            </div> --}}
                                        <div class="form-group">
                                            <h5>Address :<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="address" class="form-control">
                                                @error('address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Email :<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" class="form-control">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Phone :<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="phone" class="form-control">
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Mobile :<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="mobile" class="form-control">
                                                @error('mobile')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Fax :<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="fax" class="form-control">
                                                @error('fax')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Gpo Box :<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="gpo_box" class="form-control">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Map Url :<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="url" name="map_url" class="form-control">

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Add Contact" />
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
    </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script>
    $(document).ready(function(){
        $('#contact-form').validate({
            rules:{
                address:{
                    required:true
                },
                email:{
                    required:true,
                    email:true
                },
                phone:{
                    required:true
                },
                mobile:{
                    required:true
                },
                fax:{
                    required:true
                },
                gpo_box:{
                    required:true
                },
                map_url:{
                    required:true
                }
            },
            messages:{
                address:{
                    required:'Please enter address'
                },
                email:{
                    required:'Please enter email',
                    email:'Please enter valid email'
                },
                phone:{
                    required:'Please enter phone'
                },
                mobile:{
                    required:'Please enter mobile'
                },
                fax:{
                    required:'Please enter fax'
                },
                gpo_box:{
                    required:'Please enter gpo box'
                },
                map_url:{
                    required:'Please enter map url'
                }
            }
        });
    });
</script>
@endsection
