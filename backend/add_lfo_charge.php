<?php
include 'conn.php';


$loc_countries =$_REQUEST['loc_countries'];
$loc_city =$_REQUEST['loc_city'];
$loc_border =$_REQUEST['loc_border'];
$loc_vendor =$_REQUEST['loc_vendor'];
$loc_desc =$_REQUEST['loc_desc'];
$loc_aed =$_REQUEST['loc_aed'];
$loc_currency =$_REQUEST['loc_currency'];
$loc_uom =$_REQUEST['loc_uom'];
$loc_min_aed =$_REQUEST['loc_min_aed'];
$loc_validity =$_REQUEST['loc_validity'];

$loc_tos =$_REQUEST['loc_tos'];

$sqlAdd = "INSERT INTO tbl_road_orgin_charge
           (country_id,city_id,border_id,roc_tos,roc_desc,
             roc_charge,currency,uom,roc_min,roc_validity)
            VALUES ('$loc_countries','$loc_city','$loc_border','$loc_tos',
              '$loc_desc','$loc_aed','$loc_currency','$loc_uom','$loc_min_aed','$loc_validity')";
$rsAdd = $conn->query($sqlAdd);

if($rsAdd > 0){
  echo 200;
}
else{
  echo $sqlAdd;

}


 ?>
