<?php
include 'conn.php';


$uname =$_REQUEST['uname'];
$upass =$_REQUEST['upass'];
$utype =$_REQUEST['utype'];

$sqlSel = "SELECT * FROM tbl_users WHERE u_name='$uname'";
$rsSel = $conn->query($sqlSel);

if($rsSel->num_rows > 0){
  $_SESSION['error']= true;
  header('location:../staff_managment.php');
  exit();
}

$sqlAdd = "INSERT INTO tbl_users (u_name,u_pass,u_level) VALUES ('$uname','$upass','$utype')";
$rsAdd = $conn->query($sqlAdd);


if($rsAdd > 0){
  header('location:../staff_managment.php');
  exit();
}
else{
  header('location:../staff_managment.php');
  exit();
}


 ?>
