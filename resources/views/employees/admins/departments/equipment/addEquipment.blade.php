@extends('employees.layouts.navbar')

@section('title')
<title>Add Equipment</title>
@endsection

@section('content')

<div class="container my-5">
    <div class="d-flex justify-content-center flex-wrap gap-4">

        <form action="{{ route('employees.createEquipment') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <x-input name="name"  value="{{ old('name') }}">Name</x-input>
            <x-input name="image" type="file">Image</x-input>

            <button class="btn btn-success">Create</button>
        </form>
    </div>
</div>






@endsection
