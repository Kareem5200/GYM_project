@extends('employees.layouts.navbar')
@section('title')
<title>Updating Price</title>
@endsection

@section('content')
    <form action="{{ route('employees.editCategoryPrice',['category_id'=>$category_id,'department_id'=>$department_id]) }}" method="POST">
        @method('PUT')
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Department</label>
            <input type="number" name="price" class="form-control" id="email" placeholder="price" value="{{ old('price') }}">
        </div>

        @error('price')
        <div class="alert alert-ganger">{{ $message }}</div>
        @enderror
        <p><button class="btn btn-success">Submit Booking</button></p>
    </form>
@endsection
