@extends('employees.layouts.navbar')
@section('title')
<title>Profile</title>
@endsection
@section('content')
@section('css')
<link rel="stylesheet" href="">
@endsection


<!-- Student Profile -->
<div class="student-profile py-4">
    <div class="container">

        <x-alert name='success' alert_type='alert-success'/>

      <div class="row">
        <div class="col-lg-4">
          <div class="card shadow-sm">
            <div class="card-header bg-transparent text-center">
              <img class="profile_img" src="{{ asset('images/employees_images/'.$trainer->image ) }}" alt="">
              <h3>{{$trainer->name  }}</h3>
            </div>
            <div class="card-body">
              <p class="mb-0"><strong class="pr-1">Employee ID: </strong>{{ $trainer->id }}</p>
              <p class="mb-0"><strong class="pr-1">Title: </strong>{{ $trainer->type  }}</p>
              <p class="mb-0"><strong class="pr-1">Department: </strong>{{$trainer->department->name}}</p>

            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card shadow-sm">
            <div class="card-header bg-transparent border-0">
              <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
            </div>
            <div class="card-body pt-0">
              <table class="table table-bordered">
                <tr>
                  <th width="30%">Email</th>
                  <td width="2%">:</td>
                  <td>{{ $trainer->email }}</td>
                </tr>
                <tr>
                  <th width="30%">Gender</th>
                  <td width="2%">:</td>
                  <td>{{ $trainer->gender }}</td>
                </tr>
                <tr>
                  <th width="30%">Phone</th>
                  <td width="2%">:</td>
                  <td>{{ $trainer->phone1 }}</td>
                </tr>
                <tr>
                  <th width="30%">Phone 2</th>
                  <td width="2%">:</td>
                  <td>{{ $trainer->phone2 }}</td>
                </tr>
              </table>
            </div>
          </div>
        </div>




        @foreach ($trainer->qualifications as $qualification )
            <div class="col-lg-4">
                <div class="card shadow-sm">
                <div class="card-header bg-transparent border-0">
                    <h3 class="mb-0"><i class="far fa-clone pr-1"></i>{{ $qualification->certification }}</h3>
                </div>
                <div class="card-body pt-0">
                    <table class="table table-bordered">

                    <tr>
                        <th width="30%">Certification Date</th>
                        <td width="2%">:</td>
                        <td>{{$qualification->certification_date  }}</td>
                    </tr>
                    <tr>
                        <th width="30%">Certification Image</th>
                        <td width="2%">:</td>
                        <td><img src="{{ asset('images/qualifications/'.$qualification->image) }}" alt=""></td>
                    </tr>

                    </table>
                </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
  </div>


@endsection
