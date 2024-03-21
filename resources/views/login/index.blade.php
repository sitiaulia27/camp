@extends('layouts.loginmain')

@section('container')
<br>
<br>
<br>
<br>
<br>
<br>

<div class="row justify-content-center">
    <div class="center col-md-3">
        <main class="form-signin">
          <center>
            <img class="center col-mb-4" src="img/logo.png" alt ="" width="72" height="57">
          </center>
          <h1 class="h3 mb-3 fw-normal text-center" >Please Login</h1>
          
          <form action="/login" method="post">
            @csrf
            <div class="form-floating">
              <input name="username" type="text" class="form-control" id="floatingInput" placeholder="name" required>
              <label for="floatingInput">Username</label>
            </div>
            <br>
            <div class="form-floating">
              <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
              <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-info" type="submit">Login</button>  
          </form>
          <small class="d-block text-center mt-3">Not registered? <a href="/register">Register Now!</a></small>
        </main> 
</div>


@endsection
