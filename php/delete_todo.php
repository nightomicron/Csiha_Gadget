<?php
/*Ebben a fájlban történik az id értékként kapott feladat törlése az adatbázisból*/
if(isset($_GET['id'])) {
	
	//Megkísérli az adatbázishoz való csatlakozást
	$conn = new mysqli("localhost", "root", "", "csiha");
	
	//Amennyiben sikeres a csatlakozás indít egy sql parancsot, mellyel a paraméterben kapott érték segítségével törli a megfelelő elemet az adatbázisból
	//Sikertelen kapcsolat esetén megszakítja a folyamatot
	if($conn){
		$id = $_GET['id'];
		
		$conn->query("DELETE FROM todos WHERE id = $id");
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