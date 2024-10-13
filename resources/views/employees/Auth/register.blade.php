<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Registration Form | Employees </title>
    <link rel="stylesheet" href="{{ asset('css/employees_css/register.css') }}">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

   </head>
<body>
  <div class="container w-50">
    <div class="title">Registration</div>
    <div class="content">

        <x-alert name="error"/>
        
      <form action="{{ route('employees.register') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="user-details">

          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" name="name" required value="{{ old('name') }}">
          </div>

          @error('name')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror

          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" placeholder="Enter your email" name="email" required value="{{ old('email') }}">
          </div>
          @error('email')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your email" name="phone1" required value="{{ old('phone1') }}">
          </div>
          @error('phone1')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="input-box">
            <span class="details">Phone Number(Optional)</span>
            <input type="text" placeholder="Enter your number" name="phone2" value="{{ old('phone2') }}">
          </div>
          @error('phone2')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="password" required>
          </div>
          @error('password')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm your password"  name="password_confirmation"  required>
          </div>
          <div class="input-box">
            <span class="details">Image</span>
            <input type="file" placeholder="Image" name="image" required value="{{ old('image') }}">
          </div>
          @error('image')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="input-box">
            <span class="details">Secret Key</span>
            <input type="text" placeholder="Confirm your password" name="secret_key" required value="{{ old('secret_key') }}">
          </div>
          @error('secret_key')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="input-box">
            <span class="details">Birth Date</span>
            <input type="date" placeholder="Confirm your password" name="birth_date" required value="{{ old('birth_date') }}">
          </div>
          @error('birth_date')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="input-box">
            <span class="details">Gender</span>
            <select class="form-select form-select-lg mb-3" name="gender" aria-label="Large select example" value="{{ old('gender') }}">
                <option selected value="">Open this select menu</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
          </div>
          @error('gender')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

          <div class="input-box">
            <span class="details">Department</span>
            <select class="form-select form-select-lg mb-3" name="department_id" aria-label="Large select example" value="{{ old('department_id') }}">
                <option selected value="">Open this select menu</option>
                @foreach ($departments as $department )
                <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach

              </select>

          </div>
          @error('department_id')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="button">
          <input type="submit" value="Register">
        </div>
      </form>
      <div class="register text-center">
        <p>have an account <a href="{{ route('employees.LoginForm') }}">Login</a></p>
      </div>
    </div>
  </div>
</body>
</html>
