@extends('employees.layouts.trainerNav')

@section('title')
<title>Update plan</title>
@endsection


@section('content')

<div class="container">
    <form action="{{ route('employees.editWorkoutPlan',$id) }}" method="POST">
        @csrf
        @method('PATCH')

        <x-alert name='error'/>

        <div class="form-floating mb-3">
            <textarea class="form-control" name="plan"  id="floatingTextarea2" style="height: 100px" >{{ $plan }}</textarea>
            <label for="floatingTextarea2">Plan</label>
        </div>
        @error('plan')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <x-input type="date" name="start_date">Start Date</x-input>
        <x-input type="date" name="end_date">End Date</x-input>

        <button class="btn btn-success">Update</button>
    </form>
</div>

@endsection
