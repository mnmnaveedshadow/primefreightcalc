<?php
include 'conn.php';

$id = $_REQUEST['afdId'];


  $sqlDeleteAd= "DELETE FROM tbl_air_dest_charge WHERE adc_id='$id'";
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
