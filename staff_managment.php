

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
							<h4>Manage Staffs</h4>
						</div>
					</div>
					<!-- /add -->


					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-4">
									<?php if(isset($_SESSION['error'])){ ?>
										<h5 style="color:#755c16;"> User Name Already Exist in the table </h5>
									<hr>
								<?php unset($_SESSION['error']); } ?>
									<form class="" action="backend/add_user.php" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label for="">Staff User Name</label>
											<input type="text" class="form-control" placeholder="User Name" name="uname" value="" required>
											<small>(Always better to avoid space during account creation)</small>
										</div>
										<div class="form-group">
											<label for="">Staff Password</label>
											<input type="text" class="form-control" placeholder="xxxxxxxx" name="upass" value="" required>
										</div>
										<div class="form-group">
											<label for="">Select Staff Access Level</label>
											<select class="form-control" name="utype" required>
													<option value="1">Super Admin</option>
													<option value="2">Data Handler</option>
													<option value="3">Staff</option>
											</select>
										</div><br>
										<button type="submit" class="btn btn-primary btn-me2" name="button">Create</button>
									</form>
									<br><br>
								</div>
								<div class="col-8">
									<table class="table" >
									  <thead>
									    <tr>
									      <th>User Name</th>
									      <th>Password</th>
									      <th>User Level</th>
									      <th>Modification/Delete </th>
									    </tr>
									  </thead>
									  <tbody>
									    <?php
									      $sql_users ="SELECT * FROM tbl_users  ORDER BY `tbl_users`.`u_id` DESC";
									      $rs_users = $conn->query($sql_users);

									      if($rs_users->num_rows > 0){
									        while($rowUsers = $rs_users->fetch_assoc()){
														$user_level = $rowUsers['u_level'];

														$userText = '';
														switch ($user_level) {
														    case '1':
														        $userText = 'Super Admin';
														        break;
														    case '2':
														        $userText = 'Data Handler';
														        break;
														    case '3':
														        $userText = 'Staff';
														        break;
														    default:
														        $userText = 'Something Went Wrong';
														        break;
														}
									     ?>
									    <tr>
									      <td><?= $rowUsers['u_name'] ?></td>
									      <td><?= $rowUsers['u_pass'] ?></td>
									      <td><?= $userText ?></td>
									      <td>
									        <a href="backend/deluser.php?id=<?= $rowUsers['u_id'] ?>"
														 onclick="return confirm('Are you sure you want to remove the user?')"><img src="assets/img/icons/delete.svg" alt="img"> </a>
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
