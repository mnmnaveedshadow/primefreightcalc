<?php include 'backend/conn.php';?>


<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<meta name="robots" content="noindex, nofollow">
		<title>Prime Logistics Get A Quote</title>

		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="../../assets/img/favicon.png">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<!-- Select2 CSS -->
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


		<!-- Animation CSS -->
		<link rel="stylesheet" href="assets/css/animate.css">



		<!-- Datatable CSS -->
		<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css?new">
		<link rel="stylesheet" href="assets/css/website.css">


	</head>
	<body>
		<div id="global-loader" >
			<div class="whirly-loader"> </div>
		</div>

    <div class="container">
    <div class="card">
      <div class="card-body">
          <div class="row">
            <div class="col-lg-3">
              <img src="logo/New-logo-Prime.png" style="width:180px;" alt="">
            </div>
            <div class="col-lg-9">
              <div style="float:right;">
                <h4><img src="icons/calendar.png" style="width:20px;" alt=""> <?= date('Y-m-d') ?></h4> <hr>
              </div>
            </div>
          </div>
          <h3>Get a quote with prime logistics</h3>
          <hr>
          <div id="customer_info">
						<h4>Your Informations</h4>
	            <div class="row">
	              <div class="col-lg-4">
	                <div class="form-group">
	      						<label for="">Name</label>
	      						<input type="text" name="" id="customerName" class="form-control" value="">
	      					</div>
	              </div>
	              <div class="col-lg-4">
	                <div class="form-group">
	      						<label for="">Email</label>
	      						<input type="text" name="" id="email" class="form-control" value="">
	      					</div>
	              </div>
	              <div class="col-lg-4">
	                <div class="form-group">
	                  						<label for="">Phone Number</label>
	                  						<input type="text" name="" id="phoneNumber" class="form-control" value="">
	                  					</div>
	              </div>
	              <div class="col-lg-4">
	                <div class="form-group">
	                  						<label for="">Company Name</label>
	                  						<input type="text" name="" id="companyName" class="form-control" value="">
	                  					</div>
	              </div>
	              <div class="col-lg-4">

	                  					<div class="form-group">
	                  						<label for="">Countries</label>
	                  						<select class="form-control" id="countries" onchange="selectCustomerState(this.value)">
	                  							<option value="">Select</option>
	                  							<?php
	                  								$sql = "SELECT * FROM `tbl_countries` ORDER BY `tbl_countries`.`name` ASC";
	                  								$rs= $conn->query($sql);
	                  								if($rs->num_rows > 0){
	                  									while($row_c = $rs->fetch_assoc()){
	                  							 ?>
	                  							 <option value="<?= $row_c['id'] ?>"><?= $row_c['name'] ?></option>
	                  						 <?php } } ?>
	                  						</select>
	                  					</div>
	              </div>
								<div class="col-lg-4">

															<div class="form-group">
																<label for="">State</label>
																<select class="js-states form-control" onchange="selectCustomerCity(this.value)" id="state">

																</select>
															</div>

								</div>
	              <div class="col-lg-4">

	                  					<div class="form-group">
	                  						<label for="">City</label>
	                  						<select class="js-states form-control" id="city">

	                  						</select>
	                  					</div>

	              </div>
	              <div class="col-lg-4">

	                  					<div class="form-group">
	                  						<label for="">Address</label>
	                  						<input type="text" name="" class="form-control" id="address" value="">
	                  					</div>
	              </div>

	            </div>

	  					<button type="button" class="btn btn-primary" onclick="addOrUpdateCustomerInfo()"
	  					 name="button">Next</button>
          </div>
					<!-- end of customer info -->
					<br>
					<div id="customer_service" style="display:none;">
						<h4>Choose Service</h4>
						<div class="row">
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<a onclick="selectService(1)">
											<img src="service_images/shipping.jpg" style="width:100%;" alt="">
											<hr>
											<h3 class="text-center">Shipping</h3>
										</a>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<a onclick="selectService(1)">
											<img src="service_images/shipping.jpg" style="width:100%;" alt="">
											<hr>
											<h3 class="text-center">Shipping</h3>
										</a>
									</div>
								</div>
							</div>
							<!-- end of shipping -->
							<!-- end of brokerage -->
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<a href="#" onclick="selectService(2)">
											<img src="service_images/warehousing.jpg" style="width:100%;" alt="">
											<hr>
											<h3 class="text-center">Warehousing</h3>
										</a>
									</div>
								</div>
							</div>
							<!-- end of warehousing -->
						</div>
					</div>
					<br>
					<div id="shipping_services" style="display:none;">
							<div class="row">
								<div class="col-3">
									<br><br>
									<div class="shipping-main-option" onclick="selectShipping(1)">
										Air Freight
									</div>
								</div>
								<div class="col-3">
									<br><br>
									<div class="shipping-main-option" onclick="selectShipping(2)">
										Sea Freight
									</div>
								</div>
								<div class="col-3">
									<br><br>
									<div class="shipping-main-option" onclick="selectShipping(3)">
										Land Freight
									</div>
								</div>
							</div>
							<br>
					</div>
					<div id="shipping">

						<div id="airfrieght_form" style="display:none;">
							<form class="" action="backend/gen_air_quote.php" method="post">
								<input type="hidden" name="service_type" value="1">
									<div class="row">
											<div class="col-6">
												<label for="">Movement Type</label>
												<select class="form-control" name="m_type">
													<option value="1">Door to Door</option>
													<option value="2">Door to Airport</option>
													<option value="3">Airport to Airport</option>
													<option value="4">Airport to Door</option>
												</select>
												<br>
											</div>
											<div class="col-12">
												<div class="row">

													<div class="col-6">
														<h3>Orgin</h3>
														<hr>
														<div class="form-group">
															<label for="">Orgin Countries</label>
															<select class="js-states form-control" name="orgin_country" id="countries_orgin_air" onchange="selectCityOrginAir(this.value)">
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
															<select class="form-control" id="city_orgin_air" name="orgin_city" onclick="selectAirportOrgin(this.value)">

															</select>
														</div>
														<div class="form-group">
															<label for="">Orgin Airport</label>
															<select class="js-states form-control" name="orgin_airport" id="airport_orgin">

															</select>
														</div>
													</div>
													<div class="col-6">
														<h3>Destination</h3>
														<hr>
														<div class="form-group">
															<label for="">Destination Countries</label>
															<select class="js-states form-control" id="countries_destination_air" name="destination_country" onchange="selectCityDestiAir(this.value)">
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
															<select class="form-control" id="city_desti_air" name="destination_city" onclick="selectAirportDestination(this.value)">

															</select>
														</div>
														<div class="form-group">
															<label for="">Destination Airport</label>
															<select class="js-states form-control" name="destination_airport" id="airport_desti">

															</select>
														</div>
													</div>
												</div>
											</div>
											<br>
											<!-- <div class="col-12">
													<label for="other_charges">Other Charges</label>
													<div id="other_charges_container">
															<div class="input-group mb-3">
																	<input type="text" class="form-control" name="other_charge_names[]" placeholder="Charge Name">
																	<input type="text" class="form-control" name="other_charges[]" placeholder="Amount">
																	<div class="input-group-append">
																			<button type="button" class="btn btn-secondary" id="add_other_charge">Add</button>
																	</div>
															</div>
													</div>
											</div> -->
											<div class="col-12">
												 <br><br>
													<button type="submit" class="btn btn-primary" name="calculate_button">Request a Quote</button>
											</div>
									</div>
							</form>
						</div>
						<!-- end of air_frieght_form -->
						<div id="seafreight_form" style="display:none;">
							<form class="" action="backend/gen_sea_quote.php" method="post">
								<input type="hidden" name="service_type" value="2">
									<div class="row">
											<div class="col-6">
												<label for="">Movement Type</label>
												<select class="form-control" name="m_type">
													<option value="1">Door to Door</option>
													<option value="1">Door to Seaport</option>
													<option value="1">Seaport to Seaport</option>
													<option value="1">Seaport to Door</option>
												</select>
												<br>
											</div>
											<div class="col-6">
												<label for="">Type Of Service</label>
												<select class="form-control" name="tos">
													<option value="1">LCL</option>
													<option value="2">FCL</option>
												</select>
												<br>
											</div>
											<div class="col-12">
												<div class="row">
													<div class="col-6">
														<h3>Orgin</h3>
														<hr>
														<div class="form-group">
															<label for="">Orgin Countries</label>
															<select class="js-states form-control"  name="orgin_city" id="countries_orgin_sea" onchange="selectCityOrginSea(this.value)">
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
															<select class="form-control" id="city_orgin_sea" name="orgin_country" onclick="selectSeaPortOrgin(this.value)">

															</select>
														</div>
														<div class="form-group">
															<label for="">Orgin Sea Port</label>
															<select class="js-states form-control" name="orgin_seaport" id="seaport_sea_orgin">

															</select>
														</div>
													</div>
													<div class="col-6">
														<h3>Destination</h3>
														<hr>
														<div class="form-group">
															<label for="">Destination Countries</label>
															<select class="js-states form-control" id="countries_destination_sea" name="destination_country" onchange="selectCityDestiSea(this.value)">
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
															<select class="form-control" id="city_desti_sea" name="destination_city" onclick="selectSeaPortDesti(this.value)">

															</select>
														</div>
														<div class="form-group">
															<label for="">Destination Sea Port</label>
															<select class="js-states form-control" name="destination_seaport" id="seaport_sea_desti">

															</select>
														</div>
													</div>
												</div>
											</div>
											<!-- <div class="col-12">
													<label for="other_charges">Other Charges</label>
													<div id="other_charges_container">
															<div class="input-group mb-3">
																	<input type="text" class="form-control" name="other_charge_names[]" placeholder="Charge Name">
																	<input type="text" class="form-control" name="other_charges[]" placeholder="Amount">
																	<div class="input-group-append">
																			<button type="button" class="btn btn-secondary" id="add_other_charge">Add</button>
																	</div>
															</div>
													</div>
											</div> -->
											<div class="col-12">
												 <br><br>
													<button type="submit" class="btn btn-primary"  name="calculate_button">Request a Quote</button>
											</div>
									</div>
							</form>
						</div>
						<!-- end of sea -->
						<div id="landfrieght_form" style="display:none;">
							<form class="" action="backend/gen_land_quote.php" method="post">
								<input type="hidden" name="service_type" value="3">
									<div class="row">
											<div class="col-6">
												<label for="">Movement Type</label>
												<select class="form-control" name="m_type">
													<option value="1">Door to Door</option>
													<option value="1">Door to Border</option>
													<option value="1">Border to Border</option>
													<option value="1">Border to Door</option>
												</select>
												<br>
											</div>
											<div class="col-6">
												<label for="">Type Of Service</label>
												<select class="form-control" name="tos">
													<option value="1">FTL</option>
													<option value="2">LTL</option>
												</select>
												<br>
											</div>
											<div class="col-12">
												<div class="row">
													<div class="col-6">
														<h3>Orgin</h3>
														<hr>
														<div class="form-group">
															<label for="">Orgin Countries</label>
															<select class="js-states form-control" name="orgin_country" id="countries_orgin_land" onchange="selectCityOrginLand(this.value)">
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
															<select class="form-control" id="city_orgin_land" name="orgin_city" onchange="selectBorderOrgin(this.value)">

															</select>
														</div>
														<div class="form-group">
															<label for="">Orgin Border Land</label>
															<select class="js-states form-control" name="orgin_border" id="border_orgin">

															</select>
														</div>
													</div>
													<div class="col-6">
														<h3>Destination</h3>
														<hr>
														<div class="form-group">
															<label for="">Destination Countries</label>
															<select class="js-states form-control" name="destination_country" id="countries_destination_land" onchange="selectCityDestiLand(this.value)">
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
															<select class="form-control" id="city_desti_land" name="destination_city" onchange="selectBorderDesti(this.value)">

															</select>
														</div>
														<div class="form-group">
															<label for="">Destination Border Land</label>
															<select class="js-states form-control" name="destination_border" id="border_desti">

															</select>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12">
												 <br><br>
													<button type="submit" class="btn btn-primary"
													 name="calculate_button">Request a Quote</button>
											</div>
									</div>
							</form>
						</div>
					</div>
					<!-- end of landing -->
<div class="col-12" id="warehouse_price" style="display:none;">
<br><br>
<table class="rate-card-table">
	<tr>
			<th>Description</th>
			<th>UOM</th>
			<th>Rate (AED)</th>
			<th>Remarks</th>
			<th>Validity</th>
	</tr>
	<?php
	$sql = "SELECT * FROM `tbl_warehouse_cat`";

	$rs = $conn->query($sql);
	if($rs->num_rows >0){
		while($row = $rs->fetch_assoc()){
			$id  = $row['wc_id']; ?>
		<tr>
			<td colspan="6">
				<span style="font-weight:bold;text-transform: capitalize;">
					<?= $row['wc_name'] ?>
				</span>
			</td>
		</tr>

			<?php
				$sql_data = "SELECT * FROM `tbl_warehouse_data` WHERE wc_id='$id'";
				$rs_data = $conn->query($sql_data);

				if($rs_data->num_rows > 0){
					while($row_data = $rs_data->fetch_assoc()){
			 ?>
				 <tr>
					<td> --<?= $row_data['wd_description'] ?> </td>
					<td> <?= $row_data['wd_uom'] ?> </td>
					<td> <?= $row_data['wd_rate'] ?> </td>
					<td> <?= $row_data['wd_remarks'] ?> </td>
					<td> <?= $row_data['wd_validity'] ?> </td>
				</tr>
		<?php } } ?>

	<?php }} ?>
</table>
<br><br>
<form class="" action="backend/gen_warehouse_quote.php" method="post">
	<input type="hidden" name="service_type" value="3">
	<button type="submit" class="btn btn-success">Get In Touch With Us</button>
</form>
</div>
<!-- ware_housing price -->
<br>

<div id="package_details" style="display:none;">
	<div class="row">
		<div class="col-md-2">
				<div class="form-group">
						<label for="quantity">Quantity</label>
						<input type="number" id="p_qty" class="form-control" name="quantity">
				</div>
		</div>
		<div class="col-md-2">
				<div class="form-group">
						<label for="length">Length (L)</label>
						<input type="number" id="p_l" class="form-control" name="length">
				</div>
		</div>
		<div class="col-md-2">
				<div class="form-group">
						<label for="width">Width (W)</label>
						<input type="number" id="p_w" class="form-control" name="width">
				</div>
		</div>
		<div class="col-md-2">
				<div class="form-group">
						<label for="height">Height (H)</label>
						<input type="number" id="p_h" class="form-control" name="height">
				</div>
		</div>
		<div class="col-md-2">
				<div class="form-group">
						<label for="weight">Weight</label>
						<input type="number" id="p_we" class="form-control" name="weight">
				</div>
		</div>
</div>
<button type="button" id="add-package" onclick="add_package_details()" class="btn btn-primary">Add Package</button> <br><br>

		<div class="col-12" id="show_packages">

		</div> <br><br>
		<button type="button" name="button" class="btn btn-success" onclick="goToShipping()">Next</button>
</div>
<hr>
<div class="row">
	<div class="col-6">

		<h4> <img src="icons/email.png" style="width:20px;" alt=""> info@primelogistics.ae</h4>
	</div>
	<div class="col-6">

		<h4><img src="icons/location.png" style="width:20px;" alt=""> Warehouse G09,Dubai Airport<br> &nbsp;&nbsp;&nbsp;&nbsp;  Freezone,Dubai, UAE</h4>
	</div>
</div>
      </div>
    </div>
    </div>












<!-- jQuery -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <!-- Feather Icon JS -->
<script src="assets/js/feather.min.js"></script>

<!-- Slimscroll JS -->
<script src="assets/js/jquery.slimscroll.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Datatable JS -->
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<!-- Bootstrap Core JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

<!-- Owl JS Added-->
<script src="assets/plugins/owlcarousel/owl.carousel.min.js"></script>



<!-- Sweetalert 2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Custom JS -->
<script src="assets/js/script.js"></script>

<!-- Datetimepicker JS -->
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<!-- Chart JS -->
<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="assets/plugins/apexchart/chart-data.js"></script>
<script src="homepage.js">  </script>
<script type="text/javascript">
	function selectCustomerState(cId)
	{
		$('#state').load('ajax_pages/sel_cus_state.php',{ c_id:cId });
	}

	function selectCustomerCity(sId)
	{
		$('#city').load('ajax_pages/sel_cus_city.php',{ s_id:sId });
	}
</script>
</body>
</html>
