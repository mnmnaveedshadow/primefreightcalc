<?php
include 'conn.php';

$id = $_REQUEST['ldcId'];


  $sqlDeleteAd= "DELETE FROM tbl_road_destination_charge WHERE rdc_id ='$id'";
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
