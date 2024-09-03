@extends('employees.layouts.navbar')
@section('title')
<title>Dashboard</title>
@endsection
@section('content')


<div class="box-container ps-5 pt-5 ms-5 mt-5">

    <div class="box box1">
        <div class="text">
            <h2 class="topic-heading">{{ $trainers_number }}</h2>
            <h2 class="topic">Trainers</h2>
        </div>

        <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(31).png"
            alt="Views">
    </div>

    <div class="box box2">
        <div class="text">
            <h2 class="topic-heading">{{ $users_number }}</h2>
            <h2 class="topic">Users</h2>
        </div>

        <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210185030/14.png"
             alt="likes">
    </div>

    <div class="box box3">
        <div class="text">
            <h2 class="topic-heading">{{ $memberships }}</h2>
            <h2 class="topic">Active Memberships</h2>
        </div>

        <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(32).png"
            alt="comments">
    </div>


    @forelse ($departments as $department )
    <div class="box box4">
        <div class="text">
            <h2 class="topic-heading">{{ $department->memberships_count }}</h2>
            <h2 class="topic">{{ $department->name }}</h2>
        </div>
        <img src=
      "https://media.geeksforgeeks.org/wp-content/uploads/20221210185029/13.png" alt="published">
    </div>
    @empty

    <div class="box box4">
        <div class="text">
            <h2 class="topic-heading">Has no departments</h2>

        </div>
        <img src=
      "https://media.geeksforgeeks.org/wp-content/uploads/20221210185029/13.png" alt="published">
    </div>

    @endforelse


</div>


<div class="report-container">
    <div class="report-header">
        <h1 class="recent-Articles">Recent Memberships</h1>

        <form action="">
        <button class="view">View All</button>
        </form>
    </div>

    <div class="report-body">
        <div class="report-topic-heading">
            <h3 class="t-op">User ID </h3>
            <h3 class="t-op">User name</h3>
            <h3 class="t-op">Department</h3>
            <h3 class="t-op">Start date</h3>
            <h3 class="t-op">End date</h3>
        </div>

        <div class="items ">

            @forelse ($month_memberships as $membership )
            <div class="item1">
                <h3 class="t-op-nextlvl">{{$membership->trainee->id }}</h3>
                <h3 class="t-op-nextlvl">{{$membership->trainee->name }}</h3>
                <h3 class="t-op-nextlvl">{{$membership->department->name }}</h3>
                <h3 class="t-op-nextlvl">{{$membership->start_date }}</h3>
                <h3 class="t-op-nextlvl">{{$membership->end_date }}</h3>
            </div>
            @empty
            <h3 class=" text-center">Has no memberships this month</h3>
            @endforelse



        </div>



@endsection



