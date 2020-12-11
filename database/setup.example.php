<?php


date_default_timezone_set('Asia/Jakarta');

$server   = 'localhost';
$database = 'dummy';
$user     = 'root';
$pass     = '';

$koneksi = mysqli_connect($server , $user , $pass , $database);

if (!$koneksi) {
	die("Connection failed: " . mysqli_connect_error());
}