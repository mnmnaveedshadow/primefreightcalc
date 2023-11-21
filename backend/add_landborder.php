<?php
include 'conn.php';

$city_name =$_REQUEST['cityName'];
$name = $_REQUEST['landCode'];


$sqlAdd = "INSERT INTO tbl_land_border (city_id,lb_name) VALUES ('$city_name','$name')";
$rsAdd = $conn->query($sqlAdd);


if($rsAdd > 0){
  echo 200;
}
else{
  echo 300;

}


 ?>
