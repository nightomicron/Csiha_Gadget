<?php

if(isset($_GET['id'])) {
	
	$conn = new mysqli("localhost", "root", "", "csiha");
	
	if($conn){
		$id = $_GET['id'];
		
		$conn->query("UPDATE todos SET status=1 WHERE id = $id");
		$conn->close();
	}else{
		echo "<script>console.log('Nem sikerult csatlakozni az adatbazishoz');</script>";
		exit('Nem sikerult csatlakozni az adatbazishoz');
	}
}

if($_GET['page']=='pending'){
	header("Location: ../pending.html");
}else if($_GET['page']=='done'){
	header("Location: ../done.html");
}else{
	header("Location: ../index.html");
}


?>