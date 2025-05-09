<?php
session_start();
error_reporting(0);
require "inc/security.php"; ?>
<!---------------- Session Ends form here ------------------------>
<!-- <link rel="stylesheet" href="css/stylestyle.css" /> -->
<?php require "nav.php" ; ?>
<?php require "sidemenu.php" ; ?>
<!---------------- Session Ends form here ------------------------>

<!--*********************** PHP code starts from here for data insertion into database ******************************* -->
<?php  
 	if (isset($_POST['btn_save'])) {

 		$first_name=$_POST["first_name"];

 		$middle_name=$_POST["middle_name"];

 		$last_name=$_POST["last_name"];
 		
 		$email=$_POST["email"];
 		
 		$phone_no=$_POST["phone_no"];
 		
 		$teacher_status=$_POST["teacher_status"];
 		$application_status=$_POST["application_status"];
 		
 		$cnic=$_POST["cnic"];
 		
 		$dob=$_POST["dob"];
 		
 		$other_phone=$_POST["other_phone"];
 		
 		$gender=$_POST["gender"];
 		
		$permanent_address=$_POST["permanent_address"];
 		
 		$current_address=$_POST["current_address"];
 		
 		$place_of_birth=$_POST["place_of_birth"];
 		
 		$matric_complition_date=$_POST["matric_complition_date"];
 		
 		$matric_awarded_date=$_POST["matric_awarded_date"];
 		
 		$fa_complition_date=$_POST["fa_complition_date"];
 		
 		$fa_awarded_date=$_POST["fa_awarded_date"];
 		
 		$ba_complition_date=$_POST["ba_complition_date"];
 		
 		$ba_awarded_date=$_POST["ba_awarded_date"];

 		$ma_complition_date=$_POST["ma_complition_date"];
 		
 		$ma_awarded_date=$_POST["ma_awarded_date"];

 		$date=date("d-m-y");

 		
	 $role=$_POST['role'];
	 $username =$_POST['studentName'];  
	 $password=rand(10000,10000000);

		
// *****************************************Images upload code starts here********************************************************** 
 		$profile_image = $_FILES['profile_image']['name'];$tmp_name=$_FILES['profile_image']['tmp_name'];$path = "images/".$profile_image;move_uploaded_file($tmp_name, $path);

		$matric_certificate = $_FILES['matric_certificate']['name'];$tmp_name=$_FILES['matric_certificate']['tmp_name'];$path = "images/".$matric_certificate;move_uploaded_file($tmp_name, $path);

		$fa_certificate = $_FILES['fa_certificate']['name'];$tmp_name=$_FILES['fa_certificate']['tmp_name'];$path = "images/".$fa_certificate;move_uploaded_file($tmp_name, $path);

		$ba_certificate = $_FILES['ba_certificate']['name'];$tmp_name=$_FILES['ba_certificate']['tmp_name'];$path = "images/".$ba_certificate;move_uploaded_file($tmp_name, $path);

		$ma_certificate = $_FILES['ma_certificate']['name'];$tmp_name=$_FILES['ma_certificate']['tmp_name'];$path = "images/".$ma_certificate;move_uploaded_file($tmp_name, $path);

// *****************************************Images upload code end here********************************************************** 


 		$query="Insert into teacher_info(first_name,middle_name,last_name,email,phone_no,profile_image,teacher_status,application_status,cnic,dob,other_phone,gender,permanent_address,current_address,place_of_birth,matric_complition_date,matric_awarded_date,matric_certificate,fa_complition_date,fa_awarded_date,fa_certificate,ba_complition_date,ba_awarded_date,ba_certificate,ma_complition_date,ma_awarded_date,ma_certificate,hire_date,Username,password)
		values('$first_name','$middle_name','$last_name','$email','$phone_no','$profile_image','$teacher_status','$application_status','$cnic','$dob','$other_phone','$gender','$permanent_address','$current_address','$place_of_birth','$matric_complition_date','$matric_awarded_date','$matric_certificate','$fa_complition_date','$fa_awarded_date','$fa_certificate','$ba_complition_date','$ba_awarded_date','$ba_certificate','$ma_complition_date','$ma_awarded_date','$ma_certificate','$date','$username','$password')";
 		$run=mysqli_query($conn, $query);
 		if ($run) {
 			echo "Your Data has been submitted";
 		}
 		else {
 			echo "Your Data has not been submitted";
 		}
 		$query2="insert into login(user_id,Password,Role)values('$email','$password','$role')";
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

		$teacher_id=$_POST['teacher_id'];

		$subject_code=$_POST['subject_code'];

		$total_classes=$_POST['total_classes'];

		$date=date("d-m-y");

		$query3="insert into teacher_courses(course_code,semester,teacher_id,subject_code,assign_date,total_classes)values('$course_code','$semester','$teacher_id','$subject_code','$date','$total_classes')";
		$run3=mysqli_query($conn,$query3);
		if ($run3) {
 			echo "Your Data has been submitted";
 		}
 		else {
 			echo "Your Data has not been submitted";
 		}


	}
?>
<!--*********************** PHP code end from here for data insertion into database ******************************* -->



<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
    <div class="sub-main">
        <div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
            <div class="d-flex">
                <h4 class="mr-5">ادارة الدكاتره</h4>
                <button type="button" class="btn btn-primary ml-5" data-toggle="modal"
                    data-target=".bd-example-modal-lg">اضافة دكتور</button>
            </div>
        </div>
        <div class="row w-100">
            <div class=" col-lg-6 col-md-6 col-sm-12 mt-1 ">
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-info text-white">
                                <h4 class="modal-title text-center">اضافة دكتور</h4>
                            </div>
                            <div class="modal-body">
                                <form action="teacher.php" method="post" enctype="multipart/form-data">
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">الاسم الاول: </label>
                                                <input type="text" name="first_name" class="form-control" required=""
                                                    placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">اسم العائلة : </label>
                                                <input type="text" name="middle_name" class="form-control" required=""
                                                    placeholder="Middle Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">الفب: </label>
                                                <input type="text" name="last_name" class="form-control" required=""
                                                    placeholder="Last Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="formp">
                                                <label for="exampleInputPassword1">البريد الالكتروني:</label>
                                                <input type="text" name="email" class="form-control" required=""
                                                    placeholder="Enter Email">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="formp">
                                                <label for="exampleInputPassword1">رقم الهاتف</label>
                                                <input type="number" name="phone_no" class="form-control"
                                                    placeholder="Enter Mobile Number">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="formp">
                                                <label for="exampleInputPassword1">اضافة الصورة الشخصية</label>
                                                <input type="file" name="profile_image" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">حالة الدكتورs: </label>
                                                <select class="browser-default custom-select" name="teacher_status">
                                                    <option selected>اختار الحاله</option>
                                                    <option value="Permanent">دائم</option>
                                                    <option value="Contract">عقد</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="formp">
                                                <label for="exampleInputPassword1">حالة التطبيق:</label>
                                                <select class="browser-default custom-select" name="application_status">
                                                    <option>اختار الحاله</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="formp">
                                                <label for="exampleInputPassword1">CNIC No:</label>
                                                <input type="text" name="cnic" class="form-control"
                                                    placeholder="Cnic No">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">تاريخ الميلاد: </label>
                                                <input type="date" name="dob" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="formp">
                                                <label for="exampleInputPassword1">رقم هاتف اخر:</label>
                                                <input type="number" name="other_phone" class="form-control"
                                                    placeholder="Other Phone No">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="formp">
                                                <label for="exampleInputPassword1">الجنس:</label>
                                                <select class="browser-default custom-select" name="gender">
                                                    <option selected>اختار الجنس</option>
                                                    <option value="Male">ذكر</option>
                                                    <option value="Female">انثئ</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">العنوان الدائم: </label>
                                                <input type="text" name="permanent_address" class="form-control"
                                                    placeholder="Enter Permanent Address">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="formp">
                                                <label for="exampleInputPassword1">العنوان الحالي:</label>
                                                <input type="text" name="current_address" class="form-control"
                                                    placeholder="Enter Current Address">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="formp">
                                                <label for="exampleInputPassword1">مكان الميلاد:</label>
                                                <input type="text" name="place_of_birth" class="form-control"
                                                    placeholder="Enter Place of Birth">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">تاريخ اكمال دراستك: </label>
                                                <input type="date" name="matric_complition_date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="formp">
                                                <label for="exampleInputPassword1">تاريخ منحك الشهادة:</label>
                                                <input type="date" name="matric_awarded_date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="formp">
                                                <label for="exampleInputPassword1">تحميل صورة الشهادة:</label>
                                                <input type="file" name="matric_certificate" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">تاريخ الامتثال على المستوى: </label>
                                                <input type="date" name="fa_complition_date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="formp">
                                                <label for="exampleInputPassword1">تاريخ الامتثال للشهادة:</label>
                                                <input type="date" name="fa_awarded_date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="formp">
                                                <label for="exampleInputPassword1">Upload FA/ALevel Certificate:</label>
                                                <input type="file" name="fa_certificate" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">BA Complition Date: </label>
                                                <input type="date" name="ba_complition_date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="formp">
                                                <label for="exampleInputPassword1">BA Awarded Date:</label>
                                                <input type="date" name="ba_awarded_date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="formp">
                                                <label for="exampleInputPassword1">Upload BA Certificate:</label>
                                                <input type="file" name="ba_certificate" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">MA Complition Date: </label>
                                                <input type="date" name="ma_complition_date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="formp">
                                                <label for="exampleInputPassword1">MA Awarded Date:</label>
                                                <input type="date" name="ma_awarded_date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="formp">
                                                <label for="exampleInputPassword1">Upload MA Certificate:</label>
                                                <input type="file" name="ma_certificate" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <h3>بيانات تسجيل دخول الدكتور</h3>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="exampleInputName1">اسم المستخدم</label>
                                            <input type="text" name="Username" class="form-conntrol">
                                        </div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <label for="exampleInputName1">كلمة السر</label>
                                            <input id="stuPassword" type="password" class="form-conntrol"
                                                name="password">
                                        </div>
                                    </div>
                                    <!-- _________________________________________________________________________________
																				Hidden Values are here
											_________________________________________________________________________________ -->
                                    <div>
                                        <!-- <input type="hidden" name="password" value="teacher123*"> -->
                                        <input type="hidden" name="role" value="Teacher">
                                    </div>
                                    <!-- _________________________________________________________________________________
																				Hidden Values are end here
											_________________________________________________________________________________ -->
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-primary" name="btn_save" value="حفظ">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">اغلاق</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row w-100">
            <div class="col-md-12 ml-2">
                <section class="mt-3">
                    <div class="row">
                        <div class="col-md-3 offset-9 pt-5 mb-2">
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target=".bd-example-modal-lg1">تعيين الموضوعات</button>
                            <div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog"
                                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info text-white">
                                            <h4 class="modal-title text-center">تعين المواد والمناهج للدكتور</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="teacher.php" method="POST" enctype="multipart/form-data">
                                                <div class="row mt-3">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">اختار المنهج:*</label>
                                                            <select class="browser-default custom-select"
                                                                name="namecourse" required="">
                                                                <option>اختار منهج</option>
                                                                <?php
																			$query="select distinct(namecourse) from course";
																			$run=mysqli_query($conn,$query);
																			while($row=mysqli_fetch_array($run)) {
																			echo	"<option value=".$row['namecourse'].">".$row['namecourse']."</option>";
																			}
																		?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1" required>اختار
                                                                السنه:*</label>
                                                            <input type="text" name="semester" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">اختار معرف
                                                                الدكتور:*</label>
                                                            <input type="text" name="teacher_id" class="form-control"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">اختار الموضوع:*</label>
                                                            <select class="browser-default custom-select"
                                                                name="subject_code" required="">
                                                                <option>اختار الموضوع</option>
                                                                <?php
																			$query="select subject_code from time_table";
																			$run=mysqli_query($conn,$query);
																			while($row=mysqli_fetch_array($run)) {
																			echo	"<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
																			}
																		?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">اختار مجموع
                                                                الفئات:*</label>
                                                            <input type="text" name="total_classes" class="form-control"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-primary" name="btn_save2">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">اغلاق</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="w-100 table-elements mb-5 table-three-tr" cellpadding="10">
                        <tr class="table-tr-head table-three ">
                            <th>معرف الدكتور</th>
                            <th>اسم الدكتور</th>
                            <th>العنوان الحالي</th>
                            <th>تاريخ التوظيف</th>
                            <th>البريد</th>
                            <th>العمليات</th>
                        </tr>
                        <?php 
								$query="select teacher_id,first_name,middle_name,last_name,current_address,ma_certificate,hire_date,email from teacher_info";
								$run=mysqli_query($conn,$query);
								while($row=mysqli_fetch_array($run)) {
									echo "<tr>";
									echo "<td>".$row["teacher_id"]."</td>";
									echo "<td>".$row["first_name"]." ".$row["middle_name"]." ".$row["last_name"]."</td>";
									echo "<td>".$row["current_address"]."</td>";
									echo "<td>".$row["hire_date"]."</td>";
									echo "<td>".$row["email"]."</td>";
									echo	"<td width='170'><a class='btn btn-primary' href=display-teacher.php?teacher_id=".$row['teacher_id'].">الملف الشخصي</a> 
									
									<a class='btn btn-danger' href=delete-function.php?teacher_id=".$row['teacher_id'].">حذف</a></td>";
									echo "</tr>";
								}
								?>
                    </table>
                </section>
            </div>
        </div>
    </div>
</main>
<?php require "footer.php"; ?>