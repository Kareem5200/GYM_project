@extends('employees.layouts.navbar')


@section('content')

 <div class="container row">
    <form action="{{ route('employees.createTrainerTranformation',$trainer_id) }}" method="POST" enctype="multipart/form-data" class="col-6">
        @csrf
        <div class="mb-3">
            <label for="formFile" class="form-label">Image Before</label>
            <input class="form-control" type="file"  name="image_before" id="formFile">
        </div>
        @error('image_before')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="formFile" class="form-label">Image After</label>
            <input class="form-control" type="file"  name="image_after" id="formFile">
        </div>
        @error('image_after')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror



        <div class="mb-3">
            <label for="name" class="form-label">Certification</label>
            <input type="text" name="period" class="form-control" id="email" placeholder="period" value="{{ old('period') }}">
        </div>
        @error('period')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror



        <button class="btn btn-success"> Create </button>
    </form>
 </div>
@endsection

