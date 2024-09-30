@extends('employees.layouts.navbar')
@section('title')
<title>{{ $department->name }}</title>
@endsection

@section('content')
@foreach ($equipments as $equip)
<div class="container-fluid px-0">
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner w-100">

            <div class="carousel-item active">
                <img src="{{ asset('images/departments/equipment/'.$equip->image) }}" class="d-block w-100" alt="equipment image">
                <form action="{{ route('employees.removeEquipment',['department'=>$department->id,'equipment_id'=>$equip->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-success">Remove From department</button>
                </form>
            </div>


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
@endforeach

<a href="{{ route('employees.addEquipmentForDepartment',$department->id) }}" class="btn btn-success">Add equipment for this department</a>



<div class="container my-5">
    <div class="d-flex justify-content-center flex-wrap gap-4">
        @foreach($trainers as $trainer) <!-- Adjust the number of cards by changing the loop limit -->
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('images/employees_images/'.$trainer->image) }}" class="card-img-top" alt="trainer image">
            <div class="card-body">
                <h5 class="card-title">{{ $trainer->name }}</h5>
                <p class="card-text">Active Memberships : {{ $trainer->memberships()->where('end_date','>=',now())->count() }}</p>
                <a href="{{ route('employees.trainerProfileAdmin',$trainer->id) }}" class="btn btn-primary">Profile</a>
                <a href="{{ route('employees.getTrainerMemberships',$trainer->id) }}" class="btn btn-primary">Memberships</a>
                <a href="{{ route('employees.addQualification',$trainer->id) }}" class="btn btn-primary">Add Qualification</a>
                <a href="{{ route('employees.getTrainerTranformations',$trainer->id) }}" class="btn btn-primary">Trainsformations</a>
                <form action="{{ route('employees.changeTrainerStatus',$trainer->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-danger">Make Deactive</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>



<table class="table table-success table-striped-columns">
    <thead>
        <tr>

            <th>Category</th>
            <th>Plan</th>
            <th>Price</th>
        </tr>
    </thead>
      <tbody>
        @forelse ($categories as $category )
        <tr class="table-active">
            <td>{{ $category->category }}</td>
            <td>{{ $category->plan }}</td>
            <td> {{ $category->pivot->price }} </td>
        </tr>
        @empty
        <tr>
            <td>Empty</td>
            <td>Empty</td>
            <td>Empty</td>
        </tr>

        @endforelse


      </tbody>
</table>
@endsection

