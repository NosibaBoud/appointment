<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Stylesheets and Scripts -->
    <link href="/css/index.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link href="/css/main.css" rel="stylesheet">
</head>

<body class="home">
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <!-- Navigation sidebar -->
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="logo">
                    <a href="home.html"><img src="http://jskrishna.com/work/merkury/images/logo.png" alt="merkery_logo" class="hidden-xs hidden-sm">
                        <img src="http://jskrishna.com/work/merkury/images/circle-logo.png" alt="merkery_logo" class="visible-xs visible-sm circle-logo">
                    </a>
                </div>
                <div class="navi">
                    <ul>
                        <li class="active"><a href="#"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a></li>
                        <li><a href="/investigations"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Investigations</span></a></li>
                        <li><a href="/upload-pdf"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Upload Result</span></a></li>
                        <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Calendar</span></a></li>
                        <li><a href="/appointments"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Appointments</span></a></li>
                        <li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Settings</span></a></li>
                    </ul>
                </div>
            </div>

            <!-- Main content -->
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
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
                        <h1>Edit Current Investigation</h1>
                    </div>
                </header>
                
                <!-- Form for editing investigation -->
                <div class="container">
                    <!-- Display Error Message -->
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('investigations.update', $investigation->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="form-group">
                                <label>Investigation Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $investigation->name) }}" id="name" name="name" placeholder="Insert name" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Investigation Instructions</label>
                                <input type="text" class="form-control @error('instructions') is-invalid @enderror" value="{{ old('instructions', $investigation->instructions) }}" id="instructions" name="instructions" placeholder="Insert instructions" required>
                                @error('instructions')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $investigation->price) }}" id="price" name="price" placeholder="Insert price" required>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label>Investigation Details</label>
                                <textarea class="form-control @error('details') is-invalid @enderror" name="details" id="details" placeholder="Insert details" required>{{ old('details', $investigation->details) }}</textarea>
                                @error('details')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Expected Time for Investigation</label>
                                <input type="text" class="form-control @error('expected_time_for_test') is-invalid @enderror" value="{{ old('expected_time_for_test', $investigation->expected_time_for_test) }}" id="expected_time_for_test" name="expected_time_for_test" placeholder="Insert expected time" required>
                                @error('expected_time_for_test')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" class="form-control @error('status') is-invalid @enderror" value="{{ old('status', $investigation->status) }}" id="status" name="status" placeholder="Insert status" required>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Can Taken From Home?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="can_taken" id="can_taken1" value="1" {{ old('can_taken', $investigation->can_taken) == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="can_taken1">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="can_taken" id="can_taken2" value="0" {{ old('can_taken', $investigation->can_taken) == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="can_taken2">
                                    No
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
