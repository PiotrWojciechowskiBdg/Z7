<?php
	session_start();
	if(!isset($_COOKIE['logedIn'])) 
	{
		header("Location:index.php");
		exit();
	}
	
	$user = $_COOKIE['user'];
	$target_dir = "./uzytkownicy/".$user."/";
	if(isset($_GET['filename']))
		$target_dir = $_GET['filename'];
	header("Location:explorer.php");
	if(unlink($target_dir))
		$_SESSION["warn"] = "<div class='err' style='color:#093;'>Usunieto</div>";
?>