<?php require "inc/security.php"; ?>
<?php require "nav.php"; ?>
<?php require "sidemenu.php"; ?>

<link rel="stylesheet" href="css/stylestyle.css" />

<?php  

            if (isset($_POST['submit'])) {
                $target = "filelevel/".basename($_FILES['filename']['name']);

                $type = mysqli_escape_string($conn, $_POST['type']);
                $size = mysqli_escape_string($conn, $_POST['size']);
                $course_id = mysqli_escape_string($conn, $_POST['course_id']);
                $levelid = mysqli_escape_string($conn, $_POST['levelid']);
                $filename = $_FILES['filename']['name'];
                $sql = mysqli_query($conn, "INSERT INTO files (type,size,course_id,levelid,filename)VALUES ('$type','$size','$course_id','$levelid','$filename')");
                move_uploaded_file($_FILES['filename']['tmp_name'], $target);

                if ($sql) {
                echo "<script> alert('تم رفع الملف بنجاح....!!!') </script>";
                echo "<script> location = 'booklevelone.php' </script>";
                }
                else {
                    echo "<script> alert(' حدث خطأ أثناء رفع الملف....!!!') </script>";
                                
                                }
            }
?>









<div class="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">



                <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="card-body">
                        <h4 class="card-title">إضافة ملف جديد</h4>


                        <div class="form-group row">
                            <label for="size" class="col-sm-3 text-right control-label col-form-label"> حجم الملف
                            </label>
                            <div class="col-sm-9">
                                <input name="size" type="text" class="form-control" id="name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-sm-3 text-right control-label col-form-label"> نوع
                                الملف</label>
                            <div class="col-sm-9">
                                <input name="type" type="text" class="form-control" id="nametype">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="course_id" class="col-sm-3 text-right control-label col-form-label">
                                اختار المادة</label>
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
                            <label for="filename"
                                class="col-sm-3 text-right control-label col-form-label">الكتاب</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="file" name="filename">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="levelid" class="col-sm-3 text-right control-label col-form-label"> المستوى
                                الاول</label>
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
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button name="submit" type="submit" class="btn btn-primary">اضافة الملف</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">جميع الكتب</h6>

                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>

                                <th class="font-weight-bold">#</th>
                                <th class="font-weight-bold">اسم الكتاب</th>
                                <th class="font-weight-bold">الفصل الدراسي</th>
                                <th class="font-weight-bold"> الحجم </th>
                                <th class="font-weight-bold"> النوع </th>
                                <th class="font-weight-bold"> الاسم </th>
                                <th class="font-weight-bold"> الرابط </th>
                                <th class="font-weight-bold"> الاجراءات </th>


                            </tr>
                        </thead>


                        <tbody>
                            <?php
                                                $sql = "SELECT  course.id, course.namecourse,course.course_credits, files.size,files.id, files.filename,  files.type,  files.course_id, level.id, level.levelname, level.section
                                                FROM files
                                                INNER JOIN course ON course.id = files.course_id
                                                INNER JOIN level ON level.id = files.levelid 
                                                ORDER BY course.namecourse,level.levelname,files.id ";
                                               
                                         $result = $conn->query($sql);
                                         $sn=0;
                                         if ($result->num_rows > 0) {           
                                        while($row = $result->fetch_assoc()) {
                                                        $sn = $sn + 1;  
                                              ?>
                            <tr>
                                <td><?=$sn?></td>
                                <td><?=$row['namecourse'] ;?></td>
                                <td> <?= $row['levelname'] . "-". $row["section"] ;?></td>
                                <td><?=$row['size'];?></td>
                                <td><?=$row['type'] ;?></td>
                                <td><?=$row['filename'];?></td>
                                <td><a href="<?=$row['filename'] ;?>">Download</a></td>
                                <td width="170">
                                    <a href="bookedit.php?id=<?= $row['id'] ?>" class="btn btn-success"><span><i
                                                class="fa fa-edit"></i></span>
                                    </a>
                                    <a href="bookdelete.php?id=<?= $row['id'] ?>" class="btn btn-danger">
                                        <span><i class="fa fa-trash"></i></span>
                                    </a>
                                </td>

                            </tr>
                            <?php
                            }
                            } else {
                            echo "<tr>
                                <td colspan='5'> لايوجد بيانات!.</td>
                            </tr>";
                            }
                            ?>

                        </tbody>
                        <tfoot>
                            <tr>


                                <td colspan="5" align="center"><i class="icon-printer fa fas-print fa-2x"
                                        aria-hidden="true" style="cursor:pointer" OnClick="CallPrint(this.value)"></i>
                                </td>
                            </tr>

                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




<?php require "footer.php"; ?>