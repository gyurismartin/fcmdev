<?php
	session_start();
	header("Content-Type: application/json; charset=UTF-8");
	
	shell_exec('chmod -R 777 saved');
	if(isset($_SESSION["username"])){
		$mappa = "/var/www/html/saved/".$_SESSION["username"];
	}
	else if(isset($_SESSION["accesstoken"])){
		$mappa = "/var/www/html/saved/".$_SESSION["userData"]["name"];
	}
	$eredmenyek = json_decode($_POST['eredmenyek'],true);
	
	$filename = "Eredmények.csv";
	chdir($mappa);
	if($_POST['torol']){
		unlink($filename);
	}
	
	$delimiter = ";";
	
	if($eredmenyek != NULL){
		$file = fopen($filename, "a");
		foreach ($eredmenyek as $fields) {
			fputcsv($file,$fields,$delimiter);
		}
		fwrite($file, "\n");
		fclose($file);
	}
	
	header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($filename).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filename));
    readfile($filename);
    exit;
?>