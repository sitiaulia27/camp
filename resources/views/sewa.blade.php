@extends('layouts.main')

@section('container')
<br>
<br>
<br>
<from>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Nama</label>
  <input type="email" class="form-control" id="exampleFormControlInput1">
</div>

<div class="form-group">
	<label for="tanggal_mulai">Tanggal</label>
	<input type="date" name="tanggal" required="" class="form-control" id="tanggal">
</div>

<div class="mb-3">
  <label for="formFile" class="form-label">upload </label>
  <input class="form-control" type="file" id="formFile">
</div>

<div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
<button type="submit" class="btn btn-primary">Submit</button>
</from>

@endsection