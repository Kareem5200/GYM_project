@extends('employees.layouts.trainerNav')

@section('title')

@endsection

@section('css')

@endsection

@section('content')
<p class="lead">
    {{ $workout_plan->plan }}
</p>


@endsection
