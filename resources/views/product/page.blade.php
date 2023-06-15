<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>KinoyStore</title>
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('images/webicon.png') }}" type="image/x-icon">
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
                <img src="{{ asset('images/logo.png') }}" alt="" class="img-fluid" style="height: 40px;">
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
                    <li class="nav-item"><a class="nav-link " aria-current="page"
                            href="{{ route('landing') }}#about">About</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#products">Products</a>
                    </li>
                    <li class="nav-item"><a class="nav-link " aria-current="page"
                            href="{{ route('landing') }}#contact">Contact</a></li>
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
            <a class="btn btn-success d-flex justify-content-start" href="{{ route('landing.find') }}">Cari Produk<i
                    class="bi bi-search ps-2"></i></a>
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
            @forelse ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card">
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
    </section>
    <!-- Product section-->
    <!-- Footer-->
    <footer class="text-white pt-5 py-3" style="background-color: #082858">
        <div class="container">
            <div class="row">
                <div class="col-6 px-4">
                    <a class="navbar-brand d-flex align-items-center h2" href="#" style="white-space: nowrap;">
                        <h2 class="text-danger text-uppercase fw-bolder font-monospace">Ki</h2>
                        <h2 class="text-success text-uppercase fw-bolder font-monospace">noy</h2>
                        <h2 class="text-primary text-uppercase fw-bolder font-monospace">Sto</h2>
                        <h2 class="text-warning text-uppercase fw-bolder font-monospace">re</h2>
                    </a>
                    <p>KinoyStore merupakan toko dimana anda mendapatkan gear game terbaik.</p>
                </div>
                <div class="col-6 px-4" style="font-size: 1.1rem;">
                    <small class="md-5 d-block">
                    Developed by</small>
                    <strong class="d-block">Rizky Apriansyah</strong>
                    <a class="icon text-white" href="https://www.linkedin.com/in/aprizky/" target="_blank"><i class="bi bi-linkedin"></i></a>
                    <a class="icon text-warning" href="mailto:rizkyapriansyah625@gmail.com" target="_blank"><i class="bi bi-envelope"></i></a>
                </div>
            </div>
            <hr>
            <p class="text-center"> Copyright &copy; kinoy Store 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>
