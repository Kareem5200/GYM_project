@extends('employees.layouts.navbar')

@section('title')
<title>Update Departments</title>
@endsection

@section('content')
<div class="container row">

    <x-alert name='error' />

    <form action="{{ route('employees.editDepartment',$department->id) }}" method="POST" enctype="multipart/form-data" class="col-6">
        @csrf
        @method('PATCH')

        <x-input name='period' placeholder="Period" value="{{ $department->period }}"> Period </x-input>
        <x-input name='image' type='file'> Image </x-input>



        <button class="btn btn-success"> Update </button>
    </form>
 </div>

@endsection

