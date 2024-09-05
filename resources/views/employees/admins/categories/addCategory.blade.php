@extends('employees.layouts.navbar')
@section('title')
<title>Add Category</title>
@endsection


@section('content')
<form action="{{ route('employees.createCategory') }}" method="POST">
@csrf
    @if (session('error'))
     <div class="alert alert-ganger">{{ session('error')}}</div>
    @endif
    <label for="">Category</label>
    <select class="form-select" name="category" aria-label="Default select example">
        <option selected>Open this select menu</option>
        <option value="1month">1 Month</option>
        <option value="2months">2 Months</option>
        <option value="3months">3 Months</option>
        <option value="6months">6 Months</option>
        <option value="9months">9 Months</option>
        <option value="1year">1 Year</option>
      </select>

      @error('category')
        <div class="alert alert-ganger">{{ $message }}</div>
      @enderror

      <label for="">Department</label>
      <select class="form-select" name="department_id" aria-label="Default select example">
        <option selected>Open this select menu</option>
        @forelse ($departments as $department )
        <option value="{{ $department->id }}">{{ $department->name }}</option>
        @empty
        @endforelse
      </select>

      @error('department_id')
        <div class="alert alert-ganger">{{ $message }}</div>
      @enderror

      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Price</label>
        <input type="number" name="price" class="form-control" id="exampleFormControlInput1">
      </div>

      @error('price')
        <div class="alert alert-ganger">{{ $message }}</div>
      @enderror

    <fieldset>
    <legend>Which plan do you require?</legend>
    <p><label> <input type="radio" name="plan" required value="withoutPlans"> Without any plan </label></p>
    <p><label> <input type="radio" name="plan" required value="nutrationPlan"> With nutration plan </label></p>
    <p><label> <input type="radio" name="plan" required value="workoutPlan"> With workout plan </label></p>
    <p><label> <input type="radio" name="plan" required value="both"> With both plans </label></p>
    </fieldset>

    @error('plan')
        <div class="alert alert-ganger">{{ $message }}</div>
    @enderror





    <p><button class="btn btn-success">Submit Booking</button></p>

    </form>
@endsection
