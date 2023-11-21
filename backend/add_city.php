<?php
include 'conn.php';

$c_id =$_REQUEST['cName'];
$name =$_REQUEST['cityName'];


$sqlAdd = "INSERT INTO cities (country_id,name) VALUES ('$c_id','$name')";
$rsAdd = $conn->query($sqlAdd);


if($rsAdd > 0){
  echo 200;
}
else{
  echo 300;

}


 ?>
