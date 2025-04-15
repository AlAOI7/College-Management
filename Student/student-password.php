<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginStudent"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>


<?php 
	if (isset($_POST['submit'])) {
		$user_id=$_SESSION['LoginStudent'];
		$password=$_POST['password'];
		$query="UPDATE login set Password='$password' where user_id='$user_id'";
		$run=mysqli_query($conn,$query);
		if ($run) {  ?>
 			<script type="text/javascript">
 				alert("تم تغيير كلمة السر الخاصه بك");
 			</script>
 		<?php }
 		else { ?>
 			<script type="text/javascript">
 				alert("لم يتم تغيير كلمة السر الخاصة بك");
 			</script>
		<?php }
	}
	
?>

<!doctype html>
<html lang="en">
	<head>
		<title>كلمة سر الطالب </title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/student-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">تعديل كلمة السر</h4>
				</div>
				<div class="container pt-5">
					<div class="row">
						<div class="col-md-12">
							<form action="student-password.php" method="post">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label> كلمة السر الجديدة</label>
											<input type="text" name="password" class="form-control" required placeholder="ادخل كلمة السر الجديدة  ">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group pt-4 pl-5">
											<input type="submit" name="submit" value="تحديث" class="btn btn-primary">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
