@extends('employees.layouts.navbar')

@section('title')
<title> Add Membership</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('dist/output.css') }}">
@endsection

@section('content')
<form action="{{ route('employees.editMembershipWithoutTrainer',$membership_id) }}" method="POST">
    @csrf
    @method('PATCH')

    <div class="grid grid-cols-8  gap-20  w-full">
        <div class="col-span-4 relative py-3 mx-5 my-4 sm:mx-auto">
            <div class="relative px-4 py-10 bg-white   mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
                <div class="max-w-md ">
                    <div class="flex items-center space-x-5">
                        <div
                            class="h-14 w-14 bg-blue-200 rounded-full flex flex-shrink-0 justify-center items-center text-2xl font-mono">
                            i</div>
                        <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                            <h2 class="leading-relaxed">Update an Membership</h2>
                            <p class="text-sm text-gray-500 font-normal leading-relaxed capitalize">please make sure
                                you'r
                                adding a correct data!
                            </p>
                        </div>

                    </div>
                    <div class="divide-y divide-gray-200">
                        <x-alert name='error' />

                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">

                            <div class="flex flex-col">
                                <label class="leading-loose capitalize">Category</label>
                                <select class="form-select" aria-label="Default select example" name="category_id">
                                    <option value="" selected>Open this select menu</option>
                                    @foreach ($categories as $category )
                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="flex flex-wrap items-center space-x-4">
                                <div class="flex  flex-col">
                                    <label class="leading-loose">Start Date</label>
                                    <div class="relative focus-within:text-gray-600 text-gray-400">
                                        <x-input name="start_date" type="date" placeholder="25/02/2020" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"/>

                                        <div class="absolute left-3 top-2">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                        <div class="pt-4 flex items-center space-x-4">
                            <button
                                class="bg-blue-400 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>


<div class=" col-span-4  py-3  my-4  sm:mx-auto">
    <div
        class=" px-4 py-10 text-center flex flex-col items-center justify-center bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
        <div
            class="h-14 w-14 bg-red-200 rounded-full flex flex-shrink-0 justify-center items-center text-2xl font-mono">
            <i class="fa-solid fa-triangle-exclamation"></i>

        </div>
        <h2 class="font-bold uppercase my-2">warrning</h2>
        <p>Hey Admin please make sure </p>
        <ul class="list-disc ms-2">
            <li class=" list-item text-sm text-gray-500">Start date must today or before.</li>
            <li class=" list-item text-sm text-gray-500">This membership for cash payment.</li>
        </ul>
    </div>
</div>

</div>

@endsection

@section('js')
<script src="https://cdn.tailwindcss.com"></script>


@endsection
