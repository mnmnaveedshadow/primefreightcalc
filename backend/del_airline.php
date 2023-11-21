<?php
include 'conn.php';

$id = $_REQUEST['id'];


  $sqlDeleteAd= "DELETE FROM tbl_airlines WHERE al_id='$id'";
  $rsDelAd = $conn->query($sqlDeleteAd);
  if ($rsDelAd > 0) {
    header('location:../air_lines.php');
    exit();
  }
  else {
    header('location:../air_lines.php');
    exit();
  }



 ?>
