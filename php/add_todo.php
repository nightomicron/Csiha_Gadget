<?php

if(isset($_POST['todo'])) {
	
	$conn = new mysqli("localhost", "root", "", "csiha");
	
	if($conn){
		$description = $_POST['todo'];

		$conn->query("INSERT INTO todos (description) VALUES ('$description')");
		$conn->close();
	}else{
		echo "<script>console.log('Nem sikerult csatlakozni az adatbazishoz');</script>";
		exit('Nem sikerult csatlakozni az adatbazishoz');
	}
}

header("Location: ../index.html");

?>