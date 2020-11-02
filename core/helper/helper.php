<?php

	session_start();
	
	require_once '../database/setup.php';
	require_once '../core/config.php';
	
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

	function page_title()
	{
		// Title browser
		$page = (isset($_GET['page'])) ? $_GET['page'] : '';
		return $GLOBALS['page-title'] = ucfirst($page);
	}

	function env($data)
	{
		return $GLOBALS[$data];
	}
