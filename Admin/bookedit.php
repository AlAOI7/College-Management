<?php require "inc/security.php"; ?>
<?php require "nav.php"; ?>
<?php require "sidemenu.php"; ?>

<div class="page-wrapper">
    <div class="row1">
        <div class="col-md-12">
            <div class="card">
                <form action="inc/updute-book.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="card-body">
                        <h4 class="card-title"> صفحة الخدمات </h4>

                        <?php
                        if (isset($_POST['submit'])) {
                            $target = 'filelevel/' . basename($_FILES['filename']['name']);
                            $size = mysqli_escape_string($conn, $_POST['size']);
                            $course_id = mysqli_escape_string($conn, $_POST['course_id']);
                            $type = mysqli_escape_string($conn, $_POST['type']);
                            $levelid = mysqli_escape_string($conn, $_POST['levelid']);
                            $filename = $_FILES['filename']['name'];
                            $sql = mysqli_query(   $conn, "INSERT INTO files (size,type,course_id,levelid,filename) VALUES ('$name','$size','$type','$course_id','$levelid','$filename')"  );
                            move_uploaded_file($_FILES['filename']['tmp_name'], $target);
                            if ($sql) {
                                echo "<script> alert('اضافة الى صفحة book...!!!') </script>";
                                echo "<script> location = 'nookedit.php' </script>";
                            }
                        }
                        ?>
                        <?php
                        $sql = mysqli_query($conn, 'SELECT * FROM files');
                        $row = mysqli_fetch_assoc($sql);
                        ?>


                        <div class="form-group ">
                            <label for="type" class="col-sm-3 text-right control-label col-form-label">النوع </label>
                            <div class="col-sm-9">
                                <input name="type" type="text" class="form-control" id="nametype"
                                    value="<?php echo $row['type']; ?>">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="size" class="col-sm-3 text-right control-label col-form-label">حجم الملف
                            </label>
                            <div class="col-sm-9">
                                <input name="size" type="text" class="form-control" id="size"
                                    value="<?php echo $row['size']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="course_id" class="col-sm-3 text-right control-label col-form-label">المادة
                            </label>
                            <div class="col-sm-9">
                                <select name="course_id" class="form-control">
                                    <?php
                                $result = $conn->query("SELECT * FROM course");
                                while ($course = $result->fetch_assoc()) {
                                    echo "<option value='" . $course['id'] . "'>" . $course['namecourse'] . "</option>";
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="levelid" class="col-sm-3 text-right control-label col-form-label">المادة
                            </label>
                            <div class="col-sm-9">
                                <select name="levelid" class="form-control" id="levelid">
                                    <option value="">اختار المستوى</option>

                                    <?php

                                    $qry1= "SELECT * FROM level ORDER BY id ASC";
                                    $result1 = $conn->query($qry1);
                                    $num1 = $result1->num_rows;		
                                    if ($num1 > 0){


                                        while ($rows1 = $result1->fetch_assoc()){?>
                                    <option value="<?php
                                   echo $rows1['id'];?>">
                                        <?php
                                echo $rows1['levelname'].'  '.'-'.'  '.$rows1['section'];?></option>
                                    <?php
                                         }
                                            
                                          }
                                        ?>

                                </select>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="filename" class="col-sm-3 text-right control-label col-form-label">
                                الملف </label>


                            <div class="col-sm-9">
                                <input name="filename" type="file" class="form-control" id="file" />



                            </div>
                        </div>

                    </div>








            </div>
            <div class="border-top">
                <div class="card-body">
                    <button name="submit" type="submit" class="btn btn-primary">تحديث
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>



<?php require 'footer.php'; ?>