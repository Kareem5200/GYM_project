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

            <x-input name="image" type="file">Image</x-input>

            <button class="btn btn-success">Update</button>
        </form>
    </div>
</div>






@endsection
