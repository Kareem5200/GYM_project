@extends('employees.layouts.trainerNav')

@section('title')
<title>Update nutration plan</title>
@endsection


@section('content')

<div class="container">
    <form action="{{ route('employees.editNutrationPlan',$nutration_plan->id) }}" method="POST">
        @csrf
        @method('PATCH')

        @session('error')
         <div class="alert alert-danger"> {{  session('error') }} </div>
        @endsession


        <div class="form-floating mb-3">
            <textarea class="form-control" name="plan" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" >{{ $nutration_plan->plan }}</textarea>
            <label for="floatingTextarea2">Plan</label>
        </div>
        @error('plan')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-floating mb-3">
            <textarea class="form-control" name="supplements" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" >{{ $nutration_plan->supplements }}</textarea>
            <label for="floatingTextarea2">Supplments</label>
        </div>
        @error('supplements')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <div class="form-floating mb-3">
            <input type="date" class="form-control" id="floatingInput" name="start_date">
            <label for="floatingInput">Start Date</label>
        </div>
        @error('start_date')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-floating mb-3">
            <input type="date" class="form-control" id="floatingInput" name="end_date" >
            <label for="floatingInput">End Date</label>
        </div>
        @error('end_date')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button class="btn btn-success">Update</button>
    </form>
</div>

@endsection
