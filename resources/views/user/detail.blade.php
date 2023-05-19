<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="container">

        <h2>Detail Pengguna</h2>
        <form action="" method="post">
            <div class="row">
                <div class="col">
                    <label for="basic-url" class="form-label">Nama</label>
                    <div class="input-group mb-3">
                        <label for="nama">{{ $user->name }}</label>
                    </div>
                </div>

                <div class="col">
                    <label for="role" class="form-label" name="pilihrole">Role</label>
                    <div class="input-group mb-3">
                        <label for="role">{{ $user->role }}</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group mb-3">
                        <label for="role">{{ $user->email }}</label>
                    </div>
                </div>
                <div class="col">
                    <label for="telepon" class="form-label">Telp</label>
                    <div class="input-group mb-3">
                        <label for="role">{{ $user->phone }}</label>
                    </div>
                </div>
            </div>
            <div class="mb-3 pt-1">
                <label for="exampleFormControlTextarea1" class="form-label">Alamat lengkap</label>
                <div class="input-group mb-3">
                    <label for="role">{{ $user->address }}</label>
                </div>
            </div>
            <a href="{{ route('user.index') }}" class="btn btn-primary">Kembali</a>
        </form>
    </div>






    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
