<?php include '../backend/conn.php'; ?>
<table class="table">
  <thead>
    <tr>
      <th>Origin/Destination</th>
      <th>Origin/Destination City</th>
      <th>Origin/Destination Airport</th>
      <th>Vendor</th>
      <th>Airline</th>
      <th>Description</th>
      <th>Min Weight</th>
      <th>Max Weight</th>
      <th>Charge amount</th>
      <th>Currency</th>
      <th>UOM</th>
      <th>Validity</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql_data = "SELECT * FROM tbl_air_frieght";
    $rs_data = $conn->query($sql_data);

    if($rs_data->num_rows > 0){
      while($row_data= $rs_data->fetch_assoc()){
        $id=$row_data['af_id'];

        $country_id = $row_data['country_id'];
        $city_id = $row_data['city_id'];
        $airport_id = $row_data['airport_id'];

        $country_dest_id = $row_data['country_id_dest'];
        $city_dest_id = $row_data['city_id_dest'];
        $airport_dest_id = $row_data['airport_id_dest'];

        $uom = $row_data['af_uom'];
        $currency = $row_data['af_currency'];
        $v_id=$row_data['vn_id'];
        $a_id=$row_data['al_id'];

    ?>
    <tr>
      <td>  <?= getDataBack($conn,'countries','country_id',$country_id,'name'); ?></td>
      <td><?= getDataBack($conn,'cities','city_id',$city_id,'name'); ?></td>
      <td><?= getDataBack($conn,'airports','airport_id',$airport_id,'code'); ?></td>

      <td><?= getDataBack($conn,'tbl_air_vendor','av_id',$v_id,'av_name'); ?></td>
      <td><?= getDataBack($conn,'tbl_airlines','al_id',$a_id,'air_line_name'); ?></td>
      <td> <?= $row_data['af_description'] ?> </td>
      <td> <?= $row_data['af_min_weight'] ?> </td>
      <td> <?= $row_data['af_max_weight'] ?> </td>
      <td> <?= $row_data['af_charge'] ?> </td>
      <td><?= getCurrency($currency) ?></td>
      <td><?= getUom($uom) ?></td>
      <td> <?= $row_data['af_validity'] ?> </td>
      <td> <a class="btn btn-danger btn-sm" onclick="deleteAc(<?= $id ?>)">Remove</a> </td>
    </tr>
    <tr>
      <td><?= getDataBack($conn,'countries','country_id',$country_dest_id,'name'); ?></td>
      <td><?= getDataBack($conn,'cities','city_id',$city_dest_id,'name'); ?></td>
      <td><?= getDataBack($conn,'airports','airport_id',$airport_dest_id,'code'); ?></td>
      <td colspan="13"> <span style="font-weight:bold;"><?php if($row_data['other_charge'] == 1){ echo "Other Charges"; }else{ echo "Air Charge"; } ?></span> </td>
    </tr>
    <?php
    } }
     ?>
  </tbody>
</table>
