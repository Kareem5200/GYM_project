@extends('employees.layouts.navbar')
@section('title')
<title>Add Department</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/employees_css/addDepartment.css') }}">
@endsection

@section('content')



 <div class="container row">
    <form action="{{ route('employees.createEquipmentForDepartment',$department_id) }}" method="POST"  class="col-6">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Equipment</label>
            <select class="form-select" aria-label="Default select example" name="equipment_id">
                <option value='' selected>Open this select menu</option>
                @forelse ($equipment as $equip )
                <option value="{{ $equip->id }}">{{ $equip->name }}</option>
                @empty
                <option value='' disabled>This department has all equipment</option>
                @endforelse
              </select>

        </div>
        @error('equipment_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button class="btn btn-success"> Add </button>
    </form>
 </div>
@endsection
