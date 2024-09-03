@extends('employees.layouts.navbar')
@section('title')
<title>About Us</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/employees_css/addDepartment.css') }}">
@endsection

@section('content')



 <div class="container row">
    <form action="{{ route('employees.createAboutUs') }}" method="POST" class="col-6">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Facebook</label>
            <input type="text" name="facebook" class="form-control" id="email" placeholder="Facebook page link" value="{{ old('facebook') }}">
        </div>
        @error('facebook')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="name" class="form-label">Instgram</label>
            <input type="text" name="instgram" class="form-control" id="email" placeholder="instgram page link" value="{{ old('instgram') }}">
        </div>
        @error('instgram')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="name" class="form-label">youtube</label>
            <input type="text" name="youtube" class="form-control" id="email" placeholder="youtube page link" value="{{ old('youtube') }}">
        </div>
        @error('youtube')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="name" class="form-label">X</label>
            <input type="text" name="X" class="form-control" id="email" placeholder="X page link" value="{{ old('X') }}">
        </div>
        @error('X')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="name" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" id="email" placeholder="address of gym" value="{{ old('address') }}">
        </div>
        @error('address')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="name" class="form-label">phone Number</label>
            <input type="text" name="phone1" class="form-control" id="email" placeholder="phone number" value="{{ old('phone1') }}">
        </div>
        @error('phone1')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="name" class="form-label">Admin Key</label>
            <input type="text" name="admins_key" class="form-control" id="email" placeholder="Admin Key" value="{{ old('admins_key') }}">
        </div>
        @error('admins_key')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="name" class="form-label">Trianer Key</label>
            <input type="text" name="trainers_key" class="form-control" id="email" placeholder="Trianer Key" value="{{ old('trainers_key') }}">
        </div>
        @error('trainers_key')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <button class="btn btn-success"> Create </button>
    </form>
 </div>
@endsection
