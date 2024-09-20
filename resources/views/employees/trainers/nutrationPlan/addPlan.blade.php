@extends('employees.layouts.trainerNav')

@section('title')
<title>Add nutration plan</title>
@endsection


@section('content')

<div class="container">
    <form action="{{ route('employees.createNutrationPlan',$user_id) }}" method="POST">
        @csrf

        @session('error')
         <div class="alert alert-danger"> {{  session('error') }} </div>
        @endsession

        <div class="form-floating mb-3">
            <select class="form-select" aria-label="Default select example" name="meal">
                <option selected value="">Open this select menu</option>
                <option value="breakfast">Breakfast</option>
                <option value="lunch">Lunch</option>
                <option value="dinner">Dinner</option>
                <option value="snacks">Snack</option>
              </select>
            <label for="floatingTextarea2">Meal</label>
        </div>
        @error('meal')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

          <div class="form-floating mb-3">
            <select class="form-select" aria-label="Default select example" name="days">
                <option selected value="">Open this select menu</option>
                <option value="day1">Day 1</option>
                <option value="day2">Day 2</option>
                <option value="day3">Day 3</option>
                <option value="day4">Day 4</option>
                <option value="day5">Day 5</option>
                <option value="day6">Day 6</option>
                <option value="day7">Day 7</option>
              </select>
            <label for="floatingTextarea2">Plan</label>
        </div>
        @error('days')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-floating mb-3">
            <textarea class="form-control" name="plan" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" >{{ old('plan') }}</textarea>
            <label for="floatingTextarea2">Plan</label>
        </div>
        @error('plan')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-floating mb-3">
            <textarea class="form-control" name="supplements" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" >{{ old('supplements') }}</textarea>
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
        <button class="btn btn-success">Create</button>
    </form>
</div>

@endsection
