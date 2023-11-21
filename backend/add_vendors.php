<?php
include 'conn.php';


$name =$_REQUEST['air_vendor_name'];


$sqlAdd = "INSERT INTO tbl_air_vendor (av_name) VALUES ('$name')";
$rsAdd = $conn->query($sqlAdd);


if($rsAdd > 0){
  header('location:../air_vendors.php');
  exit();
}
else{
  header('location:../air_vendors.php');
  exit();
}


 ?>
