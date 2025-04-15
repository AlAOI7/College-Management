<!---------------- Session starts form here ----------------------->
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
<!---------------- Session Ends form here ------------------------>


<!doctype html>
<html lang="en">

<head>
    <title>درجاتي</title>
</head>

<body>
    <?php include('../common/common-header.php') ?>
    <?php include('../common/student-sidebar.php') ?>
    <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
        <div class="sub-main">
            <div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
                <h4 class="">درجات الطالب</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <section class="mt-3">
                        <div class="content-wrapper">
                            <div class="page-header">
                                <h3 class="page-title"> ادارة النتائج </h3>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="dashboard.php">الرئيسية</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> عرض النتائج
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="row">
                                <div class="col-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <form class="forms-sample" action="" enctype="multipart/form-data"
                                                method="POST">

                                                <div class="form-group  row mb-3">
                                                    <div class="col-xl-6">
                                                        <label for="exampleInputEmail3"> العام الدراسي</label>
                                                        <select name="yearid" class="form-control" required="required">

                                                            <?php
                                                            $qry20 = "SELECT * FROM collegyear ORDER BY id desc";
                                                            $result20 = $conn->query($qry20);
                                                            $num20 = $result20->num_rows;
                                                            if ($num20 > 0) {
                                                                while ($rows20 = $result20->fetch_assoc()) { ?>
                                                            <option value="<?php echo $rows20['id']; ?>">
                                                                <?php echo $rows20['yearcolleg'] . '  ' . '-' . '  ' . $rows20['endyear']; ?>
                                                            </option>
                                                            <?php   } }  ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <label for="exampleInputEmail3"> الفصل الدراسي</label>
                                                        <select name="secid" class="form-control" required="required">

                                                            <?php
                                                            $qry1 = "SELECT * FROM sectionyear ORDER BY id ASC";
                                                            $result1 = $conn->query($qry1);
                                                            $num1 = $result1->num_rows;
                                                            if ($num1 > 0) {
                                                                while ($rows1 = $result1->fetch_assoc()) { ?>
                                                            <option value="<?php echo $rows1['id']; ?>">
                                                                <?php echo $rows1['sectionname']; ?></option>
                                                            <?php  }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary mr-2"
                                                    name="submit">عرض</button>

                                            </form>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-sm-flex align-items-center mb-4">
                                                <?php
                                                     if (isset($_POST['submit'])) {
                                                    $year = $_POST['yearid'];
                                                    $section = $_POST['secid'];
                                                    $query1 =  "SELECT yearcollegsection.id,collegyear.yearcolleg,collegyear.endyear,collegyear.id,sectionyear.sectionname,sectionyear.id 
                                                    as id,yearcollegsection.id,yearcollegsection.secid,yearcollegsection.yearid,yearcollegsection.id
                                                    FROM yearcollegsection
                                                    INNER JOIN collegyear ON collegyear.id = yearcollegsection.yearid
                                                    INNER JOIN sectionyear ON sectionyear.id = yearcollegsection.secid
                                                    where  yearcollegsection.yearid='$year' and yearcollegsection.secid='$section'";
                                                    $rs2 = $conn->query($query1);
                                                    $num2 = $rs2->num_rows;
                                                    while ($rows2 = $rs2->fetch_assoc()) {   ?>
                                                <h4 class="card-title" style="text-align: center;"> نتيجة العام
                                                    الدراسي
                                                    (<?php echo $rows2['sectionname'] . '/' . $rows2['yearcolleg'] . '-' . $rows2['endyear']; ?>)

                                                </h4>
                                                <?php    } ?>
                                            </div>
                                        </div>
                                        <?php 
                                                $aid = $_SESSION['LoginStudent'];
                                                $prosaaql = "SELECT  students.id, students.studentName, studresulte.studid, level.id, level.levelname, level.section
                                                FROM studresulte
                                                INNER JOIN students ON students.id = studresulte.studid
                                                INNER JOIN level ON level.id = studresulte.levelid 
                                                 ";
                                                $rs1 = $conn->query($prosaaql);
                                                $num1 = $rs1->num_rows;
                    
                                            if ($num1 > 0) {  $rows1 = $rs1->fetch_assoc()    ?>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card mb-4">
                                                    <div
                                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                        <h6 class="m-0 font-weight-bold text-primary">
                                                            <p><b>رقم الطالب :</b> <?php echo $rows1['id']; ?> </p>
                                                            <p><b>اسم الطالب :</b> <?php echo $rows1['studentName']; ?>
                                                            </p>

                                                            <p><b>المستوى:</b><?php echo $rows1['levelname'] . '  ' . '-' . '  ' . $rows1['section']; ?>
                                                                <?php 
                                                                // $sd = $rows1['levelid']; 
                                                                 $sdd = $rows1['studid'];
                                                                 ?>
                                                        </h6>

                                                    </div>

                                                    <table class="w-100 table-elements mb-5 table-three-tr"
                                                        cellpadding="10">
                                                        <div class="main-panel">
                                                            <thead class="thead-light">
                                                                <tr style="text-align: center">
                                                                    <th style="text-align: center"
                                                                        class="font-weight-bold">#
                                                                    </th>
                                                                    <th style="text-align: center"
                                                                        class="font-weight-bold"> المادة</th>
                                                                    <th style="text-align: center"
                                                                        class="font-weight-bold"> الدرجة</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>

                                                                <?php
                                                              
                                                                $totlcount=0;
                                                               
                                                                $query2 = "SELECT studresulte.id,level.id,level.levelname,level.section,course.namecourse,students.id,students.studentName,students.levelid,
                                                                collegyear.id,collegyear.yearcolleg,collegyear.endyear,sectionyear.id,sectionyear.sectionname,sectionyear.id
                                                                AS  id,studresulte.id,studresulte.levelid,studresulte.studid,studresulte.avregtotal
                                                                FROM studresulte
                                                                INNER JOIN level ON level.id = studresulte.levelid
                                                                INNER JOIN course ON course.id = studresulte.courseid
                                                                INNER JOIN students ON students.id = studresulte.studid
                                                                INNER JOIN collegyear ON collegyear.id = studresulte.yearid
                                                                INNER JOIN sectionyear ON sectionyear.id =  studresulte.secid
                                                                where studresulte.studid= '$sdd' and studresulte.yearid='$year' and   studresulte.secid='$section'";
                                                                $rs2 = $conn->query($query2);
                                                                $num2 = $rs2->num_rows;
                                                                $cnt = 1;
                                                                if ($num2 > 0) {
                                                                while ($rows2 = $rs2->fetch_assoc()) { 
                                                                    ?>

                                                                <tr>

                                                                    <th style="text-align: center">
                                                                        <?php echo $cnt ?></th>
                                                                    <td style="text-align: center">
                                                                        <?php echo $rows2['namecourse']; ?></td>
                                                                    <td style="text-align: center">
                                                                        <?php echo $totalmarks = $rows2['avregtotal']; ?>
                                                                    </td>
                                                                </tr>
                                                                <?php  $totlcount += $totalmarks;   $cnt = $cnt + 1; }?>
                                                                <tr>
                                                                    <th scope="row" colspan="2"
                                                                        style="text-align: center">
                                                                        الدرجة النهائية</th>
                                                                    <td style="text-align: center">
                                                                        <p><?php echo  $totlcount; ?></b> --
                                                                            <b><?php echo  $outof = ($cnt - 1) * 100; ?></b>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" colspan="2"
                                                                        style="text-align: center"> المعدل</th>
                                                                    <td style="text-align: center">
                                                                        <b><?php echo $state = $totlcount * (100) / $outof; ?>
                                                                            %</b>
                                                                    </td>
                                                                </tr>
                                                                <?php if ($state >= 50 and $state <= 100) {
                                                                            $statee = "ناجح";
                                                                        ?>

                                                                <tr>
                                                                    <th scope="row" colspan="2"
                                                                        style="text-align: center">
                                                                        التقدير</th>
                                                                    <td style="text-align: center">
                                                                        <b><?php echo  $statee; ?>
                                                                        </b>
                                                                    </td>
                                                                </tr>
                                                                <?php } else if ($state <= 50 and $state >= 0) {
                                                                            $statee = "راسب"; ?>
                                                                <tr>
                                                                    <th scope="row" colspan="2"
                                                                        style="text-align: center">
                                                                        التقدير</th>
                                                                    <td style="text-align: center">
                                                                        <b><?php echo  $statee; ?></b>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                        }
                                                                    }
                                                                    ?>

                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="3" align="center"><i
                                                                            class="icon-printer fa fas-print fa-2x"
                                                                            aria-hidden="true" style="cursor:pointer"
                                                                            OnClick="CallPrint(this.value)"></i>
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <?php  } else {   echo   "<div class='alert alert-danger' role='alert'>  ! يرجى تحديد العام الدراسي والفصل الدراسي </div>";   } ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
</body>

</html>