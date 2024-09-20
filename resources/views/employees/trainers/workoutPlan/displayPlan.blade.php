@extends('employees.layouts.trainerNav')

@section('title')
<title>{{ $workout_plan->muscle }}</title>
@endsection


@section('content')
<p class="lead">
    {{ $workout_plan->plan }}
</p>


@endsection
