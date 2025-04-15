<?php
session_start();
error_reporting(0);
?>
<link rel="stylesheet" href="css/stylestyle.css" />
<?php require "nav.php" ; ?>
<?php require "sidemenu.php" ; ?>
<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper">
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">عرض نتائج الطلاب الراسبين</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">الرئيسية</a></li>
                                <li class="breadcrumb-item active" aria-current="page">عرض نتائج الطلاب</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-sm-flex align-items-center mb-4">
                                        <h4 class="card-title mb-sm-0"> عرض نتائج الطلاب </h4>
                                        <a href="add-result.php" class="text-dark ml-auto mb-3 mb-sm-0"> اضافة نتيجة
                                            طالب </a>
                                    </div>
                                    <form class="forms-sample" action="" enctype="multipart/form-data" method="POST">
                                        <div class="form-group  row mb-3">
                                            <div class="col-xl-6">
                                                <label for="exampleInputName1"> العام الدراسي </label>
                                                <select name="yearidd" class="form-control" required="required">
                                                    <?php
                                                  $qry21= "SELECT * FROM collegyear ORDER BY id desc";
                                                  $result21 = $conn->query($qry21);
                                                  $num21 = $result21->num_rows;		
                                                  if ($num21 > 0){
                                                while ($rows21 = $result21->fetch_assoc()){?>
                                                    <option value="<?php echo $rows21['id'];?>">
                                                        <?php   echo $rows21['yearcolleg'].'  '.'-'.'  '.$rows21['endyear'];?>
                                                    </option>
                                                    <?php } } ?>
                                                </select>
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="exampleInputEmail3"> الفصل الدراسي</label>
                                                <select name="sectionid" class="form-control" required="required">
                                                    <?php
                                          $qry22= "SELECT * FROM sectionyear ORDER BY id ASC";
                                          $result22 = $conn->query($qry22);
                                          $num22 = $result22->num_rows;		
                                          if ($num22 > 0){
                                            while ($rows22 = $result22->fetch_assoc()){?>
                                                    <option value="<?php echo $rows22['id'];?>">
                                                        <?php echo $rows22['sectionname']; ?></option>
                                                    <?php  } }  ?>
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
                                                <h6 class="m-0 font-weight-bold text-primary">جميع نتائج الطلاب الراسبين
                                                </h6>

                                            </div>
                                            <div class="table-responsive p-3">
                                                <table class="table align-items-center table-flush table-hover"
                                                    id="dataTableHover">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th class="font-weight-bold">#</th>
                                                            <th class="font-weight-bold">الطالب</th>
                                                            <th class="font-weight-bold">الصف</th>
                                                            <th class="font-weight-bold">المادة</th>
                                                            <th class="font-weight-bold">الدرجة</th>
                                                            <th class="font-weight-bold">تعديل </th>
                                                            <th class="font-weight-bold">حذف </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                      $query3 = "SELECT studresulte.id,level.id,level.levelname,level.section,course.namecourse,students.id,students.studentName,students.levelid,
                                      collegyear.id,collegyear.yearcolleg,collegyear.endyear,sectionyear.id,sectionyear.sectionname,sectionyear.id AS id,studresulte.id,studresulte.levelid,studresulte.studid,studresulte.avregtotal
                                      FROM studresulte
                                      INNER JOIN level ON level.id = studresulte.levelid
                                      INNER JOIN course ON course.id = studresulte.courseid
                                      INNER JOIN students ON students.id = studresulte.studid
                                      INNER JOIN collegyear ON collegyear.id = studresulte.yearid
                                      INNER JOIN sectionyear ON sectionyear.id = studresulte.secid
                                      where studresulte.avregtotal<50 and studresulte.yearid='$year' and studresulte.secid='$section'";
                                      $rs3 = $conn->query($query3);
                                      $num3 = $rs3->num_rows;
                                      $sn=0;
                                      if($num3 > 0)
                                      { 
                                      while ($rows3 = $rs3->fetch_assoc())
                                      {
                                          $sn = $sn + 1;
                                          $stu=$rows3['id'];
                                        echo"
                                        <tr>
                                        <td>".$sn."</td>
                                        <td>".$rows3['studentName']."</td>
                                        <td>".$rows3['levelname'].'  '.'-'.'  '.$rows3['section']."</td>
                                        <td>".$rows3['namecourse']."</td>
                                        <td>".$rows3['avregtotal']."</td>
                                      <td><a href='add-result.php?action=edit&id=".$rows3['studid']."&levelid=".$rows3['levelid']."&yearid=".$rows3['yearid']."&secid=".$rows3['secid']."'><i class='fa fa-eye'></i></a></td>
                                      <td><a href='add-result.php?action=delete&id=".$rows3['studid']."&levelid=".$rows3['levelid']."&yearid=".$rows3['yearid']."&secid=".$rows3['secid']."'> <i class='fa fa-trash'></i></a></td>
                                  </tr>";
                                      }
                                  
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
                                                            <td colspan="7" align="center"><i
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
                                <?php  } ?>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
</main>
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
<?php require "footer.php"; ?>