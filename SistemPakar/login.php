<!-- Letakkan proses login disini -->
<?php
session_start();
require "config.php";

if(isset($_POST["submit"])){

    // mengambil data dari form
    $username=$_POST["username"];
    $pass=md5($_POST["pass"]);

    // cek username dan password
    $sql = "SELECT*FROM users where username='$username' and pass='$pass'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        
        // jika login berhasil
        // membuat session
        $_SESSION['username'] = $row["username"];
        $_SESSION['role'] = $row["role"];
        $_SESSION['status'] = "y";
    
       header("Location:index.php");

    } else {
        // jika login gagal
        header("Location:?msg=n");
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Pakar</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body {
            background-image: linear-gradient(to right, #007bff, #fff);
        }
        h1 {
            padding-bottom: 20px;
            padding-left: 50px;
        }
        .card {
            border-radius: 25px;
        }
        .btn {
            border-radius: 15px;
        }
    </style>
</head>
<body>

<!-- validasi login gagal-->
<?php 
if(isset($_GET['msg'])){
    if($_GET['msg'] == "n"){
    ?>
    <div class="alert alert-danger" align="center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Login Gagal</strong>
    </div>
    <?php
    }       
}
?>

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
                    <a class="nav-link" href="home.php">Home</a>
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

<div class="container" style="margin-top:50px">
    <div class="row">
        <div class="col-lg-4 offset-lg-4">
            <h1>Silakan Login</h1>
            <form method="POST">
                <div class="card border-dark">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="username" autocomplete="off" placeholder="Masukkan username" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="pass" autocomplete="off" placeholder="Masukkan password" required>
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Login">
                        <a class="btn btn-danger" href="index.html">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
