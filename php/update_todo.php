<?php
/*Ebben a fájlban történok az id értékként kapott feladat státuszának befejezetté állítása*/
if(isset($_GET['id'])) {
	
	//Megkísérli az adatbázishoz való csatlakozást
	$conn = new mysqli("localhost", "root", "", "csiha");
	
	//Amennyiben sikeres a csatlakozás indít egy sql parancsot, mellyel a paraméterben kapott érték segítségével frissíti a megfelelő elem státuszát true-ra az adatbázisban
	//Sikertelen kapcsolat esetén megszakítja a folyamatot
	if($conn){
		$id = $_GET['id'];
		
		$conn->query("UPDATE todos SET status=1 WHERE id = $id");
		$conn->close();
	}else{
		echo "<script>console.log('Nem sikerult csatlakozni az adatbazishoz');</script>";
		exit('Nem sikerult csatlakozni az adatbazishoz');
	}
}

//Folyamat végén azt az oldalt tölti be, melyet paraméterben kapott
if($_GET['page']=='pending'){
	header("Location: ../pending.html");
}else if($_GET['page']=='done'){
	header("Location: ../done.html");
}else{
	header("Location: ../index.html");
}


?>