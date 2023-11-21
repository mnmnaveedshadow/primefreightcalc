<?php include '../backend/conn.php'; ?>
<table class="table">
  <thead>
      <tr>

          <th>Qty</th>
          <th>Length</th>
          <th>Width</th>
          <th>Height</th>
          <th>Volume</th>
          <th>Weight</th>
          <th>Action</th>
        </tr>
  </thead>
  <tbody>
    <?php
      $cid = $_SESSION['cus_id'];
      $tot_vol =0;
      $tot_weight =0;
      $charge_weight=0;
      $tot_qty=0;
      $sql = "SELECT * FROM tbl_package WHERE c_id='$cid'";
      $rs = $conn->query($sql);

      if($rs->num_rows > 0){
        while($row = $rs->fetch_assoc()){
          $tot_qty +=$row['p_qnty'];
          $vol = $row['p_l'] * $row['p_w'] * $row['p_h'] / 6000;
          $tot_weight +=$row['p_weight'] * $row['p_qnty'];


          $tot_vol +=$vol;

          if($tot_weight > $tot_vol){
            $charge_weight = $tot_weight;
          }
          else {
            $charge_weight = $tot_vol;
          }



     ?>
     <tr>
       <td> <?= $row['p_qnty'] ?>  </td>
       <td> <?= $row['p_l'] ?>  </td>
       <td> <?= $row['p_w'] ?>  </td>
       <td> <?= $row['p_h'] ?>  </td>
       <td> <?= round($vol,2) ?>  </td>
       <td> <?= $row['p_weight'] ?>  </td>
       <td> <a onclick="del_p(<?= $row['p_id'] ?>)" class="btn btn-danger btn-sm"> X </a>  </td>
     </tr>
   <?php } } ?>
   <tr>
     <td colspan="3"> Total Volume  </td>
     <td colspan="4"> <?= round($tot_vol,2) ?>  </td>
   </tr>
   <tr>
     <td colspan="3"> Total Qty  </td>
     <td colspan="4"> <?= $tot_qty ?>  </td>
   </tr>
   <tr>
     <td colspan="3"> Total Weight  </td>
     <td colspan="4"> <?= $tot_weight ?>  </td>
   </tr>
   <tr>
     <td colspan="3"> Chargable Weight  </td>
     <td colspan="4"> <?= round($charge_weight,2) ?>  </td>
   </tr>

  </tbody>

</table>

<script type="text/javascript">
  document.getElementById('total_volume').value=<?= $tot_vol ?>;
  document.getElementById('qnty').value=<?= $tot_qty ?>;
  document.getElementById('weight').value=<?= $tot_weight ?>;
</script>
