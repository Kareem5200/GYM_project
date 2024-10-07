@extends('employees.layouts.navbar')


@section('content')


<x-alert name='error'/>

 <div class="container row">
    <form action="{{ route('employees.createQualification',$trainer_id) }}" method="POST" enctype="multipart/form-data" class="col-6">
        @csrf
     
        <x-input name="certification" placeholder="certification_date" value="{{ old('certification_date') }}">Certification</x-input>
        <x-input type="date" name="certification_date" placeholder="certification_date" value="{{ old('certification_date') }}">Certification Date</x-input>
        <x-input type="file"  name="image">Image</x-input>

        <button class="btn btn-success"> Create </button>
    </form>
 </div>
@endsection

