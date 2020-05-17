function ujrakezd(){
	var resp = confirm("A gomb lenyomása az összes adat elvesztésével jár. Folytatja?");
	if (resp === true){
		location.href="szimulacio.php";
	}
	<?php unset($_SESSION['adat']) ?>;
}