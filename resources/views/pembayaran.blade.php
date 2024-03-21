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
    <title>Pembayaran</title>
  </head>
  <body>

<section class="mt-6">
     <div class="container">
     <div class="section-title">
        <h2>Konfirmasi Pembayaran</h2>
    </div>
    <br>
    <div class="container">
    <div class="alert alert-danger alert-dismissible shadow-soft fade show" role="alert">
    <span class="alert-inner--icon"><span class="fas fa-exclamation-circle"></span></span><span class="alert-inner--text"><strong>Silahkan!</strong> Melakukan pembayaran sebesar <strong>Rp. </strong> ke  <strong>BANK BRI Syariah 6788854678342355 AN Ahmad Sudrajat </strong></span>    
    </div>
    <form action="/pembayaran" method="post" enctype="multipart/form-data">
      @csrf
    <div class="form-group">
        <label for="nama"><strong> Nama</strong></label>
        <input type="text" class="form-control" name="nama" value="{{$checkout->name}}" style="width: 100%; border: none;
                                outline: none;
                                background: none;
                                font-size: 18px;
                                color: #555;
                                padding: 3px 3px 3px 3px; margin-bottom: 10px; margin-top:10px; margin-left:20px;
                                border-radius: 5px;
                                box-shadow: inset 8px 8px 8px #cbced1,
                                    inset -8px -8px 8px #ffffff;">
    </div>
    <div class="form-group">
        <label for="bank"><strong> Bank</strong></label>
        <select class="form-select form-select-lg mb-3" name="bank" aria-label=".form-select-lg example" style="width: 100%; border: none;
                                outline: none;
                                background: none;
                                font-size: 18px;
                                color: #555;
                                padding: 3px 3px 3px 3px; margin-bottom: 10px; margin-top:10px; margin-left:20px;
                                border-radius: 5px;
                                box-shadow: inset 8px 8px 8px #cbced1,
                                    inset -8px -8px 8px #ffffff;">
          <option selected>Pilih bank</option>
          <option value="Mandiri">Mandiri</option>
          <option value="BRI">BRI</option>
          <option value="BNI">BNI</option>
        </select>
        <!-- <input type="text" class="form-control" name="bank" style="width: 100%; border: none;
                                outline: none;
                                background: none;
                                font-size: 18px;
                                color: #555;
                                padding: 3px 3px 3px 3px; margin-bottom: 10px; margin-top:10px; margin-left:20px;
                                border-radius: 5px;
                                box-shadow: inset 8px 8px 8px #cbced1,
                                    inset -8px -8px 8px #ffffff;"> -->
    </div>
    <div class="form-group">
        <label for="jumlah"><strong> Jumlah</strong></label>
        <input type="text" readonly value="Rp. {{$checkout->dp}}" class="form-control" name="jumlah" style="width: 100%; border: none;
                                outline: none;
                                background: none;
                                font-size: 18px;
                                color: #555;
                                padding: 3px 3px 3px 3px; margin-bottom: 10px; margin-top:10px; margin-left:20px;
                                border-radius: 5px;
                                box-shadow: inset 8px 8px 8px #cbced1,
                                    inset -8px -8px 8px #ffffff;">
    </div>
    <div class="form-group">
        <label for="bukti"><strong>Foto bukti</strong></label>
        <input type="file" class="form-control" name="bukti" style="width: 100%; border: none;
                                outline: none;
                                background: none;
                                font-size: 18px;
                                color: #555;
                                padding: 3px 3px 3px 3px; margin-bottom: 10px; margin-top:10px; margin-left:20px;
                                border-radius: 5px;
                                box-shadow: inset 8px 8px 8px #cbced1,
                                    inset -8px -8px 8px #ffffff;"> <br>
                                    <div class="alert alert-secondary alert-dismissible shadow-soft fade show" role="alert">
    <span class="alert-inner--icon"><span class="fas fa-exclamation-circle"></span></span>
    <span class="alert-inner--text"><strong>Foto bukti harus berupa file jpg, jpeg, dan png dan tidak lebih dari 2MB</strong></span>
    </div>
    <button class="btn mb-5 btn-info"  name="kirim" cols=10 row=20><strong>Kirim!</strong></button>

    </form>
       
</section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
@endsection