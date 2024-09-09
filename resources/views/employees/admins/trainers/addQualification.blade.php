@extends('employees.layouts.navbar')


@section('content')


@if (session('error'))
<div  class="alert alert-danegr">{{ session('error')  }}</div>
@endif

 <div class="container row">
    <form action="{{ route('employees.createQualification',$trainer_id) }}" method="POST" enctype="multipart/form-data" class="col-6">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Certification</label>
            <input type="text" name="certification" class="form-control" id="email" placeholder="certification" value="{{ old('certification') }}">
        </div>
        @error('certification')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="period" class="form-label">Certification Date</label>
            <input type="date" name="certification_date" class="form-control" id="password" placeholder="certification_date" value="{{ old('certification_date') }}">
        </div>
        @error('certification_date')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="formFile" class="form-label">Image</label>
            <input class="form-control" type="file"  name="image" id="formFile">
        </div>
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button class="btn btn-success"> Create </button>
    </form>
 </div>
@endsection

