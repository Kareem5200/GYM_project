@extends('layouts.app')

@section('content')
<div class="m-5">

    <h2>Start date : {{ $workout_plan->start_date }}</h2>
    <h2>End date : {{  $workout_plan->end_date }}</h2>
    <h3>Plan : {{  $workout_plan->plan }}</h3>
    
</div>

@endsection
