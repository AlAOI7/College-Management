<!---------------- Session starts form here ----------------------->
<?php require "inc/security.php"; ?>
<!---------------- Session Ends form here ------------------------>
<link rel="stylesheet" href="css/stylestyle.css" />
<?php require "nav.php" ; ?>
<?php require "sidemenu.php" ; ?>
		

<!--*********************** PHP code starts from here for data insertion into database ******************************* -->


<?php  

if (isset($_POST['btn_save'])) {

	$roll_no= $_POST["roll_no"];

	 $studentName=$_POST["studentName"];
	 
	 $email=$_POST["email"];
	 
	 $mobile_no=$_POST["mobile_no"];

	 $other_phone=$_POST["other_phone"];

	 $session=$_POST['session'];
	 
	 $applicant_status=$_POST["applicant_status"];

	 $cnic=$_POST["cnic"];

	 $dob=$_POST["dob"];
	 $stuAddmissionDate = date("Y-m-d");
	 $gender=$_POST["gender"];

	$permanent_address=$_POST["permanent_address"];

	 $current_address=$_POST["current_address"];

	 $place_of_birth=$_POST["place_of_birth"];

	 $matric_complition_date=$_POST["matric_complition_date"];
	 
	 $levelid=$_POST["levelid"];

	//  $password=$_POST['password'];

	 $role=$_POST['role'];
	 $username =$_POST['studentName'];  
	 $password=rand(10000,10000000);

 	 
		
// *****************************************Images upload code starts here********************************************************** 
$profile_image = $_FILES['profile_image']['name'];$tmp_name=$_FILES['profile_image']['tmp_name'];$path = "images/".$profile_image;move_uploaded_file($tmp_name, $path);

$matric_certificate = $_FILES['matric_certificate']['name'];$tmp_name=$_FILES['matric_certificate']['tmp_name'];$path = "images/".$matric_certificate;move_uploaded_file($tmp_name, $path);


$query="Insert into students(roll_no,studentName,email,admission_date,session,mobile_no,other_phone,profile_image,applicant_status,cnic,dob,gender,permanent_address,current_address,levelid,place_of_birth,matric_complition_date,matric_certificate,Username,password)
values('$roll_no','$studentName','$email','$stuAddmissionDate','$session','$mobile_no','$other_phone','$profile_image','$applicant_status','$cnic','$dob','$gender','$permanent_address','$current_address','$levelid','$place_of_birth','$matric_complition_date','$matric_certificate','$username','$password')";


		$run=mysqli_query($conn, $query);
		if ($run) {
			echo "Your Data has been submitted";
		}
		else {
			echo "Your Data has not been submitted";
		}
		$query2="insert into login(user_id,Password,Role)values('$username','$password','$role')";
		$run2=mysqli_query($conn, $query2);
		if ($run2) {
			echo "Your Data has been submitted into login";
		}
		else {
			echo "Your Data has not been submitted into login";
		}
}
?>
<?php  
	if (isset($_POST['btn_save2'])) {
		$course_code=$_POST['course_code'];

		$semester=$_POST['semester'];

		$roll_no=$_POST['roll_no'];

		$subject_code=$_POST['subject_code'];

		$date=date("d-m-y");

		$query3="insert into student_courses(course_code,semester,roll_no,subject_code,assign_date)values('$course_code','$semester','$roll_no','$subject_code','$date')";
		$run3=mysqli_query($con,$query3);
		if ($run3) {
 			echo "Your Data has been submitted";
 		}
 		else {
 			echo "Your Data has not been submitted";
 		}


	}
?>

 
<!doctype html>
<html lang="en">
	<head>
		<title>ادارية الطالب</title>
	</head>
	<body>



     <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 admin-dashboard pl-3">
					<div class="d-flex">
						<h4>نظلم ادارة الطالب</h4>
						<button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target=".bd-example-modal-lg">Add Student</button>
					</div>
				</div>
                <div class="modal-conntent">
							    <div class="modal-header bg-info text-white">
							        <h4 class="modal-title text-center">اضافة طالب جديد</h4>
						        </div>
							    <div class="modal-body">
									<?php // echo $statusMsg; 
									$query30 = "SELECT id,max(id) FROM level";
									$rs30 = $conn->query($query30);
									$num30 = $rs30->num_rows;
									$rowm = $rs30->fetch_assoc();
										
								$maxclssid1 = $rowm['max(id)'];
								$maxclssid2 = $maxclssid1-1;?>

							        <form action="createstedunt.php" method="POST" enctype="multipart/form-data">
										<div class="row mt-3">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">اسم الطالب:*</label>
											        <input type="text" name="studentName" class="form-conntrol" required>
											    </div>
											</div>
											<div class="col-md-4">
											<label for="exampleInputName1"> تاريخ التسجيل </label>
                                                     <input id="admission_date" type ="date"  name="admission_date" class="form-control"  value="<?php echo $row['addmissiondate']; ?>" >
                    
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">اختار الجلسه:</label>
												    <select class="browser-default custom-select" name="session">
													    <option >Select Session</option>
													    <?php
															$query="select session from sessions";
															$run=mysqli_query($conn,$query);
															while($row=mysqli_fetch_array($run)) {
															 echo	"<option value=".$row['session'].">".$row['session']."</option>";
															}
														?>
													</select>

											    </div>
											</div>
											</div>
											
								  		
								  		<div class="row">
											
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">رقم سجل الطالب:</label>
												    <input type="text" name="roll_no" class="form-conntrol">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">البريد:*</label>
												    <input type="email" name="email" class="form-conntrol" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
											    </div>
											</div>
											<div class="col-md-4">
													<label for="exampleInputEmail3">المستوى</label>
													<?php
													$qry1= "SELECT * FROM level where id < '$maxclssid2' ORDER BY id ASC";
													$result1 = $conn->query($qry1);
													$num1 = $result1->num_rows;		
													if ($num1 > 0){
													echo ' <select required  name="levelid" onchange="classArmDropdown(this.value)" class="form-conntrol">';
													echo'<option value="">--تحديد المستوى--</option>';
													while ($rows1 = $result1->fetch_assoc()){
													echo'<option value="'.$rows1['id'].'" >'.$rows1['levelname'].'  '.'-'.'  '.$rows1['section'].'</option>';
														}
															echo '</select>';
														}
														?>  
												
											</div>
								  		</div>
								  		<div class="row">
											<!-- <div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">الترم الذي يريدها: </label>
											        <select class="browser-default custom-select" name="parentid">
													    <option >اختار المستوى</option>
													    <?php
															$query="select sectionname from sectionyear";
															$run=mysqli_query($conn,$query);
															while($row=mysqli_fetch_array($run)) {
															 echo	"<option value=".$row['sectionname'].">".$row['sectionname']."</option>";
															}
														?>
													</select>
											    </div>
											</div>
										 -->
											
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">صورة  الشخصية:</label>
												    <input type="file" name="profile_image" placeholder="Student " class="form-conntrol">
											    </div>
											</div>
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">الحاله: </label>
											        <select class="browser-default custom-select" name="applicant_status">
													  <option>اختار</option>
													  <option value="Admitted">نظامي </option>
													  <option value="Not Admitted">موازي</option>
													</select>
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">رقم البطاقه الوطنية:</label>
												    <input type="text" name="cnic" data-inputmask="'mask': '99999-9999999-9'" placeholder="XXXXX-XXXXXXX-X" class="form-conntrol">
											    </div>
											</div>

								  		</div>
								  		
								  		<div class="row">										
								  		</div>
								  		<div class="row">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">تاريخ الميلاد: </label>
											        <input type="date" name="dob" class="form-conntrol">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">رقم الهاتف:*</label>
												    <input type="number" name="mobile_no" class="form-conntrol" required>
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">رقم الهاتف الاخر:*</label>
												    <input type="number" name="other_phone" class="form-conntrol" required>
											    </div>
											</div>
										
								  		</div>
								  		<div class="row">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">العنوان الثابت: </label>
											        <input type="text" name="permanent_address" class="form-conntrol">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">العنوان الحالي:</label>
												    <input type="text" name="current_address" class="form-conntrol">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">مكان الميلاد:</label>
												    <input type="text" name="place_of_birth" class="form-conntrol">
											    </div>
											</div>
								  		</div>
								  		<div class="row">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">تاريخ اكمال الشهاده الثانوية: </label>
											        <input type="date" name="matric_complition_date" class="form-conntrol">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">تحميل الشهادة الثانوية:</label>
												    <input type="file" name="matric_certificate" class="form-conntrol" value="there is no image">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">الجنس:</label>
												    <select class="browser-default custom-select" name="gender">
													  <option>اختار الجنس</option>
													  <option value="Male">ذكر</option>
													  <option value="Female">انثئ</option>
													</select>
											    </div>
											</div>
											
								  		</div>

										  <h3>بيانات تسجيل دخول الطالب</h3>
											<div class="row">
											    <div class="col-md-4">
													<label for="exampleInputName1">اسم المستخدم</label>
													<input type="text" name="Username" class="form-conntrol" >
												</div>
												<div class="col-md-4"></div>
												<div class="col-md-4">
													<label for="exampleInputName1">كلمة السر</label>
													<input id="stuPassword" type="password" class="form-conntrol" name="password">
												</div>  
											</div>
           

								  		<!-- _________________________________________________________________________________
								  											Hidden Values are here
								  	    _________________________________________________________________________________ -->
										  <div>
											<!-- <input type="hidden" name="password" value="student123*"> -->
											<input type="hidden" name="role" value="Student">
								  		</div>
								  		<!-- _________________________________________________________________________________
								  											Hidden Values are end here
								  		_________________________________________________________________________________ -->
								  		<div class="modal-footer">
						   		            <input type="submit" class="btn btn-primary" name="btn_save">
		      								<button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
									    </div>
									</form>
						        </div>
						    </div>

				
				<div class="col-md-2 pt-3 w-100">
  				    <!-- Large modal -->
					<div class="modal fade bd-example-modal-lg" >
					   <div class="modal-dialog modal-lg">
						   
					   </div>
					</div>
				</div>
				 
			</div>
		</main>











     <?php require "footer.php" ; ?>