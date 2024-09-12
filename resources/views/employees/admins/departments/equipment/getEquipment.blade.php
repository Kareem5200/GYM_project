@extends('employees.layouts.navbar')
@section('title')
<title>Equiment</title>
@endsection
@section('css')
@endsection

@section('content')

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>

@endif

<a href="{{ route('employees.addEquipment') }}" class="btn btn-success">Add new equipment</a>
@forelse ($equipment as $equip )
<div class="card" style="width: 18rem;">
    <img src="{{ asset('images/departments/equipment/'.$equip->image) }}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{ $equip->name }}</h5>
      <a href="{{ route('employees.updateEquipmentImage',$equip->id) }}" class="btn btn-primary">Change Image</a>
    </div>
</div>

@empty
<h5>has no equipment</h5>

@endforelse

@endsection
