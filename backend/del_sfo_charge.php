<?php
include 'conn.php';

$id = $_REQUEST['socId'];


  $sqlDeleteAd= "DELETE FROM tbl_sea_orgin_charge WHERE soc_id ='$id'";
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
