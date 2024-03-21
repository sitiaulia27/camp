@extends('layouts.main')

@section('container')

<section class="mt-5">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="section-title">
          <h2>Produk yang dicari</h2>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <?php foreach ($produk as $p ) { ?>
          <div class="col-md-3">
            <div class="single-product card-body">
              <div class="prodct-thumb">
                <a href="">
                  <img src="/storage{!! $p->gambar !!}" alt="" width="250">
                </a>
              </div>

              <div class="prodct-title">
                <h3><?= $p->name ?></h3>
                <div class="product-btns">
                  <i class="mr-2 p-2 p-sm-2"> <strong><?= $p->harga_sewa?></strong></i>
                </div>
                <div class="mt-3">
                  <!-- <a href="">ads</a> -->
                  <a href="/produk/detail/{{ $p->id }}">Detail</a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>

    
  </div>
</section>

@endsection