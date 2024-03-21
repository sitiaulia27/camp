@extends('layouts.main')

@section('container')

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/neumorphism.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">

    <title>Nota Pesanan</title>
  </head>
  <body>

<div class="container">
<section class="mt-6">
          <div class="alert alert-success alert-dismissible shadow-soft fade show" role="alert">
              <span class="alert-inner--icon"><span class="fas fa-exclamation-circle"></span></span><span class="alert-inner--text"><strong>Terimakasih!</strong> Sudah melakukan pembayaran, untuk pengambilannya silakan hubungi cp : 083148763559 </strong></span>    
            </div>
            <div class="pull-right">
            <a class=" btn btn-info mt-3" href='/cetak' target="_blank"><strong>print</strong></a>
            </div>
    
        <div class="row">
            <div class="col-md-4">
                <div class="single-product">
                    <div class="product-thumb">
                    <div class="mb-1"><h3><strong>Data Penyewa</strong></h3>
                     <strong>{{$login->nama}}</strong>
                 </div>
                 <div class="mb-6">
                     No Telpon : {{$login->telp}} <br>
                     Email : {{$login->email}}
                 </div>
                 </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-product">
                    <div class="product-thumb"> <h3><strong>Produk yang disewa</strong></h3>
                    <strong>Id. Sewa : {{$checkout[1]->id}}</strong>
                    <div class="mt-1">
                     Tanggal Penyewaan : {{ date('d-m-Y', strtotime($checkout[1]->tanggal_sewa)) }}<br>
                     Tanggal Pengembalian : {{ date('d-m-Y', strtotime($checkout[1]->tanggal_pengembalian)) }}<br>
                     Total : Rp. {{$checkout[1]->total}}
                 </div>
  
                    </div>
                </div>
            </div>
                    </div>
                </div>
            </div>
        </div>
    <table class="table table-bordered">
        <thead class="neu-navbar">
            <tr>
                <th>No.</th>
                <th>gambar</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach($checkout as $c)
            @php
            $produk = DB::table('products')->where('id', $c->id_produk)->first();
            @endphp
            <tr>
                <td>{{$no++}}</td>
                <td><img width="100" src="/storage/{{$produk->gambar}}" alt=""></td>
                <td>{{$produk->name}}</td>
                <td>{{$c->jumlah}}</td>
                <td>{{$c->jumlah*$produk->harga_sewa}}</td>
            </tr>            
            @endforeach()
        </tbody>
    </table>
    
</div>
</section>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.5.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

@endsection