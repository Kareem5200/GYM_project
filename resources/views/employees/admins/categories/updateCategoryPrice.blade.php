@extends('employees.layouts.navbar')
@section('title')
<title>Updating Price</title>
@endsection

@section('content')
    <form action="{{ route('employees.editCategoryPrice',['category_id'=>$category_id,'department_id'=>$department_id]) }}" method="POST">
        @method('PUT')
        @csrf
        <x-input name='price' type="number" placeholder='Price' value="{{ old('price') }}">Price</x-input>
        <button class="btn btn-success">Update</button>
    </form>
@endsection
