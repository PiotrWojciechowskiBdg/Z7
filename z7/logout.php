<?php
setcookie("loggedin", "val", time() - (86400 * 30), "/");
header("Location: zadanie7.php");
?>