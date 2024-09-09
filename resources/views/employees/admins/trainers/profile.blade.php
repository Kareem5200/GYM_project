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
      <div class="row">
        <div class="col-lg-4">
          <div class="card shadow-sm">
            <div class="card-header bg-transparent text-center">
              <img class="profile_img" src="{{ asset('images/employees_images/'.$employee->image ) }}" alt="">
              <h3>{{$employee->name  }}</h3>
            </div>
            <div class="card-body">
              <p class="mb-0"><strong class="pr-1">Employee ID: </strong>{{ $employee->id }}</p>
              <p class="mb-0"><strong class="pr-1">Title: </strong>{{ $employee->type  }}</p>
              <p class="mb-0"><strong class="pr-1">Department: </strong>{{$employee->department->name}}</p>

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
                  <td>{{ $employee->email }}</td>
                </tr>
                <tr>
                  <th width="30%">Gender</th>
                  <td width="2%">:</td>
                  <td>{{ $employee->gender }}</td>
                </tr>
                <tr>
                  <th width="30%">Phone</th>
                  <td width="2%">:</td>
                  <td>{{ $employee->phone1 }}</td>
                </tr>
                <tr>
                  <th width="30%">Phone 2</th>
                  <td width="2%">:</td>
                  <td>{{ $employee->phone2 }}</td>
                </tr>

                {{-- <tr>
                    <th width="30%">Update</th>
                    <td width="2%">:</td>
                    <td> </td>
                  </tr> --}}

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
