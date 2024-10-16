@extends('layouts.app')



@section('content')

@forelse ($nutration_days as $plan)


<div class="card m-5 " style="width: 18rem;">
    <div class="card-body text-center">
    <h2 class="card-title">{{ $plan->days }}</h2>
    <a href="{{ route('getMealsOfDay',$plan->days) }}" class="card-link">{{ __('Get Plan') }}</a>

    </div>
</div>
@empty

<h1 classs='text-center m-5'>{{ __('You have no plans') }}</h1>

@endforelse


@endsection

