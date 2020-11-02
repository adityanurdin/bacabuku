<?php

$page = (isset($_GET['page'])) ? $_GET['page'] : '';
$path = '../views/';

	if (isset($_GET['page']))
	{
		$filename = $path.$page.'.php';
		if(file_exists($filename)) {
			include $path.$page.".php";
		} else {
			include $path.'404.php';
		}
	}