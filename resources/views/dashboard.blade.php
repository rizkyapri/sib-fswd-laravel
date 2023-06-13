@extends('layouts.main')

@section('content')
    <main style="background-color: #f5f8fa; height : 100%;">
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="col-md-10 ">
                <div class="row ">
                    <div class="col-xl-3 col-lg-6">
                        <div class="card l-bg-cherry">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i></div>
                                <div class="mb-4">
                                    <h5 class="card-title mb-0">Products</h5>
                                </div>
                                <div class="row align-items-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0">
                                            {{ $product_count }}
                                        </h2>
                                    </div>
                                </div>
                                <div class="progress mt-1 " data-height="8" style="height: 8px;">
                                    <div class="progress-bar l-bg-cyan" role="progressbar"
                                        data-width="{{ ($product_count / 50) * 100 }}%" aria-valuenow="{{ $product_count }}"
                                        aria-valuemin="0" aria-valuemax="50"
                                        style="width: {{ ($product_count / 50) * 100 }}%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card l-bg-blue-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                                <div class="mb-4">
                                    <h5 class="card-title mb-0">Customers</h5>
                                </div>
                                <div class="row align-items-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0">
                                            {{ $user_count }}
                                        </h2>
                                    </div>
                                </div>
                                <div class="progress mt-1 " data-height="8" style="height: 8px;">
                                    <div class="progress-bar l-bg-green" role="progressbar"
                                        data-width="{{ ($user_count / 50) * 100 }}%" aria-valuenow="{{ $user_count }}"
                                        aria-valuemin="0" aria-valuemax="50"
                                        style="width: {{ ($user_count / 50) * 100 }}%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card l-bg-green-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large"><i class="far fa-thumbs-up"></i></div>
                                <div class="mb-4">
                                    <h5 class="card-title mb-0">Approve</h5>
                                </div>
                                <div class="row align-items-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0">
                                            {{ $approve_count }}
                                        </h2>
                                    </div>
                                </div>
                                <div class="progress mt-1 " data-height="8" style="height: 8px;">
                                    <div class="progress-bar l-bg-cyan" role="progressbar"
                                        data-width="{{ ($user_count / 50) * 100 }}%" aria-valuenow="{{ $user_count }}"
                                        aria-valuemin="0" aria-valuemax="50"
                                        style="width: {{ ($user_count / 50) * 100 }}%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card l-bg-red-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large"><i class="far fa-thumbs-down"></i></div>
                                <div class="mb-4">
                                    <h5 class="card-title mb-0">Rejected</h5>
                                </div>
                                <div class="row align-items-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0">
                                            {{ $reject_count }}
                                        </h2>
                                    </div>
                                </div>
                                <div class="progress mt-1 " data-height="8" style="height: 8px;">
                                    <div class="progress-bar l-bg-orange" role="progressbar"
                                        data-width="{{ ($user_count / 50) * 100 }}%" aria-valuenow="{{ $user_count }}"
                                        aria-valuemin="0" aria-valuemax="50"
                                        style="width: {{ ($user_count / 50) * 100 }}%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
    {{-- card approve --}}
    <main style="background-color: #f5f8fa; height: 100%;">
        <div class="container-fluid px-4">
            <h1 class="mt-4">Approve and Rejected</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Status only</li>
            </ol>
            <section class="py-5">
                <div class="container">
                    <div class="row text-center product py-3" data-aos="fade-up" data-aos-offset="250"
                        data-aos-duration="900">
                        @forelse ($products as $product)
                            @if ($product->approve)
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                    <div class="card h-100">
                                        @if ($product->sale_price != 0)
                                            <!-- Sale badge-->
                                            <div class="badge bg-warning text-white position-absolute top-0 end-0">Sale
                                            </div>
                                        @endif
                                        <img src="{{ asset('storage/product/' . $product->image) }}" class="card-img-top"
                                            alt="{{ $product->name }}">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold text-capitalize">{{ $product->name }}</h5>
                                            <div class="d-flex flex-column align-items-center">
                                                <small
                                                    class="text-strong text-center mb-2">{{ $product->category->name }}</small>
                                                <div class="badge bg-success">Approved</div>
                                            </div>
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
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                    <div class="card h-100">
                                        @if ($product->sale_price != 0)
                                            <!-- Sale badge-->
                                            <div class="badge bg-warning text-white position-absolute top-0 end-0">Sale
                                            </div>
                                        @endif
                                        <img src="{{ asset('storage/product/' . $product->image) }}" class="card-img-top"
                                            alt="{{ $product->name }}">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold text-capitalize">{{ $product->name }}</h5>
                                            <div class="d-flex flex-column align-items-center">
                                                <small
                                                    class="text-strong text-center mb-2">{{ $product->category->name }}</small>
                                                <div class="badge bg-danger">Reject</div>
                                            </div>
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
                                        </div>
                                    </div>
                                </div>
                            @endif
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
