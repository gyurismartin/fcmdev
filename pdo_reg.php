<?php
session_start();
$host = "localhost";  
$username = "root";  
$password = "martinggwp";  
$database = "phpmyadmin";  
$message = "";
$user = $_POST['user'];
$pw = $_POST['pass'];
try{  
    $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query = "SELECT * FROM login WHERE username = :username";  
    	$statement = $connect->prepare($query);
	$statement->execute(  
        array(  
            'username'     =>     $_POST["user"]  
        )  
    );  
    $count = $statement->rowCount();
	if($count > 0){ 
		$_SESSION['hiba'] = "A felhasználónév már foglalt!";
		header("location:registration.php");
	}
	else{
		$salted = '12e8avowe13e9h1pb'.$pw.'5q1w6e5fasdf1638e6';
		$hashed = hash('sha512',$salted);
		$userid = hash('sha512',$user);
		$insert=$connect->prepare("insert into login(username, password) values(:username, :password)");
		$insert->bindParam(':username',$userid);
		$insert->bindParam(':password',$hashed);
		$insert->execute();
		header("location:login.php");
	}
}
catch(PDOException $error){  
    $message = $error->getMessage();
}?>