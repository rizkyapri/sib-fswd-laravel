<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table User</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        img {
            width: 50px;
            height: 50px;

        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row pt-4">
            <div class="col-5">
                <h2>Data pengguna</h2>
            </div>
            <div class="col-5">
                <a class="btn btn-primary" href="{{ route('user.create') }}">
                    <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                    Tambah User
                </a>
            </div>
            <div class="col-2">
                <a class="btn btn-primary" href="{{ route('index') }}">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Aksi</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('user.detail', ['id' => $user]) }}" class="btn btn-primary">Detail</a>
                            <a href="{{ route('user.edit') }}" class="btn btn-warning">Edit</a>
                            <a href='' class="btn btn-danger">Hapus</a>
                        </div>
                    </td>
                    <td>
                        <img src="{{ asset('images/logoRA.png') }}" class="rounded-circle">
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->role }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
