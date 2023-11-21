<?php
include 'conn.php';

$id = $_REQUEST['sdcId'];


  $sqlDeleteAd= "DELETE FROM tbl_sea_dest_charge WHERE sdc_id ='$id'";
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
