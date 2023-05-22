<?php
session_start();
unset($_SESSION["userid"]);
unset($_COOKIE['id']); 
setcookie('id', null, time() - 3600, "/");
header("Location: "."/ReadingNook/home/home.php");
?>