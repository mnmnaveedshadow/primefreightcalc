<?php
include 'conn.php';


$sf_countries =$_REQUEST['sf_countries'];
$sf_city =$_REQUEST['sf_city'];
$sf_orgin_seaport =$_REQUEST['sf_orgin_seaport'];
$sf_countries_dest =$_REQUEST['sf_countries_dest'];
$sf_city_dest =$_REQUEST['sf_city_dest'];
$sf_destination_seaport =$_REQUEST['sf_destination_seaport'];
$sf_transit =$_REQUEST['sf_transit'];
$sf_min_weight =$_REQUEST['sf_min_weight'];
$sf_max_weight =$_REQUEST['sf_max_weight'];
$sf_desc =$_REQUEST['sf_desc'];
$sf_uom =$_REQUEST['sf_uom'];
$sf_aed =$_REQUEST['sf_aed'];
$sf_currency =$_REQUEST['sf_currency'];
$sf_vendor =$_REQUEST['sf_vendor'];
$sf_validity =$_REQUEST['sf_validity'];

$sf_min_cbm = $_REQUEST['sf_min_cbm'];
$sf_max_cbm = $_REQUEST['sf_max_cbm'];
$sf_toservice = $_REQUEST['sf_toservice'];
$sf_tocontainer = $_REQUEST['sf_tocontainer'];

$sqlAdd = "INSERT INTO tbl_sea_charges
                          (country_id,city_id,seaport_id,
                          country_id_dest,city_id_dest,seaport_id_dest,
                          vn_id,sc_tos,sc_toc,
                          sc_desc,sc_min_weight,sc_max_weight,
                          sc_min_cbm,sc_max_cbm,sc_charge_amount,
                          sc_currency,sc_uom,sc_validity)
            VALUES ('$sf_countries','$sf_city','$sf_orgin_seaport',
                    '$sf_countries_dest','$sf_city_dest','$sf_destination_seaport',
                    '$sf_vendor','$sf_toservice','$sf_tocontainer',
                    '$sf_desc','$sf_min_weight','$sf_max_weight',
                    '$sf_min_cbm','$sf_max_cbm','$sf_aed',
                    '$sf_currency','$sf_uom','$sf_validity')";
$rsAdd = $conn->query($sqlAdd);

if($rsAdd > 0){
  echo 200;
}
else{
  echo 300;

}


 ?>
