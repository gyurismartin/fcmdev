<?php  
session_start();  
$host = "localhost";  
$username = "root";  
$password = "martinggwp";  
$database = "phpmyadmin";  
$message = "";  
try{  
    $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
    if(empty($_POST["user"]) || empty($_POST["pass"])){  
        $message = '<label>All fields are required</label>';
        header("Location:login.php");
    }  
    else{
		$userid = $_POST['user'];
		$pw = $_POST['pass'];
		$salted = '12e8avowe13e9h1pb'.$pw.'5q1w6e5fasdf1638e6';
		$hashuserid = hash('sha512',$userid);
		$hashed = hash('sha512',$salted);
        $query = "SELECT * FROM login WHERE username = :username AND password = :password";  
        $statement = $connect->prepare($query);
		$statement->bindParam(":username", $hashuserid);
		$statement->bindParam(":password", $hashed);  
        $statement->execute(); 
        $count = $statement->rowCount();  
        if($count > 0){  
            $_SESSION["username"] = $_POST["user"];  
            header("location:login.php");  
        }  
        else{  
            $_SESSION['hiba'] = "Hibás felhasználónév vagy jelszó!";
			header("location:login.php");
        }
    }  
}  
catch(PDOException $error){  
    $message = $error->getMessage();
}  