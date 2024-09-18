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
            <h5 class="card-title">{{ $user->id }}</h5>
            <p class="card-text">{{ $user->name }}</p>
            <a href="{{ route('employees.addWorkoutPlan',$user->id) }}" class="btn btn-primary">Add Plan</a>
            <a href="" class="btn btn-primary">View Plans</a>
            </div>
        </div>
    @endforeach
</div>


@endsection
