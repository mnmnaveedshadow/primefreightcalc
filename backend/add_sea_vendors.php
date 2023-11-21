<?php
include 'conn.php';


$name =$_REQUEST['sea_v_name'];


$sqlAdd = "INSERT INTO tbl_sea_vendors (sv_name) VALUES ('$name')";
$rsAdd = $conn->query($sqlAdd);


if($rsAdd > 0){
  header('location:../sea_vendors.php');
  exit();
}
else{
  header('location:../sea_vendors.php');
  exit();
}


 ?>
