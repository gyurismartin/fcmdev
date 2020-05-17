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
   $file = "Eredmények.csv";
   
if(!file_exists($file)){ // file does not exist
    echo "<script type='text/javascript'>alert('Nem létező fájlt adott meg!');</script>";
    sleep(5);
}
else{
	$filepath = $mappa . $file;
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
}?>
