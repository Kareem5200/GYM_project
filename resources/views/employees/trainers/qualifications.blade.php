@extends('employees.layouts.trainerNav')
@section('title')
<title>Profile</title>
@endsection
@section('content')

@section('content')



<!-- Student Profile -->
<div class="student-profile py-4">
    <div class="container">
      <div class="row">

        @forelse (Auth::guard('employees')->user()->qualifications as $qualification )

        <div class="col-lg-4">
          <div class="card shadow-sm">
            <div class="card-header bg-transparent text-center">
              <img class="profile_img w-50" src="{{ asset('images/qualifications/'.$qualification->image ) }}" alt="">
              <h3>{{ $qualification->certification}}</h3>
            </div>
            <div class="card-body">
              <p class="mb-0"><strong class="pr-1">Certification Date: </strong>{{ $qualification->certification_date}}</p>

            </div>
          </div>
        </div>
        @empty

        Has no qualifications
        @endforelse

      </div>
    </div>
  </div>


@endsection
