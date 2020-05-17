<?php
	session_start();
	if(isset($_SESSION["username"])){
	   $name = $_SESSION["username"];
	   $dir = "/var/www/html/uploads/".$name;
	   $dir2 = "/var/www/html/saved/".$name;
	   chdir($dir2);
	   unlink("Adatok.csv");
	   unlink("Eredmények.csv");
	}
	else if(isset($_SESSION["accesstoken"])){
	   $name = $_SESSION["userData"]["name"];
	   $dir = "/var/www/html/uploads/".$name;
	   $dir2 = "/var/www/html/saved/".$name;
	   chdir($dir2);
	   unlink("Adatok.csv");
	   unlink("Eredmények.csv");
	}
?>