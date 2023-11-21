<?php
include 'conn.php';

  $id = $_REQUEST['id'];


  $sqlDeleteAd= "DELETE FROM tbl_warehouse_cat WHERE wc_id='$id'";
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
