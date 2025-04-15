<?php  
    require "db.php";

    if (isset($_POST['submit'])) {
        $namedoctor = mysqli_escape_string($conn, $_POST['namedoctor']);
        $descriptiontitle = mysqli_escape_string($conn, $_POST['descriptiontitle']);
        $description = mysqli_escape_string($conn, $_POST['description']);
        $datebanner = mysqli_escape_string($conn, $_POST['datebanner']);
        // تحميل الصورة فقط إذا تم تحديد ملف صورة جديد
        if ($_FILES['image']['name']) {
            $target = '../images/banner/' . basename($_FILES['image']['name']);
            $image = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            $sql = "UPDATE bannerdepart SET namedoctor = '$namedoctor',descriptiontitle='$descriptiontitle', description='$description',datebanner='$datebanner', image = '$image'";
        } else {
            // استخدم استعلام SQL بدون تحديث الصورة
            $sql = "UPDATE bannerdepart SET namedoctor = '$namedoctor',descriptiontitle='$descriptiontitle', description='$description',datebanner='$datebanner',";
        }

        $run_sql = mysqli_query($conn, $sql);

        if ($run_sql) {
            echo "<script> alert('تم التعديل على صفحة  خبر الدكاتره.')</script>";
            echo "<script> location='../edit_newdoctor.php'</script>";
        } else {
            echo "<script> alert('حدث خطأ أثناء التحديث.')</script>";
        }
    }
    ?>