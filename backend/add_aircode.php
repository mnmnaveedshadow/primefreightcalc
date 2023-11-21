<?php
include 'conn.php';

$city_name =$_REQUEST['cityName'];
$name = $_REQUEST['airCode'];


$sqlAdd = "INSERT INTO airports (city_id,code) VALUES ('$city_name','$name')";
$rsAdd = $conn->query($sqlAdd);


if($rsAdd > 0){
  echo 200;
}
else{
  echo 300;

}


 ?>
