<?php

	// session_start();
	
	require_once '../database/setup.php';
	require_once '../core/config.php';
	
	// if(!isset($_SESSION['id'])) {
	// 	header("location: ../login.php?pesan=Session anda tidak valid");
	// }
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

	function active_menu($menu)
	{
		if (page_title() == ucfirst($menu)) {
			return 'active';
		} else {
			return '';
		}
	}

	function env($data)
	{
		return $GLOBALS[$data];
	}

	function asset($url)
	{
		$asset = 'public/assets/' . $url;
		if (file_exists($asset)) {
			return $asset;
		} else {
			$asset = 'assets/' . $url;
			return $asset;
		}
	}

	function csrf_token()
	{
		$token = openssl_random_pseudo_bytes(32);
		$token = bin2hex($token);
		return $token;
	}

	function base_url()
	{
		return $_SERVER['SERVER_NAME'];
	}

	function route($page, $dir = '')
	{
		return base_url() . '/../../public/'.$dir.'index.php?page=' . $page;
	}
