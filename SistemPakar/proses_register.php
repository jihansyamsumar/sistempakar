<?php
session_start();
require "config.php";

if(isset($_POST["submit"])){

    // mengambil data dari form
    $username = $_POST["username"];
    $pass = $_POST["pass"];

    // validasi input
    if ($pass != $confirm_password) {
        header("Location: register.html?msg=pw_mismatch");
        exit();
    }

    // mengenkripsi password
    $hashed_pass = md5($pass);

    // cek apakah username sudah digunakan
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // jika username sudah digunakan
        header("Location: register.html?msg=username_taken");
        exit();
    } 

    // memasukkan data ke database
    $sql = "INSERT INTO users (username, pass, role) VALUES ('$username', '$hashed_pass', '$role')";
    if ($conn->query($sql) === TRUE) {
        header("Location: register.html?msg=register_success");
    } else {
        header("Location: register.html?msg=register_failed");
    }
}
$conn->close();
?>