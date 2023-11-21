<?php include 'backend/conn.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Prime Logistics Quotation</title>

    <link rel="stylesheet" href="css/quote_master.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


  </head>
  <body>
    <div class="container-fluid">
        <img src="logo/New-logo-Prime.png" style="width:200px;" alt="">

            <h1 class="text-center">Quotation</h1>
            <div class="row">
              <div class="col-12">
                <p style="float:right;">Prime Logistics FZCO Warehouse <br> G09 PO Box 371961 <br> Dubai United Arab Emirates</p>
              </div>
              <div class="col-6">
                <?php
                  $company = "Mancode Pvt Ltd <br> Sri lanka <br> Kandy";
                  $customerName = "Mohamed Naveed";
                 ?>
                <p><?= $company ?></p> <br>
                <p>Attn:<?= $customerName ?></p>

              </div>
              <div class="col-6" style="float:right;">
                <p>Date: <?= date('Y-m-d') ?></p>
                <p>Our Reference: <b>PL-I-001</b> </p>
                <p>Telephone: +31(0)20-6533322</p>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                Quotation Date: <?= date('Y-m-d') ?>
                <hr>
                Origin:DXB<br>
                Quantity: 1 <br>
                Chargeable Weight:100 kg
              </div>
              <div class="col-6">
                Valid To: 2023-12-31
                <hr>
                Origin:RUH <br>
                Weight: 100Kg <br>
                Volume: 0.2 m³
              </div>
              <div class="col-12">
                <hr>
                <div class="text-center">
                  Door To Door
                </div>
                <hr>
              </div>
              <div class="col-12">
                <table class="table">
    <thead>
      <tr>
        <th>Qty</th>
        <th>Dimensions</th>
        <th>Weight</th>
        <th>Volume</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>10 x 10 x 10 cm </td>
        <td>100 kg</td>
        <td>0.17 m³</td>
      </tr>
    </tbody>
  </table>
  <hr>
  <div class="row">
    <div class="col-12">
      Product : Genrel Cargo ||
      Supplier: Saudi Airlines
      <hr>
    </div>
    <div class="col-12">
      <h2 style="text-align:center;">Air Freight Charges</h2>
      <table class="table">
        <thead>
          <tr>
            <th>Country</th>
            <th>City</th>
            <th>Airport </th>
            <th>Vendor</th>
            <th>Airline</th>
            <th>Description</th>
            <th>Min Weight</th>
            <th>Max Weight</th>
            <th>Charge amount</th>
            <th>Currency</th>
            <th>UOM</th>
            <th>Validity</th>
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
            <td> <?= $row_data['af_charge'] + 20 ?> </td>
            <td><?= getCurrency($currency) ?></td>
            <td><?= getUom($uom) ?></td>
            <td> <?= $row_data['af_validity'] ?> </td>
          </tr>
          <tr>
            <td><?= getDataBack($conn,'countries','country_id',$country_dest_id,'name'); ?></td>
            <td><?= getDataBack($conn,'cities','city_id',$city_dest_id,'name'); ?></td>
            <td colspan="14"><?= getDataBack($conn,'airports','airport_id',$airport_dest_id,'code'); ?></td>
          </tr>
          <?php
          } }
           ?>
           <tr>
             <td colspan="16" style="font-weight:bold;">  Total Air Freight Charge : <?= 200 + 20 ?> </td>
           </tr>
        </tbody>
      </table>
      <h2 style="text-align:center;">Orgin Charges</h2>
      <hr>
      <table class="table  datanew">
        <thead>
          <tr>
              <th>Country</th>
              <th>City</th>
              <th>Airport</th>
              <th>Vendor</th>
              <th>Description</th>
              <th>Charge</th>
              <th>Currency</th>
              <th>UOM</th>
              <th>Minimum</th>
              <th>VALIDITY</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM `tbl_air_orgin_charge`";

          $rs = $conn->query($sql);
          if($rs->num_rows >0){
            while($row = $rs->fetch_assoc()){
              $id  = $row['aoc_id'];
              $country_id = $row['country_id'];
              $city_id = $row['city_id'];
              $airport_id = $row['airport_id'];

              $uom = $row['aoc_uom'];
              $currency = $row['aoc_currency'];
              $v_id=$row['aoc_vendor'];

               ?>
            <tr>

              <td><?= getDataBack($conn,'countries','country_id',$country_id,'name'); ?></td>
              <td><?= getDataBack($conn,'cities','city_id',$city_id,'name'); ?></td>
              <td><?= getDataBack($conn,'airports','airport_id',$airport_id,'code'); ?></td>
              <td><?= getDataBack($conn,'tbl_air_vendor','av_id',$v_id,'av_name'); ?></td>
              <td><?= $row['aoc_description'] ?></td>
              <td><?= $row['aoc_charge'] ?></td>
              <td><?= getCurrency($currency) ?></td>
              <td><?= getUom($uom) ?></td>
              <td><?= $row['aoc_min'] ?></td>
              <td><?= $row['aoc_validity'] ?></td>


            </tr>
          <?php } } ?>
          <tr>
            <td colspan="10" style="font-weight:bold;">  Total Orgin Charge : <?= 175 + 0.31 ?> AED </td>
          </tr>
        </tbody>

      </table>
       <hr>
        <h2 style="text-align:center;">Destination Charges</h2>
      <table class="table  datanew">
        <thead>
          <tr>
              <th>Country</th>
              <th>City</th>
              <th>Airport</th>
              <th>Vendor</th>
              <th>Description</th>
              <th>Charge</th>
              <th>Currency</th>
              <th>UOM</th>
              <th>Minimum</th>
              <th>VALIDITY</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM `tbl_air_dest_charge`";

          $rs = $conn->query($sql);
          if($rs->num_rows >0){
            while($row = $rs->fetch_assoc()){
              $id  = $row['adc_id'];
              $country_id = $row['country_id'];
              $city_id = $row['city_id'];
              $airport_id = $row['airport_id'];

              $uom = $row['adc_uom'];
              $currency = $row['adc_currency'];
              $v_id=$row['adc_vendor'];

               ?>
            <tr>

              <td><?= getDataBack($conn,'countries','country_id',$country_id,'name'); ?></td>
              <td><?= getDataBack($conn,'cities','city_id',$city_id,'name'); ?></td>
              <td><?= getDataBack($conn,'airports','airport_id',$airport_id,'code'); ?></td>
              <td><?= getDataBack($conn,'tbl_air_vendor','av_id',$v_id,'av_name'); ?></td>
              <td><?= $row['adc_description'] ?></td>
              <td><?= $row['adc_charge'] ?></td>
              <td><?= getCurrency($currency) ?></td>
              <td><?= getUom($uom) ?></td>
              <td><?= $row['adc_min'] ?></td>
              <td><?= $row['adc_validity'] ?></td>

            </tr>
          <?php } } ?>
          <tr>
            <td colspan="10" style="font-weight:bold;">  Total Destination Charge : <?= 587.46 ?> AED (Converted From SAR) </td>
          </tr>
          <tr>
            <td colspan="10" style="font-weight:bold;">  Total Charge : <?= 982.491 ?> AED </td>
          </tr>
        </tbody>

      </table>
      <br>
      <h3>Terms and Condition by Air Freight</h3>
      <p>*Rate valid for stackable and for general cargo only. <br>
*Subject for space availability upon booking confirmation<br>
*Shipper and consignee should provide all required document and any certificate require in
origin and destination for export and clearance under their own license.<br>
*Shipment should be suitable packed by air cargo unless packing charge will apply.<br>
*Final chargeable weight will be based on the final AWB upon receiving the shipment in our
warehouse, whichever is higher from actual weight and dimension with calculation of L x W x H /
6000.<br>
*Its shipper and consignee responsibility to load and unload the shipment at Origin and Final
Destination, unless request.<br>
*Rate valid for 7 days or upon prior notice.<br>
*Other charges not mentioned above will be at cost if require, like shipping insurance, etc.
For any airline and to any destination: space is limited, timely booking is needed <br></p>

    </div>
  </div>
              </div>
            </div>
    </div><!-- End of container -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
      print();
    </script>
  </body>
</html>
