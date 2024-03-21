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
        <th>name</th>
        <th>Tanggal sewa</th> 
        <th>Total</th>
        <th>Identitas</th>
        <th width="280px">Action</th>
        </tr>
        @php $i = 1; @endphp
        @foreach ($checkout as $c)
        @php
        $produk = DB::table('products')->where('id', $c->id_produk)->get();
        @endphp
        @foreach ($produk as $p)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $c->name }}</td>
            <td>{{ date('d-m-Y', strtotime($p->created_at)) }}</td>
            <td>{{ $c->total }}</td>
            <td><img src="/storage/identitas/{{ $c->identitas_diri }}" height="100" alt=""></td>
            <td><a class="btn btn-success" href="/detail/{{ $c->id }}">Detail</a></td>
        </tr>
        @endforeach
        @endforeach
    </table>
    
@endsection