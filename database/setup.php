<?php

$server   = 'localhost';
$database = 'database.bacabuku';
$user     = 'root';
$pass     = '';

$koneksi = mysqli_connect($server , $user , $pass , $database);

if (!$koneksi) {
	die("Connection failed: " . mysqli_connect_error());
}