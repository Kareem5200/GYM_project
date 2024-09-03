@extends('employees.layouts.navbar')
@section('title')
<title>Profile</title>
@endsection
@section('content')



<div class="container row">
    @if (session('error'))
    <div class='alert alert-danger'>{{ session('error') }}</div>

    @endif
    <form action="{{ route('employees.editPassword') }}" method="POST" class="col-6">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="name" class="form-label">Old Password</label>
            <input type="password" name="old_password" class="form-control" id="email"  >
        </div>
        @error('old_password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="period" class="form-label">New Password</label>
            <input type="password" name="password" class="form-control" id="password"  >
        </div>
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="period" class="form-label">New Password Confirmation</label>
            <input type="password" name="password_confirmation" class="form-control" id="password">
        </div>
        @error('password_confirmation')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button class="btn btn-success"> Update </button>
    </form>
 </div>

@endsection
