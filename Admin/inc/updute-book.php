<?php  
    require "db.php";

    if (isset($_POST['submit'])) {
        $levelid = mysqli_escape_string($conn, $_POST['levelid']);
        $type = mysqli_escape_string($conn, $_POST['type']);
        $size = mysqli_escape_string($conn, $_POST['size']);
        $course_id = mysqli_escape_string($conn, $_POST['course_id']);
        // تحميل الصورة فقط إذا تم تحديد ملف صورة جديد
        if ($_FILES['filename']['name']) {
            $target = '../filelevel/' . basename($_FILES['filename']['name']);
            $filename = $_FILES['filename']['name'];
            move_uploaded_file($_FILES['filename']['tmp_name'], $target);
            $sql = "UPDATE files SET type = '$type',size = '$size', levelid='$levelid',course_id='$course_id', filename = '$filename'";
        } else {
            // استخدم استعلام SQL بدون تحديث الصورة
            $sql = "UPDATE files SET   type = '$type', size = '$size',levelid='$levelid', course_id='$course_id',";
        }

        $run_sql = mysqli_query($conn, $sql);

        if ($run_sql) {
            echo "<script> alert('تم التعديل على صفحة خدمات الشركة.')</script>";
            echo "<script> location='../bookedit.php'</script>";
        } else {
            echo "<script> alert('حدث خطأ أثناء التحديث.')</script>";
        }
    }
    ?>