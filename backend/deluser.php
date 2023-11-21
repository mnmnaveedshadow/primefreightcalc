<?php
include 'conn.php';

$id = $_REQUEST['id'];


  $sqlDeleteAd= "DELETE FROM tbl_users WHERE u_id ='$id'";
  $rsDelAd = $conn->query($sqlDeleteAd);
  if ($rsDelAd > 0) {
    header('location:../staff_managment.php');
    exit();
  }
  else {
    header('location:../staff_managment.php');
    exit();
  }



 ?>
