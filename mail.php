<?php
session_start();
if(isset($_SESSION["username"])){
	$name = $_SESSION["username"];
	$dir = "/var/www/html/uploads/".$name;
	$dir2 = "/var/www/html/saved/".$name;
}
else if(isset($_SESSION["accesstoken"])){
	$name = $_SESSION["userData"]["name"];
	$dir = "/var/www/html/uploads/".$name;
	$dir2 = "/var/www/html/saved/".$name;
}
if(file_exists($dir2."/Eredmények.csv")){
	require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
	require '/usr/share/php/libphp-phpmailer/class.smtp.php';
	$mail = new PHPMailer;
	$mail->CharSet = 'UTF-8';
	$mail->SetFrom('noreply@fcmdev.hu', 'FCMDev.hu');
	$mail->addAddress($_POST['email']);
	$mail->Subject = $_POST['subject'];
	$mail->Body = $_POST['message'];
	$mail->IsSMTP();
	$mail->SMTPSecure = 'ssl';
	$mail->Host = 'ssl://smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Port = 465;
	if($_POST['eredmenykuldes'] == true){
		$mail->addAttachment("/var/www/html/saved/test/Eredmények.csv","Eredmények.csv");
	}
	if($_POST['kiindulasikuldes'] == true){
		$mail->addAttachment("/var/www/html/saved/test/Adatok.csv","Adatok.csv");
	}

	//Set your existing gmail address as user name
	$mail->Username = 'fcmdevszakdolgozat';

	//Set the password of your gmail address here
	$mail->Password = 'Wotlk9611';
	if(!$mail->send()) {
	  echo 'A mailt nem tudtuk továbbítani.';
	  echo 'Email error: ' . $mail->ErrorInfo;
	} else {
	  echo 'A mail el lett küldve.';
	}
}
else{
	echo "Még nem futtatott szimulációt, így nem tud emailt küldeni";
}
?>