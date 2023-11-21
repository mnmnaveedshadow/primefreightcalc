<?php
include 'conn.php';

$city_name =$_REQUEST['cityName'];
$name = $_REQUEST['seaCode'];


$sqlAdd = "INSERT INTO tbl_sea_port (city_id,sp_name) VALUES ('$city_name','$name')";
$rsAdd = $conn->query($sqlAdd);


if($rsAdd > 0){
  echo 200;
}
else{
  echo $sqlAdd;

}


 ?>
