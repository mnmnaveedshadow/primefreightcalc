<?php
include 'conn.php';

$id = $_REQUEST['aocId'];


  $sqlDeleteAd= "DELETE FROM tbl_air_orgin_charge WHERE aoc_id='$id'";
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
