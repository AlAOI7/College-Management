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
<!---------------- Session Ends form here ------------------------>

<!doctype html>
<html lang="en">

<head>
    <title>موادي</title>
</head>

<body>
    <?php include('../common/common-header.php') ?>
    <?php include('../common/student-sidebar.php') ?>

    </head>

    <body>
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
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">

                                    <!-- خاص باختيار المستوى والعام  -->
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
                                            <h4 class="card-title" style="text-align: center;"> مواد العام
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
                    
                                            if ($num1 > 0) {$rows1 = $rs1->fetch_assoc()    ?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card mb-4">
                                                <?php    // $sd = $rows1['levelid'];   
                                                 $sdd = $rows1['studid'];   ?>


                                                <table class="w-100 table-elements mb-5 table-three-tr"
                                                    cellpadding="10">
                                                    <div class="main-panel">
                                                        <thead class="thead-light">
                                                            <tr style="text-align: center">
                                                                <th style="text-align: center" class="font-weight-bold">
                                                                    #
                                                                </th>
                                                                <th style="text-align: center" class="font-weight-bold">
                                                                    المادة</th>
                                                                <th style="text-align: center" class="font-weight-bold">
                                                                    الساعات المعتمدة</th>
                                                                <th style="text-align: center" class="font-weight-bold">
                                                                    الملف</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php
                                                                $query2 = "SELECT studresulte.id,level.id,level.levelname,level.section,course.namecourse,course.course_credits,students.id,students.studentName,students.levelid,
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
                                                                    hor: <?php echo $rows2['course_credits']; ?></td>
                                                                <?php  
                                                                        $prosql = mysqli_query($conn, "SELECT * FROM files");
                                                                    $prorow = mysqli_fetch_assoc($prosql) 
                                                                
                                                                    ?>
                                                                <td style="text-align: center">
                                                                    <a
                                                                        href="<?=$prorow['filename'] ;?>">Download</a><?=$prorow['size'];?>.<?=$prorow['type'] ;?>
                                                                </td>

                                                            </tr>
                                                            <?php }} ?>
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
                </div>
            </div>
        </main>

        <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
            // ID From dataTable
            $('#dataTableHover').DataTable();
            // ID From dataTable with Hover
        });
        </script>
        <script>
        $(function($) {
            $('#example').DataTable();

            $('#example2').DataTable({
                "scrollY": "300px",
                "scrollCollapse": true,
                "paging": false
            });

            $('#example3').DataTable();
        });

        function CallPrint(strid) {
            var prtContent = document.getElementById("exampl");
            var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(prtContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
        }
        </script>
    </body>

</html>