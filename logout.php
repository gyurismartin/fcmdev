<?php
	session_start();
	unset($_SESSION["username"]);
    unset($_SESSION['accesstoken']); 
    session_destroy();
    header('Location: login.php');
    exit();
?>