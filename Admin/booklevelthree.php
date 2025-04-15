<?php  
session_start();
//Check if the current user is a student
if (!isset($_SESSION["LoginAdmin"])) {
  header('location:../login/login.php');
  exit;
}

require_once "../connection/connection.php";
?>
<link rel="stylesheet" href="css/stylestyle.css" />
<?php require "nav.php" ; ?>
<?php require "sidemenu.php" ; ?>


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
                            <!-- <div class="card-body">
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
                                    </div> -->
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
                                                $aid = $_SESSION['LoginAdmin'];
                                                $prosaaql = "SELECT  students.id, students.studentName, files.studid, level.id, level.levelname, level.section
                                                FROM files
                                                INNER JOIN students ON students.id = files.studid
                                                INNER JOIN level ON level.id = files.levelid 
                                                 ";
                                                $rs1 = $conn->query($prosaaql);
                                                $num1 = $rs1->num_rows;
                    
                                            if ($num1 > 0) {$rows1 = $rs1->fetch_assoc()    ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card mb-4">
                                        <?php    // $sd = $rows1['levelid'];   
                                                 $sdd = $rows1['studid'];   ?>


                                        <table class="w-100 table-elements mb-5 table-three-tr" cellpadding="10">
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
                                                                $query2 = "SELECT files.id,level.id,level.levelname,level.section,course.namecourse,course.course_credits,
                                                                collegyear.id,collegyear.yearcolleg,collegyear.endyear,sectionyear.id,sectionyear.sectionname,sectionyear.id
                                                                AS  id,files.id,files.levelid,files.studid,files.avregtotal
                                                                FROM files
                                                                INNER JOIN level ON level.id = files.levelid
                                                                INNER JOIN course ON course.id = files.courseid
                                                                INNER JOIN students ON students.id = files.studid
                                                                INNER JOIN collegyear ON collegyear.id = files.yearid
                                                                INNER JOIN sectionyear ON sectionyear.id =  files.secid
                                                                where files.studid= '$sdd' and files.yearid='$year' and   files.secid='$section'";
             
                                                               
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
                                                        <td style="text-align: center">
                                                            <?php echo $rows2['namecourse']; ?></td>

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

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">جميع الكتب</h6>

                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>

                                <th class="font-weight-bold">#</th>
                                <th class="font-weight-bold">اسم الكتاب</th>
                                <th class="font-weight-bold">الفصل الدراسي</th>
                                <th class="font-weight-bold"> الحجم </th>
                                <th class="font-weight-bold"> النوع </th>
                                <th class="font-weight-bold"> الاسم </th>
                                <th class="font-weight-bold"> الرابط </th>
                                <th class="font-weight-bold"> الاجراءات </th>


                            </tr>
                        </thead>


                        <tbody>
                            <?php
                                                $sql = "SELECT  course.id, course.namecourse, files.size,files.id, files.filename,  files.type,  files.course_id, level.id, level.levelname, level.section
                                                FROM files
                                                INNER JOIN course ON course.id = files.course_id
                                                INNER JOIN level ON level.id = files.levelid 
                                          
                                                ORDER BY course.namecourse,level.levelname,files.id ";
                                               
                                         $result = $conn->query($sql);
                                         $sn=0;
                                         if ($result->num_rows > 0) {           
                                        while($row = $result->fetch_assoc()) {
                                                        $sn = $sn + 1;  
                                              ?>
                            <tr>
                                <td><?=$sn?></td>
                                <td><?=$row['namecourse'] ;?></td>
                                <td> <?= $row['levelname'] . "-". $row["section"] ;?></td>
                                <td><?=$row['size'];?></td>
                                <td><?=$row['type'] ;?></td>
                                <td><?=$row['filename'];?></td>
                                <td><a href="<?=$row['filename'] ;?>">Download</a></td>
                                <td width="170">
                                    <a href="bookedit.php?id=<?= $row['id'] ?>" class="btn btn-success"><span><i
                                                class="fa fa-edit"></i></span>
                                    </a>
                                    <a href="bookdelete.php?id=<?= $row['id'] ?>" class="btn btn-danger">
                                        <span><i class="fa fa-trash"></i></span>
                                    </a>
                                </td>

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
                        <tfoot>
                            <tr>


                                <td colspan="5" align="center"><i class="icon-printer fa fas-print fa-2x"
                                        aria-hidden="true" style="cursor:pointer" OnClick="CallPrint(this.value)"></i>
                                </td>
                            </tr>

                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


</main>


<?php require "footer.php"; ?>