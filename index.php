<!-- Header -->
<?php include 'layouts/header.php'; ?>
<!-- Header -->

<!-- Sidebar -->
<?php include 'layouts/sidebar.php'; ?>
<!-- /Sidebar -->

<?php
if(isset($_REQUEST['from_date'])){
	$from_date =$_REQUEST['from_date'];
	$to_date = $_REQUEST['to_date'];
}
 ?>


<div class="page-wrapper">
	<div class="content">
		<div class="card">
			<div class="card-body">
				<h3>Quotes List</h3>
				<table class="table  datanew">
					<thead>
						<tr>
							<th>Id</th>
							<th>Customer Name</th>
							<th>Service</th>
							<th>Review Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql_list = "SELECT * FROM tbl_quote";
							$rs_list = $conn->query($sql_list);
							if($rs_list->num_rows > 0){
								while($row = $rs_list->fetch_assoc()){
									$cid = $row['c_id'];
									$ser_t = $row['q_service'];
									$st = $row['q_status'];

									$link = 0;

									if($ser_t == 1){
										$link ="quote_breakdown_air.php?q_id=".$row['q_id'];
									}
									else if($ser_t == 2){
										$link ="quote_breakdown_sea.php?q_id=".$row['q_id'];
									}
									else if($ser_t == 3){
										$link ="quote_breakdown_land.php?q_id=".$row['q_id'];
									}
									else if($ser_t == 4){
										$link ="quote_breakdown_brokerage.php?q_id=".$row['q_id'];
									}

						 ?>
						<tr>
							<td><?= $row['q_id'] ?></td>
							<td><?= getDataBack($conn,'tbl_customer_info','c_id',$cid,'c_name') ?></td>
							<td>
															<?= getServiceType($ser_t); ?> </td>
							<td>
								<?= getQuoteStatus($st); ?>
							</td>
							<td> <a href="<?= $link ?>" class="btn btn-success" style="color:#fff;">Review Quote</a> </td>
						</tr>
					<?php } } ?>
					</tbody>
					<tbody>


					</tbody>

				</table>
			</div>
		</div>

	</div>
</div>
<!-- /Main Wrapper -->

<?php include 'layouts/footer.php' ?>

</body>
</html>
