<?php  
    require "db.php";

    if (isset($_POST['submit'])) {
        $name = mysqli_escape_string($conn, $_POST['name']);
        $description = mysqli_escape_string($conn, $_POST['description']);
        $short = mysqli_escape_string($conn, $_POST['short']);
        
        // تحميل الصورة فقط إذا تم تحديد ملف صورة جديد
        if ($_FILES['image']['name']) {
            $target = '../images/banner/' . basename($_FILES['image']['name']);
            $image = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            $sql = "UPDATE bannercolleg SET name = '$name', short = '$short',description='$description', image = '$image'";
        } else {
            // استخدم استعلام SQL بدون تحديث الصورة
            $sql = "UPDATE bannercolleg SET name = '$name',short = '$short', description='$description'";
        }

        $run_sql = mysqli_query($conn, $sql);

        if ($run_sql) {
            echo "<script> alert('تم التعديل على صفحة خدمات الشركة.')</script>";
            echo "<script> location='../edit_banner.php'</script>";
        } else {
            echo "<script> alert('حدث خطأ أثناء التحديث.')</script>";
        }
    }
    ?>