@extends('employees.layouts.navbar')
@section('title')
<title>Categories</title>
@endsection


@section('css')
<link rel="stylesheet" href="{{ asset('css/employees_css/categories.css') }}">
@endsection


@section('content')
<div class="report-container">
    <x-alert name='success' alert_type='alert-success'/>
    <div class="report-header">
        <h1 class="recent-Articles">All Categories</h1>

        <form action="{{ route('employees.addCategory') }}">
            <button class="btn btn-success">Add New Category</button>
        </form>
    </div>

    <div class="report-body">
        <table style="width:60%">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Plan</th>
                    <th>Departments</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->category }}</td>
                    <td>{{ $category->plan }}</td>
                    <td>
                        <a href="{{ route('employees.categoryDepartments',$category->id) }}" class="btn btn-success">Departments</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">Has no categories</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>




@endsection



