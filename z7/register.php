<?php
	session_start();
	if(isset($_COOKIE['logedIn'])) 
	{
		header("Location:explorer.php");
		exit();
	}
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Zadanie 7</title>
	<link rel="stylesheet" href="main.css">
</head>

<body>
	<div id="container">
		<div class="title">Rejestracja</div>
		<div class="underline"></div>
		
		<form method="POST" action="adduser.php">
		<br>
		Nazwa:<br><input type="text" name="user"><br>
		Haslo:<br><input type="password" name="password"><br>
		Haslo:<br><input type="password" name="password2"><br>
		<input type="submit" value="Rejestruj"/>
		</form>
		
		<?php
			if(isset($_SESSION['err']))
			{
				echo $_SESSION['err'];
				unset($_SESSION['err']);
			}
		?>
		
		<a href="index.php">
		<div class="button">Wstecz</div>
		</a>
	
	</div>
</body>
</html>