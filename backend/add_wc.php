<?php
include 'conn.php';


$cName =$_REQUEST['cName'];


$sqlAdd = "INSERT INTO tbl_warehouse_cat (wc_name) VALUES ('$cName')";
$rsAdd = $conn->query($sqlAdd);


if($rsAdd > 0){
  echo 200;
}
else{
  echo 300;

}


 ?>
