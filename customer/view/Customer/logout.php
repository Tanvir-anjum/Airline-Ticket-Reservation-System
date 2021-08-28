<?php
session_start();
unset($_SESSION["valid"]);
session_destroy();
header("Location:\Admin Updated\home.html");
?>
