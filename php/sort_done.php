<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "", "csiha");

$results = $conn->query("SELECT id, description, status FROM todos WHERE status=true ORDER BY id DESC");

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

echo($data);
?>