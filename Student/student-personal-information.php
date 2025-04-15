 <!---------------- Session starts form here ----------------------->
 <?php  
	session_start();
	if (!$_SESSION["LoginStudent"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
 <!---------------- Session Ends form here ------------------------>>


 <?php

	$roll_no=$_SESSION['LoginStudent'];
	$query1="select * from students where studentName='$roll_no'";
	$run1=mysqli_query($conn,$query1);
	while ($row=mysqli_fetch_array($run1)){
		$roll_no=$row['roll_no'];
	}

	if (isset($_POST['sub'])) {

		$studentName=$_POST['studentName'];

		$cnic=$_POST['roll_no'];

		$mobile_no=$_POST['mobile_no'];

		$gender=$_POST['email'];

		$email=$_POST['session'];

		$total_marks=$_POST['prospectus_amount'];

		$obtain_marks=$_POST['applicant_status'];

		$current_address=$_POST['cnic'];

		$permanent_address=$_POST['dob'];

		$state=$_POST['other_phone'];
		$state=$_POST['gender'];
		$state=$_POST['parentid'];
		$state=$_POST['levelid'];
		$state=$_POST['sectionid'];	
		$state=$_POST['permanent_address'];

		$place_of_birth=$_POST['current_address'];
		$state=$_POST['place_of_birth'];
		$state=$_POST['matric_complition_date'];
		$state=$_POST['matric_certificate'];
		$state=$_POST['email'];
		$state=$_POST['total_marks'];	
		$state=$_POST['obtain_marks'];
		$state=$_POST['state'];	
		$state=$_POST['Username'];
		$state=$_POST['password'];	
		$state=$_POST['admission_date'];

	
	$state=$_POST['profile_image'];
	$state=$_POST['matric_certificate'];

		$query="update students set studentName='$studentName',cnic='$cnic',mobile_no='$mobile_no',gender='$gender',email='$email',total_marks='$total_marks',obtain_marks='$obtain_marks',current_address='$current_address'
		,permanent_address='$permanent_address',state='$state',place_of_birth='$place_of_birth' where roll_no='$roll_no'";
		$run=mysqli_query($conn,$query);
		if ($run) {  ?>
 <script type="text/javascript">
alert("Student data has been updated");
 </script>
 <?php }
 		else { ?>
 <script type="text/javascript">
alert("Student data has not been updated due to some errors");
 </script>
 <?php }


	}
?>


 <!doctype html>
 <html lang="en">

 <head>
     <title>بيانات الطالب</title>
 </head>

 <body>
     <?php include('../common/common-header.php') ?>
     <?php include('../common/student-sidebar.php') ?>

     <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
         <div class="sub-main sub-main-student">
             <div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
                 <h4 class="">تعديل معلومات الطالب </h4>
             </div>
             <div class="row ml-4">
                 <div class="col-lg-12 col-md-12 col-sm-12">
                     <form action="student-personal-information.php" method="post">
                         <?php $roll_no=$_SESSION['LoginStudent'];
						 
								$query="select * from students where studentName='$roll_no'";
								$run=mysqli_query($conn,$query);
								while ($row=mysqli_fetch_array($run)) {
						?>
                         <div class="row">
                             <div class="col-md-6 pr-5">
                                 <div class="form-group">
                                     <label for="exampleInputPassword1">الاسم:*</label>
                                     <input type="text" class="form-control" name="studentName"
                                         value="<?php echo $row['studentName'] ?>">
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <!-- <div class="col-md-6 pr-5">
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">Last Name:*</label>
                                     <input type="text" class="form-control" name="last_name"
                                         value=<?php echo $row['last_name'] ?>>
                                 </div>
                             </div> -->
                             <!-- <div class="col-md-6 pr-5">
                                 <div class="form-group">
                                     <label for="exampleInputPassword1">Father Name:*</label>
                                     <input type="text" class="form-control" name="email"
                                         value=<?php echo $row['father_name'] ?>>
                                 </div>
                             </div> -->
                         </div>
                         <div class="row">
                             <div class="col-md-6 pr-5">
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">رقم البطاقة *</label>
                                     <input type="text" class="form-control" name="cnic"
                                         value=<?php echo $row['cnic'] ?>>
                                 </div>
                             </div>
                             <div class="col-md-6 pr-5">
                                 <div class="form-group">
                                     <label for="exampleInputPassword1">الهاتف
                                     </label>
                                     <input type="number" class="form-control" name="mobile_no"
                                         value=<?php echo $row['mobile_no'] ?>>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-6 pr-5">
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">الجنس</label>
                                     <input type="text" class="form-control" name="gender"
                                         value=<?php echo $row['gender'] ?>>
                                 </div>
                             </div>
                             <div class="col-md-6 pr-5">
                                 <div class="form-group">
                                     <label for="exampleInputPassword1">البريد</label>
                                     <input type="number" name="email" class="form-control" placeholder="email"
                                         value=<?php echo $row['email'] ?>>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-6 pr-5">
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">Total Marks (InterMediate/HSSC/Equiv
                                         Marks):*</label>
                                     <input type="number" name="total_marks" class="form-control" placeholder="Marks"
                                         value=<?php echo $row['total_marks'] ?>>
                                 </div>
                             </div>
                             <div class="col-md-6 pr-5">
                                 <div class="form-group">
                                     <label for="exampleInputPassword1">Obtain Marks (InterMediate/HSSC/Equiv
                                         Marks):*</label>
                                     <input type="number" name="obtain_marks" class="form-control" placeholder="Marks"
                                         value=<?php echo $row['obtain_marks'] ?>>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-6 pr-5">
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">العنوان الحالي :*</label>
                                     <input type="text" name="current_address" class="form-control"
                                         value=<?php echo $row['current_address'] ?>>
                                 </div>
                             </div>
                             <div class="col-md-6 pr-5">
                                 <div class="form-group">
                                     <label for="exampleInputPassword1">العنوان الدائم:*</label>
                                     <input type="text" name="permanent_address" class="form-control"
                                         value=<?php echo $row['permanent_address'] ?>>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-6 pr-5">
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">State Or Province: *</label>
                                     <input type="text" name="state" class="form-control" placeholder="State Province"
                                         value=<?php echo $row['state'] ?>>
                                 </div>
                             </div>
                             <div class="col-md-6 pr-5">
                                 <div class="form-group">
                                     <label for="exampleInputPassword1">مكان الميلاد:*</label>
                                     <input type="text" name="place_of_birth" class="form-control"
                                         value=<?php echo $row['place_of_birth'] ?>>
                                 </div>
                             </div>
                         </div>
                         <?php } ?>
                         <div class="row mt-3">
                             <div class="col-lg-6 col-md-6 offset-4">
                                 <input type="submit" name="sub" type="submit" class="btn btn-primary"
                                     value="تعديل المعلومات">
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </main>
     <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
     <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
 </body>

 </html>