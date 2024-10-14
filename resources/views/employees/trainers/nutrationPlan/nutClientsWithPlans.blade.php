@extends('employees.layouts.trainerNav')

@section('title')
<title>Clients with plan</title>

@endsection


@section('content')
<div class="container">

    @foreach ($users as $user)
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('images/users_images/'.$user->image) }}" class="card-img-top" alt="User">
            <div class="card-body">
            <h5 class="card-title">User ID : {{ $user->id }}</h5>
            <p class="card-text">User Name : {{ $user->name }}</p>
            <p class="card-text">Phone 1 : {{ $user->phone1 }}</p>
            <p class="card-text">Phone 2 : {{ $user->phone2  ?? 'Has no second phone'}}</p>
            <a href="{{ route('employees.addNutrationPlan',$user->id) }}" class="btn btn-primary">Add Plan</a>
            <a href="{{ route('employees.displayNutrationPlans',$user->id) }}" class="btn btn-primary">View Plans</a>
            <a href="{{ asset('images/inbody/'.$user->inbody) }}" target="_blank">
                <button class="btn btn-success">Inbody Image</button>
            </a>
            </div>
        </div>
    @endforeach
    {{ $users->links() }}
</div>


@endsection
