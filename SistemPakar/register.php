<?php
require_once "config.php";

if(isset($_POST['simpan'])){

    // mengambil data dari form
    $username = $_POST['username'];
    $pass = md5($_POST['pass']);
    $role = $_POST['role'];
    
    //proses simpan
    $sql = "INSERT INTO users VALUES (Null, '$username', '$pass', '$role')";
    if ($conn->query($sql) === TRUE) {
        header("Location: register.php?status=success");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Register</title>
  <style>
        body {
            font-family: sans-serif;
            background-image: linear-gradient(to right, #007bff, #fff);
        }
        .container {
            margin-top: 50px; /* Naikkan form lebih dekat ke bagian atas */
            margin-bottom: 50px; /* Cukup space di bawah */
        }
        .card {
            border-radius: 10px;
            overflow: hidden; /* Tambahkan ini agar warna tidak keluar dari bingkai */
        }
        .card-header {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            background-color: #007bff; /* Gunakan warna background untuk header */
            color: white; /* Warna teks putih untuk header */
        }
        .card-body {
            padding: 30px;
        }
        .form-group label {
            font-weight: 600;
        }
        h1 {
            padding-bottom: 20px;
            padding-left: 15px;
        }
        .btn {
            border-radius: 15px;
        }
    </style>
</head>
<body>
<section id="nav-bar">

<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
    <a class="navbar-brand" href="#"><img src="image/logo.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" 
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
            aria-expanded="false" aria-label="Toggle navigation">
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.html">Home</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        
      </ul>
    </div>
  </nav>
</section>
  <div class="container">
    <div class="row">
      <div class="col-lg-4 offset-lg-4">
          <h1>Silakan Registrasi</h1>
            <form action="" method="POST">
                <div class="card border-dark">
                    <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="username" maxlength="20" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="pass" maxlength="10" required>
                        </div>
                        <div class="form-group">
                            <label for="">Role</label>
                            <select class="form-control chosen" data-placeholder="Pilih Role" name="role">
                                <option value=""></option>
                                <!-- <option value="Dokter">Dokter</option> -->
                                <!-- <option value="Admin">Admin</option> -->
                                <option value="Pasien">Pasien</option>
                            </select>
                        </div>
                        <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                        <a class="btn btn-danger" href="index.html">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>

<script>
    // Check if the URL contains the parameter 'status=success'
    if (window.location.search.includes('status=success')) {
        Swal.fire({
            title: 'Registrasi Sukses',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    }
</script>
</body>
</html>
