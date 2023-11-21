<?php
include 'conn.php';

$id = $_REQUEST['id'];


  $sqlDeleteAd= "DELETE FROM tbl_container WHERE cr_id='$id'";
  $rsDelAd = $conn->query($sqlDeleteAd);
  if ($rsDelAd > 0) {
    header('location:../containers.php');
    exit();
  }
  else {
    header('location:../containers.php');
    exit();
  }



 ?>
