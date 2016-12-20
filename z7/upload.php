<?php
	session_start();
	if(!isset($_COOKIE['logedIn'])) 
	{
		header("Location:index.php");
		exit();
	}
	
	$user = $_COOKIE['user'];
	$target_dir = "./uzytkownicy/".$user."/";
	if(isset($_GET['dir']))
		$target_dir = $_GET['dir']."/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	if (file_exists($target_file)) 
	{
		$_SESSION["warn"] = "<div class='err'>Plik istnieje</div>";
		$uploadOk = 0;
	}
	
	if ($_FILES["fileToUpload"]["size"] > 100000) 
	{
		$_SESSION["warn"] = "<div class='err'>Plik za duzy</div>";
		$uploadOk = 0;
	}
	

	if ($uploadOk == 0) 
		header("Location:explorer.php");

	else 
	{
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
		{
			$_SESSION["warn"] = "<div class='err' style='color:#093;'>Plik ". basename( $_FILES["fileToUpload"]["name"]). " zostal dodany.</div>";
		} 
		else 
		{
			$_SESSION["warn"] = "<div class='err'>Blad dodawania.</div>";
			header("Location:explorer.php");
		}
		header("Location:explorer.php");
	}
?>