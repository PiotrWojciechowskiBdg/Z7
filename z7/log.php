<?php
$cookie_name = "loggedin";
$servername = "localhost";
$username = "michu007_dexter";
$password = "admin";
$database = "michu007_dex";



$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn){
	die("b³±d: ".msqli_connect_error());
}

if (isset($_POST['login']))
{

	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	$phash = sha1(sha1($pass."salt")."salt");
	
	$sql = "SELECT * FROM users WHERE username='$user' AND password='$phash'";
	$result = $conn->query ($sql);
	$count = mysqli_num_rows($result);
	
	
	if ($count == 1){
		$cookie_value = $user;
		setcookie($cookie_name, $cookie_value, time()+ (86400 * 30), "/");
		header("Location: test.html");
	}
	else {
		echo "Z³e has³o lub login.";echo "<br>";
		echo '<a href="zadanie7.php">Wróæ do logowania</a>';echo "<br>";
	}
}
else if (isset($_POST['register'])){
      
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$spr = strlen($pass);
	$spr1 = mysqli_fetch_array($conn ->query("SELECT COUNT(*) FROM users WHERE username='$user' LIMIT 1"));
	if ($spr < 8 || $spr1[0] >= 1) {
  
		echo "B³±d. Has³o musi mieæ conajmniej 8 znaków lub login zajêty.";echo "<br>";
		echo '<a href="zadanie7.php">Wróæ do logowania</a>';echo "<br>";
	}
	else{
			
               
		
		$phash = sha1(sha1($pass."salt")."salt");
		echo "Zajerestrowano: $user";echo "<br>";
		echo '<a href="zadanie7.php">Wróæ do logowania</a>';
		echo "<br>";
               
 $sql = "INSERT INTO users (id, username, password, kolor) VALUES ('', '$user', '$phash', 'red')";
		$result = $conn->query($sql);


}}
?>