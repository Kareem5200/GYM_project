@extends('employees.layouts.navbar')

@section('title')
<title>Add Equipment</title>
@endsection

@section('content')

<div class="container my-5">
    <div class="d-flex justify-content-center flex-wrap gap-4">

        <form action="{{ route('employees.editEquipmentImage',$equipment_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Image</span>
                    <input type="file"  name="image"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            <button class="btn btn-success">Create</button>
        </form>
    </div>
</div>






@endsection
