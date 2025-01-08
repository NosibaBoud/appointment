<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<title>Investigations</title>

@extends('admindashboard.indexadmin')
@section('content')

@if($test)
    <main>
        <div class="mx-auto max-w-10xl px-7 py-8 sm:px-6 lg:px-8">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="card" style="background-color:rgba(230, 234, 234, 0.652);">
                            <div class="card-body" style="text-align: center;">
                                <h5 class="card-title" style="font-weight: bolder;">{{ $test->name }}</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" style="background-color:rgba(248, 255, 255, 0.652);">Details: {{ $test->details }}</li>
                                <li class="list-group-item" style="background-color:rgba(230, 234, 234, 0.652);">Price: {{ $test->price }}</li>
                                <li class="list-group-item" style="background-color:rgba(230, 234, 234, 0.652);">Expected time for test: {{ $test->expected_time_for_test }}</li>
                                <li class="list-group-item" style="background-color:rgba(248, 255, 255, 0.652);">Instructions: {{ $test->instructions }}</li>
                                <li class="list-group-item" style="background-color:rgba(248, 255, 255, 0.652);">Status: {{ $test->status }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@else
    <div class="alert alert-danger">
        Investigation is exist.
    </div>
@endif

@endsection
