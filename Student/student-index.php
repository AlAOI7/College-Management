<?php  
session_start();
//Check if the current user is a student
if (!isset($_SESSION["LoginStudent"])) {
  header('location:../login/login.php');
  exit;
}

//Check if the current user is not the system administrator
if (isset($_SESSION['LoginAdmin']) && $_SESSION['LoginAdmin'] != "") {
  header('location:../login/login.php');
  exit;
}

require_once "../connection/connection.php";
?>
<?php
	$_SESSION["LoginAdmin"]="";
	$studentName=$_SESSION['LoginStudent'];
	$query1="select * from students where studentName='$studentName'";
	$run1=$run=mysqli_query($conn,$query1);
	while($row=mysqli_fetch_array($run1)) {
		$roll_no=$row["roll_no"];
	}
	$_SESSION['roll_no']=$roll_no;
?>

<!---------------- Session Ends form here ------------------------>


<!doctype html>
<html lang="en">

<head>
    <title>لوحة تحكم الطالب</title>
</head>

<body>
    <?php include('../common/common-header.php') ?>
    <?php include('../common/student-sidebar.php') ?>
    <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
        <div class="sub-main">
            <div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3  admin-dashboard pl-3">
                <h4 style="color:aliceblue;">مرحباً
                    <?php $roll_no=$_SESSION['LoginStudent'];
					$query="select * from students where studentName ='$studentName'";
					$run=mysqli_query($conn,$query);
					while ($row=mysqli_fetch_array($run))
                     {
                        echo $row['studentName'];
                    }
					?> </h4>

                </h4>
            </div>


            <div class=" row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="login-nd">
                        <div class=" mt-3 rounded">
                            <div class=" text-center">


                                <img src="../images/co1.jpg" alt="Molla Logo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div>
                        <section class="mt-4">
                            <div class="btn btn-block table-five text-light d-flex" style=" text-align:center;">
                                <span class="font-weight-bold">
                                    <i class=" fa fa-info-circle mr-3" aria-hidden="true"></i> جدول
                                    المحاضرات</span>
                                <a href="" class="ml-auto" data-toggle="collapse" data-target="#collapsethree">
                                    <i class="fa fa-plus text-light" aria-hidden="true"></i></a>
                            </div>
                            <div class="collapse show mt-2" id="collapsethree">
                                <table class="w-100 table-elements table-five-tr" cellpadding="2">
                                    <tr class="pt-5 table-five " style="height: 32px; text-align:center;">

                                        <th> رقم القاعة </th>
                                        <th> اسم القاعه</th>
                                        <th> اسم الدكتور</th>
                                        <th> المستوى</th>
                                        <th> المبنى </th>
                                        <th> المادة</th>
                                        <th> اليوم</th>
                                        <th> تاريخ المحاضرة</th>
                                        <th> وقت المحاضرة</th>
                                    </tr>
                                    </thead>
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

                                        <td> <?= $row['levelname'] . "-". $row["section"] ;?></td>
                                        <td><?=$row['building'];?></td>
                                        <td><?=$row['namecourse'] ;?></td>
                                        <td><?=$row['day_name'];?></td>
                                        <td><?=$row['lecture_date'] ;?></td>
                                        <td><?=$row['lecture_time'];?></td>
                                        <?php  
  $prosql = mysqli_query($conn, "SELECT * FROM lectures");

  $prorow = mysqli_fetch_assoc($prosql)
  ?>


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
                        </section>
                    </div>
                </div>

            </div>
        </div>
    </main>
    <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>