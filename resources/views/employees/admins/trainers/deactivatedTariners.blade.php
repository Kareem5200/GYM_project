@extends('employees.layouts.navbar')
@section('title')
<title>Deactivated Trainers</title>
@endsection

@section('content')


<div class="container my-5">
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="d-flex justify-content-center flex-wrap gap-4">
        @foreach($trainers as $trainer) <!-- Adjust the number of cards by changing the loop limit -->
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('images/employees_images/'.$trainer->image) }}" class="card-img-top" alt="trainer image">
            <div class="card-body">
                <h5 class="card-title">{{ $trainer->name }}</h5>
                <p class="card-text">Trainer ID : {{ $trainer->id}}</p>
                <form action="{{ route('employees.changeTrainerStatus',$trainer->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-success">Make Active</button>
                </form>

            </div>
        </div>
        @endforeach
    </div>
</div>



{{-- <a href="{{ route('employees.addEquipment',$department->id) }}"> add equipment</a> --}}
@endsection

