@extends('employees.layouts.navbar')


@section('content')

 <div class="container row">
    <form action="{{ route('employees.createTrainerTranformation',$trainer_id) }}" method="POST" enctype="multipart/form-data" class="col-6">
        @csrf

        <x-input type="file"  name="image_before">Image Before</x-input>
        <x-input type="file"  name="image_after">Image After</x-input>
        <x-input name="period" placeholder="period" value="{{ old('period') }}">Period</x-input>



        <button class="btn btn-success"> Create </button>
    </form>
 </div>
@endsection

