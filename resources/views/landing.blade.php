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
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    {{-- animate --}}
    {{-- animated on scroll --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    {{-- animated hover --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css"
        integrity="sha512-SJw7jzjMYJhsEnN/BuxTWXkezA2cRanuB8TdCNMXFJjxG9ZGSKOX5P3j03H6kdMxalKHZ7vlBMB4CagFP/de0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover.css"
        integrity="sha512-Qg72y9f1a3aVc1FVnjq5YURLOOG8fDKQjMnhxYaZgBz4nIVjpVOBUtuMMMqkZPS1FlVrzzEBXq2sM6Qp1zen/Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/landing.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/landing2.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar scrolled navbar-expand-lg navbar-secondary bg-gradient-dark fixed-top">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand d-flex align-items-center" href="#" style="white-space: nowrap;">
                <span class="text-danger text-uppercase fw-bolder font-monospace">Ki</span>
                <span class="text-success text-uppercase fw-bolder font-monospace">noy</span>
                <span class="text-primary text-uppercase fw-bolder font-monospace">Sto</span>
                <span class="text-warning text-uppercase fw-bolder font-monospace">re</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($categories as $category)
                                <li><a class="dropdown-item" href="#!">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary ms-1">
                            <i class="bi-person-fill me-1"></i>
                            Dashboard
                        </a>
                    @endauth

                    @guest
                        <a href="{{ route('login') }}" class="btn btn-outline-secondary ms-1">
                            <i class="bi-person-fill me-1"></i>
                            Login
                        </a>
                    @endguest
                </form>
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
        <div class="container" data-aos="fade-up">

            <div class="py-5 d-flex justify-content-center" style="white-space: nowrap;">
                <h2 class="text-success text-uppercase fw-bolder font-monospace">Tentang&nbsp;</h2>
                <h2 class="text-warning text-uppercase fw-bolder font-monospace">Kami</h2>
            </div>

            <div class="row gy-4">
                <div class="aboutUsSc">
                    <div class="img-about">
                        <img src="{{ asset('images/iky.png') }}" alt="" class="col-xl-3">
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
    <section class="py-5 container px-4 px-lg-5 mt-5">
        <div class="kliklanjut ">
            <a href="#" class="hvr-forward arrow">Lebih Lanjut
                <i class="fa-solid fa-chevron-right"></i>
            </a>
        </div>
        <div data-aos="fade-up" data-aos-offset="250" data-aos-duration="900">
            <div class=" py-5">
                <div class="row">
                    <div class="col-md-4 mt-3">
                        <div class="card">
                            <img src="{{ asset('images/logoRA.png') }}" class="img-fluid rounded-start p-3" alt="">
                            <div class="card-body">
                                <h5 class="card-title">Tangerang</h5>
                                <small class="d-flex justify-content-start mb-3 text-muted fs-6">Jakarta,
                                    Indonesia</small>
                                <p class="card-text fs-5" style="color: #69B99D;"><strong>Rp. 750.000.000</strong></p>
                                <p class="text-muted" style="font-weight: 400;">360m² Living Area</p>
                                <a href="page/properti" class="btn btn-outline-success mt-2">Liat Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="card">
                            <img src="{{ asset('images/logoRA.png') }}" class="img-fluid rounded-start p-3" alt="">
                            <div class="card-body">
                                <h5 class="card-title">Tangerang</h5>
                                <small class="d-flex justify-content-start mb-3 text-muted fs-6">Jakarta,
                                    Indonesia</small>
                                <p class="card-text fs-5" style="color: #69B99D;"><strong>Rp. 750.000.000</strong></p>
                                <p class="text-muted" style="font-weight: 400;">360m² Living Area</p>
                                <a href="page/properti" class="btn btn-outline-success mt-2">Liat Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="card">
                            <img src="{{ asset('images/logoRA.png') }}" class="img-fluid rounded-start p-3" alt="">
                            <div class="card-body">
                                <h5 class="card-title">Tangerang</h5>
                                <small class="d-flex justify-content-start mb-3 text-muted fs-6">Jakarta,
                                    Indonesia</small>
                                <p class="card-text fs-5" style="color: #69B99D;"><strong>Rp. 750.000.000</strong></p>
                                <p class="text-muted" style="font-weight: 400;">360m² Living Area</p>
                                <a href="page/properti" class="btn btn-outline-success mt-2">Liat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- section card --}}
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                @forelse ($products as $product)
                    <div class="col mb-5">
                        <div class="card h-100">
                            @if ($product['sale_price'] != 0)
                                <!-- Sale badge-->
                                <div class="badge bg-success text-white position-absolute"
                                    style="top: 0.5rem; right: 0.5rem">Sale</div>
                            @endif

                            <!-- Product image-->
                            <img class="card-img-top" src="{{ asset('storage/product/' . $product->image) }}"
                                alt="{{ $product->name }}" />

                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-left">
                                    <!-- Product name-->
                                    <a href="#" style="text-decoration: none; color: #1F2744;"
                                        class="card-title">
                                        <h5 class="fw-bolder">{{ $product->name }}</h5>
                                    </a>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        @for ($i = 0; $i < $product->rating; $i++)
                                            <div class="bi-star-fill"></div>
                                        @endfor
                                    </div>
                                    <!-- Product price-->
                                    @if ($product['sale_price'] != 0)
                                        <span
                                            class="text-muted text-decoration-line-through">Rp.{{ number_format($product->price, 0) }}</span>
                                        Rp.{{ number_format($product->sale_price, 0) }}
                                    @else
                                        Rp.{{ number_format($product->price, 0) }}
                                    @endif
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add
                                        to cart</a></div>
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
    {{-- section pendapat --}}
    <section class="flex-shrink-0 py-5" style="background-color: rgb(230, 224, 224);">
        <div class="container mx-auto pt-12 lg:pt-14 xl:pt-20 testimonials-carousel pb-12 lg:pb-14 xl:pb-20">
            <div class="flex h-full my-auto">
                <div class="max-w-5xl flex flex-col gap-4 justify-center text-center ml-0 mr-auto items-start">
                    <h3 class="heading-medium"
                        style="color: rgb(85, 79, 79); font-family: Ovo, serif; font-weight: 400;">Toko Kinoy adalah
                        toko game terbaik yang pernah saya kunjungi di Indonesia! Banyak pilihan, harga bagus, dan
                        layanan pelanggan adalah yang terbaik. Sangat disarankan! </h3>
                    <p class="body-large" style="color: rgb(85, 79, 79);">- Nusa</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="bg-dark text-white pt-5 py-3" id="about">
        <div class="container">
            <div class="row">
                <div class="col-6 px-4">
                    <a class="navbar-brand d-flex align-items-center h2" href="#" style="white-space: nowrap;">
                        <h2 class="text-danger text-uppercase fw-bolder font-monospace">Ki</h2>
                        <h2 class="text-success text-uppercase fw-bolder font-monospace">noy</h2>
                        <h2 class="text-primary text-uppercase fw-bolder font-monospace">Sto</h2>
                        <h2 class="text-warning text-uppercase fw-bolder font-monospace">re</h2>
                    </a>
                    <p>KinoyStore merupakan toko yang menjual jasa Top Up game seperti FreeFire dan Mobile Legends.</p>
                </div>
                <div class="col-6 px-4">
                    <small class="md-5 d-block">Developed by</small>
                    <strong class="d-block">Rizky Apriansyah</strong>
                    <a class="icon" href="#"><i class="fa-brands fa-linkedin fa-xl"></i></a>
                    <a class="icon" href="#"><i class="fa-brands fa-github fa-xl"></i></a>
                    <a class="icon" href="#"><i class="fa-brands fa-gitlab fa-xl"></i></a>
                    <a class="icon" href="#"><i class="fa-brands fa-facebook fa-xl"></i></a>
                    <a class="icon" href="mailto:202410103009@mail.unej.ac.id"><i
                            class="fa-solid fa-envelope fa-xl"></i></a>
                </div>
            </div>
            <hr>
            <p class="text-center"> Copyright &copy; Rizky Apriansyah 2023</p>
        </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <!-- animate JS-->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    {{-- <script src="js/scripts.js"></script> --}}
</body>

</html>
