@extends('layouts.main')

@section('content')
    <main style="background-color: #f5f8fa; height : 100%;">
        <div class="container-fluid px-4">
            <h1 class="my-4">Create Brand</h1>

            <div class="card mb-4">
                <div class="card-body">

                    <form action="{{ route('brand.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('brand.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </main>
@endsection
