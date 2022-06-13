@php
  $user_id = Auth::user()->id;
// dd($user_id);
  $data = array('user_id' => $user_id);
@endphp
<header class="main-header">
   
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top pl-30">
        <!-- Sidebar toggle button-->
        
        <div>
            <ul class="nav">
                <li class="btn-group nav-item">
                    <a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon"
                        data-toggle="push-menu" role="button">
                        <i class="nav-link-icon mdi mdi-menu"></i>
                    </a>
                </li>
                <li class="btn-group nav-item">
                    <a href="#" data-provide="fullscreen"
                        class="waves-effect waves-light nav-link rounded svg-bt-icon" title="Full Screen">
                        <i class="nav-link-icon mdi mdi-crop-free"></i>
                    </a>
                </li>
                <li class="btn-group nav-item">
                   <p class="mt-3 ml-6">
                    Login User: {{Auth::user()->name}}
                   </p>
                </li>
                <li class="btn-group nav-item ml-4">
                    <p class="mt-3 ml-6">
                     Email: {{Auth::user()->email}}
                    </p>
                 </li>
            </ul>
        </div>
        <div class="navbar-custom-menu r-side">
            <ul class="nav navbar-nav">
                <!-- Notifications -->
                <li class="dropdown notifications-menu"   >
                    <span class="badge badge-custom notific mt-2" id="notification-c">  
                        @if(count($notifications) !== 0){{count($notifications)}} @endif
                    </span>
                    <a href="#" id="notification-c" class="waves-effect waves-light rounded dropdown-toggle" data-toggle="dropdown"
                        title="Notifications">
                        
                        <i class="ti-bell"></i>
                    
                    </a>
                    <ul class="dropdown-menu animated bounceIn">

                        <li class="header">
                            <div class="p-20">
                                <div class="flexbox">
                                    <div>
                                        <h4 class="mb-0 mt-0 text-white">Notifications</h4>
                                    </div>
                                    <div>
                                        <a href="{{route('databasenotifications.markasread')}}" class="text-danger">Mark All As Read</a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu sm-scrol">

                                @foreach ($notif as $value)
                                @if( $value->read_at == null)
                                <li>
                                    <a id="see-all" class="dropdown-item"   href="{{route('showbookingdetails',$value->data->id)}}">{{$value->data->user}} Trip <br>
                                    <span id="see-all" class="dropdown-item">{{ \Carbon\Carbon::parse($value->created_at)->diffForHumans() }}</span></a>
                                  
                                  
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </li>
                        <li class="footer">
                            <a id="see-all" class="dropdown-item" href="{{route('showbooking.view')}}">View all</a>
                        </li>
                    </ul>
                </li>

                <!-- User Account-->
                <li class="dropdown user user-menu">
                    <a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0" style="margin-top:22px"
                        data-toggle="dropdown" title="name">
                        {{Auth::user()->name}}
                    </a>
                    <ul class="dropdown-menu animated flipInX">
                        <li class="user-body">
                            <a class="dropdown-item" href="{{route('admin.change.password')}}"><i class="ti-settings text-muted mr-2"></i>
                                Change Password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('admin.logout')}}"><i class="ti-lock text-muted mr-2"></i>
                                Logout</a>
                        </li>
                    </ul>
                </li>
               
            </ul>
           
        </div>
    </nav>
</header>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
    // Pusher.logToConsole = true;

    var pusher = new Pusher('f983a77cf27d975168b8', {
        cluster: 'ap2',
    });
    $("#dropdownMenuButton").click(() => $("#notification-c").text(''))
    var channel = pusher.subscribe('booking');
    channel.bind('pusher:subscription_succeeded', function(data) {})

    channel.bind('App\\Events\\BookingMessage', function(data) {
        console.log(data);
        let count = +$("#notification-c").text() + 1
       
        $("#notification-count").text(+count)
        $("#notification-c").text(+count ? +count : 0);
        $(`<a class='dropdown-item text-capitalize' href=''>${data.message}</a>`)
            .insertBefore("#see-all");
        var audio = new Audio('https://res.cloudinary.com/dxfq3iotg/video/upload/v1557233524/success.mp3');
        audio.play()
    });
</script>
