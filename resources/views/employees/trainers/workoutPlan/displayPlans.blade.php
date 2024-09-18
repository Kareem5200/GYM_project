@extends('employees.layouts.trainerNav')

@section('title')

@endsection

@section('css')

@endsection

@section('content')
    @session('success')
            <div class="alert alert-success"> {{  session('success') }} </div>
    @endsession

<div class='container'>
    @foreach ($workout_plans as $plan )
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">{{ $plan->muscle }}</h5>
          <h6 class="card-subtitle mb-2 text-body-secondary">{{ $plan->days }}</h6>
          <p class="card-text">Start Date : {{ $plan->start_date }}</p>
          <p class="card-text">End Date : {{ $plan->end_date }}</p>
          <div>
              <a href="{{ route('employees.displayWorkoutPlan',$plan->id) }}" class="btn btn-success card-link">View</a>
              <a href="{{ route('employees.updateWorkoutPlan',$plan->id) }}" class="btn btn-success card-link">update</a>
                <form action="{{ route('employees.deleteWorkoutPlan',$plan->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger card-link">Delete</button>
                </form>
            </div>
        </div>
      </div>
    @endforeach
</div>

@endsection
