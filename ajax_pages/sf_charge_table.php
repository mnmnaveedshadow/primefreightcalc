<?php include '../backend/conn.php'; ?>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>Origin/Destination</th>
        <th>Origin/Destination City</th>
        <th>Origin/Destination SeaPort</th>
        <th>Vendor</th>
        <th>Type Of Service</th>
        <th>Type Of Container</th>
        <th>Description</th>
        <th>Min Weight</th>
        <th>Max Weight</th>
        <th>Min CBM</th>
        <th>Max CBM</th>
        <th>Charge amount</th>
        <th>Currency</th>
        <th>UOM</th>
        <th>Validity</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql_data = "SELECT * FROM tbl_sea_charges";
      $rs_data = $conn->query($sql_data);

      if($rs_data->num_rows > 0){
        while($row_data= $rs_data->fetch_assoc()){
          $id=$row_data['sc_id'];

          $country_id = $row_data['country_id'];
          $city_id = $row_data['city_id'];
          $seaport_id = $row_data['seaport_id'];

          $country_dest_id = $row_data['country_id_dest'];
          $city_dest_id = $row_data['city_id_dest'];
          $seaport_dest_id = $row_data['seaport_id_dest'];

          $uom = $row_data['sc_uom'];
          $currency = $row_data['sc_currency'];
          $v_id=$row_data['vn_id'];

          $tocontainer = $row_data['sc_toc'];
          $service = $row_data['sc_tos'];

      ?>
      <tr>
        <td>  <?= getDataBack($conn,'countries','country_id',$country_id,'name'); ?></td>
        <td><?= getDataBack($conn,'cities','city_id',$city_id,'name'); ?></td>
        <td><?= getDataBack($conn,'tbl_sea_port','sp_id',$seaport_id,'sp_name'); ?></td>

        <td><?= getDataBack($conn,'tbl_sea_vendors','sv_id',$v_id,'sv_name'); ?></td>
        <td><?= getService($service) ?></td>
        <td><?= getDataBack($conn,'tbl_container','cr_id',$tocontainer,'cr_name'); ?></td>
        <td> <?= $row_data['sc_desc'] ?> </td>
        <td> <?= $row_data['sc_min_weight'] ?> </td>
        <td> <?= $row_data['sc_max_weight'] ?> </td>
        <td> <?= $row_data['sc_min_cbm'] ?> </td>
        <td> <?= $row_data['sc_max_cbm'] ?> </td>
        <td> <?= $row_data['sc_charge_amount'] ?> </td>
        <td><?= getCurrency($currency) ?></td>
        <td><?= getUom($uom) ?></td>
        <td> <?= $row_data['sc_validity'] ?> </td>
        <td> <a class="btn btn-danger btn-sm" onclick="deleteSc(<?= $id ?>)">Remove</a> </td>
      </tr>
      <tr>
        <td><?= getDataBack($conn,'countries','country_id',$country_dest_id,'name'); ?></td>
        <td><?= getDataBack($conn,'cities','city_id',$city_dest_id,'name'); ?></td>
        <td colspan="14"><?= getDataBack($conn,'tbl_sea_port','sp_id',$seaport_dest_id,'sp_name'); ?></td>
      </tr>
      <?php
      } }
       ?>
    </tbody>
  </table>
</div>
