<?php
  session_start(); 
  if(isset($_SESSION['hiba'])){
		$hiba = $_SESSION['hiba'];
		echo "<script type='text/javascript'>alert('$hiba');</script>";
		unset($_SESSION['hiba']);
	}
  if(isset($_SESSION["username"])){
	   $name = $_SESSION["username"];
	   $dir = "/var/www/html/uploads/".$name;
	   $dir2 = "/var/www/html/saved/".$name;
	   unlink($dir2 . "Adatok.csv");
	   unlink($dir2 . "Eredmények.csv");
   }
  else if(isset($_SESSION["accesstoken"])){
	   $name = $_SESSION["userData"]["name"];
	   $dir = "/var/www/html/uploads/".$name;
	   $dir2 = "/var/www/html/saved/".$name;
	   unlink($dir2 . "Adatok.csv");
	   unlink($dir2 . "Eredmények.csv");
   }
   else{
	   $name = "BejelentkezÃ©s";
   }
   if(!is_dir($dir)){
	   mkdir($dir);
   }
   if(!is_dir($dir2)){
	   mkdir($dir2);
   }
   shell_exec('chmod -R 777 saved');
   shell_exec('chmod -R 777 uploads');
  if($_SESSION['adat'] == 1){
	 $target_file = $_SESSION['filename'];
	 $onlyfilename = pathinfo($target_file, PATHINFO_FILENAME);
	 $kell = $onlyfilename . ".csv";

	 chdir($dir);
	 
	 $file = fopen($kell, "r");
	 $lines = array();
	 while (!feof($file)) {
     $line=fgetcsv($file,3000,",");
     $lines[] = $line;
     }
	 $num = $lines[0][1];
	 fclose($file);
	 $adats = $_SESSION['adat'];
  }
?>