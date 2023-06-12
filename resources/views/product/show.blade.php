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
    <section class="py-5" id="products">
        <h2 class="fw-bold text-center mt-2">
            <span class="text-success text-capitalize fw-bolder font-monospace">Detail</span>
            <span class="text-danger text-capitalize fw-bolder font-monospace">Produk</span>
        </h2>
        <hr>
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    <img class="card-img-top mb-5 mb-md-0" src="{{ asset('storage/product/' . $product->image) }}"
                        alt="..." />
                </div>
                <div class="col-md-6">
                    <div class="small mb-1 text-uppercase">{{ $product->category->name }}</div>
                    <h1 class="display-5 fw-bolder lh-1 text-capitalize">{{ $product->name }}</h1>
                    <hr>
                    <div class="fs-5 mb-5">
                        <!-- Product price-->
                        @if ($product['sale_price'] != 0)
                            <span
                                class="text-muted text-decoration-line-through">Rp.{{ number_format($product->price, 0) }}</span>
                            <p class="card-text fs-5" style="color: #051d15;">
                                <strong>
                                    Rp.{{ number_format($product->sale_price, 0) }}
                                </strong>
                            </p>
                        @else
                            <p class="card-text fs-5" style="color: #051d15;">
                                <strong>
                                    Rp.{{ number_format($product->price, 0) }}
                                </strong>
                            </p>
                        @endif
                    </div>
                    <p class="lead">{{ $product->description }}</p>
                    @auth
                        <div class="d-flex">
                            <a href="https://wa.me/6285691393029?text={{ urlencode('Saya ingin membeli produk ' . $product->name) }}"
                                class="btn btn-outline-success mt-2">
                                Pesan Sekarang</a>
                        </div>
                    @endauth
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-outline-success mt-2">
                            Pesan Sekarang!</a>
                    @endguest
                </div>
            </div>
        </div>
    </section>
    <!-- Related items section-->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Related products</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($related as $product)
                    <div class="col mb-5">
                        <div class="card text-center" style="width: 250px;">
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
                                <a href="https://wa.me/6285691393029?text={{ urlencode('Saya ingin membeli produk ' . $product->name) }}"
                                    class="btn btn-outline-success mt-2">
                                    Pesan</a>
                                <a href="{{ route('product.show', ['id' => $product->id]) }}"
                                    class="btn btn-outline-success mt-2">
                                    lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Rizky Apriansyah 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>
