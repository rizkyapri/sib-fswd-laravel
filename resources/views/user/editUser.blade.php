<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

</head>
<body>
    <div class="container">

<h2>Edit Pengguna</h2>
<form action="" method="post">
<label for="basic-url" class="form-label">Nama</label>
<div class="input-group mb-3">
  <input type="text" name="nama" class="form-control" value="" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="row">
    <div class="col">
        <label for="role" class="form-label" name="pilihrole">Role</label>
        <select class="form-select" aria-label="Default select example" name="pilihrole">
            <option >Open this select menu</option>
            <option value="admin" selected>Admin</option>
            <option value="staff">Staff</option>
        </select>

    </div>
    <div class="col">
        <label for="password" class="form-label">Password</label>
        <div class="input-group mb-3">
          <input type="password" name="pass" id="myInput" class="form-control" placeholder="Recipient's password" aria-label="Recipient's username" aria-describedby="basic-addon2">
          <button type="button" class="input-group-text btn btn-primary" id="basic-addon2"  onclick="hidepass()">
            lihat
          </button>
        </div>
    </div>
</div>

<div class="row">
  <div class="col">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" placeholder="name@example.com">
</div>
<div class="col">
      <label for="telepon" class="form-label">Telp</label>
    <input type="text" name="telp" class="form-control" placeholder="08967565" >
  </div>
</div>
<div class="mb-3 pt-1">
  <label for="exampleFormControlTextarea1" class="form-label">Alamat lengkap</label>
  <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
<div class="mb-3">
  <label for="formFile" class="form-label">Unggah foto</label>
  <input class="form-control" name="file" type="file" id="formFile">
</div>
<div class="mb-3">
<input class="btn btn-primary" type="submit" value="Submit" name="updateuser">
<a href="{{ route('user.index') }}" class="btn btn-primary">Kembali</a>
</div>
</form>
</div>






<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function hidepass() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>
</html>
