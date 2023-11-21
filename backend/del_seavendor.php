<?php
include 'conn.php';

$id = $_REQUEST['id'];


  $sqlDeleteAd= "DELETE FROM tbl_sea_vendors WHERE sv_id='$id'";
  $rsDelAd = $conn->query($sqlDeleteAd);
  if ($rsDelAd > 0) {
    header('location:../sea_vendors.php');
    exit();
  }else {
    header('location:../sea_vendors.php');
    exit();
  }



 ?>
