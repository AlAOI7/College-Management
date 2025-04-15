<?php require "inc/security.php"; ?>
 <?php require "nav.php"; ?>
<?php require "sidemenu.php"; ?>

<div class="page-wrapper">
    <div class="row1">
        <div class="col-md-12">
            <div class="card">
                <form action="inc/update-course.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="card-body">
                        <h4 class="card-TITLE"> صفحة تعدبل المادة </h4>
                        <?php 

                                if (isset($_POST['update'])) {
                                    $namecourse = mysqli_escape_string($conn, $_POST['namecourse']);
                                    $codecours = mysqli_escape_string($conn, $_POST['codecours']);
                                    $doctorcours = mysqli_escape_string($conn, $_POST['doctorcours']);
                                    $date = mysqli_escape_string($conn, $_POST['date']);
                                    
                                    $sql = mysqli_query($conn, "INSERT INTO course (namecourse, codecours,doctorcours,date)
                                    VALUES ('$namecourse', '$codecours','$doctorcours', '$date')");
                                    if ($sql) {
                                        echo "<script> alert('اضافة الى صفحة المعلومات...!!!') </script>";
                                        echo "<script> location = 'index_course.php' </script>";
                                    }
                                }
                                ?>
                                       <?php  
                                                       if (empty($_GET['id'])) {
                            echo "<script> alert('الرجاء اختار course ...!!!') </script>";
                            echo "<script> location = 'index_course.php' </script>";
                        }else{
                            $id = mysqli_escape_string($conn, $_GET['id']);
                            $prosql = mysqli_query($conn, "SELECT * FROM course WHERE id = '$id' ");
                            $row = mysqli_fetch_assoc($prosql);
                        }


                    ?>
                                    <div class="form-group row">
                                        <label for="namecourse" class="col-sm-3 text-right control-label col-form-label"> اسم الماده  </label>
                                        <div class="col-sm-9">
                                        <input name="namecourse" type="text" class="form-control" id="namecourse" value="<?php echo $row['namecourse']; ?>">

                                        </div>
                                    </div>
                                   
                                    <div class="form-group row">
                                        <label for="codecours" class="col-sm-3 text-right control-label col-form-label">رمز الماده </label>
                                        <div class="col-sm-9">
                                          <input name="codecours" type="text" class="form-control" id="codecours" value="<?php echo $row['codecours']; ?>">
										</div>
                                    </div>
                                   
                                    <div class="form-group row">
                                        <label for="doctorcours" class="col-sm-3 text-right control-label col-form-label">اسم الدكتور </label>
                                        <div class="col-sm-9">
                                          <input name="doctorcours" type="text" class="form-control" id="doctorcours" value="<?php echo $row['doctorcours']; ?>">

										</div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-3 text-right control-label col-form-label"> تاريخ النشر </label>
                                        <div class="col-sm-9">
                                            <input name="date" type="date" class="form-control" id="date" value="<?php echo $row['date']; ?>" >
                                        </div>
                                    </div>
        
                                </div>

            </div>
            <div class="border-top">
                <div class="card-body">
                    <button name="update" type="submit" class="btn btn-primary">اضافة</button>
                    <input type="hidden" name="id" value="<?= $row['id'] ;?>">
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>



<?php require 'footer.php'; ?>
