@extends('frontend.main')
@section('title', 'User Dashboard')
@section('content')
    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg" @if(!empty($userbanner->page_banner))data-background="{{asset($userbanner->page_banner)}}" @endif data-type="parallax" data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        <h4>User Dashboard</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section Start -->
    <section class="contact-section  pb-20">
        <!-- Inner Section End -->
        <div class="container mt-5 mb-5">
            <div class="row no-gutters">
                <div class="col-md-4 col-lg-4">
                    @if (!empty(
                        Auth()->guard('customer')->user()->image
                    ))
                        @if (empty(
                            Auth()->guard('customer')->user()->provider_id
                        ))
                            <img src="{{ asset('frontend/images/users/' .Auth()->guard('customer')->user()->image) }}"
                                style="height:370px" alt="mountainguideinfo-profile">
                        @else
                            <img src="{{ Auth()->guard('customer')->user()->image }}" style="height:370px" alt="mountainguideinfo-profile">
                        @endif
                        <!-- Upload image input-->
                        <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                            <form action="{{ route('image.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input id="upload" type="file" class="form-control border-0" name="image">
                                <div class="input-group-append">
                                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i
                                            class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                            class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                                    <button type="submit" for="update" class="btn btn-light ml-4 rounded-pill px-4"> <small
                                            class="text-uppercase font-weight-bold text-muted">Upload file</small></button>
                                </div>
                                @error('image')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </form>
                        </div>
                    @else
                        <img src="{{ asset('frontend/images/profil.png') }}">


                        <!-- Upload image input-->
                        <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                            <form action="{{ route('image.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input id="upload" type="file" class="form-control border-0" name="image">
                                <div class="input-group-append">
                                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i
                                            class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                            class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                                    <button type="submit" for="update" class="btn btn-light ml-4 rounded-pill px-4"> <small
                                            class="text-uppercase font-weight-bold text-muted">Upload file</small></button>
                                </div>
                                @error('image')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </form>
                        </div>
                    @endif
                </div>
                <div class="col-md-8 col-lg-8">
                    <div class="d-flex flex-column justify-content-evenly p-1 text-dark c-profile">
                        <h5 class="display-5">Name: {{ Auth()->guard('customer')->user()->first_name }}
                            {{ Auth()->guard('customer')->user()->last_name }}</h5>
                        <h5 class="display-5">Email: {{ Auth()->guard('customer')->user()->email }}</h5>
                        <h5 class="display-5">Address: {{ Auth()->guard('customer')->user()->address }}</h5>
                        <h5 class="display-5">Mobile No: {{ Auth()->guard('customer')->user()->mobile }}</h5>
                        <h5 class="display-5">Country: {{ Auth()->guard('customer')->user()->country }}</h5>
                    </div>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="row contact-bg">
                <div class="col-md-12 col-lg-3 p-0">
                    <div class="contact-text">
                        <div class="contact-info">

                            <h6> <a href=""> Dashboard</a></h6>
                        </div>
                        <div class="contact-info">

                            <h6> <a href="#" data-toggle="modal"
                                    data-target="#exampleModalCenter{{ Auth()->guard('customer')->user()->id }}">Update
                                    Profile</a></h6>
                        </div>
                        <div class="contact-info">

                            <h6> <a href="#" data-toggle="modal"
                                    data-target="#exampleModalCenterPass{{ Auth()->guard('customer')->user()->id }}">
                                    Change Password</a></h6>
                        </div>
                        <div class="contact-info">

                            <h6> <a href="{{ route('customer.logout') }}"> Logout</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-8 style-2">
                    <div class="nav nav-tabs text-center">
                        <h5 class="font-weight-bold ml-4 mb-2 mt-2">My Book Packages</h5>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <table class="table" style="width:112% ">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Sn</th>
                                    <th scope="col">Tour Name</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Post Code</th>
                                    <th scope="col">No. Of People</th>
                                    <th scope="col">Arrival Date</th>
                                    <th scope="col">Departure Date</th>
                                    <th>Book Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody style="color:black">
                                @forelse($bookings as $key=> $booking)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $booking->tour->tour_name }}</td>
                                        <td>{{ $booking->first_name }} {{ $booking->last_name }}</td>
                                        <td>{{ $booking->post_code }}</td>
                                        <td>{{ $booking->number_people }}</td>
                                        <td>{{ $booking->arrival_date }}</td>
                                        <td>{{ $booking->departure_date }}</td>
                                        <td>{{ $booking->created_at->format('Y-M-d') }}</td>
                                        <td>
                                            <a href="#" title="view" data-toggle="modal"
                                                data-target="#exampleModalCenterBook{{ $booking->id }}"><i
                                                    class="fa fa-eye"></i></a>
                                            <a href="{{ route('user.delete.booking', $booking->id) }}" title="delete"
                                                onclick="return confirm('Are You Sure To Delete This Book?')"><i
                                                    class="fa fa-trash"></i></a>

                                        </td>
                                    </tr>
                                    <div class="modal fade" id="exampleModalCenterBook{{ $booking->id }}"
                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">View Book
                                                        Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h6 class="font-weight-bold">Tour Name:</h6>
                                                            <p>{{ $booking->tour->tour_name }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6 class="font-weight-bold"> Name:</h6>
                                                            <p>{{ $booking->first_name }} {{ $booking->last_name }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6 class="font-weight-bold">Email:</h6>
                                                            <p>{{ $booking->email }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6 class="font-weight-bold">Telephone:</h6>
                                                            <p>{{ $booking->telephone }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6 class="font-weight-bold">Mobile:</h6>
                                                            <p>{{ $booking->mobile }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6 class="font-weight-bold">Country:</h6>
                                                            <p>{{ $booking->country }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6 class="font-weight-bold">Address:</h6>
                                                            <p>{{ $booking->address }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6 class="font-weight-bold">Post Code:</h6>
                                                            <p>{{ $booking->post_code }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6 class="font-weight-bold">Number Of Peoples:</h6>
                                                            <p>{{ $booking->number_people }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6 class="font-weight-bold">Arrival Date:</h6>
                                                            <p>{{ $booking->arrival_date }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6 class="font-weight-bold">Departure:</h6>
                                                            <p>{{ $booking->departure_date }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6 class="font-weight-bold">Book Date:</h6>
                                                            <p>{{ $booking->created_at->format('Y-M-d') }}</p>
                                                        </div>
                                                        <div class="col-md-12" style="overflow: scroll">
                                                            <h6 class="font-weight-bold">Message:</h6>
                                                            <p>{{ $booking->message }}</p>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="7">No Book Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $bookings->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Contact Section End -->
    {{-- profile update modal --}}
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter{{ Auth()->guard('customer')->user()->id }}" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.profile.update') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                value="{{ Auth()->guard('customer')->user()->first_name }}">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                value="{{ Auth()->guard('customer')->user()->last_name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ Auth()->guard('customer')->user()->email }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                value="{{ Auth()->guard('customer')->user()->address }}">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile No</label>
                            <input type="text" class="form-control" id="mobile" name="mobile"
                                value="{{ Auth()->guard('customer')->user()->mobile }}">
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" id="country" name="country"
                                value="{{ Auth()->guard('customer')->user()->country }}">
                        </div>
                        <button type="submit" class="btn btn-info">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- change password --}}
    <div class="modal fade" id="exampleModalCenterPass{{ Auth()->guard('customer')->user()->id }}" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.change.password') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="old_password">Current Password</label>
                            <input type="password" class="form-control" id="old_password" name="old_password">
                            @error('old_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="newpassword">New Password</label>
                            <input type="password" class="form-control" id="newpassword" name="new_password">
                            @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="cpassword">Confirm Password</label>
                            <input type="password" class="form-control" id="cpassword" name="confirm_password">
                            @error('confirm_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-info">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
