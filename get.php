<?php
$conn = mysqli_connect("localhost", "root", "", "homeworkout");

//if connection to server/database has error 
if (!$conn){
	echo 'Connection error: ' . mysqli_connect_error();
}

$nickname = $_GET["nickname"];
$study= $_GET["study"];
$workout= $_GET["workout"];

$result=mysqli_query($conn, "SELECT studytime, workouttime FROM total WHERE 1"); 

//storing data in array.
$data= array();
while ($row = mysqli_fetch_assoc($result)){
	$data[] = $row;
}
$studySum=$study+intval($data[0]["studytime"]);
$workoutSum=$workout+intval($data[0]["workouttime"]);

mysqli_query($conn, "INSERT INTO records(name, studytime, workouttime) VALUES ('$nickname',  '$study', '$workout')");
mysqli_query($conn, "UPDATE total set studytime='$studySum', workouttime='$workoutSum' WHERE 1");

?>