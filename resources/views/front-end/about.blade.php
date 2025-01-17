@extends('front-end.main')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header">
                      <h4>Tentang Kami</h4>
                    </div>
                    <div class="card-body">
                      <div class="media">
                        <div class="chocolat-parent mr-3">
                            <a href="{{ asset('storage/banner-images/tnt.jpg') }}" class="chocolat-image" title="Just an example">
                              <div data-crop-image="385" style="overflow: hidden; position: relative;  width: 485px;">
                                <img alt="image" src="{{ asset('storage/banner-images/tnt.jpg') }}" class="img-fluid">
                              </div>
                            </a>
                          </div>
                        <div class="media-body">
                          <h5 class="mt-0">Sepatu Monza</h5>
                          <p class="mb-3">Penjual Sepatu Bekas yang produknya didatangkan dari Luar Negeri, yang mana hampir seluruh brand international dapat anda peroleh, dengan kondisi siap dipakai, dan tentunya harga terjangkau. Kami juga menerima reseller sebagai rekanan bisnis kami.</p>
                          <p>Kami juga memiliki galeri toko, yang ber domisili di Kota Medan, Sumatera Utara. Untuk mempermudah anda untuk melihat langsung koleksi produk sepatu kami, kami akan sangat senang jika anda berkenan berkunjung ke galeri sepatu kami.</p>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
  </section>

@endsection
