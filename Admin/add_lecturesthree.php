<?php require "inc/security.php"; ?>
<?php require "nav.php"; ?>
<?php require "sidemenu.php"; ?>

<?php  
  if (isset($_POST['submit'])) {
    $room_number = mysqli_escape_string($conn, $_POST['room_number']);
    $room_name = mysqli_escape_string($conn, $_POST['room_name']);
    $teacher_name = mysqli_escape_string($conn, $_POST['teacher_name']);
    $levelid = mysqli_escape_string($conn, $_POST['levelid']);
    $building = mysqli_escape_string($conn, $_POST['building']);
    $course_id = mysqli_escape_string($conn, $_POST['course_id']);
    $day_id = mysqli_escape_string($conn, $_POST['day_id']);
    $lecture_date = mysqli_escape_string($conn, $_POST['lecture_date']);
    $lecture_time = mysqli_escape_string($conn, $_POST['lecture_time']);

    $sql = mysqli_query($conn, "INSERT INTO lecturesthree (room_number, room_name, teacher_name,levelid,building,course_id,day_id, lecture_date, lecture_time)
    VALUES ('$room_number', '$room_name', '$teacher_name','$levelid','$building','$course_id','$day_id', '$lecture_date', '$lecture_time')");


    if ($sql) {
      echo "<script> alert('تم الاضافة...!!!') </script>";
      echo "<script> location = 'index_lecturesthree.php' </script>";
    }
 }
?>


<div class="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="card-body">
                        <h4 class="card-room_number"> رقم القاعه </h4>

                        <div class="form-group row">
                            <label for="room_number" class="col-sm-3 text-right control-label col-form-label"> رقم
                                القاعه
                            </label>
                            <div class="col-sm-9">
                                <input name="room_number" type="text" class="form-control" id="room_number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="room_name" class="col-sm-3 text-right control-label col-form-label"> اسم القاعه
                            </label>
                            <div class="col-sm-9">
                                <input name="room_name" type="text" class="form-control" id="room_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="teacher_name" class="col-sm-3 text-right control-label col-form-label">
                                اسم الدكتور
                            </label>
                            <div class="col-sm-9">
                                <input name="teacher_name" type="text" class="form-control" id="teacher_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="levelid" class="col-sm-3 text-right control-label col-form-label">
                                المستوى
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
                        <div class="form-group row">
                            <label for="building" class="col-sm-3 text-right control-label col-form-label">
                                المبنى
                            </label>
                            <div class="col-sm-9">
                                <input name="building" type="text" class="form-control" id="building">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="day_id" class="col-sm-3 text-right control-label col-form-label">
                                اليوم
                            </label>
                            <div class="col-sm-9">
                                <select name="day_id" class="form-control">
                                    <?php
                                $result = $conn->query("SELECT * FROM weekdays");
                                while ($weekdays = $result->fetch_assoc()) {
                                    echo "<option value='" . $weekdays['id'] . "'>" . $weekdays['day_name'] . "</option>";
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="course_id" class="col-sm-3 text-right control-label col-form-label">
                                المادة
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
                            <label for="lecture_date" class="col-sm-3 text-right control-label col-form-label">
                                تاريخ المحاضره
                            </label>
                            <div class="col-sm-9">
                                <input name="lecture_date" type="date" class="form-control" id="lecture_date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fecboock" class="col-sm-3 text-right control-label col-form-label">
                                وقت المحاضرة
                            </label>
                            <div class="col-sm-9">
                                <input name="lecture_time" type="text" class="form-control" id="lecture_time">
                            </div>
                        </div>





                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button name="submit" type="submit" class="btn btn-warning">اضافة</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php require "footer.php" ; ?>