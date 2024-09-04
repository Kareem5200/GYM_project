@extends('employees.layouts.navbar')
@section('title')
<title>About Us</title>
@endsection


@section('css')
<link rel="stylesheet" href="{{ asset('css/employees_css/categories.css') }}">
@endsection


@section('content')
<div class="report-container">
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="report-header">
        <h1 class="recent-Articles">About Us</h1>

        @empty($aboutUs)
        <form action="{{ route('employees.addAboutUs') }}">
            <button class="btn btn-success">Add New Data</button>
        </form>
        @endempty
    </div>

    <div class="report-body">
        <table style="width:60%">
            <thead>
                <tr>
                    <th>Facebook</th>
                    <th>Instagram</th>
                    <th>Youtube</th>
                    <th>X</th>
                    <th>Address</th>
                    <th>Phone 1</th>
                    <th>Admins Key</th>
                    <th>Trainers Key</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>

                @isset($aboutUs)

                <tr>
                    <td>{{ $aboutUs->facebook }}</td>
                    <td>{{ $aboutUs->instgram }}</td>
                    <td>{{ $aboutUs->youtube }}</td>
                    <td>{{ $aboutUs->X }}</td>
                    <td>{{ $aboutUs->address }}</td>
                    <td>{{ $aboutUs->phone1 }}</td>
                    <td>{{ $aboutUs->admins_key }}</td>
                    <td>{{ $aboutUs->trainers_key }}</td>
                    <td><a href="{{ route('employees.updateAboutUs',$aboutUs->id) }}" class="btn btn-success">Update</a>
                    </td>

                </tr>
                @endisset



            </tbody>
        </table>
    </div>
</div>

@endsection