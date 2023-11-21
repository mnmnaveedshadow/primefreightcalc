<?php include '../backend/conn.php'; ?>
<table class="table  datanew">
  <thead>
    <tr>
        <th>Country</th>
        <th>City</th>
        <th>Airport</th>
        <th>Vendor</th>
        <th>Type Of Service</th>
        <th>Type Of Container</th>
        <th>Description</th>
        <th>Charge</th>
        <th>Currency</th>
        <th>UOM</th>
        <th>Minimum</th>
        <th>VALIDITY</th>
        <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM `tbl_sea_orgin_charge`";

    $rs = $conn->query($sql);
    if($rs->num_rows >0){
      while($row = $rs->fetch_assoc()){
        $id  = $row['soc_id'];
        $country_id = $row['country_id'];
        $city_id = $row['city_id'];
        $seaport_id = $row['sp_id'];

        $uom = $row['soc_uom'];
        $currency = $row['soc_currency'];
        $v_id=$row['soc_vendor'];
        $service = $row['soc_tos'];
        $tocontainer = $row['soc_toc'];
         ?>
      <tr>

        <td><?= getDataBack($conn,'countries','country_id',$country_id,'name'); ?></td>
        <td><?= getDataBack($conn,'cities','city_id',$city_id,'name'); ?></td>
        <td><?= getDataBack($conn,'tbl_sea_port','sp_id',$seaport_id,'sp_name'); ?></td>
        <td><?= getDataBack($conn,'tbl_air_vendor','av_id',$v_id,'av_name'); ?></td>
        <td><?= getService($service) ?></td>
        <td><?= getDataBack($conn,'tbl_container','cr_id',$tocontainer,'cr_name'); ?></td>
        <td><?= $row['soc_desc'] ?></td>
        <td><?= $row['soc_charge'] ?></td>
        <td><?= getCurrency($currency) ?></td>
        <td><?= getUom($uom) ?></td>
        <td><?= $row['soc_min'] ?></td>
        <td><?= $row['soc_validity'] ?></td>
        <td>
          <a href="#" class="btn btn-danger btn-sm" onclick="deleteSoc(<?= $id ?>)"> Delete </a>
        </td>

      </tr>
    <?php } } ?>

  </tbody>

</table>
