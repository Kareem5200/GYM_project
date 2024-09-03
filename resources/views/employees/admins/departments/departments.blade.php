@extends('employees.layouts.navbar')

@section('title')
<title>Departments</title>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/employees_css/departments.css') }}">
@endsection


@section('content')
@if(session('success'))
<div class="alert alert-success">{{session('success')  }}</div>
@endif
<div>
    <form action="{{ route('employees.addDepartment') }}">
        <button class="btn btn-success mt-5 ms-5">Add Department</button>
    </form>
</div>
<div class="card-list">
    @foreach ($departments as $department )
    <div class="card" style="width: 18rem;">
        <img src="{{ asset('images/departments/'.$department->image) }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $department->name }}</h5>
          <p class="card-text">{{ $department->period }}</p>
          <a href="{{ route('employees.displayDepartment',$department->id) }}" class="btn btn-primary">View</a>
          <a href="{{ route('employees.updateDepartment',$department->id) }}" class="btn btn-primary">Update</a>
        </div>
      </div>
    @endforeach
</div>
@endsection
