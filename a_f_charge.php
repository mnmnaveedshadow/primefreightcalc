

			<!-- Header -->
			<?php include './layouts/header.php'; ?>
			<!-- Header -->

           <!-- Sidebar -->
			<?php include './layouts/sidebar.php'; ?>
			<!-- /Sidebar -->

			<div class="page-wrapper">
				<div class="content">
					<div class="page-header">
						<div class="page-title">
							<h4>Air Freight Charges</h4>
						</div>
					</div>
					<!-- /add -->

					<div class="card">
					    <div class="card-body">
					        <div class="row">
					            <div class="col-12">
												<div class="row">
												    <div class="col-6">
															<div class="form-group">
													      <label for="">Orgin Countries</label>
													      <select class="js-states form-control" id="countries" onchange="selectCity(this.value)">
													        <option value="">Select</option>
													        <?php
													          $sql = "SELECT * FROM `countries` ORDER BY `countries`.`name` ASC";
													          $rs= $conn->query($sql);
													          if($rs->num_rows > 0){
													            while($row_c = $rs->fetch_assoc()){
													         ?>
													         <option value="<?= $row_c['country_id'] ?>"><?= $row_c['name'] ?></option>
													       <?php } } ?>
													      </select>
													    </div>
													    <div class="form-group">
													      <label for="">Orgin City</label>
													      <select class="form-control" id="city" onclick="selectAirport(this.value)">

													      </select>
													    </div>
													    <div class="form-group">
													      <label for="">Orgin Airport</label>
													      <select class="js-states form-control" id="airport">

													      </select>
													    </div>
															<div class="form-group">
																<label for="">Transit</label>
													      <select class="form-control" id="transit">
													        <option value="1">Direct</option>
																	<option value="2">Transit</option>
													      </select>
															</div>
															<div class="form-group">
																<label for="">Min Weight</label>
																<input type="text" class="form-control" id="min_weight" name="" value="">
															</div>
													    <div class="form-group">
													        <label for="">Description</label>
													        <input type="text" class="form-control" id="desc" placeholder="Description" name="description" value="" required>
													    </div>

															<div class="form-group">
																	<label for="">Currency</label>
																	<select class="form-control" name="" id="currency">
																		<option value="1">AED</option>
																		<option value="2">USD</option>
																		<option value="3">SAR</option>
																	</select>
															</div>
													    <div class="form-group">
													        <label for="">Aed</label>
													        <input type="number" class="form-control" id="aed" placeholder="Aed" name="aed" value="" required>
													    </div>

													    <button type="button" class="btn btn-primary btn-me2" onclick="addAfCharge()" name="button">Add</button>
															<br><br>
												    </div>
														<div class="col-6">

															<div class="form-group">
													      <label for="">Destination Countries</label>
													      <select class="js-states form-control" id="countries_dest" onchange="selectCityDest(this.value)">
													        <option value="">Select</option>
													        <?php
													          $sql = "SELECT * FROM `countries` ORDER BY `countries`.`name` ASC";
													          $rs= $conn->query($sql);
													          if($rs->num_rows > 0){
													            while($row_c = $rs->fetch_assoc()){
													         ?>
													         <option value="<?= $row_c['country_id'] ?>"><?= $row_c['name'] ?></option>
													       <?php } } ?>
													      </select>
													    </div>
													    <div class="form-group">
													      <label for="">Destination City</label>
													      <select class="form-control" id="city_dest" onclick="selectAirportDest(this.value)">

													      </select>
													    </div>
													    <div class="form-group">
													      <label for="">Destination Airport</label>
													      <select class="js-states form-control" id="airport_dest">

													      </select>
													    </div>
													    <div class="form-group">
													        <label for="">UOM (Unit of Measure)</label>
													        <select class="form-control" name="" id="uom">
													          <option value="1">Per Shipment</option>
													          <option value="2">Per Kg</option>
													          <option value="3">Per Label</option>
													        </select>
													    </div>
															<div class="form-group">
																<label for="">Max Weight</label>
																<input type="text" class="form-control" id="max_weight" name="" value="">
															</div>
															<div class="form-group">
																	<label for="">Vendor</label>
																	<select class="form-control" id="vendor">
														        <option value="">Select</option>
														        <?php
														          $sql = "SELECT * FROM `tbl_air_vendor`";
														          $rs= $conn->query($sql);
														          if($rs->num_rows > 0){
														            while($row_c = $rs->fetch_assoc()){
														         ?>
														         <option value="<?= $row_c['av_id'] ?>"><?= $row_c['av_name'] ?></option>
														       <?php } } ?>
														      </select>
															</div>

															<div class="form-group">
																	<label for="">Airline</label>
																	<select class="form-control" id="airline">
														        <option value="">Select</option>
														        <?php
														          $sql = "SELECT * FROM `tbl_airlines`";
														          $rs= $conn->query($sql);
														          if($rs->num_rows > 0){
														            while($row_c = $rs->fetch_assoc()){
														         ?>
														         <option value="<?= $row_c['al_id'] ?>"><?= $row_c['air_line_name'] ?></option>
														       <?php } } ?>
														      </select>
															</div>
													    <div class="form-group">
													        <label for="">VALIDITY</label>
													        <input type="date" class="form-control" id="validity" placeholder="VALIDITY" name="validity" value="" required>
													    </div>
															<div class="form-group">
																	<label for="">Other Charges</label>
																	<input type="checkbox"  id="ocharge" value="1" required>
															</div>
						                <br><br>
														</div>
													</div>
					            </div>
					            <div class="col-12" id="show_af_charge">

					            </div>
					        </div>
					    </div>
					</div>


					<!-- /add -->
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->

    <?php include './layouts/footer.php' ?>
		<script type="text/javascript">

		$('#show_af_charge').load('ajax_pages/af_charge_table.php');

		function addAfCharge(){
			var countries = document.getElementById('countries').value;
			var city = document.getElementById('city').value;
			var airport = document.getElementById('airport').value;

			var countries_dest = document.getElementById('countries_dest').value;
			var city_dest = document.getElementById('city_dest').value;
			var airport_dest = document.getElementById('airport_dest').value;

			var transit = document.getElementById('transit').value;

			var airline = document.getElementById('airline').value;
			var min_weight = document.getElementById('min_weight').value;
			var max_weight = document.getElementById('max_weight').value;

			var desc = document.getElementById('desc').value;
			var uom = document.getElementById('uom').value;
			var aed = document.getElementById('aed').value;
			var currency =document.getElementById('currency').value;
			var vendor = document.getElementById('vendor').value;
			var validity = document.getElementById('validity').value;
			var ochargeCheckbox  = document.getElementById('ocharge');
			var ocharge=0;
			if(ochargeCheckbox.checked){
				var ocharge=1;
			}
			$.ajax({
				url:'backend/add_charge.php',
				method:'POST',
				data:{
					af_countries:countries,
					af_city:city,
					af_airport:airport,
					af_countries_dest:countries_dest,
					af_city_dest:city_dest,
					af_airport_dest:airport_dest,
					af_transit:transit,
					af_airline:airline,
					af_min_weight:min_weight,
					af_max_weight:max_weight,
					af_desc:desc,
					af_uom:uom,
					af_aed:aed,
					af_currency:currency,
					af_vendor:vendor,
					af_validity:validity,
					af_ocharge:ocharge
				},
				success:function(response){
					if(response == 200){
						$('#show_af_charge').load('ajax_pages/af_charge_table.php');

						document.getElementById('transit').value='';

						document.getElementById('min_weight').value='';
						document.getElementById('max_weight').value='';
						document.getElementById('desc').value='';
	 					document.getElementById('uom').value='';
	 					document.getElementById('aed').value='';
						document.getElementById('currency').value='';
				 		document.getElementById('vendor').value='';
					}
					else {
						console.log(response);
					}
				}
			});
		}

		function deleteAc(af_id){
			if(confirm('Are you sure you want to delete air charge?')){
				$.ajax({
					url:'backend/del_af_charge.php',
					method:'POST',
					data:{
						afId:af_id
					},
					success:function(response){
						if(response == 200){
							$('#show_af_charge').load('ajax_pages/af_charge_table.php');
						}
					}
				});
			}
		}

		function selectCityDest(cId){
			$('#city_dest').load('ajax_pages/show_cities.php',{ c_id:cId });
		}

		function selectAirportDest(aId){
			$('#airport_dest').load('ajax_pages/show_airport.php',{ ap_id:aId });
		}

		function selectCity(cId){
			$('#city').load('ajax_pages/show_cities.php',{ c_id:cId });
		}

		function selectAirport(aId){
			$('#airport').load('ajax_pages/show_airport.php',{ ap_id:aId });
		}

		</script>
    </body>
</html>
