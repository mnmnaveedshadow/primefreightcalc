

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
							<h4>Sea Vendors Management</h4>
						</div>
					</div>
					<!-- /add -->


					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-4">
									<form class="" action="backend/add_sea_vendors.php" method="post">
										<div class="form-group">
											<label for="">Sea Vendors</label>
											<input type="text" class="form-control" placeholder="" name="sea_v_name" value="" required>
										</div>
										<button type="submit" class="btn btn-primary btn-me2" name="button">Add</button>
									</form>
									<br><br>
								</div>
								<div class="col-8">
									<table class="table" >
									  <thead>
									    <tr>
									      <th>Sea Vendor</th>
												<th>Action</th>
									    </tr>
									  </thead>
									  <tbody>
									    <?php
									      $sql ="SELECT * FROM tbl_sea_vendors";
									      $rs = $conn->query($sql);

									      if($rs->num_rows > 0){
									        while($row = $rs->fetch_assoc()){
														$id = $row['sv_id'];

									     ?>
									    <tr>
									      <td><?= $row['sv_name'] ?></td>
									      <td>
									        <a href="backend/del_seavendor.php?id=<?= $id ?>" onclick="return confirm('Are you sure you want to remove the sea vendor?')">
														<img src="assets/img/icons/delete.svg" alt="img">
													</a>
									      </td>
									    </tr>
									  <?php } }else{ ?>
									    <tr>
									      <td colspan="6">No Results Found</td>
									    </tr>
									  <?php } ?>
									  </tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- /add -->
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->
		<div class="modal fade" style="" id="user_edit" tabindex="-1" aria-labelledby="user_edit"  aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document" >
				<div class="modal-content">
					<div class="modal-header">
						 <h5 class="modal-title" >Change User Level</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<input type="hidden" name=""id="user_id" value="">
						<a onclick="changeAccType(1)" class="btn btn-secondary w-100">Super Admin</a> <br><br>
					  <a onclick="changeAccType(4)" class="btn btn-secondary w-100">Add Orders Admin</a> <br><br>
					  <a onclick="changeAccType(2)" class="btn btn-secondary w-100">Confirmation Center Admin</a> <br><br>
					  <a onclick="changeAccType(3)" class="btn btn-secondary w-100">Delivery & Returns Admin</a>  <br><br>
					  <a onclick="changeAccType(5)" class="btn btn-secondary w-100">Add Orders & Confirmation Center Admin</a> <br><br>
					</div>
				</div>
			</div>
		</div>
    <?php include './layouts/footer.php' ?>
		<script type="text/javascript">
			function openEditUserModal(u_id){
				document.getElementById('user_id').value = u_id;
				$('#user_edit').modal('show');
			}

			function changeAccType(status){
				var user_id = document.getElementById('user_id').value;

				window.location.href= "backend/changeuser.php?id="+user_id+"&st="+status;
			}
			<?php if(isset($_SESSION['addedu'])){ ?>
			Swal.fire({
	  title: "Hello",
	  text: "You have successfully added the user",
	  icon: "success",
	  timer: 5000,
	  timerProgressBar: true,
	  showConfirmButton: true
	});

	<?php unset($_SESSION['addedu']); } ?>

	<?php if(isset($_SESSION['deled_user'])){ ?>
	Swal.fire({
title: "Hello",
text: "You have successfully Deleted the user",
icon: "success",
timer: 5000,
timerProgressBar: true,
showConfirmButton: true
});

<?php unset($_SESSION['deled_user']); } ?>
		</script>
    </body>
</html>
