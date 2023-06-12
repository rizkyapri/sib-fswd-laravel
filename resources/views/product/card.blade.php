@extends('layouts.main')

@section('content')
    <main style="background-color: #f5f8fa; height : 100%;">
        <div class="container-fluid px-4">
            <section class="py-5">
                <div class="container">
                    <div class="row text-center product py-3" data-aos="fade-up" data-aos-offset="250" data-aos-duration="900">
                        @forelse ($products as $product)
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="card h-100">
                                    @if ($product->sale_price != 0)
                                        <!-- Sale badge-->
                                        <div class="badge bg-warning text-white position-absolute top-0 end-0">Sale</div>
                                    @endif
                                    <img src="{{ asset('storage/product/' . $product->image) }}" class="card-img-top"
                                        alt="{{ $product->name }}">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold text-capitalize">{{ $product->name }}</h5>
                                        <small class="text-strong text-center">{{ $product->category->name }}</small>
                                        <div class="d-flex justify-content-center mb-3 text-muted fs-6">
                                            @for ($i = 0; $i < $product->rating; $i++)
                                                <div class="bi-star-fill"></div>
                                            @endfor
                                        </div>
                                        <!-- Product price-->
                                        @if ($product->sale_price != 0)
                                            <span
                                                class="text-muted text-decoration-line-through">Rp.{{ number_format($product->price, 0) }}</span>
                                            <p class="card-text fs-5" style="color: #69B99D;">
                                                <strong>Rp.{{ number_format($product->sale_price, 0) }}</strong>
                                            </p>
                                        @else
                                            <p class="card-text fs-5" style="color: #69B99D;">
                                                <strong>Rp.{{ number_format($product->price, 0) }}</strong>
                                            </p>
                                        @endif
                                        <div class="d-flex justify-content-center">
                                            @auth
                                                <a href="https://wa.me/6285691393029?text={{ urlencode('Saya ingin membeli produk ' . $product->name) }}"
                                                    class="btn btn-outline-success me-2">Pesan</a>
                                            @endauth
                                            @guest
                                                <a href="{{ route('login') }}" class="btn btn-outline-success me-2">Pesan</a>
                                            @endguest
                                            <a href="{{ route('product.show', ['id' => $product->id]) }}"
                                                class="btn btn-outline-success">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-secondary w-100 text-center" role="alert">
                                <h4>Produk belum tersedia</h4>
                            </div>
                        @endforelse
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
