<?php
session_start();
if(isset($_SESSION["username"])){
	$mappa = $_SESSION["username"];
}
else if(isset($_SESSION["userData"])){
	$mappa = $_SESSION["userData"]["name"];
}
$target_dir="/var/www/html/uploads/".$mappa."/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$_SESSION['filename'] = $_FILES["fileToUpload"]["name"];

if ($_FILES["fileToUpload"]["size"] > 500000) {
    $_SESSION['hiba'] = "Túl nagy fájlt adott meg!";
    $uploadOk = 0;
}

if($FileType != "xls" && $FileType != "xlsx" && $FileType != "csv" ){
    $_SESSION['hiba'] = "Csak XLS,XLSX vagy CSV kiterjesztésű fájlokat adhat meg!";
    $uploadOk = 0;
}

$filename = $_FILES["fileToUpload"]["name"];
$onlyfilename = pathinfo($target_file, PATHINFO_FILENAME);
if ($uploadOk == 0) {
    echo "A feltöltés nem sikerült.";
} else{
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
	shell_exec('chmod -R 777 uploads');
	chdir($target_dir);
	shell_exec('libreoffice --headless --convert-to csv "' . $filename . '"');
	shell_exec('chmod -R 777 '.$target_dir);
	$_SESSION['adat'] = 1;
}
header("Location: szimulacio.php");