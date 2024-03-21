@extends('layouts.main')

@section('container')

<section class="mt-6">
    <div class="container">
        <div class="section-title">
            <h2>Checkout Barang</h2>
        </div>
        <table class="table table-bordered">
            <thead class="neu-navbar">
                <tr>
                    <th>No.</th>
                    <th>Gambar</th>
                    <th>Produk</th>
                    <th>Harga Sewa</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
            <form method="post" action="/checkout" class="mt-lg-auto" enctype="multipart/form-data">
            <?php
                $no = 1;
                $total_sewa = 0;
                foreach ($keranjang as $k) {
                    $products = DB::table('products')->where('id', $k->id_produk)->first();
                    $penyewa = DB::table('login')->where('id', $k->id_penyewa)->first();
                    $total_harga =  $products->harga_sewa * $k->jumlah;
                    $total_sewa += $total_harga;
                ?>
                 <input class="form-control" name="id_produk[]" type="hidden" value="{{$products->id}}" id="formFile">
                 <input type="hidden" name="jumlah" value="{{ $k->jumlah }}">
                <tr>
                    <td>{{ $no++ }}</td>
                    <td><img src="/storage/{!! $products->gambar !!}" wdith=398 height=100></td>
                    <td>{{ $products->name }}</td>
                    <td>Rp. {{ $products->harga_sewa }}</td>
                    <td>{{ $k->jumlah }}</td>
                    <td>Rp. {!! $total_harga !!}</td>
                </tr>
                <?php } ?>
            <tbody>
            <tfoot>
                <tr>
                    <th colspan="5">Total Sewa</th>
                    <th>Rp. {{ $total_sewa}}</th>
                    <input class="form-control" name="total" type="hidden" value="{{ $total_sewa}}" id="formFile">
                </tr>
            </tfoot>
        </table>
            <div class="row">
                @csrf
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="name" readonly value="{{Session::get('logged_in')['nama']}}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="telp" readonly value="{{Session::get('logged_in')['telp']}}" class="form-control">
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group mt-3">
                        <label><strong>Tanggal Sewa</strong></label>
                        <input type="date" class="form-control" name="tanggal_sewa" required>
                </div>
                <div class="col-md">
                <div class="form-group mt-3">
                        <label><strong>Tanggal Pengembalian</strong></label>
                        <input type="date" class="form-control" name="tanggal_pengembalian" required>
                </div>
                <div class="form-group mt-3">
                        <label><strong> Alamat</strong></label>
                        <textarea class="form-control" name="alamat_penyewa" cols="10" row="20" placeholder="Masukan Alamat Lengkap . . . " required></textarea>
                </div> 
                    <br>
                    <div class="col-md">
                        <div class="form-group mb-3">
                            <label for="formFile" class="form-label"><strong>Identitas Diri(KTP)</strong></label>
                            <input class="form-control" name= "identitas" type="file" id="formFile" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"><strong>DP</strong></label>
                        <input type="text" name="dp" value="{{ $total_sewa/2}}" readonly value="{{Session::get('logged_in')['telp']}}"class="form-control" id="exampleInputDP1">
                    </div>
                </div>
            </div>
            <div class="pull-right">
            <button class=" btn btn-info mt-3" name="kirim" ><strong>Kirim</strong></button>
            <a class="btn btn-dark mt-3" href="/keranjang"> Back</a>
            </div>
            <div class="pull-left">
            </div>
        </form>

    </div>
</section>

@endsection