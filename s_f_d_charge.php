

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
							<h4>Sea Freight Orgin Charge</h4>
						</div>
					</div>
					<!-- /add -->

					<div class="card">
					    <div class="card-body">
					        <div class="row">
					            <div class="col-2">
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
												      <select class="form-control" id="city" onclick="selectSeaport(this.value)">

												      </select>
												    </div>
												    <div class="form-group">
												      <label for="">Seaport</label>
												      <select class="js-states form-control" id="seaport">

												      </select>
												    </div>
														<div class="form-group">
															<label for="">Type Of Service</label>
															<select class="form-control" id="typeOfService" name="">
																<option value="1">FCL</option>
																	<option value="2">LCL</option>
															</select>
														</div>
														<div class="form-group">
															<label for="">Containers</label>
															<select class="js-states form-control" id="container_id">
																<option value="">Select</option>
																<?php
																	$sql = "SELECT * FROM `tbl_container`";
																	$rs= $conn->query($sql);
																	if($rs->num_rows > 0){
																		while($row_c = $rs->fetch_assoc()){
																 ?>
																 <option value="<?= $row_c['cr_id'] ?>"><?= $row_c['cr_name'] ?></option>
															 <?php } } ?>
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
																	<option value="6">Per Container</option>
												          <option value="4">Per B/L</option>
												          <option value="5">Per WM</option>
												        </select>
												    </div>
														<div class="form-group">
																<label for="">Vendor</label>
																<select class="form-control" id="vendor">
													        <option value="">Select</option>

													         <option value="prime">Prime</option>

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
															<label for="">Remark</label>
															<input type="text" class="form-control" id="remark" placeholder="" value="" required>
														</div>
												    <div class="form-group">
												        <label for="">VALIDITY</label>
												        <input type="date" class="form-control" id="validity" placeholder="VALIDITY" name="validity" value="" required>
												    </div>
												    <button type="button" class="btn btn-primary btn-me2" onclick="addSfdCharge()" name="button">Add</button>
					                <br><br>
					            </div>
					            <div class="col-10" id="show_o_charge">

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

		function addSfdCharge(){
			var countries = document.getElementById('countries').value;
			var city = document.getElementById('city').value;
			var seaport = document.getElementById('seaport').value;
			var desc = document.getElementById('desc').value;
			var uom = document.getElementById('uom').value;
			var aed = document.getElementById('aed').value;
			var currency =document.getElementById('currency').value;
			var min_aed = document.getElementById('min_aed').value;
			var vendor = document.getElementById('vendor').value;
			var validity = document.getElementById('validity').value;

			var typeOfService = document.getElementById('typeOfService').value;
			var container_id = document.getElementById('container_id').value;
			var remark = document.getElementById('remark').value;


			$.ajax({
				url:'backend/add_sfd_charge.php',
				method:'POST',
				data:{
					sdc_countries:countries,
					sdc_city:city,
					sdc_seaport:seaport,
					sdc_desc:desc,
					sdc_uom:uom,
					sdc_aed:aed,
					sdc_min_aed:min_aed,
					sdc_vendor:vendor,
					sdc_currency:currency,
					sdc_validity:validity,
					sdc_typeOfService:typeOfService,
					sdc_container_id:container_id,
					sdc_remark:remark
				},
				success:function(response){
					console.log(response);
					if(response == 200){
						$('#show_o_charge').load('ajax_pages/sfd_charge_table.php');
		 				document.getElementById('desc').value="";
	 					document.getElementById('uom').value="";
	 					document.getElementById('aed').value="";
						document.getElementById('currency').value;
					 	document.getElementById('min_aed').value="";
				 		document.getElementById('vendor').value="";
					}
					else {
						console.log(response);
					}
				}
			});
		}

		function deleteSoc(sdc_id){
			if(confirm('Are you sure you want to delete destination charge?')){
				$.ajax({
					url:'backend/del_sfd_charge.php',
					method:'POST',
					data:{
						sdcId:sdc_id
					},
					success:function(response){
						console.log(response);
						if(response == 200){
							$('#show_o_charge').load('ajax_pages/sfd_charge_table.php');
						}
					}
				});
			}
		}

		$('#show_o_charge').load('ajax_pages/sfd_charge_table.php');

		function selectCity(cId){
			$('#city').load('ajax_pages/show_cities.php',{ c_id:cId });
		}

		function selectSeaport(cId){
			$('#seaport').load('ajax_pages/show_seaport.php',{ id:cId });
		}


		</script>
    </body>
</html>
