<?php  
    require "db.php";

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
       
            // استخدم استعلام SQL بدون تحديث الصورة
            $sql = "UPDATE lectures SET room_number = '$room_number',room_name = '$room_name',teacher_name = '$teacher_name',levelid = '$levelid',building = '$building',course_id = '$course_id',day_id = '$day_id',lecture_date = '$lecture_date',lecture_time = '$lecture_time',";
     

        $run_sql = mysqli_query($conn, $sql);

        if ($run_sql) {
            echo "<script> alert('تم التعديل على صفحة  المحاضرات.')</script>";
            echo "<script> location='./edit_lectures.php'</script>";
        } else {
            echo "<script> alert('حدث خطأ أثناء التحديث.')</script>";
        }
    }
    ?>