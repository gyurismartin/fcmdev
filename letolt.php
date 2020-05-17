<?php
   session_start();
   sleep(5);
  if(isset($_SESSION["username"])){
		$mappa = "/var/www/html/saved/".$_SESSION["username"];
	}
	else if(isset($_SESSION["accesstoken"])){
		$mappa = "/var/www/html/saved/".$_SESSION["userData"]["name"];
	}
	chdir($mappa);
   $file = "Adatok.csv";
if(!file_exists($file)){ // file does not exist
    echo "<script type='text/javascript'>alert('Nem létező fájlt adott meg!');</script>";
    sleep(5);
}
else{
	header('Cache-Control: public');
    header('Content-Description: File Transfer');
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
	header('Content-Transfer-Emcoding: binary');
    
    readfile($file);
    exit;
}?>