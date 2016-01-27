<?php
	session_start();
	if (isset($_SESSION)){
		$username=$_SESSION['username'];
		session_destroy();
		$_SESSION=array();
	}else{
		$username='Guest';
	}
	
	$url='Location: ../UI/login.php?'.$username;
	header($url);