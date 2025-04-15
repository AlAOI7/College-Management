<?php
session_start();

// Check if the current user is a student
if (!isset($_SESSION["LoginStudent"])) {
    header('location:../login/login.php');
    exit;
}

// Check if the current user is not the system administrator
if (isset($_SESSION['LoginAdmin']) && $_SESSION['LoginAdmin'] != "") {
    header('location:../login/login.php');
    exit;
}

require_once "../connection/connection.php";

$studentId = $_SESSION['LoginStudent'];

// Fetch the student's level
$query = mysqli_query($conn, "SELECT students.levelid 
                             FROM students 
                             WHERE students.id = '$studentId'");
$result = mysqli_fetch_assoc($query);
$studentLevel = $result['levelid'];

// Fetch the courses for the student's level
$query1 = "SELECT levelcourse.id, level.id, level.levelname, level.section, course.id, course.namecourse, course.id as id, levelcourse.id
           FROM levelcourse
           INNER JOIN level ON level.id = levelcourse.levelid
           INNER JOIN course ON course.id = levelcourse.coursid
           WHERE levelcourse.levelid = '$studentLevel'";
$rs1 = $conn->query($query1);
$num1 = $rs1->num_rows;
$sn = 0;
?>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Courses</h6>
                        </div>
                        <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="font-weight-bold">#</th>
                                        <th class="font-weight-bold">Course</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($num1 > 0) {
                                        while ($rows1 = $rs1->fetch_assoc()) {
                                            $sn = $sn + 1;
                                            echo "<tr>
                                                  <td>" . $sn . "</td>
                                                  <td>" . $rows1['namecourse'] . "</td>
                                                </tr>";
                                        }
                                    } else {
                                        echo "<div class='alert alert-danger' role='alert'>
                                              No data available
                                            </div>";
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2" align="center">
                                            <i class="icon-printer fa fas-print fa-2x" aria-hidden="true" style="cursor:pointer" OnClick="CallPrint(this.value)"></i>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




























--
---------------------------------------------------------------------------------------------
<?php
session_start();

// تحقق من إذا كان المستخدم الحالي هو طالب
if (!isset($_SESSION["LoginStudent"])) {
    header('location:../login/login.php');
    exit;
}

// تحقق من إذا كان المستخدم الحالي ليس مدير النظام
if (isset($_SESSION['LoginAdmin']) && $_SESSION['LoginAdmin'] != "") {
    header('location:../login/login.php');
    exit;
}

require_once "../connection/connection.php";
?>

<!doctype html>
<html lang="en">
<head>
    <title>Student - Dashboard</title>
</head>
<body>
    <?php include('../common/common-header.php') ?>
    <?php include('../common/student-sidebar.php') ?>

    <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">عرض المواد الدراسية</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">الرئيسية</a></li>
                                <li class="breadcrumb-item active" aria-current="page">عرض المواد الدراسية</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <?php
                                $aid = $_SESSION['LoginStudent'];
                                $query = mysqli_query($conn, "SELECT students.id,level.levelname,level.section AS id,students.id,students.studentName,students.levelid,
                                students.gender,students.admission_date,students.current_address
                                FROM students
                                INNER JOIN level ON level.id = students.levelid
                                where students.id='$aid'");
                                $ret = mysqli_fetch_array($query);

                                if ($ret > 0) {
                                    $classe = $ret['levelid'];
                                }
                                ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card mb-4">
                                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text-primary">المواد الدراسية</h6>
                                            </div>
                                            <div class="table-responsive p-3">
                                                <table class="table align-items-center table-flush table-hover">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th class="font-weight-bold">#</th>
                                                            <th class="font-weight-bold">المادة</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $query1 = "SELECT levelcourse.id,level.id,level.levelname,level.section,course.id,course.namecourse,course.id  as id,levelcourse.id
                                                        FROM levelcourse
                                                        INNER JOIN level ON level.id = levelcourse.levelid
                                                        INNER JOIN course ON course.id = levelcourse.coursid
                                                        where levelcourse.levelid='$classe'";
                                                        $rs1 = $conn->query($query1);
                                                        $num1 = $rs1->num_rows;
                                                        $sn = 0;
                                                        if ($num1 > 0) {
                                                            while ($rows1 = $rs1->fetch_assoc()) {
                                                                $sn = $sn + 1;
                                                                echo "<tr>
                                                                <td>" . $sn . "</td>
                                                                <td>" . $rows1['namecourse'] . "</td>
                                                                </tr>";
                                                            }
                                                        } else {
                                                            echo "<div class='alert alert-danger' role='alert'>
                                                            ! لايوجد بيانات
                                                            </div>";
                                                        }
                                                        ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="2" align="center"><i class="icon-printer fa fas-print fa-2x" aria-hidden="true" style="cursor:pointer" OnClick="CallPrint(this.value)"></i></td>
                                                        </tr>
                                                    </tfootعرض المواد الدراسية في PHP يتطلب بعض الخطوات والتعليمات. هنا هو الكود الذي يقوم بعرض المواد الدراسية:

```php
<?php
session_start();

// تحقق من إذا كان المستخدم الحالي هو طالب
if (!isset($_SESSION["LoginStudent"])) {
    header('location:../login/login.php');
    exit;
}

// تحقق من إذا كان المستخدم الحالي ليس مدير النظام
if (isset($_SESSION['LoginAdmin']) && $_SESSION['LoginAdmin'] != "") {
    header('location:../login/login.php');
    exit;
}

require_once "../connection/connection.php";
?>

<!doctype html>
<html lang="en">
<head>
    <title>Student - Dashboard</title>
</head>
<body>
    <?php include('../common/common-header.php') ?>
    <?php include('../common/student-sidebar.php') ?>

    <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">عرض المواد الدراسية</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">الرئيسية</a></li>
                                <li class="breadcrumb-item active" aria-current="page">عرض المواد الدراسية</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <?php
                                $aid = $_SESSION['LoginStudent'];
                                $query = mysqli_query($conn, "SELECT students.id,level.levelname,level.section AS id,students.id,students.studentName,students.levelid,
                                students.gender,students.admission_date,students.current_address
                                FROM students
                                INNER JOIN level ON level.id = students.levelid
                                where students.id='$aid'");
                                $ret = mysqli_fetch_array($query);

                                if ($ret > 0) {
                                    $classe = $ret['levelid'];
                                }
                                ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card mb-4">
                                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text-primary">المواد الدراسية</h6>
                                            </div>
                                            <div class="table-responsive p-3">
                                                <table class="table align-items-center table-flush table-hover">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th class="font-weight-bold">#</th>
                                                            <th class="font-weight-bold">المادة</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $query1 = "SELECT levelcourse.id,level.id,level.levelname,level.section,course.id,course.namecourse,course.id  as id,levelcourse.id
                                                        FROM levelcourse
                                                        INNER JOIN level ON level.id = levelcourse.levelid
                                                        INNER JOIN course ON course.id = levelcourse.coursid
                                                        where levelcourse.levelid='$classe'";
                                                        $rs1 = $conn->query($query1);
                                                        $num1 = $rs1->num_rows;
                                                        $sn = 0;
                                                        if ($num1 > 0) {
                                                            while ($rows1 = $rs1->fetch_assoc()) {
                                                                $sn = $sn + 1;
                                                                echo "<tr>
                                                                <td>" . $sn . "</td>
                                                                <td>" . $rows1['namecourse'] . "</td>
                                                            </tr>";
                                                            }
                                                        } else {
                                                            echo "<div class='alert alert-danger' role='alert'>
                                                            ! لايوجد بيانات
                                                            </div>";
                                                        }
                                                        ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="2" align="center"><i class="icon-printer fa fas-print fa-2x" aria-hidden="true" style="cursor:pointer" OnClick="CallPrint(this.value)"></i></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div

---
Learn more:
1. [You’re Temporarily Blocked](https://m.facebook.com/groups/anonymouses.developers/posts/2210577585946833/)
2. [البوابة التعليمية](https://home.moe.gov.om/module.php?m=pages-showpage&CatID=14&ID=16)
3. [أمثلة على التوثيق لطريقة APA - التوثيق / الاستشهاد المرجعي - LibGuides at Zayed University](https://zu.libguides.com/c.php?g=868995&p=6300170)



--------------------------------------------------------------------------------------------------------------------------------------------------------------------
<?php
session_start();

// تحقق من إذا كان المستخدم الحالي هو طالب
if (!isset($_SESSION["LoginStudent"])) {
    header('location:../login/login.php');
    exit;
}

// تحقق من إذا كان المستخدم الحالي ليس مدير النظام
if (isset($_SESSION['LoginAdmin']) && $_SESSION['LoginAdmin'] != "") {
    header('location:../login/login.php');
    exit;
}

require_once "../connection/connection.php";

$query1 = "SELECT collegyear.id, sectionyear.sectionname, sectionyear.id as id, collegyear.id, collegyear.secid, collegyear.yearcolleg, collegyear.endyear
FROM collegyear
INNER JOIN sectionyear ON sectionyear.id = collegyear.secid";
$rs2 = $conn->query($query1);
$num2 = $rs2->num_rows;
while ($rows2 = $rs2->fetch_assoc()) {
    echo "<h3 align='center'>نتيجة العام الدراسي " . $rows2['sectionname'] . '-' . $rows2['yearcolleg'] . '-' . $rows2['endyear'] . "</h3>";

    $aid = $_SESSION['LoginStudent'];

    $query = "SELECT students.id, level.levelname, level.section, level.id AS id, students.id, students.studentName, students.levelid
              FROM students
              INNER JOIN level ON level.id = students.levelid
              WHERE students.id = '$aid'";
    $rs = $conn->query($query);
    $num = $rs->num_rows;

    if ($num > 0) {
        while ($rows = $rs->fetch_assoc()) {
            echo "<p><b>رقم الطالب :</b> " . $rows['id'] . "</p>";
            echo "<p><b>اسم الطالب :</b> " . $rows['studentName'] . "</p>";
            echo "<p><b>الصف:</b> " . $rows['levelname'] . $rows['section'] . "</p>";

            $sd = $rows['levelid'];
            $sdd = $rows['id'];
        }
    }

    echo "<table>";
    echo "<thead>";
    echo "<tr style='text-align: center'>";
    echo "<th style='text-align: center' class='font-weight-bold'>#</th>";
    echo "<th style='text-align: center' class='font-weight-bold'>المادة</th>";
    echo "<th style='text-align: center' class='font-weight-bold'>الدرجة</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    $query = "SELECT studresulte.id, level.levelname, level.section, course.namecourse, students.name, students.id AS id, studresulte.id, studresulte.month1, studresulte.month2, studresulte.month3, studresulte.excutend, studresulte.avregtotal
              FROM studresulte
              INNER JOIN level ON level.id = studresulte.levelid
              INNER JOIN course ON course.id = studresulte.courseid
              INNER JOIN students ON students.id = studresulte.studid
              WHERE students.id = '$sdd'";
    $rs = $conn->query($query);
    $num = $rs->num_rows;
    $cnt = 1;
    $totlcount = 0;
    $totalmarks = 0;
    if ($num > 0) {
        while ($rows = $rs->fetch_assoc()) {
            echo "<tr>";
            echo "<th style='text-align: center'>" . $cnt . "</th>";
            echo "<td style='text-align: center'>" . $rows['namecourse'] . "</td>";
            echo "<td style='text-align: center'>" . $totalmarks = $rows['avregtotal'] . "</td>";
            echo "</tr>";

            $totlcount += $totalmarks;
            $cnt = $cnt + 1;
        }

        echo "<tr>";
        echo "<th scope='عذرًا، لكن الكود السابق لا يحتوي على المتغير "$zd" الذي يستخدم في استعلام قاعدة البيانات لاسترداد درجات الطالب. يجب عليك تعيين قيمة لهذا المتغير قبل استخدامه في الاستعلام.

بالإضافة إلى ذلك، يوجد خطأ في الاستعلام الثاني حيث يتم استخدام المتغير "$zd" بدلاً من "$sdd" في الشرط "where students.id= '$zd'". يجب تعديله ليصبح "where students.id= '$sdd'".

بعد إجراء هذه التعديلات، يمكنك استخدام الكود التالي لعرض درجات الطالب:

```php
<?php
session_start();

// تحقق من إذا كان المستخدم الحالي هو طالب
if (!isset($_SESSION["LoginStudent"])) {
    header('location:../login/login.php');
    exit;
}

// تحقق من إذا كان المستخدم الحالي ليس مدير النظام
if (isset($_SESSION['LoginAdmin']) && $_SESSION['LoginAdmin'] != "") {
    header('location:../login/login.php');
    exit;
}

require_once "../connection/connection.php";

$query1 = "SELECT collegyear.id,sectionyear.sectionname,sectionyear.id as id,collegyear.id,collegyear.secid,collegyear.yearcolleg,collegyear.endyear
FROM collegyear
INNER JOIN sectionyear ON sectionyear.id = collegyear.secid";
$rs2 = $conn->query($query1);
$num2 = $rs2->num_rows;
while ($rows2 = $rs2->fetch_assoc()) {
?>
    <h3 align="center">  نتيجة العام الدراسي  <?php echo $rows2['sectionname'] . '-' . $rows2['yearcolleg'] . '-' . $rows2['endyear']; ?>  </h3>

    <div class="table-responsive border rounded p-1">
        <?php

        $aid = $_SESSION['LoginStudent'];

        $query = "SELECT students.id,level.levelname,level.section,level.id AS id,students.id,students.studentName,
                    students.levelid
                    FROM students
                    INNER JOIN level ON level.id = students.levelid
                      where  students.id='$aid'";
        $rs = $conn->query($query);
        $num = $rs->num_rows;

        if ($num > 0) {
            while ($rows = $rs->fetch_assoc()) {
        ?>
                <p><b>رقم الطالب :</b> <?php echo $rows['id']; ?></p>
                <p><b>اسم الطالب :</b> <?php echo $rows['studentName']; ?> </p>
                <p><b>الصف:</b><?php echo $rows['levelname']; ?><?php echo $rows['section']; ?></p>

        <?php
                $sd = $rows['levelid'];
                $sdd = $rows['id'];
            }
        }
        ?>
        <table>
            <thead>
                <tr style="text-align: center">
                    <th style="text-align: center" class="font-weight-bold">#</th>
                    <th style="text-align: center" class="font-weight-bold"> المادة</th>
                    <th style="text-align: center" class="font-weight-bold">الدرجة</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $query = "SELECT studresulte.id,level.levelname,level.section,course.namecourse,students.name,students.id AS 
                            id,studresulte.id,studresulte.month1,studresulte.month2,studresulte.month3,studresulte.excutend,studresulte.avregtotal
                            FROM studresulte
                            INNER JOIN level ON level.id = studresulte.levelid
                            INNER JOIN course ON course.id = studresulte.courseid
                            INNER JOIN students ON students.id = studresulte.studid
                            where students.id= '$sdd'";
                $rs = $conn->query($query);
                $num = $rs->num_rows;
                $