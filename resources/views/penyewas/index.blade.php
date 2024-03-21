@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No_hp</th>
            <th>Alamat</th>
        </tr>
        @foreach ($login as $l)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $l->nama }}</td>
            <td>{{ $l->email }}</td>
            <td>{{ $l->telp }}</td>
            <td>{{ $l->alamat }}</td>
            <td>
                <form action="/penyewas/{{$l->id}}" method="post">
                    @csrf
                    @method('DELETE')
    
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
@endsection