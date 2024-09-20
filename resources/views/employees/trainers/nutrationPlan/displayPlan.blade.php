@extends('employees.layouts.trainerNav')

@section('title')
<title>All plans</title>
@endsection




@section('content')
<div class='container'>

    @session('success')
    <div class="alert alert-success"> {{  session('success') }} </div>
    @endsession
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Meal</th>
                <th scope="col">Plan</th>
                <th scope="col">Supplements</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>

        @foreach ($plans as $plan)
          <tr>
            <th scope="row">{{ $plan->meal }}</th>
            <td>{{ $plan->plan }}</td>
            <td>{{ $plan->supplements }}</td>
            <td>{{ $plan->start_date }}</td>
            <td>{{ $plan->end_date }}</td>
            <td>
                <form action="{{ route('employees.updateNutrationPlan',$plan->id) }}">

                    <button class='btn btn-success'>Update</button>
                </form>
            </td>
            <td>
                <form action="{{ route('employees.deleteNutrationPlan',$plan->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class='btn btn-danger'>Delete</button>
                </form>
            </td>
          </tr>
        @endforeach

        </tbody>
      </table>
</div>

@endsection
