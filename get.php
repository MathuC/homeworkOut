<?php
$conn = mysqli_connect("localhost", "root", "", "homeworkout");

//if connection to server/database has error 
if (!$conn){
	echo 'Connection error: ' . mysqli_connect_error();
}

$result=mysqli_query($conn, "SELECT name, studytime, workouttime FROM records ORDER by date"); 

//storing data in array.
$data= array();
while ($row = mysqli_fetch_assoc($result)){
	$data[] = $row;
}
?>
<html>
<head>
<title>Get</title>
</head>
<body style="font-family:Courier">
<?php
for($x= 0; $x < $result->num_rows; $x++) {	
	$rawS=intval($data[$x]["studytime"]);
	$rawW=intval($data[$x]["workouttime"]);
	$secondS=$rawS%60;
	$minuteS=(($rawS-$secondS)/60)%60;
	$hourS=((($rawS-$secondS)/60)-$minuteS)/60;
	$secondW=$rawW%60;
	$minuteW=(($rawW-$secondW)/60)%60;
	$hourW=((($rawW-$secondW)/60)-$minuteW)/60;
	$stringS=$hourS."h"." ".$minuteS."m"." ".$secondS."s";
	$stringW=$hourW."h"." ".$minuteW."m"." ".$secondW."s";
	echo '<p><b>'.$data[$x]["name"]."</b> "."<br>Studied: ".$stringS."<br>Worked out: ".$stringW;
}
?>
<script>
window.scrollTo(0,document.body.scrollHeight);
</script>
</body>