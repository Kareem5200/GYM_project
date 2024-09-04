@extends('employees.layouts.navbar')

@section('title')
<title>Memberships</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('dist/output.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
@endsection

@section('content')

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

<div class="shadow-lg  md:flex justify-between rounded-lg overflow-hidden mx-4 md:mx-10 bg-white my-4 p-3">
    <div>
        <h1 class="h3 text-slate-600">Memberships page</h1>
        <p class="capitalize mb-3 text-gray-400">Here all Memberships, if you want to add new Membership </p>
        <a href="#"
            class=" w-fit text-white font-bold py-2 px-4 rounded-full bg-gradient-to-r flex from-slate-800 to-slate-400 border border-transparent transform hover:scale-110 hover:border-white transition-transform duration-3000 ease-in-out">
            Add Membership
        </a>
    </div>
    <div>
        <form
            class="mx-auto max-w-xl py-2 px-6 sm:my-4 rounded-full bg-gray-50 border flex focus-within:border-gray-300">
            <input type="text" placeholder="Search By Membership ID"
                class="bg-transparent w-full focus:outline-none pr-4 font-semibold border-0 focus:ring-0 px-0 py-0"
                name="topic">
            <button
                class="flex flex-row items-center justify-center min-w-[130px] px-4 rounded-full font-medium tracking-wide border disabled:cursor-not-allowed disabled:opacity-50 transition ease-in-out duration-150 text-base bg-slate-900 text-white font-medium tracking-wide border-transparent py-1.5 h-[38px] -mr-3">
                Search
            </button>
        </form>
    </div>


</div>

<!-- Table -->
<div>
    <div class="shadow-lg rounded-lg overflow-hidden mx-4 md:mx-10">
        <table class="w-full table-fixed">
            <thead>
                <tr class="bg-gray-100">
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Membership id</th>
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">username</th>
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">start date</th>
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">end date</th>
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">status</th>
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">department name</th>


                </tr>
            </thead>
            <tbody class="bg-white">
                <!-- Membership Row -->
                <tr>
                    <td class="py-4 px-6 border-b border-gray-200">test</td>
                    <td class="py-4 px-6 border-b border-gray-200">test</td>
                    <td class="py-4 px-6 border-b border-gray-200">test</td>
                    <td class="py-4 px-6 border-b border-gray-200">test</td>
                    <td class="py-4 px-6 border-b border-gray-200">
                        <span class="bg-green-500 text-white py-1 px-2 rounded-full text-xs">Active</span>
                    </td>
                    <td class="py-4 px-6 border-b border-gray-200">test</td>

                </tr>
                <!-- Membership Row -->

                <!-- Membership Row -->
                <tr>
                    <td class="py-4 px-6 border-b border-gray-200">test</td>
                    <td class="py-4 px-6 border-b border-gray-200">test</td>
                    <td class="py-4 px-6 border-b border-gray-200">test</td>
                    <td class="py-4 px-6 border-b border-gray-200">test</td>
                    <td class="py-4 px-6 border-b border-gray-200">
                        <span class="bg-red-500 text-white py-1 px-2 rounded-full text-xs">Inactive</span>
                    </td>
                    <td class="py-4 px-6 border-b border-gray-200">test</td>

                </tr>
                <!-- Membership Row -->


                <!-- Add more rows here -->

            </tbody>
        </table>
    </div>

</div>
<!-- Table -->




@endsection

@section('js')

@endsection