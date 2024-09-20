@extends('employees.layouts.trainerNav')

@section('title')
<title>All plans</title>
@endsection



@section('content')
    @session('success')
            <div class="alert alert-success"> {{  session('success') }} </div>
    @endsession

<div class='container'>
    @foreach ($plan_days as $day)
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">{{ $day }}</h5>
          <div>
              <a href="{{ route('employees.displayDayPlans',['day'=>$day,'user_id'=>$user_id]) }}" class="btn btn-success card-link">View</a>
                <form action="{{ route('employees.deleteDayPlans',['day'=>$day,'user_id'=>$user_id]) }}" method="POST">
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
