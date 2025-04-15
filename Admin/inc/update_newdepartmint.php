<?php  
    require "db.php";

    if (isset($_POST['submit'])) {
        $title = mysqli_escape_string($conn, $_POST['title']);
        $date = mysqli_escape_string($conn, $_POST['date']);
        $description = mysqli_escape_string($conn, $_POST['description']);
        $title1 = mysqli_escape_string($conn, $_POST['title1']);
        // تحميل الصورة فقط إذا تم تحديد ملف صورة جديد
        if ($_FILES['image']['name']) {
            $target = '../images/dep/' . basename($_FILES['image']['name']);
            $image = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            $sql = "UPDATE newdept SET title = '$title',date='$date', description='$description',title1='$title1', image = '$image'";
        } else {
            // استخدم استعلام SQL بدون تحديث الصورة
            $sql = "UPDATE newdept SET title = '$title',date='$date', description='$description',title1='$title1',";
        }

        $run_sql = mysqli_query($conn, $sql);

        if ($run_sql) {
            echo "<script> alert('تم التعديل.')</script>";
            echo "<script> location='../index_newdepartmint.php'</script>";
        } else {
            echo "<script> alert('حدث خطأ أثناء التحديث.')</script>";
        }
    }
    ?>