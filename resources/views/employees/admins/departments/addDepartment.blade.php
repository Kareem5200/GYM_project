@extends('employees.layouts.navbar')
@section('title')
<title>Add Department</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/employees_css/addDepartment.css') }}">
@endsection

@section('content')



 <div class="container row">
    <form action="{{ route('employees.createDepartment') }}" method="POST" enctype="multipart/form-data" class="col-6">
        @csrf

        <x-input name='name' placeholder="Department" value="{{ old('name') }}"> Department Name </x-input>
        <x-input name='period' placeholder="Period" value="{{ old('period') }}"> Period </x-input>
        <x-input name='image' type='file'> Image </x-input>


        <button class="btn btn-success"> Create </button>
    </form>
 </div>
@endsection
