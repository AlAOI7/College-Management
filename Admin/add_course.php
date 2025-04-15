<?php require "inc/security.php"; ?>
<?php require "nav.php"; ?>
<?php require "sidemenu.php"; ?>
<link rel="stylesheet" href="css/stylestyle.css" />

<?php  
  if (isset($_POST['save'])) {
    $namecourse = mysqli_escape_string($conn, $_POST['namecourse']);
    $codecours = mysqli_escape_string($conn, $_POST['codecours']);
    $doctorcours = mysqli_escape_string($conn, $_POST['doctorcours']);
    $course_credits = mysqli_escape_string($conn, $_POST['course_credits']);
    $date = mysqli_escape_string($conn, $_POST['date']);
    $sql = mysqli_query($conn, "INSERT INTO course (namecourse, codecours, doctorcours,course_credits,date)VALUES ('$namecourse', '$codecours', '$doctorcours','$course_credits', '$date')");
    if ($sql) {
        $statusMsg = "<div class='alert alert-success'  style='margin-right:700px;'>تم الاضافة بنجاح</div>";
         echo "<script> location = 'index_course.php' </script>";
      }
    else
    { $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>لم تتم الاضافة هناك خطاء!</div>"; }
  }
?>
<div class="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="page-header">
                            <h3 class="page-title"> اضافة مادة </h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">الرئيسية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> اضافة مادة </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title" style="text-align: center;"> اضافة مادة </h4>
                                        <!-- <?php echo $statusMsg; ?> -->
                                        <form class="forms-sample" action="" enctype="multipart/form-data"
                                            method="POST">

                                            <div class="form-group  row">
                                                <div class="col-md-4">
                                                    <label for="exampleInputName1"> اسم المادة</label>
                                                    <input id="stuName" type="text" class="form-control"
                                                        name="namecourse">
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="exampleInputcodecours"> رمز المادة</label>
                                                    <input id="codecours" type="text" class="form-control"
                                                        name="codecours">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="exampleInputcourse_credits"> عدد الساعات
                                                        المعتمدة</label>
                                                    <input id="course_credits" type="number" class="form-control"
                                                        name="course_credits">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="exampleInputdoctorcours"> اسم دكتور الماده</label>
                                                    <input id="doctorcours" type="text" class="form-control"
                                                        name="doctorcours">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="exampleInputdate"> تاريخ اضافة المادة</label>
                                                    <input id="date" type="date" class="form-control" name="date">
                                                </div>

                                            </div>
                                            <div class="form-group  row mb-3">
                                                <?php
                                        if (isset($id))
                                        {
                                        ?>
                                                <button type="submit" name="update"
                                                    class="btn btn-primary mr-2">تعديل</button>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <?php
                                        } else {           
                                        ?>
                                                <button type="submit" name="save"
                                                    class="btn btn-primary mr-2">اضافة</button>
                                                <?php
                                        }         
                                        ?>


                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require "footer.php"; ?>