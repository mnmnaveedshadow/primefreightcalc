<?php
include 'conn.php';

$id = $_REQUEST['id'];


  $sqlDeleteAd= "DELETE FROM tbl_air_vendor WHERE av_id='$id'";
  $rsDelAd = $conn->query($sqlDeleteAd);
  if ($rsDelAd > 0) {
    header('location:../air_vendors.php');
    exit();
  }
  else {
    header('location:../air_vendors.php');
    exit();
  }



 ?>
