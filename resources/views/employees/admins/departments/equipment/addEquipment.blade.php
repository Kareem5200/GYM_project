@extends('employees.layouts.navbar')

@section('title')
<title>Add Equipment</title>
@endsection

@section('content')

<div class="container my-5">
    <div class="d-flex justify-content-center flex-wrap gap-4">

        <form action="{{ route('employees.createEquipment') }}" method="POST" enctype="multipart/form-data">
            @csrf

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Image</span>
                    <input type="file"  name="image" value="{{ old('image') }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            <button class="btn btn-success">Create</button>
        </form>
    </div>
</div>






@endsection
