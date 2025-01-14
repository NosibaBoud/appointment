<!-- resources/views/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Welcome to the Admin Dashboard</h1>
    <p>This is a protected route, only accessible to authenticated users.</p>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>
@endsection
