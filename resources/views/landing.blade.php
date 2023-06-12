<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>KinoyStore</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
    {{-- animated on scroll --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    {{-- animated hover --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css"
        integrity="sha512-SJw7jzjMYJhsEnN/BuxTWXkezA2cRanuB8TdCNMXFJjxG9ZGSKOX5P3j03H6kdMxalKHZ7vlBMB4CagFP/de0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover.css"
        integrity="sha512-Qg72y9f1a3aVc1FVnjq5YURLOOG8fDKQjMnhxYaZgBz4nIVjpVOBUtuMMMqkZPS1FlVrzzEBXq2sM6Qp1zen/Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    {{-- animate --}}
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/landing.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/landing2.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar scrolled navbar-expand-lg navbar-secondary bg-gradient-dark fixed-top">
        <div class="container px-4 px-lg-5">
            <div class="d-flex justify-content-start">
                <a class="navbar-brand d-flex align-items-center" href="#" style="white-space: nowrap;">
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
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="#products">Products</a></li>
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="#contact">Contact</a></li>
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

    <!-- Carousel-->
    <div id="carouselExampleIndicators" style="padding-top: 55px;" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($sliders as $slider)
                <button type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide-to="{{ $loop->iteration - 1 }}" class="{{ $loop->first ? 'active' : '' }}"
                    aria-current="{{ $loop->first ? 'true' : '' }}" aria-label="Slide 1"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($sliders as $slider)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="3000">
                    <img src="{{ asset('storage/slider/' . $slider->image) }}" class="d-block w-100"
                        alt="{{ $slider->image }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $slider->title }}</h5>
                        <p>{{ $slider->caption }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Section-->
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container mt-5 pt-2" data-aos="fade-up">

            <div class="pt-5 d-flex justify-content-center" style="white-space: nowrap;">
                <h2 class="text-success text-uppercase fw-bolder font-monospace">About&nbsp;</h2>
                <h2 class="text-warning text-uppercase fw-bolder font-monospace">Us</h2>
            </div>

            <div class="row gy-2">
                <div class="aboutUsSc">
                    <div class="img-about">
                        <img src="{{ asset('images/about1.png') }}" alt="" class="col-xl-3">
                    </div>
                    <div class="text-about text-justify font-monospace text-muted">
                        <p>Kinoy Store adalah sumber utama Anda untuk perlengkapan game. Kami menawarkan perangkat keras
                            game terbaru, termasuk konsol game, pengontrol, dan aksesori. Kami juga menyediakan kaset
                            dengan berbagai pilihan permainan, dari judul populer hingga judul khusus. Dengan layanan
                            pelanggan terbaik kami dan harga yang tidak ada duanya, Kinoy Store adalah toko serba ada
                            untuk semua kebutuhan game Anda.
                        </p>

                        <div class="visi">
                            <h4 class="fw-bolder text-center">
                                Visi :
                            </h4>
                            <p>
                                Menjadi toko perlengkapan game terbaik di Indonesia dengan menyediakan produk terbaru
                                dan terbaik untuk para gamer 1.
                        </div>
                        <div class="misi">
                            <h4 class="fw-bolder text-center">
                                Misi :
                            </h4>
                            <p>
                                memberikan layanan pelanggan
                                terbaik dan harga yang kompetitif untuk memenuhi semua kebutuhan game Anda.
                            </p>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End About Us Section -->
    <!-- card Section -->
    <section id="products" class="py-5 container px-4 px-lg-5 mt-5">
        <p href="#" class="text-center h2 mt-2 fw-bolder font-monospace text-danger">PRODUK</p>
        <div class="kliklanjut mt-2" data-aos="fade-up">
            <a href="{{ route('landing.page') }}" class="hvr-forward">Lebih Lanjut
                <i class="bi bi-caret-right-fill"></i>
            </a>
        </div>
        <div class="row text-center product py-3" data-aos="fade-up" data-aos-offset="250" data-aos-duration="900">
            <div class="col">
                <!-- Slider main container -->
                <div class="swiper mySwiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @forelse ($products as $product)
                            <div class="swiper-slide" style="width: 290px; margin: 0 auto;">
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
                                        <a href="https://wa.me/6285691393029?text={{ urlencode('Saya ingin membeli produk ' . $product->name) }}" class="btn btn-outline-success mt-2">
                                            Pesan</a>
                                        @endauth
                                        @guest
                                        <a href="{{ route('login')}}" class="btn btn-outline-success mt-2">
                                            Pesan</a>
                                        @endguest
                                        <a href="{{ route('product.show', ['id' => $product->id]) }}" class="btn btn-outline-success mt-2">
                                            lihat Detail</a>
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
            </div>
        </div>
        <!-- If we need navigation buttons -->
        <div class="row">
            <div class="toogle-slider d-flex justify-content-end mt-1">
                <i class="bi bi-caret-left-square-fill iconBg" style="font-size: 2.2rem;"></i>
                <i class="bi bi-caret-right-square-fill iconBg" style="font-size: 2.2rem; margin-left: 10px;"></i>
            </div>
        </div>
    </section>
    {{-- section card --}}
    {{-- Section Contact --}}
    <!-- Contact -->
    <section id="contact">
        <div class="container py-5">
            <div class=" mt-2 text-uppercase fw-bold text-dark text-center font-monospace fs-2">Contact</div>
            <div class="mt-5">
                <div class="row">
                    <div class="col-md-4" data-aos="fade-up" data-aos-offset="250" data-aos-duration="300">
                        <div class="card text-center mt-3">
                            <div class="card-body">
                                <h5 class="card-title text-success"><i class="bi bi-phone"
                                        style="font-size: 100px; "></i></h5>
                                <div class="mt-4">
                                    <div>
                                        <p class="text-muted text-uppercase">Telepon</p>
                                        <a href="https://wa.me/6285691393029?text=saya%20ingin%20tahu%20tentang%20produk%20Anda."
                                            class="text-muted fs-6 hvr-grow text-decoration-none">0856-9139-3029</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-offset="250" data-aos-duration="600">
                        <div class="card text-center mt-3">
                            <div class="card-body">
                                <h5 class="card-title text-danger"><i class="bi bi-envelope"
                                        style="font-size: 100px; "></i></h5>
                                <div class="mt-4">
                                    <div>
                                        <p class="text-muted text-uppercase">Email</p>
                                        <a href="mailto:kinoycv0@gmail.com"
                                            class="text-muted fs-6 hvr-grow text-decoration-none">mail@kinoy.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-offset="250" data-aos-duration="900">
                        <div class="card text-center mt-3">
                            <div class="card-body">
                                <h5 class="card-title text-warning"><i class="bi bi-clock-fill"
                                        style="font-size: 100px; "></i></h5>
                                <div class="mt-4">
                                    <div>
                                        <p class="text-muted text-uppercase">Jam kerja</p>
                                        <a class="text-muted fs-6 hvr-grow text-decoration-none">Senin - Jumat, 9:00 -
                                            17:00</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- komentar -->
    <!-- Footer-->
    <footer class="bg-dark text-white pt-5 py-3">
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
                <div class="col-6 px-4" style="font-size: 1.1rem;>
                    <small class="md-5 d-block">
                    Developed by</small>
                    <strong class="d-block">Rizky Apriansyah</strong>
                    <a class="icon" href="https://www.linkedin.com/in/aprizky/" target="_blank"><i class="bi bi-linkedin"></i></a>
                    <a class="icon" href="https://github.com/rizkyapri" target="_blank"><i class="bi bi-github"></i></a>
                    <a class="icon" href="mailto:rizkyapriansyah625@gmail.com" target="_blank"><i class="bi bi-envelope"></i></a>
                </div>
            </div>
            <hr>
            <p class="text-center"> Copyright &copy; kinoy Store 2023</p>
        </div>
    </footer>


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <!-- animate JS-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    {{-- JavaScript swiper --}}
    <script src="{{ asset('js/main.js') }}"></script>
    {{-- <script src="{{ asset('js/scripts.js') }}"></script> --}}
</body>

</html>
