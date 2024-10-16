@extends('layouts.app')

@section('content')

<form action="{{ route('editProfile') }}" method="post">
    @csrf
    @method('PATCH')

    <x-input name="phone1" >{{ __('New Phone') }}</x-input>
    <button class="btn btn-success">{{ __('Update') }}</button>
</form>


@endsection
