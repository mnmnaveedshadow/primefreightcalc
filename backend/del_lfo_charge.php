<?php
include 'conn.php';

$id = $_REQUEST['locId'];


  $sqlDeleteAd= "DELETE FROM tbl_road_orgin_charge WHERE roc_id ='$id'";
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
