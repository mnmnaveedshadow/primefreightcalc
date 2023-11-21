<?php include '../backend/conn.php'; ?>
<div class="table-responsive">
  <table class="table  datanew">
    <thead>
      <tr>
          <th>Country</th>
          <th>City</th>
          <th>Border</th>
          <th>Vendor</th>
          <th>Type Of Service</th>
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
      $sql = "SELECT * FROM `tbl_road_orgin_charge`";

      $rs = $conn->query($sql);
      if($rs->num_rows >0){
        while($row = $rs->fetch_assoc()){
          $id  = $row['roc_id'];
          $country_id = $row['country_id'];
          $city_id = $row['city_id'];
          $border_id = $row['border_id'];

          $uom = $row['uom'];
          $currency = $row['currency'];
          $service = $row['roc_tos'];


           ?>
        <tr>

          <td><?= getDataBack($conn,'countries','country_id',$country_id,'name'); ?></td>
          <td><?= getDataBack($conn,'cities','city_id',$city_id,'name'); ?></td>
          <td><?= getDataBack($conn,'tbl_land_border','lb_id',$border_id,'lb_name'); ?></td>
          <td>Prime</td>
          <td><?= getServiceLand($service) ?></td>
          <td><?= $row['roc_desc'] ?></td>
          <td><?= $row['roc_charge'] ?></td>
          <td><?= getCurrency($currency) ?></td>
          <td><?= getUom($uom) ?></td>
          <td><?= $row['roc_min'] ?></td>
          <td><?= $row['roc_validity'] ?></td>
          <td>
            <a href="#" class="btn btn-danger btn-sm" onclick="deleteLoc(<?= $id ?>)"> Delete </a>
          </td>

        </tr>
      <?php } } ?>

    </tbody>

  </table>
</div>
