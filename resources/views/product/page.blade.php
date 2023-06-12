<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>KinoyStore</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/landing2.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar scrolled navbar-expand-lg navbar-secondary bg-gradient-dark fixed-top">
        <div class="container px-4 px-lg-5">
            <div class="d-flex justify-content-start">
                <a class="navbar-brand d-flex align-items-center" href="{{ route('landing') }}"
                    style="white-space: nowrap;">
                    <span class="text-danger text-uppercase fw-bolder font-monospace">Ki</span>
                    <span class="text-success text-uppercase fw-bolder font-monospace">noy</span>
                    <span class="text-primary text-uppercase fw-bolder font-monospace">Sto</span>
                    <span class="text-warning text-uppercase fw-bolder font-monospace">re</span>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link " aria-current="page" href="{{ route('landing') }}">Home</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="#products">Products</a></li>
                    @auth
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                                <img class="rounded-circle" src="{{ asset('images/defaultava.png') }}"
                                    style="height: 20px;">
                                Dashboard
                            </a>
                        </li>
                    @endauth
                    @guest
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-outline-secondary">
                                <i class="bi-person-fill me-1"></i>
                                Login
                            </a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <!-- Product section-->
    <section id="products" class="pt-5 container px-4 px-lg-5 mt-5">
        <p href="#" class="text-center h2 mt-2 fw-bolder font-monospace text-danger">
            <span class="text-danger text-capitalize fw-bolder font-monospace">Produk</span>
            <span class="text-success text-capitalize fw-bolder font-monospace">atau</span>
            <span class="text-primary text-capitalize fw-bolder font-monospace">Katalog</span>
        </p>
        <div class="d-flex justify-content-between">
            <a class="btn btn-success d-flex justify-content-start" href="{{ route('landing.find') }}">Cari Produk<i class="bi bi-search ps-2"></i></a>
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    @if (isset($selectedCategory))
                        {{ $selectedCategory }}
                    @else
                        All Produk
                    @endif
                </button>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ route('landing.page') }}">All Produk</a>
                    </li>
                    @foreach ($categories as $category)
                        <li><a class="dropdown-item"
                                href="{{ route('landing.page', ['category' => $category->name]) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>


        </div>
        <div class="row text-center product py-3" data-aos="fade-up" data-aos-offset="250" data-aos-duration="900">
            <div class="col d-flex gap-3 no-wrap">
                @forelse ($products as $product)

                    <div class="card" style="width: 290px;">
                        @if ($product['sale_price'] != 0)
                            <!-- Sale badge-->
                            <div class="badge bg-warning text-white position-absolute"
                                style="top: 0.5rem; right: 0.5rem">Sale</div>
                        @endif
                        <img src="{{ asset('storage/product/' . $product->image) }}"
                            class="img-fluid rounded-start p-3" alt="{{ $product->name }}">
                        <small class="text-strong text-center">{{ $product->category->name }}</small>
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-capitalize">{{ $product->name }}</h5>
                            <small class="d-flex justify-content-start mb-3 text-muted fs-6">
                                @for ($i = 0; $i < $product->rating; $i++)
                                    <div class="bi-star-fill"></div>
                                @endfor
                            </small>
                            <!-- Product price-->
                            @if ($product['sale_price'] != 0)
                                <span
                                    class="text-muted text-decoration-line-through">Rp.{{ number_format($product->price, 0) }}</span>
                                <p class="card-text fs-5" style="color: #69B99D;">
                                    <strong>
                                        Rp.{{ number_format($product->sale_price, 0) }}
                                    </strong>
                                </p>
                            @else
                                <p class="card-text fs-5" style="color: #69B99D;">
                                    <strong>
                                        Rp.{{ number_format($product->price, 0) }}
                                    </strong>
                                </p>
                            @endif
                            @for ($i = 0; $i < $product->rating; $i++)
                                <div class="bi-star-fill"></div>
                            @endfor
                            @auth
                            <a href="https://wa.me/6285691393029?text={{ urlencode('Saya ingin membeli produk ' . $product->name) }}"
                                class="btn btn-outline-success mt-2">
                                Pesan</a>
                            @endauth
                            @guest
                            <a href="{{ route('login') }}"
                                class="btn btn-outline-success mt-2">
                                Pesan</a>
                            @endguest
                            <a href="{{ route('product.show', ['id' => $product->id]) }}"
                                class="btn btn-outline-success mt-2">
                                lihat Detail</a>
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
    <!-- Product section-->
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Kinoy Store 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>