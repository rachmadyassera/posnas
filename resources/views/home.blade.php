@extends('front-end.main')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Selamat Datang di Toko Online Sepatu Monza</h4>
            </div>
            <div class="card-body">
            <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators2" data-slide-to="1" class=""></li>
                <li data-target="#carouselExampleIndicators2" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                <div class="carousel-item carousel-item-next carousel-item-left">
                    <img class="d-block w-100" src="{{ asset('storage/banner-images/tnt.jpeg') }}" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                    <h5>Sepatu Kualitas Internasional</h5>
                    <p>Produk kami datang dari luar negeri</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('storage/banner-images/tnt.jpg') }}" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                    <h5>Hampir Setiap Hari Live Buka Bal Sepatu</h5>
                    <p>Anda dapat menyaksikan live streaming penjualan kami melalui media sosial Facebook</p>
                    </div>
                </div>
                <div class="carousel-item active carousel-item-left">
                    <img class="d-block w-100" src="{{ asset('storage/banner-images/tnt2.jpg') }}" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                    <h5>Dapatkan Sepatu Terbaik Anda</h5>
                    <p>Anda dapat datang langsung ke galeri toko kami di Kota Medan - Sumatera Utara</p>
                    </div>
                </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
            </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
            <h4>Monza Branded Shoes</h4>
            </div>
            <div class="card-body">
            <p>Kami yakin dan percaya, bahwa usaha tidak akan mengkhianati hasil. Maka dari itu kami berusaha untuk memberikan layanan penjualan dengan jujur apa adanya, seluruh kondisi produk akan dijelaskan secara baik, tanpa ada yang ditutup-tutupi</p>
            </div>
            <div class="card-footer bg-whitesmoke">
            Salam Hormat pada Pelanggan Setia Kami
            </div>
        </div>
    </div>
  </section>

@endsection
