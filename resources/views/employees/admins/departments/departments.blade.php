@extends('employees.layouts.navbar')

@section('title')
<title>Departments</title>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/employees_css/departments.css') }}">
@endsection


@section('content')
@if(session('success'))
<div class="alert alert-success">{{session('success')  }}</div>
@endif

<nav class="flex px-5 my-8 py-3 text-gray-700  rounded-lg bg-gray-50 dark:bg-[#1E293B] " aria-label="Breadcrumb">


    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
            <a href="#"
                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                    </path>
                </svg>
                Home
            </a>

        </li>
        <li>
            <div class="flex items-center">
                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fillRule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clipRule="evenodd"></path>
                </svg>
                <a href="#"
                    class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Memberships</a>
            </div>
        </li>
    </ol>
</nav>




<div class="my-8 ">
    <form action="{{ route('employees.addDepartment') }}">
        <button class="rounded-full px-4 py-1 bg-slate-500 text-white">+ Add Department</button>
    </form>
</div>

<div class="grid grid-cols-12 gap-10">
    @foreach ($departments as $department )

    <div
        class="relative col-span-4 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
        <img class="w-full h-full rounded-xl blur-[2px]" src="{{ asset('images/departments/'.$department->image) }}"
            alt="Card Image">
        <div class="absolute top-0 start-0 end-0">
            <div class="p-4 md:p-5">
                <h3 class=" font-bold text-black text-2xl text-bold uppercase ">
                    {{ $department->name }}
                </h3>
                <p class="mt-1 text-black text-xl text-bold  uppercase">
                    {{ $department->period }}
                </p>
         
                <div class="flex gap-4 my-5">
                    <button>
                        <a href="{{ route('employees.displayDepartment',$department->id) }}"
                            class=" px-3 py-1 bg-slate-700/40 hover:bg-slate-700  rounded-lg">View</a>

                    </button>
                    <button>
                        <a href="{{ route('employees.updateDepartment',$department->id) }}"
                            class=" px-3 py-1 bg-slate-700/40 hover:bg-slate-700  rounded-lg">Update</a>

                    </button>

                    <form action="{{ route('employees.changeStatus',$department->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                           <button  class=" px-3 py-1 bg-slate-700/40 hover:bg-slate-700  rounded-lg">
                               Change status
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach


</div>


@endsection


@section('js')
<script src="https://cdn.tailwindcss.com"></script>
<script src={{ asset('js/preline.js') }}></script>

@endsection
