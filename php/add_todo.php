<?php
/* Ebben a fájlban történik az értékként kapott adat felvétele az adatbázisba, mint új folyamatban lévő feladat*/
if(isset($_POST['todo'])) {
	
	//Megkísérli az adatbázishoz való csatlakozást
	$conn = new mysqli("localhost", "root", "", "csiha");
	
	//Amennyiben sikeres a csatlakozás indít egy sql parancsot, mellyel a paraméterben kapott értéket felveszi az adatbázisba új elemként
	//Sikertelen kapcsolat esetén megszakítja a folyamatot
	if($conn){
		$description = $_POST['todo'];

		$conn->query("INSERT INTO todos (description) VALUES ('$description')");
		$conn->close();
	}else{
		echo "<script>console.log('Nem sikerult csatlakozni az adatbazishoz');</script>";
		exit('Nem sikerult csatlakozni az adatbazishoz');
	}
}

//A folyamat végén betölti az index oldalt
header("Location: ../index.html");

?>