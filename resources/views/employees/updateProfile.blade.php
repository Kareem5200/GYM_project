@extends('employees.layouts.navbar')
@section('title')
<title>Profile</title>
@endsection
@section('content')



<div class="container row">
    <form action="{{ route('employees.editProfile') }}" method="POST" class="col-6">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="name" class="form-label">Phone</label>
            <input type="text" name="phone1" class="form-control" id="email" placeholder="phone" value="{{ Auth::guard('employees')->user()->phone1 }}">
        </div>
        @error('phone1')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="period" class="form-label">Phone 2 (Optional)</label>
            <input type="text" name="phone2" class="form-control" id="password" placeholder="phone 2" value="{{ Auth::guard('employees')->user()->phone2 }}">
        </div>
        @error('phone2')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <button class="btn btn-success"> Update </button>
    </form>
 </div>

@endsection
