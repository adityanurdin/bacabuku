<?php

	session_start();
	
	require_once '../database/setup.php';
	require_once '../core/config.php';


	function query($sql) 
	{
		require '../database/setup.php';
		
		$query = mysqli_query($koneksi , $sql);
		
		return $query;
		
	}

	function check_auth()
	{
		if(isset($_SESSION['id'])) {
			return '<script type="text/javascript">location.href = "'.route('home').'";</script>';
		}
	}

	function check_session() {
		if(!isset($_SESSION['id'])) {
			return '<script type="text/javascript">location.href = "'.route('login').'";</script>';
		}
	}

	function get_user()
	{
		if(isset($_SESSION['id'])) {

			require '../database/setup.php';

			$id = $_SESSION['id'];
			$query = " SELECT * FROM users where id='$id'";
			$sql   = mysqli_query($koneksi , $query) or die(mysqli_error());
			$data  = mysqli_fetch_assoc($sql);

			return  $data['nama'];
		} else {
			return 'Account';
		}
	}

	function get_role()
	{
		if(isset($_SESSION['id'])) {

			require '../database/setup.php';

			$id = $_SESSION['id'];
			$query = " SELECT * FROM users where id='$id'";
			$sql   = mysqli_query($koneksi , $query) or die(mysqli_error());
			$data  = mysqli_fetch_assoc($sql);

			return $data['role'];
		} else {
			return 'user';
		}
	}

	function page_title()
	{
		// Title browser
		$page = (isset($_GET['page'])) ? $_GET['page'] : '';
		return $GLOBALS['page-title'] = ucfirst($page);
	}

	function sub_page_title()
	{
		// Title browser
		$page = (isset($_GET['sub_page'])) ? $_GET['sub_page'] : '';
		return $GLOBALS['page-title'] = ucfirst($page);
	}

	function active_menu($menu)
	{
		if (page_title() == ucfirst($menu)) {
			return 'active';
		} else if (sub_page_title() == ucfirst($menu)) {
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

	function process($target)
	{
		$target_file = '../core/process/process_' . $target . '.php';
		if (file_exists($target_file)) {
			return $target_file;
		} else {
			return route('error/404');
		}
	}

	function getBaseUrl() 
	{
		// output: /myproject/index.php
		$currentPath = $_SERVER['PHP_SELF']; 

		// output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index ) 
		$pathInfo = pathinfo($currentPath); 

		// output: localhost
		$hostName = $_SERVER['HTTP_HOST']; 

		// output: http://
		$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'?'https':'http';

		// return: http://localhost/myproject/
		return $protocol.'://'.$hostName.$pathInfo['dirname']."/";
	}
