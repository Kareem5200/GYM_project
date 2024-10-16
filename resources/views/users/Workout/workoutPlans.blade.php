@extends('layouts.app')



@section('content')

    @forelse ($workout_info as $info)


    <div class="card m-5 " style="width: 18rem;">
        <div class="card-body text-center">
        <h2 class="card-title">{{ $info->days }}</h2>
        <h3 class="card-subtitle mb-2 text-body-secondary">{{ $info->muscle }}</h3>
        <a href="{{ route('getworkoutPlan',$info->id) }}" class="card-link">{{ __('Get Plan') }}</a>

        </div>
    </div>
    @empty

    <h1 classs='text-center m-5'>{{ __('You have no plans') }}</h1>

    @endforelse


@endsection
