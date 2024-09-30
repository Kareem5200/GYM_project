@extends('employees.layouts.navbar')
@section('title')
<title>Transformations</title>
@endsection

@section('content')

        <div>
            <a href="{{ route('employees.addTrainerTranformation',$trainer_id) }}" class='btn btn-success'>Add Transformation</a>
        </div>

    <div class="card-group">
        @foreach ($transformations as $transformation )

        <div class="card">
            <img class="card-img-top" src="{{ asset('images/transformation/before_images/'.$transformation->image_before) }}" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">Image Before</h4>
            </div>
        </div>

        <div class="card">
            <img class="card-img-top" src="{{ asset('images/transformation/after_images/'.$transformation->image_after) }}" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">Image After</h4>
                <h5 class="card-title">Transformation Period : {{ $transformation->period }}</h5>
            </div>
        </div>

        @endforeach

    </div>

@endsection
