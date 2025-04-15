<?php  
	session_start();
	if (!$_SESSION["LoginTeacher"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	

        $_SESSION["LoginAdmin"]="";
        $teacher_email=$_SESSION['LoginTeacher'];
        $query1="select * from teacher_info where email='$teacher_email'";
        $run1=$run=mysqli_query($conn,$query1);
        while($row=mysqli_fetch_array($run1)) {
            $teacher_id=$row["teacher_id"];
        }
        $_SESSION['teacher_id']=$teacher_id;
         $roll_no=$_SESSION['LoginTeacher'];
        $query="select * from teacher_info where email='$teacher_email'";
        $run=mysqli_query($conn,$query);
       
$rs = $conn->query($query);
$row = $rs->fetch_assoc();
?>
<!doctype html>
<html lang="en">

<head>
    <title>الدكتور </title>
</head>

<body>
    <?php include('../common/common-header.php') ?>
    <?php include('../common/teacher-sidebar.php') ?>

    <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100 page-content-index">
        <div class="flex-wrap flex-md-no-wrap pt-3 pb-2 mb-3 admin-dashboard   pl-3">


            <h4 style="color: #fff;">لوحة التحكم </h4>

        </div>
        <?php 
            // $teacher_id=$_SESSION['LoginTeacher'];
					// $query="select * from teacher_info where teacher_id='$teacher_id'";
					// $run=mysqli_query($conn,$query);
					// while ($row=mysqli_fetch_array($run)) {echo $row['studentName'];}
                   $row=mysqli_fetch_array($run)
					?>

        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper">
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="page-header">
                            <h2 class="page-title"> ادارة الملف الشخصي للدكتور </h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">الرئيسية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> الملف الشخصي للدكتور </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title" style="text-align: center;">الملف الشخصي للدكتور</h4>


                                        <div class="form-group  row mb-3">
                                            <label for="default">الصورة</label>
                                            <?php  $profile_image= $row["profile_image"] ?>
                                            <img class="ml-5 mb-5" height='150px' width='150px'
                                                src=<?php echo "../Admin/images/$profile_image"  ?>>

                                        </div>
                                        <div class="form-group  row mb-3">
                                            <label for="default" class="col-sm-2 control-label"> اسم الدكتور </label>
                                            <div class="col-sm-9">
                                                <?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?>
                                            </div>

                                        </div>
                                        <div class="form-group  row mb-3">
                                            <label for="default" class="col-sm-2 control-label">النوع</label>
                                            <div class="col-sm-9">
                                                <input name="gender" type="text" class="form-control" id="gender"
                                                    value="<?= $row['gender'] ;?>">
                                            </div>
                                        </div>
                                        <div class="form-group  row mb-3">
                                            <label for="default" class="col-sm-2 control-label"> العنوان </label>
                                            <div class="col-sm-9">
                                                <input name="current_address" type="text" class="form-control"
                                                    id="current_address" value="<?= $row['current_address'] ;?>">
                                            </div>
                                        </div>
                                        <div class="form-group  row mb-3">
                                            <label for="default" class="col-sm-2 control-label"> رقم الهاتف </label>
                                            <div class="col-sm-9">
                                                <input name="phone_no" type="number" class="form-control" id="phone_no"
                                                    value="<?= $row['phone_no'] ;?>">
                                            </div>
                                        </div>
                                        <!-- <div class="form-group  row mb-3">
                                            <label for="default" class="col-sm-2 control-label">المستوى</label>
                                            <div class="col-sm-9">
                                                <?php  $prosql = mysqli_query($conn, "SELECT * FROM level");
                                                                             $roww = mysqli_fetch_assoc($prosql)?>
                                                <input name="levelname" type="text" class="form-control" id="levelname"
                                                    value="<?= $roww['levelname'].'  '.'-'.'  '.$roww['section'];?>">
                                            </div>
                                        </div> -->
                                        <div class="form-group  row mb-3">
                                            <label for="default" class="col-sm-2 control-label">تاريخ التسجيل </label>
                                            <div class="col-sm-9">
                                                <input name="hire_date" type="text" class="form-control" id="hire_date"
                                                    value="<?= $row['hire_date'] ;?>">
                                            </div>

                                        </div>

                                        <div class="form-group  row mb-3">
                                            <label for="default" class="col-sm-2 control-label"> كلمة السر </label>
                                            <div class="col-sm-9">
                                                <input name="password" type="text" class="form-control" id="password"
                                                    value="<?= $row['password'] ;?>">
                                            </div>

                                        </div>
                                        <div class="form-group  row mb-3">
                                            <div class="col-xl-6" class="col-sm-2 control-label">
                                                <label for="exampleInputName1">اسم المستخدم</label>
                                                <input type="text" name="Username"
                                                    value="<?php echo $row['Username']; ?>" class="form-control"
                                                    required='true'>
                                            </div>
                                        </div>

                                        <?php  ?>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </main>

    <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>