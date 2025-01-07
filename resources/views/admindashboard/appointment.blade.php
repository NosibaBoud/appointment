<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<head>
    <!--styles-->
    <head><link href="/css/appointmentstyle.css" rel="stylesheet">
        <link href="/css/main.css" rel="stylesheet">
    </head>
  </head>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<body class="home">
  
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="logo">
                    <a hef="home.html"><img src="http://jskrishna.com/work/merkury/images/logo.png" alt="merkery_logo" class="hidden-xs hidden-sm">
                        <img src="http://jskrishna.com/work/merkury/images/circle-logo.png" alt="merkery_logo" class="visible-xs visible-sm circle-logo">
                    </a>
                </div>
                <div class="navi">
                    <ul>
                        <li><a href="/investigations"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">investigations</span></a></li>
                        <li><a href="/upload-pdf"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Updload Result</span></a></li>
                        <li  class="active"><a href="/appointments"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">appointments</span></a></li>
                        <li><a href="#"><i class="fa fa-log out" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Logout</span></a></li>
                      
                        @Auth
                        <form method="POST" action="/logout">
                         @csrf
                         <button class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">logout</button>
                        </form>
                        @endauth
                    </ul>
                   
                </div>
            </div>
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
                <div class="row">
                    <header>
                        <div class="col-md-7">
                            <nav class="navbar-default pull-left">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </nav>
                            <h1>Appointment Details</h1>
                            <div class="appointment-info">
                                <div class="info-row">
                                    <span class="label">Appointment ID:</span>
                                    <span class="value">{{ $appointment->id }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="label">First Name:</span>
                                    <span class="value">{{ $appointment->first_name }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="label">Last Name:</span>
                                    <span class="value">{{ $appointment->last_name }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="label">Gender:</span>
                                    <span class="value">{{ $appointment->gender }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="label">Phone Number:</span>
                                    <span class="value">{{ $appointment->phone_number }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="label">Email:</span>
                                    <span class="value">{{ $appointment->email }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="label">Date:</span>
                                    <span class="value">{{ $appointment->date }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="label">Time:</span>
                                    <span class="value">{{ $appointment->time }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="label">Address:</span>
                                    <span class="value">{{ $appointment->address }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="label">Investigation(s):</span>
                                    @foreach ($appointment->user->mytests as $test)
                                        <br>
                                        <span class="value">{{ $test->investigation->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                            
                            <a href="{{ route('appointment.index') }}" class="back-btn">Back to Appointments</a>
</body>

