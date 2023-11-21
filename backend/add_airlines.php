<?php
include 'conn.php';


$airline_name =$_REQUEST['airline_name'];


$sqlAdd = "INSERT INTO tbl_airlines (air_line_name) VALUES ('$airline_name')";
$rsAdd = $conn->query($sqlAdd);


if($rsAdd > 0){
  header('location:../air_lines.php');
  exit();
}
else{
  header('location:../air_lines.php');
  exit();
}


 ?>
