@extends('layouts.main')

@section('container')

<section class="mt-6">
    <div class="container">
        <div class="row mb-6">
            <div class="col-md-6">
                <img src="/storage{!! $produk->gambar !!}" width="500" alt="">
            </div>
            <div class="col-md-6">
                <div class="section-title">
                    <!-- <h2>Ini Laptop</h2> -->
                    <h2><?= $produk->name ?></h2>
                </div>
                <strong>Harga sewa : Rp. <?= $produk->harga_sewa ?></strong>

                <form action="/keranjang/{{$produk->id}}" method="post">
                    @csrf
                    <div class="form-group">
                        <div>
                            <strong> jumlah : <input type="number" min="1" class="user-input" max="<?= $produk->jumlah_produk?>" name="jumlah" style="width: 6em; border: none;
                                    outline: none;
                                    background: none;
                                    font-size: 18px;
                                    color: #555;
                                    padding: 1px 1px 1px 1px; margin-bottom: 10px; margin-top:10px; margin-left:20px;
                                    border-radius: 25px;
                                    box-shadow: inset 8px 8px 8px #cbced1,
                                    inset -8px -8px 8px #ffffff;" required></strong> <br> 
                            <strong> Keterangan : <?= $produk->keterangan ?> </strong><br>
                            <div class="pull-left"> <br>
                            <a class="btn btn-dark" href="/produk"> Back</a>
                            </div>
                            <?php
                            if(Session::get('logged_in')) {?>
                                <button class=" btn btn-success mt-3 pull-right" name="tambah"><strong>Sewa</strong></button>
                                
                            <?php } else {?>
                                <a href="/login">Silahkan login</a>
                            <?php } ?>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection