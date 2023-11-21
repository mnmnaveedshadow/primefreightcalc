<?php
include 'conn.php';

$id = $_REQUEST['lcId'];


  $sqlDeleteAd= "DELETE FROM tbl_land_charge WHERE lc_id='$id'";
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
