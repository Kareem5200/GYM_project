@extends('employees.layouts.trainerNav')

@section('title')

@endsection

@section('css')

@endsection

@section('content')

<div class="container">
    <form action="{{ route('employees.createWorkoutPlan',$user_id) }}" method="POST">
        @csrf

        @session('error')
         <div class="alert alert-danger"> {{  session('error') }} </div>
        @endsession

        <div class="form-floating mb-3">
            <select class="form-select" aria-label="Default select example" name="muscle">
                <option selected value="">Open this select menu</option>
                <option value="chest">Chest</option>
                <option value="back">Back</option>
                <option value="biceps">Biceps</option>
                <option value="triceps">Triceps</option>
                <option value="shoulders">Shoulders</option>
                <option value="legs">Legs</option>
                <option value="arms">Arms</option>
                <option value="back_biceps">Back and Biceps</option>
                <option value="back_triceps">Back and Triceps</option>
                <option value="chest_biceps">Chest and Biceps</option>
                <option value="chest_triceps">Chest and Triceps</option>
                <option value="chest_back">Chest and Back</option>
                <option value="shoulder_legs">shoulder and Legs</option>
                <option value="chest_triceps_shoulder">Push Day</option>
                <option value="back_biceps_shoulder">Pull Day</option>
              </select>
            <label for="floatingTextarea2">Muscle</label>
        </div>
        @error('muscle')
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
