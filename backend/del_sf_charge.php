<?php
include 'conn.php';

$id = $_REQUEST['sfId'];


  $sqlDeleteAd= "DELETE FROM tbl_sea_charges WHERE sc_id='$id'";
  $rsDelAd = $conn->query($sqlDeleteAd);
  if ($rsDelAd > 0) {
    echo 200;
    exit();
  }
  else {
    echo 300;
    exit();
  }



 ?>
