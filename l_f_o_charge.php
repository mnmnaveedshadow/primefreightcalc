

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
							<h4>Land Freight Orgin Charge</h4>
						</div>
					</div>
					<!-- /add -->

					<div class="card">
					    <div class="card-body">
					        <div class="row">
					            <div class="col-4">
												    <div class="form-group">
												      <label for="">Countries</label>
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
												      <label for="">City</label>
												      <select class="form-control" id="city" onclick="selectBorder(this.value)">

												      </select>
												    </div>
												    <div class="form-group">
												      <label for="">Border</label>
												      <select class="js-states form-control" id="border_desti">

												      </select>
												    </div>
												    <div class="form-group">
												        <label for="">Description</label>
												        <input type="text" class="form-control" id="desc" placeholder="Description" name="description" value="" required>
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
																<label for="">Vendor</label>
																<select class="form-control" id="vendor">
													        <option value="prime">Prime</option>

													      </select>
														</div>
														<div class="form-group">
															<label for="">Type Of Service</label>
															<select class="form-control" id="typeOfService" name="">
																<option value="1">FTL</option>
																	<option value="2">LTL</option>
															</select>
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
												    <div class="form-group">
												        <label for="">Min Aed</label>
												        <input type="number" class="form-control" id="min_aed" placeholder="Min Aed" name="min_aed" value="" required>
												    </div>
												    <div class="form-group">
												        <label for="">VALIDITY</label>
												        <input type="date" class="form-control" id="validity" placeholder="VALIDITY" name="validity" value="" required>
												    </div>
												    <button type="button" class="btn btn-primary btn-me2" onclick="addlfoCharge()" name="button">Add</button>
					                <br><br>
					            </div>
					            <div class="col-8" id="show_o_charge">

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

		function addlfoCharge(){
			var countries = document.getElementById('countries').value;
			var city = document.getElementById('city').value;
			var border = document.getElementById('border_desti').value;
			var tos = document.getElementById('typeOfService').value;
			var desc = document.getElementById('desc').value;
			var uom = document.getElementById('uom').value;
			var aed = document.getElementById('aed').value;
			var currency =document.getElementById('currency').value;
			var min_aed = document.getElementById('min_aed').value;
			var vendor = document.getElementById('vendor').value;
			var validity = document.getElementById('validity').value;

			$.ajax({
				url:'backend/add_lfo_charge.php',
				method:'POST',
				data:{
					loc_countries:countries,
					loc_city:city,
					loc_border:border,
					loc_desc:desc,
					loc_uom:uom,
					loc_aed:aed,
					loc_tos:tos,
					loc_min_aed:min_aed,
					loc_vendor:vendor,
					loc_currency:currency,
					loc_validity:validity
				},
				success:function(response){
					console.log(response);
					if(response == 200){
						$('#show_o_charge').load('ajax_pages/lfo_charge_table.php');
		 				document.getElementById('desc').value="";
	 					document.getElementById('uom').value="";
	 					document.getElementById('aed').value="";
						document.getElementById('currency').value;
					 	document.getElementById('min_aed').value="";
				 		document.getElementById('vendor').value="";
					}
				}
			});
		}

		function deleteLoc(loc_id){
			if(confirm('Are you sure you want to delete orgin charge?')){
				$.ajax({
					url:'backend/del_lfo_charge.php',
					method:'POST',
					data:{
						locId:loc_id
					},
					success:function(response){
						console.log(response);
						if(response == 200){
							$('#show_o_charge').load('ajax_pages/lfo_charge_table.php');
						}
					}
				});
			}
		}

		$('#show_o_charge').load('ajax_pages/lfo_charge_table.php');

		function selectCity(cId){
			$('#city').load('ajax_pages/show_cities.php',{ c_id:cId });
		}

		function selectAirport(aId){
			$('#airport').load('ajax_pages/show_airport.php',{ ap_id:aId });
		}

		function selectBorder(cId){
				$('#border_desti').load('ajax_pages/show_border.php',{ id:cId });
		}
		</script>
    </body>
</html>
