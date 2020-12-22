<?php
/*Ebben a fájlban történik az adatbázisban tárolt feladat elemek lekérése, és továbbítása*/
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//Megkísérli az adatbázishoz való csatlakozást
$conn = new mysqli("localhost", "root", "", "csiha");

//Amennyiben sikeres a csatlakozás indít egy sql lekérdezést, mellyel lekéri az adatbázisban tárolt összes adatot, majd id alapján csökkenő sorrendbe állítja őket
//Sikertelen kapcsolat esetén megszakítja a folyamatot
if($conn){
	$results = $conn->query("SELECT id, description, status FROM todos ORDER BY id DESC");
	
	//A lekért adatokat JSON formátumba konvertálja
	$data = "";
	while($rs = $results->fetch_array(MYSQLI_ASSOC)) {
		if ($data != "") {$data .= ",";}
		$data .= '{"id":"'  . $rs["id"] . '",';
		$data .= '"description":"'   . $rs["description"]        . '",';
		if($rs["status"]==0){
			$data .= '"status":"folyamatban"}';
		}else{
			$data .= '"status":"kész"}';
		}
	}
	$data ='{"records":['.$data.']}';
	$conn->close();
	
	//Az adatokat továbbítja a fájlt meghívó kontrollernek
	echo($data);
}
?>