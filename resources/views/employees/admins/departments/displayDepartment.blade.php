@extends('employees.layouts.navbar')
@section('title')
<title>{{ $department->name }}</title>
@endsection

@section('content')
<div class="container-fluid px-0">
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner w-100">

            @foreach ($department->equipment as $equipment)
            <div class="carousel-item active">
                <img src="{{ asset('images/departments/equipment/'.$equipment->image) }}" class="d-block w-100" alt="equipment image">
            </div>
            <a href="">View </a>
            <a href="">Update</a>
            @endforeach

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
</div>



<div class="container my-5">
    <div class="d-flex justify-content-center flex-wrap gap-4">
        @foreach($department->trainers as $trainer) <!-- Adjust the number of cards by changing the loop limit -->
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('images/employees_images/'.$trainer->image) }}" class="card-img-top" alt="trainer image">
            <div class="card-body">
                <h5 class="card-title">{{ $trainer->name }}</h5>
                <p class="card-text">Active Memberships : {{ $trainer->users()->wherePivot('status','active')->count() }}</p>
                <a href="{{ route('employees.trainerProfile',$trainer->id) }}" class="btn btn-primary">Profile</a>
                <a href="{{ route('employees.getTrainerMemberships',$trainer->id) }}" class="btn btn-primary">Memberships</a>
                <a href="{{ route('employees.addQualification',$trainer->id) }}" class="btn btn-primary">Add Qualification</a>
            </div>
        </div>
        @endforeach
    </div>
</div>



{{-- <a href="{{ route('employees.addEquipment',$department->id) }}"> add equipment</a> --}}
@endsection

