<?php require "inc/security.php"; ?>
<?php require "nav.php"; ?>
<?php require "sidemenu.php"; ?>

<div class="page-wrapper">
    <div class="card">
        <div class="border-top">
            <div class="card-body">
                <a href="add_lectures.php" type="submit" class="btn btn-warning">اضافة محاضرة</a>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title"> عرض جدول محاضرات المستوى الاول</h5>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>

                            <th> رقم القاعة </th>
                            <th> اسم القاعه</th>
                            <th> اسم الدكتور</th>
                            <th> المستوى</th>
                            <th> المبنى </th>
                            <th> المادة</th>
                            <th> اليوم</th>
                            <th> تاريخ المحاضرة</th>
                            <th> وقت المحاضرة</th>
                            <th>الاجراءات</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                         
                                                $sql = "SELECT  course.id, course.namecourse, lectures.room_number,lectures.id, lectures.room_name,  lectures.teacher_name,lectures.building,lectures.lecture_date,lectures.lecture_time,  lectures.course_id, 
                                               weekdays.id,weekdays.day_name, level.id, level.levelname, level.section
                                                FROM lectures
                                                INNER JOIN course ON course.id = lectures.course_id
                                                 INNER JOIN weekdays ON weekdays.id = lectures.day_id 
                                                INNER JOIN level ON level.id = lectures.levelid 
                                                ORDER BY course.namecourse,level.levelname,lectures.id ";
                                               
                                         $result = $conn->query($sql);
                                         $sn=0;
                                         if ($result->num_rows > 0) {           
                                        while($row = $result->fetch_assoc()) {
                                                        $sn = $sn + 1;  
                                              ?>
                        <tr>

                            <td><?=$row['room_number'] ;?></td>
                            <td><?=$row['room_name'] ;?></td>
                            <td><?=$row['teacher_name'] ;?></td>
                            <td><?=$row['namecourse'] ;?></td>
                            <td> <?= $row['levelname'] . "-". $row["section"] ;?></td>
                            <td><?=$row['building'];?></td>
                            <td><?=$row['day_name'];?></td>
                            <td><?=$row['lecture_date'] ;?></td>
                            <td><?=$row['lecture_time'];?></td>
                            <?php  
                                                  $prosql = mysqli_query($conn, "SELECT * FROM lectures");
                                              
                                                  $prorow = mysqli_fetch_assoc($prosql)
                                                  ?>

                            <td width="170">
                                <a href="edit_lectures.php?id=<?= $prorow['id'] ?>" class="btn btn-success"><span><i
                                            class="fa fa-edit"></i></span>
                                </a>
                                <a href="delete_lectures.php?id=<?= $prorow['id'] ?>" class="btn btn-danger">
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

                </table>
            </div>
        </div>
    </div>
</div>

<?php require "footer.php" ; ?>