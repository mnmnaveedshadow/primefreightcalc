<?php
include 'conn.php';


$container_name =$_REQUEST['container_name'];


$sqlAdd = "INSERT INTO tbl_container (cr_name) VALUES ('$container_name')";
$rsAdd = $conn->query($sqlAdd);


if($rsAdd > 0){
  header('location:../containers.php');
  exit();
}
else{
  header('location:../containers.php');
  exit();
}


 ?>
