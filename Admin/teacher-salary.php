<<!---------------- Session starts form here ----------------------->
<?php
session_start();
error_reporting(0);
require "inc/security.php"; ?>
<!---------------- Session Ends form here ------------------------>
<link rel="stylesheet" href="css/stylestyle.css" />

<!---------------- Session Ends form here ------------------------>

<!--*********************** PHP code starts from here for data insertion into database ******************************* -->
<?php 
 
 	if (isset($_POST['btn_save'])) {

 		$teacher_id=$_POST["teacher_id"];

 		$basic_salary=$_POST["basic_salary"];

 		$medical_allowance=$_POST["medical_allowance"];
 		
 		$hr_allowance=$_POST["hr_allowance"];
 		
 		$scale=$_POST["scale"];
 		
 		$query="INSERT INTO teacher_salary_allowances(teacher_id,basic_salary,medical_allowance,hr_allowance,scale)values('$teacher_id','$basic_salary','$medical_allowance','$hr_allowance','$scale')";
 		$run=mysqli_query($conn, $query);
 		if ($run) {
 			echo "Your Data has been submitted";
 		}
 		else {
 			echo "Your Data has not been submitted";
 		}
 	}
 	if (isset($_POST['btn_sub'])) {

 		$teacher_id=$_POST["teacher_id"];

 		$query="select * from teacher_salary_allowances where teacher_id='$teacher_id'";
 		$run=mysqli_query($conn, $query);
 		while ($row=mysqli_fetch_array($run)) {
 			$total_amount=$row['basic_salary']+($row['basic_salary']*$row['medical_allowance']/100)+($row['basic_salary']*$row['hr_allowance']/100);
 			$query1="INSERT INTO teacher_salary_report(teacher_id, total_amount, status) VALUES ('$teacher_id','$total_amount','Paid')";
 			$run1=mysqli_query($conn, $query1);
	 		if ($run1) {  ?>
	 			<script type="text/javascript">
	 				alert("Salary has been paid to I'd is : "+<?php echo $row['teacher_id'] ?>);
	 			</script>
	 		<?php }
	 		else { ?>
	 			<script type="text/javascript">
	 				alert("Salary has not been paid due to some errors");
	 			</script>
	 		<?php }
 	    }
 	}
?>
<!--*********************** PHP code end from here for data insertion into database ******************************* -->
<?php require "nav.php" ; ?>
<?php require "sidemenu.php" ; ?>


		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
		<h3>  الكود التالي لا يضيف الراتب التاكد من الاضافه </h3>
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">ادارة نظام رواتب الدكتور </h4>
						<button type="button" class="btn btn-primary ml-5 mr-5" data-toggle="modal" data-target=".bd-example-modal-lg">اضافة راتب </button>
						<button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target=".add_salary">اضافة راتب</button>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 ml-2">
						<section class=" mt-3">
							<div class="row">
								<div class="col-md-8"></div>
								<div class="col-md-3 ml-5 ">
									<div class="col-md-12 pt-3 ml-5">
										<!-- Large modal -->
										<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header bg-info text-white">
														<h4 class="modal-title text-center">اضافة راتب</h4>
													</div>
													<div class="modal-body">
														<form action="teacher-salary.php" method="post">
															<div class="row mt-3">
																<div class="col-md-6 pr-5">
																	<div class="form-group">
																		<label for="exampleInputEmail1">الدكتور I'd: </label>
																		<input type="text" name="teacher_id" class="form-control" placeholder="ادخال معرف الدكتور">
																	</div>
																</div>
																<div class="col-md-6 pr-5">
																	<div class="form-group">
																		<label for="exampleInputEmail1">راتب اساسي:</label>
																		<input type="text" name="basic_salary" class="form-control" placeholder="ادخال راتب اساسي">
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputEmail1">بدل طبي: </label>
																		<input type="text" name="medical_allowance" class="form-control" placeholder="بدل طبي">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="formp">
																		<label for="exampleInputEmail1">بدل ايجار : </label>
																		<input type="text" name="hr_allowance" class="form-control" placeholder="ادخال HR ايجار">
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="formp">
																		<label for="exampleInputEmail1">مقياس الدفع: </label>
																		<input type="text" name="scale" class="form-control"placeholder="ادخال مقياس الدفع">
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<input type="submit" class="btn btn-primary" name="btn_save" value="حفظ">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
															</div> 	
														</form>
													</div>
												</div>
										</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8"></div>
								<div class="col-md-3 ml-5 ">
									<div class="col-md-12 pt-3 ml-5">
										<!-- Large modal -->
										<div class="modal fade add_salary" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header bg-info text-white">
														<h4 class="modal-title text-center">اضافة راتب</h4>
													</div>
													<div class="modal-body">
														<form action="teacher-salary.php" method="post">
															<div class="row mt-3">
																<div class="col-md-12 pr-5">
																	<div class="form-group">
																		<label for="exampleInputEmail1">الدكتور I'd: </label>
																		<input type="text" name="teacher_id" class="form-control" placeholder="معرف الدكتور">
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<input type="submit" class="btn btn-primary" name="btn_sub" value="حفظ">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
															</div> 	
														</form>
													</div>
												</div>
										</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
					  <div class="table-responsive">
									<table id="zero_config" class="table table-striped table-bordered">
										<tr class="table-tr-head table-three">
											<td colspan="9" class=" text-center "><h4>تفرير بكل الرواتب</h4></td>
										</tr>
										<tr class="table-tr-head">
											<th>قسيمة الراتب</th>
											<th>I'd</th>
											<th>الاسم</th>
											<th>الراتب الاساسي</th>
											<th>بدل طبي</th>
											<th>HR ايجار</th>
											<th>جدول الاجور </th>
											<th>تاريخ الدفع</th>
											<th>الاجمالي</th>
										</tr>
										<?php  
											$query="select tsr.teacher_id,ti.first_name,middle_name,last_name,salary_id,basic_salary,medical_allowance,hr_allowance,scale,Date(paid_date)
											as paid_date,total_amount from teacher_salary_allowances tsa
											 inner join teacher_salary_report tsr on tsa.teacher_id=tsr.teacher_id
											 inner join teacher_info ti on ti.teacher_id=tsr.teacher_id";
											$run=mysqli_query($conn,$query);
											while ($row=mysqli_fetch_array($run)) { ?>
												<tr>
													<td><?php echo $row['salary_id'] ?></td>
													<td><?php echo $row['teacher_id'] ?></td>
													<td><?php echo $row["first_name"]." ".$row["middle_name"]." ".$row["last_name"] ?></td>
													<td><?php echo $row['basic_salary'] ?></td>
													<td><?php echo ($row['basic_salary']*$row['medical_allowance']/100) ?></td>
													<td><?php echo ($row['basic_salary']*$row['hr_allowance']/100) ?></td>
													<td><?php echo $row['scale'] ?></td>
													<td><?php echo $row['paid_date'] ?></td>
													<td><?php echo $row['total_amount'] ?></td>
												</tr>		
											<?php
											}
										?>
									</table>
								</div>
							</div>				
						</section>
					</div>
				</div>
			</div>
		</main>
		<?php require "footer.php"; ?>
