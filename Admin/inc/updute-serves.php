<?php  
    require "db.php";

    if (isset($_POST['submit'])) {
        $title = mysqli_escape_string($conn, $_POST['title']);
        $phone = mysqli_escape_string($conn, $_POST['phone']);
        $otherphone = mysqli_escape_string($conn, $_POST['otherphone']);
        $email = mysqli_escape_string($conn, $_POST['email']);
        $fecboock = mysqli_escape_string($conn, $_POST['fecboock']);
        // تحميل الصورة فقط إذا تم تحديد ملف صورة جديد
        if ($_FILES['image']['name']) {
            $target = '../images/serves/' . basename($_FILES['image']['name']);
            $image = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            $sql = "UPDATE aerves SET title = '$title',phone = '$phone',otherphone = '$otherphone',email = '$email',fecboock = '$fecboock',image = '$image'";
        } else {
            // استخدم استعلام SQL بدون تحديث الصورة
            $sql = "UPDATE serves SET title = '$title',phone = '$phone',otherphone = '$otherphone',email = '$email',fecboock = '$fecboock',";
        }

        $run_sql = mysqli_query($conn, $sql);

        if ($run_sql) {
            echo "<script> alert('تم التعديل على صفحة خدمات الجامعة.')</script>";
            echo "<script> location='../edit_serves.php'</script>";
        } else {
            echo "<script> alert('حدث خطأ أثناء التحديث.')</script>";
        }
    }
    ?>