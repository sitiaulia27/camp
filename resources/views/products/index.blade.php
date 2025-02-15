@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
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
            <th>Name</th>
            <th>Jumlah_produk</th>
            <th>Harga_sewa</th>
            <th>Keterangan</th>
            <th>Gambar</th>
            <th width="280px">Action</th>
        </tr>
        @php $i = 1; @endphp
        @foreach ($products as $product)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->jumlah_produk }}</td>
            <td>{{ $product->harga_sewa }}</td>
            <td>{{ $product->keterangan }}</td>
            <td>
                <img src="/storage{!! $product->gambar !!}" alt ="{!! $product->nama !!}" class="img-responsive" title ="{!! $product->nama !!}" width="200">
            </td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')
    
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
@endsection