@extends('layouts.main')

@section('container')
<section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Informasi</h2>
                    <h3 class="section-subheading text-muted">Syarat dan Ketentuan Penyewaan</h3>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="img/No.1.png" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                            </div>
                            <div class="timeline-body"><p class="text-muted">Kami menerima booking hanya dengan membayar DP/uang sewa min.50% dari total sewa.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="img/No.2.png" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                            </div>
                            <div class="timeline-body"><p class="text-muted">Wajib meninggalkan jaminan sewa asli (E-KTP).</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="img/No.3.png" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                            </div>
                            <div class="timeline-body"><p class="text-muted">Pembayaran wajib lunas ketika barang akan diambil/disewa.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="img/No.4.png" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                            </div>
                            <div class="timeline-body"><p class="text-muted">Penyewa wajib memeriksa kelengkapan dan kondisi barang yang akan disewa.</p></div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

@endsection