@extends('layouts.app')


@section('css')
<link rel="stylesheet" href="{{ asset('css/users_css/memberships.css') }}">
@endsection

@section('content')


    <div class="receipts-wrapper">
        @forelse (Auth::user()->memberships()->activeMembership()->get() as $membership )
       <div class="receipts mx-5">

          <div class="receipt">
             <div class="details">
                <div class="item">
                   <span>{{ __('Member ID') }}</span>
                   <h3>{{ $membership->id }}</h3>
                </div>
                <div class="item">
                   <span>{{ __('Department') }}</span>
                   <h3>{{ $membership->department->name }}</h3>
                </div>
                <div class="item">
                   <span>{{ __('Start Date') }}</span>
                   <h3>{{ $membership->start_date }}</h3>
                </div>
                <div class="item">
                   <span>{{ __('End Date') }}</span>
                   <h3>{{ $membership->end_date }}</h3>
                </div>
                <div class="item">
                   <span>{{ __('Category') }}</span>
                   <h3>{{ __($membership->category->category) }}</h3>
                </div>
                <div class="item">
                   <span>{{ __('Trainer') }}</span>
                   <h3>{{ $membership->trainer->name ??  __('Has no trainer') }}</h3>
                </div>
             </div>
          </div>

        </div>
        @empty

        <div><h1>{{ __('You have no active memberships') }}</h1></div>
        @endforelse
    </div>

@endsection
