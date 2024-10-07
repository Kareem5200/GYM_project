@extends('employees.layouts.navbar')
@section('title')
<title>Departments of {{ $category->category }}</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/employees_css/categories.css') }}">
@endsection

@section('content')

<div class="report-container">
    <x-alert name='success' alert_type='alert-success'/>
    <div class="report-header">
        <h1 class="recent-Articles">All Departments of {{ $category->category }} category ({{ $category->plan }})</h1>
    </div>

    <div class="report-body">
        <table style="width:60%">
            <thead>
                <tr>
                    <th>Department</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Change Price</th>
                    <th>Change Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($category->departments as $department)
                <tr>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->pivot->price }}</td>
                    <td>{{ $department->pivot->status }}</td>
                    <td>
                        <a href="{{ route('employees.updateCategoryPrice',['category_id'=>$category->id,'department_id'=>$department->id]) }}" class="btn btn-success">Update</a>
                    </td>
                    <td>
                        <form action="{{ route('employees.changeDepartmentStatus',['category'=>$category->id,'department_id'=>$department->id]) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <button class="btn btn-success">Change</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">Has no departments</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
