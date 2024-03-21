@extends('layouts.main')

@section('container')

<section class="mt-6">
    <div class="container">
        <div class="section-title">
            <h2>Kantong Belanja</h2>
        </div>
        <table class="table table-bordered">
            <thead class="neu-navbar table-bordered">
                <tr>
                    <th>No.</th>
                    <th>Gambar</th>
                    <th>Produk</th>
                    <th>Harga sewa</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($keranjang as $k) {
                    $products = DB::table('products')->where('id', $k->id_produk)->first();
                    $penyewa = DB::table('login')->where('id', $k->id_penyewa)->first();
                ?>
                <tr>
                    <td>{{ $no++ }}</td>
                    <td><img src="/storage{!! $products->gambar !!}" wdith=398 height=100></td>
                    <td>{{ $products->name }}</td>
                    <td>Rp. {{ $products->harga_sewa }}</td>
                    <td>{{ $k->jumlah }}</td>
                    <td>Rp. {!! $products->harga_sewa * $k->jumlah !!}</td>
                    <td><a class="btn btn-danger" href="/keranjang/hapus/{{$k->id}}">Hapus</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="pull-left">
            <a class="btn btn-dark" onclick="history.back()"> Back</a>
            </div>
            <div class="pull-right">
        <a href="/produk" class="btn btn-primary mr-3 mb-6">Lanjut pilih produk</a>
        <a href="/checkout" class="btn btn-success mb-6">Checkout Barang</a>
        </div>
    </div>
</section>

@endsection