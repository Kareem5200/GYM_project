<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta name="viewport"
          content="width=device-width,
                   initial-scale=1.0">
                   @yield('title')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet"
    href="{{ asset('css/employees_css/dashborad1.css') }}">
    <link rel="stylesheet"
    href="{{ asset('css/employees_css/dashborad2.css') }}">
    @yield('css')
</head>



<body>

    <!-- for header part -->
    <header>

        <div class="logosec">
            <div class="logo">Atom GYM</div>
            <img src=
                {{ asset('images/logo.png') }}
                class="icn menuicn"
                id="menuicn"
                alt="menu-icon">
             </div>


        <div class="message">


            <div class="dp">
              <img src=
                        "{{ asset('images/employees_images/'.Auth::guard('employees')->user()->image) }}"
                    class="dpicn"
                    alt="dp">
              </div>
        </div>

    </header>

    <div class="main-container">
        <div class="navcontainer">
            <nav class="nav">
                <div class="nav-upper-options">
                    <div class="nav-option option1">

                        <a href="{{ route('employees.index') }}" class="text-decoration-none text-dark fw-bold"> Dashboard</a>
                    </div>

                    <div class="option2 nav-option">

                        <a href="{{ route('employees.departments') }}" class="text-decoration-none text-dark fw-bold">Departments</a>
                    </div>

                    <div class="nav-option option3">


                        <a href="{{ route('employees.MembershipsWithoutTrainers') }}" class="text-decoration-none text-dark fw-bold">Membserships</a>
                    </div>

                    <div class="nav-option option4">
                        <a href="{{ route('employees.categories') }}" class="text-decoration-none text-dark fw-bold">Categories</a>
                    </div>

                    <div class="nav-option option4">
                        <a href="" class="text-decoration-none text-dark fw-bold">Trainers</a>
                    </div>

                    <div class="nav-option option5">

                        <a href="{{ route('employees.profile') }}" class="text-decoration-none text-dark fw-bold">Profile</a>
                    </div>

                    <div class="nav-option option5">

                        <a href="{{ route('employees.aboutUs') }}" class="text-decoration-none text-dark fw-bold">About us</a>
                    </div>



                    <div class="nav-option logout">

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger">Logout</button>
                        </form>
                    </div>

                </div>
            </nav>
        </div>


        <main>
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/employees/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    @yield('js')
</body>
</html>
