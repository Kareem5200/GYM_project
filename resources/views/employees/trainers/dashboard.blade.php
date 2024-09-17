@extends('employees.layouts.trainerNav')
@section('title')
<title>{{ Auth::guard('employees')->user()->name }} Dashboard</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/employees_css/trainer/dashboard.css') }}">

@endsection
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">

      <!-- Icon Cards-->
        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
            <div class="inforide">
              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-4 col-4 rideone">
                    <img src="{{ asset('images/backgrounds/download.jpeg') }}" class="w-100">
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                    <h4>All Nutration Clients</h4>
                    <h2>{{ $all_nutration_plan_memberships }}</h2>
                </div>
              </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
            <div class="inforide">
              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-4 col-4 rideone">
                    <img src="{{ asset('images/backgrounds/pexels-photo-1756959.jpeg') }}" class="w-100">
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                    <h4>All Workout Clients</h4>
                    <h2>{{ $all_workout_plan_memberships }}</h2>
                </div>
              </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
            <div class="inforide">
              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridetwo">
                    <img src="{{ asset('images/backgrounds/download.jpeg') }}" class="w-100">
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                    <h4>Clients Has No Nutraion Plan</h4>
                    <h2>{{ $users_without_nutration_plan }}</h2>
                </div>
              </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
            <div class="inforide">
              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridethree">
                    <img src="{{ asset('images/backgrounds/pexels-photo-1756959.jpeg') }}" class="w-100">
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                    <h4>Clients Has No Workout Plan</h4>
                    <h2>{{ $users_without_workout_plan }}</h2>
                </div>
              </div>
            </div>
        </div>

    </div>
  </div>
</div>


@endsection
