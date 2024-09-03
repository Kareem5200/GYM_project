@extends('employees.layouts.navbar')

@section('title')
<title>Update Departments</title>
@endsection

@section('content')
<div class="container row">
    @if (session('error'))
    <div classs="alert alert-danger">{{ session('error') }}</div>
    @endif
    <form action="{{ route('employees.editDepartment',$department->id) }}" method="POST" enctype="multipart/form-data" class="col-6">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="period" class="form-label">Period</label>
            <input type="text" name="period" class="form-control" id="password" placeholder="Period" value="{{ $department->period }}">
        </div>
        @error('period')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" type="file"  name="image" id="formFile">
        </div>
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button class="btn btn-success"> Create </button>
    </form>
 </div>

@endsection

