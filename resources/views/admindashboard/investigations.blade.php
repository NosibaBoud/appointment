<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<title>Investigations</title>
@extends('admindashboard.indexadmin')

@section('content')
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link href="/css/adminpages.css" rel="stylesheet">
    <title>Investigations</title>
</head>

<div class="container mt-4">
    <h1 class="text-3xl font-bold tracking-tight text-gray-900">Investigations</h1>
    
    <!-- Search Bar -->
    <div class="search-bar my-3">
        <form method="GET" action="{{ url('/investigation/search') }}">
            <input type="text" name="search" placeholder="Search for a medical test..." class="form-control">
            <button type="submit" class="btn btn-primary mt-2">Search</button>
        </form>
    </div>

    <!-- Create New Investigation -->
    <form method="POST" action="{{ url('/investigation/create') }}">
        @csrf
        <button class="btn btn-success mb-3">Create New Investigation</button>
    </form>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Investigations Table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tests as $test)
            <tr>
                <td>{{ $test->id }}</td>
                <td>{{ $test->name }}</td>
                <td>
                    <!-- Edit Button -->
                    <a href="/investigation/{{ $test->id }}/edit" class="btn btn-warning">Edit</a>
                    
                    <!-- View Button -->
                    <a href="/investigation/{{ $test->id }}" class="btn btn-info">View</a>
                    
                    <!-- Delete Button -->
                    <form action="{{ route('investigation.delete', $test->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $tests->links() }}
    </div>
</div>
@endsection
