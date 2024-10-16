@extends('layouts.app')

@section('content')

<div class="text-center m-5">

    <h3>Plan : {{ $nutration_plan->plan   }}</h3>
    <h3>Supplements : {{ $nutration_plan->supplements   }}</h3>
    <h3>Start date : {{ $nutration_plan->start_date  }}</h3>
    <h3>End date : {{ $nutration_plan->end_date  }}</h3>

</div>

@endsection
