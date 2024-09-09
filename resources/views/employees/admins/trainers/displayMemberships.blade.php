@extends('employees.layouts.navbar')


@section('content')

<div>
    <div class="shadow-lg rounded-lg overflow-hidden mx-4 md:mx-10">
        <table class="w-full table-fixed">
            <thead>
                <tr class="bg-gray-100">
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">User ID</th>
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">user name</th>
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Category</th>
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">plan</th>
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">End date</th>
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Nutration plan </th>
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Workout plan </th>


                </tr>
            </thead>
            <tbody class="bg-white">
                <!-- Membership Row -->
                @forelse ($users as $user )

                <tr>
                    <td class="py-4 px-6 border-b border-gray-200">{{ $user->id }}</td>
                    <td class="py-4 px-6 border-b border-gray-200">{{ $user->name }}</td>
                    <td class="py-4 px-6 border-b border-gray-200">{{ $user->category }}</td>
                    <td class="py-4 px-6 border-b border-gray-200">{{ $user->plan }}</td>
                    <td class="py-4 px-6 border-b border-gray-200">{{ $user->end_date }}</td>
                    <td class="py-4 px-6 border-b border-gray-200">{{ $user->nutPlanExists }}</td>
                    <td class="py-4 px-6 border-b border-gray-200">{{ $user->workoutPlanExists }}</td>


                </tr>
                @empty
                <td class="py-4 px-6 border-b border-gray-200">Has no memberships</td>
                @endforelse
                <!-- Membership Row -->


                <!-- Add more rows here -->

            </tbody>
        </table>
    </div>

</div>


@endsection
