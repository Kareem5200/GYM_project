@extends('employees.layouts.trainerNav')

@section('title')

@endsection

@section('css')

@endsection

@section('content')

    <div class="container">
        @foreach ($users as $user)
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('images/users_images/'.$user->image) }}" class="card-img-top" alt="User">
                <div class="card-body">
                <h5 class="card-title">User ID : {{ $user->id }}</h5>
                <p class="card-text">User Name : {{ $user->name }}</p>
                <a href="{{ route('employees.addWorkoutPlan',$user->id) }}" class="btn btn-primary">Add Plan</a>
                </div>
            </div>
        @endforeach
    </div>

@endsection
