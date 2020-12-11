<?php

// memulai sesi
session_start();
// mencantumkan file setup.php (file configurasi database)
require_once '../../database/setup.php';

$nama      = mysqli_real_escape_string($koneksi, $_POST['nama']);
$email      = mysqli_real_escape_string($koneksi, $_POST['email']);
$password   = mysqli_real_escape_string($koneksi, $_POST['password']);
$password_confirmation   = mysqli_real_escape_string($koneksi, $_POST['password_confirmation']);

// validasi kesamaan password
if ($password != $password_confirmation) {
    header("location: ../../public/index.php?page=register&pesan=Password tidak cocok");
}

// cek email user
$sql    = " SELECT * FROM users where email='$email'";
$query  = mysqli_query($koneksi , $sql);
$check  = mysqli_num_rows($query);
if ($check > 0) {
    header("location: ../../public/index.php?page=register&pesan=Email yang anda masukan sudah digunakan");
}

/**
 * Cek Jumlah user, jika 0 maka status user akan menjadi admin
 */
$query_check = "SELECT * FROM users";
$sql_check   = mysqli_query($koneksi, $query_check);
if (mysqli_num_rows($sql_check) == 0) {
    $nama       = 'Muhammad Aditya Nurdin';
    $email      = 'adityanurdin0@gmail.com';
    $password   = 'qwerty12345';
    $role       = 'admin';
} else {
    $role   = 'user';
}

// membuat passowrd hash
$option = [
    'cost' => 10
];
$password   = password_hash($password, PASSWORD_BCRYPT, $option);


// input user ke DB
$query = "INSERT INTO users (nama, email , password, role) VALUE ('$nama', '$email' , '$password', '$role')";
$insert = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
if ($insert) {
    // Jika berhasil maka akan dikembalikan ke halaman login
    header("location: ../../public/index.php?page=login&info=Registrasi berhasil, silahkan login");
} else {
    // Jika gagal maka akan dikembalikan kehalaman register
    header("location: ../../public/index.php?page=register&pesan=Registrasi gagal");
}

