<?php
include 'conn.php';


$name =$_REQUEST['cName'];


$sqlAdd = "INSERT INTO countries (name) VALUES ('$name')";
$rsAdd = $conn->query($sqlAdd);


if($rsAdd > 0){
  echo 200;
}
else{
  echo 300;

}


 ?>
