@extends('layouts.app')

@section('content')

<div class="text-center m-5">

    <h3>{{ __('Plan') }} : {{ $nutration_plan->plan   }}</h3>
    <h3>{{ __('Supplements') }} : {{ $nutration_plan->supplements   }}</h3>
    <h3>{{ __('Start Date') }} : {{ $nutration_plan->start_date  }}</h3>
    <h3>{{ __('End Date') }} : {{ $nutration_plan->end_date  }}</h3>

</div>

@endsection
