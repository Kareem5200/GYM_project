@extends('layouts.app')

@section('content')
<div class="m-5">

    <h3>{{ __('Plan') }}  : {{  $workout_plan->plan }}</h3>
    <h2>{{ __('Start Date') }} : {{ $workout_plan->start_date }}</h2>
    <h2>{{ __('End Date') }} : {{  $workout_plan->end_date }}</h2>

</div>

@endsection
