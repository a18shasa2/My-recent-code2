<?php
$con=mysqli_connect("localhost", "WRITE_USER", "WRITE_PASSWORD", "WRITE_DATABASE");;
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_GET['id']; // $id is now defined

// or assuming your column is indeed an int
// $id = (int)$_GET['id'];

mysqli_query($con,"DELETE FROM winwinproduct WHERE product_id='".$id."'");
mysqli_query($con,"DELETE FROM winwinsvara WHERE product_code='".$id."'");
mysqli_close($con);
header("Location: avslutad.php");

?> 

