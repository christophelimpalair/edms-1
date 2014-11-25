<?php
include_once '../includes/header.php';
include_once '../includes/db_connect.php';
//header("Content-type: image/jpeg");
$query = ("select * from vehiclephotos");
$result = $conn -> query($query);

foreach ($conn->query($query) as $row) {
	$image = $row['image'];
	echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
}

?>