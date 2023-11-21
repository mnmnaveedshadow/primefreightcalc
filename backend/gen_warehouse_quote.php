<?php
include 'conn.php';

$service_type =$_REQUEST['service_type'];


$cus_id = $_SESSION['cus_id'];

$sqlAdd = "INSERT INTO tbl_quote (c_id,q_service) VALUES ('$cus_id','$service_type')";
$rsAdd = $conn->query($sqlAdd);


if($rsAdd > 0){
  header('location:../website_quote_requested.php');
}
else{
  header('location:../website_quote_requested.php');
}


 ?>
