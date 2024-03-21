@extends('layouts.main')

@section('container')
<br>
<br>
<br>
<br>
<div class="row justify-content-center">
    <div class="center col-lg-3">
        <main class="form-signin">
          @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
          @endif
          <form action="{{ url('/register') }}" method="post"> 
            @csrf
            <center>
            <img class="center mb-4" src="img/logo.png" alt ="" width="72" height="57">
            </center>
            <h1 class="h3 mb-3 fw-normal text-center" >Registration Form</h1>
            <div class="mb-3">
            <label for="exampleInputName1" class="form-label">Name</label>
            <input type="text" name = "name" class = "form-control"  id = "name" required>
            </div> 
            <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Username</label>
            <input type="text" name = "username" class="form-control" id="username" required>
            </div>
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input email="email" name = "email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name ="password" class="form-control" id="password" required>
            </div>
            <div class="mb-3">
            <label for="exampleInputAlamat1" class="form-label">Alamat</label>
            <input type="text" name ="alamat" class="form-control" id="alamat" required>
            </div>
            <div class="mb-3">
            <label for="exampleInputTelp1" class="form-label">Telp</label>
            <input type="text" name ="telp" class="form-control" id="telp" required>
            </div>

          
            <button class="w-100 btn btn-lg btn-info mt-3" type="submit">Register</button>  
          </form>
          <small class="d-block text-center mt-3 color: white">Already resgisted? <a href="/login">Login</a></small>
        </main> 
</div>



@endsection