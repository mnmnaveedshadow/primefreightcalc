<?php include '../backend/conn.php'; ?>
<table class="table  datanew">
  <thead>
    <tr>

      <th>Country Name</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM `countries`";

    $rs = $conn->query($sql);
    if($rs->num_rows >0){
      while($row = $rs->fetch_assoc()){
        $id  = $row['country_id']; ?>
      <tr>
        <td> <?= $row['name'] ?> </td>
      </tr>
    <?php }} ?>

  </tbody>

</table>
