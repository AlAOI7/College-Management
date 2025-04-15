<!---------------- Session starts form here ----------------------->
<?php require "inc/security.php"; ?>
<!---------------- Session Ends form here ------------------------>
<link rel="stylesheet" href="css/stylestyle.css" />
<?php require "nav.php" ; ?>
<?php require "sidemenu.php" ; ?>
<?php
if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == "edit")
{
      $id= $_GET['id'];

      $query=mysqli_query($conn,"SELECT examschedule.id,course.namecourse,level.levelname,level.section,level.id,tbldayes.id,tbldayes.namedayes,
      collegyear.id,collegyear.yearcolleg,collegyear.endyear
      AS id,examschedule.id,examschedule.examdate,examschedule.time,examschedule.secid,examschedule.yearid,examschedule.dayeid,examschedule.id
      FROM examschedule
      INNER JOIN level ON level.id = examschedule.levelid
      INNER JOIN course ON course.id = examschedule.courseid
      INNER JOIN tbldayes ON tbldayes.id = examschedule.dayeid
      INNER JOIN collegyear ON collegyear.id = examschedule.yearid
       where examschedule.id ='$id'");
      $row=mysqli_fetch_array($query);

      //------------UPDATE-----------------------------

      if(isset($_POST['update'])){
     
        $examsexamdate = $_POST['examscheduleexamdate'];
        $examexamtime = $_POST['examscheduletime'];
        $examcourseid = $_POST['examschedulecourseid'];
        $examslevelid = $_POST['examschedulelevelid'];
        $yearidd = $_POST['yearidd'];
        $Lecturesdayes = $_POST['Lecturesday'];

          $query=mysqli_query($conn,"UPDATE examschedule set examdate='$examsexamdate',time='$examexamtime',courseid='$examcourseid',levelid='$examslevelid',yearid='$yearidd',dayeid='$Lecturesdayes' where id='$id'");

          if ($query) {
              
              echo "<script type = \"text/javascript\">
              window.location = (\"add-examschedule.php\")
              </script>"; 
          }
          else
          {
              $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'لم يتم التعديل!</div>";
          }
      }
  }


//--------------------------------DELETE------------------------------------------------------------------

if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == "delete")
{
      $id= $_GET['id'];

      $query = mysqli_query($con,"DELETE FROM examschedule WHERE id='$id'");

      if ($query == TRUE) {

              echo "<script type = \"text/javascript\">
              window.location = (\"viewexamschedule.php\")
              </script>";  
      }
      else{

          $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>لم يتم الحذف!</div>"; 
       }
    
}


?>

<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">عرض جدول الحصص </h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">الرئيسية </a></li>
                            <li class="breadcrumb-item active" aria-current="page">عرض جدول الحصص </li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex align-items-center mb-4">
                                    <h4 class="card-title mb-sm-0"> عرض جدول الحصص </h4>
                                    <a href="add-Lectures.php" class="text-dark ml-auto mb-3 mb-sm-0"> اضافة جدول حصص
                                    </a>
                                </div>
                                <form class="forms-sample" action="" enctype="multipart/form-data" method="POST">

                                    <div class="form-group  row mb-3">

                                        <div class="col-xl-6">
                                            <label for="exampleInputEmail3"> العام الدراسي</label>
                                            <select name="yearidd" class="form-control" required="required">
                                                <?php $qry20= "SELECT * FROM collegyear ORDER BY id desc";
                                    $result20 = $conn->query($qry20);
                                    $num20 = $result20->num_rows;		
                                    if ($num20 > 0){
                                      while ($rows20 = $result20->fetch_assoc()){?>
                                                <option value="<?php echo $rows20['id'];?>">
                                                    <?php echo $rows20['yearcolleg'].'  '.'-'.'  '.$rows20['endyear'];?>
                                                </option>
                                                <?php   }} ?>
                                            </select>
                                        </div>
                                        <div class="col-xl-6">
                                            <label for="exampleInputEmail3"> الفصل الدراسي</label>
                                            <select name="sectionid" class="form-control" required="required">

                                                <?php
                                  $qry1= "SELECT * FROM sectionyear  ORDER BY id asc";
                                  $result1 = $conn->query($qry1);
                                  $num1 = $result1->num_rows;		
                                  if ($num1 > 0){
                                    while ($rows1 = $result1->fetch_assoc()){?>
                                                <option value="<?php echo $rows1['id'];?>">
                                                    <?php echo $rows1['sectionname']; ?></option>
                                                <?php }} ?>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2" name="submit">عرض</button>
                                </form>
                            </div>
                            <?php
                            if(isset($_POST['submit'])){
                            $year=$_POST['yearidd'];
                            $section=$_POST['sectionid'];
                          ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card mb-4">
                                        <div
                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">جدول الاختبارات </h6>
                                        </div>
                                        <div class="table-responsive p-3">
                                            <table class="table align-items-center table-flush table-hover">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th class="font-weight-bold">#</th>
                                                        <th class="font-weight-bold">الفصل</th>
                                                        <th class="font-weight-bold">المادة</th>
                                                        <th class="font-weight-bold">اليوم</th>
                                                        <th class="font-weight-bold">التاريخ</th>
                                                        <th class="font-weight-bold">وقت الاختبار</th>
                                                        <th class="font-weight-bold">تعديل</th>
                                                        <th class="font-weight-bold">حذف</th>

                                                        <?php
                            $query1 ="SELECT examschedule.id,level.levelname,level.section,level.id,course.namecourse,tbldayes.id,tbldayes.namedayes,
                            collegyear.id,collegyear.yearcolleg,collegyear.endyear,sectionyear.id,sectionyear.sectionname,sectionyear.id 
                            AS id,examschedule.id,examschedule.examdate,examschedule.time,examschedule.secid,examschedule.yearid,examschedule.dayeid,examschedule.id
                            FROM examschedule
                            INNER JOIN level ON level.id = examschedule.levelid
                            INNER JOIN course ON course.id = examschedule.courseid
                            left JOIN tbldayes ON tbldayes.id = examschedule.dayeid
                            INNER JOIN collegyear ON collegyear.id = examschedule.yearid 
                            INNER JOIN sectionyear ON sectionyear.id = examschedule.secid
                            where examschedule.yearid='$year' and examschedule.secid='$section'";
                            $rs1 = $conn->query($query1);
                            $num1 = $rs1->num_rows;
                            $cnt=0;
                            while ($rows1 = $rs1->fetch_assoc())
                            { $cnt=$cnt+1;
                            echo"   ";
                            }
                          ?>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php

                            $query3 = "SELECT * FROM level ORDER BY id ASC";
                            $rs3 = $conn->query($query3);
                            $num3 = $rs3->num_rows;
                            $sn=0;
                            if($num3 > 0)
                            { 
                            while ($rows3 = $rs3->fetch_assoc())
                            {
                                $sn = $sn + 1;
                              echo"
                              <tr>
                              ";
                            $class=$rows3['id'];
                            $query9 = "SELECT examschedule.id,level.levelname,level.section,level.id,course.namecourse,tbldayes.id,tbldayes.namedayes,
                            collegyear.id,collegyear.yearcolleg,collegyear.endyear
                            AS id,examschedule.id,examschedule.examdate,examschedule.time,examschedule.levelid,examschedule.courseid,examschedule.dayeid
                            FROM examschedule
                            INNER JOIN level ON level.id = examschedule.levelid
                            INNER JOIN course ON course.id = examschedule.courseid
                            INNER JOIN tbldayes ON tbldayes.id = examschedule.dayeid
                            INNER JOIN collegyear ON collegyear.id = examschedule.yearid
                            where examschedule.levelid='$class' and examschedule.yearid='$year'";
                            $rs9 = $conn->query($query9);
                            $num9= $rs9->num_rows;
                            while ($rows9 = $rs9->fetch_assoc())
                            { 
                                  echo"
                            <td>".$sn."</td>
                            <td>".$rows9['levelname'].'  '.'-'.'  '.$rows9['section']."</td>
                            <td>".$rows9['namecourse']."</td>
                            <td>".$rows9['namedayes']."</td>
                            <td>".$rows9['examdate']."</td>
                            <td>".$rows9['time']."</td>
                            
                               
                           <td><a href='delete_examsch.php?id=". $rows9['id']."'> <i class='fa fa-trash'></i></a></td>
                                               


                                                    </tr>";
                                                    } }
                                                    $titel=$cnt+3;
                                                    }
                                                    else
                                                    {
                                                    echo
                                                    "<div class='alert alert-danger' role='alert'>
                                                        ! لايوجد بيانات
                                                    </div>";
                                                    }

                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="10" align="center"><i
                                                                class="icon-printer fa fas-print fa-2x"
                                                                aria-hidden="true" style="cursor:pointer"
                                                                OnClick="CallPrint(this.value)"></i></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
      }
                        ?>

                        </div>
                    </div>
                </div>
            </div>

            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</main>
<?php require "footer.php"; ?>

<script>
$(document).ready(function() {
    $('#dataTable').DataTable(); // ID From dataTable 
    $('#dataTableHover').DataTable(); // ID From dataTable with Hover
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