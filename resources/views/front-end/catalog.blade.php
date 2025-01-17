@extends('front-end.main')
@section('content')
<section class="section">
    <div class="section-body">
        <h2 class="section-title">Katalog Produk</h2>
            <p class="section-lead">
              Produk Sepatu Terbaik Anda
            </p>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    @foreach ($catalog as $ctg )
                    <div class="col-12 col-md-4 col-lg-4">
                        <article class="article article-style-c shadow">
                          <div class="article-header">
                            <div class="article-image" data-background="{{ asset('storage/'.$ctg->image) }}" style="background-image: url(&quot;{{ asset('storage/'.$ctg->image) }}&quot;);">
                            </div>
                          </div>
                          <div class="article-details">
                            <div class="article-category"><a href="#" class="btn btn-outline-primary">{{$ctg->nama}}</a> <div class="bullet"></div> <a href="#"> Publish at {{$ctg->created_at}}</a></div>
                            <div class="article-title">
                              <h2><a href="#">{{$ctg->name}}</a></h2>
                            </div>
                            <p>Ukuran  : {{$ctg->size}} </p>
                            <p>Harga  : @currency($ctg->price) </p>
                            <div class="article-cta">
                              <a href="#" class="btn btn-danger">Take it ! </a>
                            </div>
                          </div>
                        </article>
                      </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
  </section>

@endsection
