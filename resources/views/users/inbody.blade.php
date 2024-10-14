@extends('layouts.app')


@section('content')

    <form action="{{ route('editInbody') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

        <x-input type="file" name="inbody">{{ __('auth.Inbody') }} </x-input>
        <button class="btn btn-success">{{ __('Update') }}</button>
    </form>

@endsection
