<?php
session_start();
unset($_SESSION["username"]);
setcookie("user", "", time() + (86400 * 30), "/");
session_destroy();
header("Location:../view/index.php");
?>