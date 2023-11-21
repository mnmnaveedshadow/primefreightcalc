<?php
include 'conn.php';

$id = $_REQUEST['afId'];


  $sqlDeleteAd= "DELETE FROM tbl_air_frieght WHERE af_id='$id'";
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
