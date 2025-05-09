<<!---------------- Session starts form here ----------------------->
<?php
session_start();
error_reporting(0);
require "inc/security.php"; ?>
<!---------------- Session Ends form here ------------------------>


<!---------------- Session Ends form here ------------------------>

<?php
	$message = "";
	$account = "";
if (isset($_POST['submit'])) {
	$account = $_POST['account'];
	$user_id = $_POST['user_id'];
	$que="update login set account='$account' where user_id = '$user_id'";
	$run=mysqli_query($con,$que);
	if ($run) {
		$message =  $account == "Activate" ? "Account Activated Successfully" : "Account Deactivated Successfully";
	}	
	else{
		$message = "Account Not Activated  Successfully";
	}
}
?>
<?php require "nav.php" ; ?>
<?php require "sidemenu.php" ; ?>


		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3  admin-dashboard pl-3">
					<h4>نظام ادارة الحسابات</h4>
				</div>
				<div class="row">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<?php
									if(($account == "Activate" or $account == "Deactivate") and $message==true)
										$bg_color = "alert-success";
									else if($message==true)
										$bg_color = "alert-danger";	
								?>
								<h5 class="py-2 pl-3 <?php echo $bg_color; ?>">
									<?php echo $message ?>
								</h5>
							</div>
							<div class="col-md-12">
								<form action="manage-accounts.php" method="post">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>ادخال id  المستخدم</label>
												<input type="text" name="user_id" class="form-control" required placeholder="ادخال المستخدم">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>ادخال حالة الحساب:</label>
												<select name="account" class="form-control">
													<option>اختار حالات الحساب</option>
													<option value="Activate">نشط</option>
													<option value="Deactivate">غير نشط</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<input type="submit" name="submit" value="تغيير" class="btn btn-primary px-5">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<?php require "footer.php"; ?>