<?php

	session_start();
	
	require_once '../database/setup.php';
	
	if(!isset($_SESSION['id'])) {
		header("location: ../login.php?pesan=Session anda tidak valid");
	}
	
	function sayHello($text) 
	{
		return strtoupper($text);
	}
	
	function create($koneksi , $sql) 
	{
		require_once '../database/setup.php';
		
		$query = mysqli_query($koneksi , $sql);
		
		return $query;
		
	}