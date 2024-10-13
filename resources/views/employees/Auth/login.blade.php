<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form | Employees</title>
  <link rel="stylesheet" href="{{ asset('css/employees_css/login.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
  <div class="wrapper">
    <form action="{{ route('employees.login') }}" method="POST">
        @csrf
      <h2>Login</h2>


      <x-alert name="error"/>

        <div class="input-field">
        <input type="email" name="email" required>
        <label>Enter your email</label>
      </div>
      @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <div class="input-field">
        <input type="password" name="password" required>
        <label>Enter your password</label>
      </div>
      @error('password')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember" name="remember_me">
          <p>Remember me</p>
          </label>
        {{-- <a href="#">Forgot password?</a> --}}
      </div>
      <button type="submit">Log In</button>
      <div class="register">
        <p>Don't have an account? <a href="{{ route('employees.registerForm') }}">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>
