@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/users_css/profile.css') }}">
@endsection

@section('content')
{{-- For reducing the number of queries  --}}
    @php
    $user = Auth::user();
    @endphp
{{-- Start front code  --}}
<div class="container mt-5 mb-5 p-3 d-flex justify-content-center">
     <div class="card p-4 my-5">
         <div class=" image d-flex flex-column justify-content-center align-items-center">
             <button class="btn btn-secondary">
                 <img src="{{ asset('images/users_images/'.$user->image) }}" height="100" width="100" />
                </button>
                 <span class="name mt-3">{{ $user->name }}</span>
                 <span class="idd">{{ $user->email }}</span>


                <div class=" d-flex mt-2">
                    <a class="btn1 btn-dark text-center pt-2 mx-2" href="{{ route('updateProfile') }}">Edit Profile</a>
                    <a class="btn1 btn-dark text-center pt-2" href="{{ asset('images/inbody/'.$user->inbody) }}">Open Inbody</a>
                 </div> <div class="text mt-3">
                    <span class="text-center">ID : {{ $user->id }}</span><br>
                    <span>{{ $user->phone1 }}</span>

                </div>


                     </div>
                    </div>
</div>
@endsection
