@extends('layouts.app')

@section('content')

<form action="{{ route('editProfile') }}" method="post">
    @csrf
    @method('PATCH')

    <x-input name="phone1" >New Phone</x-input>


    <button class="btn btn-success">Update</button>
</form>


@endsection
