<?php

$page = (isset($_GET['page'])) ? $_GET['page'] : '';
$sub_page = (isset($_GET['sub_page'])) ? $_GET['sub_page'] : '';
$path = '../views/';

	if (isset($_GET['page']))
	{
		$filename = $path.'/sub_page/'.$sub_page.'.php';
		if(file_exists($filename)) {
			include $path.'/sub_page/'.$sub_page.'.php';
		} else {
			include $path.'/sub_page/my-profile.php';
		}
	}