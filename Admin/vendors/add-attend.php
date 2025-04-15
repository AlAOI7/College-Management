

<?php
session_start();
error_reporting(0);
include('includes/mysqlcon.php');
if (strlen($_SESSION['uidd']==0)) {
  header('location:logout.php');
  } else{
    //------------------------SAVE--------------------------------------------------
    
    if(isset($_POST['save'])){
      $marks=array();

      $attendnumb = $_POST['attendnumbers'];
      $absencenumb = $_POST['absencenumbers'];
      $vacationnumb = $_POST['vacationnumbers'];
      
      $studintid =  $_POST['idstudint'] ;
      $idclassid = $_POST['idclass'];
   
      $yearidd = $_POST['idyear'];
      $sectioniddd = $_POST['idsection'];
      $idmonthid=$_POST['idmonth'];
      $N = count($studintid);
      
      $query=mysqli_query($con,"SELECT * from tblattend WHERE classid='$idclassid' and studid='$studintid' and monthid='$idmonthid' and yearid='$yearidd' and secid='$sectioniddd' ");
      $ret=mysqli_fetch_array($query);
    
      if($ret > 0){ 
    
          $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>لا يمكن تسجيل الحضور لطالب اكثر من مرة في الشهر!</div>";
      }
      else{
        $studentidd=array();
        $idclassidd=array();
        $yeariddd=array();
        $idmonthidd=array();
        $attendnumbb=array();
        $absencenumbb=array();
        $vacationnumbb=array();
        $sectionidd=array();
    
     for($i=0;$i<$N;$i++){
     $studentidd=$studintid[$i];
     $idclassidd=$idclassid[$i];
     $yeariddd=$yearidd[$i];
     $idmonthidd=$idmonthid[$i];
     $attendnumbb=$attendnumb[$i];
     $absencenumbb=$absencenumb[$i];
     $vacationnumbb=$vacationnumb[$i];
     $sectionidd=$sectioniddd[$i];
    
    
          $query=mysqli_query($con,"INSERT into tblattend (studid,classid,yearid,monthid,attendnumber,absencenumber,vacationnumber,secid)  
          value('$studentidd','$idclassidd','$yeariddd','$idmonthidd','$attendnumbb','$absencenumbb','$vacationnumbb','$sectionidd')");
    
      if ($query) {
          
          $statusMsg = "<div class='alert alert-success'  style='margin-right:700px;'>تم الاضافة بنجاح</div>";
      }
      else
      {
           $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;' >! لم تتم الاضافة هناك خطاء</div>";
      }}
    
    }}
    
    //--------------------EDIT------------------------------------------------------------
    
    if (isset($_GET['studid']) && isset($_GET['action']) && $_GET['action'] == "edit")
    {
          $id= $_GET['studid'];
    
          $query=mysqli_query($con,"SELECT tblattend.id,tlclass.id,tlclass.nameclass,tlclass.section,students.id,students.name,students.classid,
          schoolyear.id,schoolyear.yearschool,schoolyear.endyear,sectionyear.id,sectionyear.sectionname,sectionyear.id,tblmonth.namemonth,tblmonth.id  
          AS id,tblattend.id,tblattend.attendnumber,tblattend.absencenumber,tblattend.vacationnumber
          FROM tblattend
          INNER JOIN tlclass ON tlclass.id = tblattend.classid
          INNER JOIN tblmonth ON tblmonth.id = tblattend.monthid
          INNER JOIN students ON students.id = tblattend.studid
          INNER JOIN schoolyear ON schoolyear.id = tblattend.yearid
          INNER JOIN sectionyear ON sectionyear.id = tblattend.secid
          where tblattend.studid ='$id'");
          $row=mysqli_fetch_array($query);
    
          //------------UPDATE-----------------------------
    
          if(isset($_POST['update'])){
          
      
            $rowid=$_POST['id'];
            $marks=$_POST['marks']; 
          
            foreach($_POST['id'] as $count => $id){
              $mrks=$marks[$count];
              $iid=$rowid[$count];
              for($i=0;$i<=$count;$i++) {
    
    
    
     $query=mysqli_query($con,"UPDATE studresulte set avgtotal='$mrks' where id='$iid' ");
    
     $query2=mysqli_query($con,"UPDATE tblresulte set avgtotal='$mrks' where id='$iid'");
    
      if ($query) {
          
          $statusMsg = "<div class='alert alert-success'  style='margin-right:700px;'>تم التعديل بنجاح</div>";
          echo "<script type = \"text/javascript\">
          window.location = (\"add-result.php\")
          </script>"; 
      }
      else
      {
           $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;' >! لم تتم التعديل هناك خطاء</div>";
      }
              }}}
    }
    
    
    
    //--------------------------------DELETE------------------------------------------------------------------
    
    if (isset($_GET['studid']) && isset($_GET['action']) && $_GET['action'] == "delete")
    {
          $id= $_GET['studid'];
          $query7 = mysqli_query($con,"DELETE FROM studresulte WHERE studid='$id'");
          $query = mysqli_query($con,"DELETE FROM tblresulte WHERE studid='$id'");
    
          if ($query == TRUE) {
    
                  echo "<script type = \"text/javascript\">
                  window.location = (\"add-result.php\")
                  </script>";  
          }
          else{
    
              $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>لم يتم الحذف!</div>"; 
           }
        
    }
    
    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>   م.ش/محمد علي عثمان </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">

    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    
    <link rel="stylesheet" href="css/style.css" />
    
  </head>
  <body >
  <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     <?php include_once('includes/header.php');?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
      <?php include_once('includes/sidebar.php');?>
        <!-- partial -->
        
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> ادارة الحضور  </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">الرئيسية</a></li>
                  <li class="breadcrumb-item active" aria-current="page">تسجيل حضور الطلاب </li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                  <?php
                   $yearschooladd = date('Y');
                   $endyearadd = date('Y')+1;
                $query12 = "SELECT schoolyear.id,sectionyear.sectionname,sectionyear.id as id,schoolyear.id,schoolyear.secid,schoolyear.yearschool,schoolyear.endyear
                 FROM schoolyear
                INNER JOIN sectionyear ON sectionyear.id = schoolyear.secid
                where yearschool='$yearschooladd' and endyear='$endyearadd'";
                $rs12 = $con->query($query12);
                $num12 = $rs12->num_rows;
                $sn=0;
                if($num12 > 0)
                { 
                  while ($rows12 = $rs12->fetch_assoc())
                    {
                       $sn = $sn + 1;
                 ?>
               
                    <h4 class="card-title" style="text-align: center;"> اضافة حضور الطلاب للعام الجامعي  <?php   echo $rows12['yearschool'].'-'.$rows12['endyear'];?>   </h4>
               <?php  
                  } } 
           echo $statusMsg; ?>



                    <form class="forms-sample" action="" enctype="multipart/form-data" method="POST" >
                    <div class="form-group  row mb-3">
                      
                    <div class="col-xl-6">
                    <label for="exampleInputName1"> العام الدراسي  </label>
                    <select  name="yearsid" class="form-control" required="required" >
  <option value="">-- تحديد العام الدراسي--</option>
   <?php

  $qry21= "SELECT * FROM schoolyear ORDER BY id ASC";
  $result21 = $con->query($qry21);
  $num21 = $result21->num_rows;		
  if ($num21 > 0){

   
    while ($rows21 = $result21->fetch_assoc()){?>
    <option value="<?php echo $rows21['id'];?>" > <?php   echo $rows21['yearschool'].'  '.'-'.'  '.$rows21['endyear'];?> </option>
    <?php
        }
           
        }
      ?>  
       </select>
                        </div>
                       
                      <div class="col-xl-6">
                      <label for="exampleInputEmail3"> الفصل الدراسي</label>
  <select  name="sectionid" class="form-control" required="required" >
  <option value="">-- تحديد الفصل الدراسي--</option>
   <?php

  $qry22= "SELECT * FROM sectionyear ORDER BY id ASC";
  $result22 = $con->query($qry22);
  $num22 = $result22->num_rows;		
  if ($num22 > 0){

   
    while ($rows22 = $result22->fetch_assoc()){?>
    <option value="<?php echo $rows22['id'];?>" ><?php echo $rows22['sectionname']; ?></option>
    <?php
        }
           
        }
      ?>  
       </select>
                      </div>
                      </div>
                    <div class="form-group  row mb-3">
                    <div class="col-xl-6">
    <label for="exampleInputEmail3">الفصل</label>
    <select  name="resultclassid" class="form-control" required="required" >
    <option value="">--تحديد الفصل--</option>
     <?php

    $qry23= "SELECT * FROM tlclass ORDER BY id ASC";
    $result23 = $con->query($qry23);
    $num23 = $result23->num_rows;		
    if ($num23 > 0){
  
     
      while ($rows23 = $result23->fetch_assoc()){?>
      <option value="<?php echo $rows23['id'];?>" ><?php echo $rows23['nameclass'].'  '.'-'.'  '.$rows23['section']; ?></option>
      <?php
          }}
        ?>  
         </select>
    </div> 
    <div class="col-xl-6">
    <label for="exampleInputEmail3">الشهر</label>
    <select  name="monthid" class="form-control"  required="required" >
    <option value="">--تحديد الشهر--</option>
     <?php

    $qry24= "SELECT * FROM tblmonth ORDER BY id ASC";
    $result24 = $con->query($qry24);
    $num24 = $result24->num_rows;		
    if ($num24 > 0){
    while ($rows24 = $result24->fetch_assoc()){?>
      <option value="<?php echo $rows24['id'];?>" ><?php echo $rows24['namemonth']; ?></option>
      <?php
          }}
        ?>  
         </select>
    </div>   
    </div>

 <button type="submit" name="view" class="btn btn-primary mr-2">عرض</button>
                 
                     
                    </form>
                  </div>

            <?php 
            if(isset($_POST['view'])){
                $class=$_POST['classid'];
                $year=$_POST['yearid'];
                $section=$_POST['sectionid'];
                $month=$_POST['monthid'];
            
                $query12 = "SELECT schoolyear.id,sectionyear.sectionname,sectionyear.id as id,schoolyear.id,schoolyear.secid,schoolyear.yearschool,schoolyear.endyear
                FROM schoolyear
               INNER JOIN sectionyear ON sectionyear.id = schoolyear.secid
               where  schoolyear.id='$year' and schoolyear.secid='$section'";
               $rs12 = $con->query($query12);
               $num12 = $rs12->num_rows;
            
               if($num12 > 0)
               { 
                echo   $rows12['yearschool'];
                         echo  $rows12['endyear'];
                         echo  $rows12['sectionname'];
                   } 

                   $query1 = "SELECT * FROM tblmonth";
                   $rs1 = $con->query($query1);
                   $num1 = $rs1->num_rows;
                   $sn=0;
                   if($num1 > 0)
                   { 
                    echo $rows1['namemonth'];
                     
                       
                   }


            ?>
                          <!-- Container Fluid-->
      
         
              <!-- Form Basic -->


              <!-- Input Group -->
        <form action="" enctype="multipart/form-data" method="POST">
            <div class="row">
              <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">جميع طلاب </h6>
                  <h6 class="m-0 font-weight-bold text-danger"> :ملاحظة  <i>  </i></h6>
                </div>
                <div class="table-responsive p-3">
                <?php echo $statusMsg; ?>
                  <table class="table align-items-center table-flush table-hover">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>اسم الطالب</th>
                        <th>الصف</th>
                        <th>العام الدراسي</th>
                        <th>الفصل الدراسي </th>
                        <th>الشهر</th>
                        <th>عدد ايام الحضور</th>
                        <th>عدد ايام الغياب</th>
                        <th>عدد ايام الاجازة</th>
                      </tr>
                    </thead>
                    
                    <tbody>

                  <?php
                      $query = "SELECT students.id,tlclass.nameclass,tlclass.section,tlclass.id AS id,students.id,students.name,
                      students.sex,students.addmissiondate,students.address,students.classid,students.Username,students.password
                       FROM students
                       INNER JOIN tlclass ON tlclass.id = students.classid
                       INNER JOIN Parent ON Parent.id = students.parentid
                      where students.classid = '$class'";
                      $rs = $conn->query($query);
                      $num = $rs->num_rows;
                      $sn=0;
                      $status="";
                      if($num > 0)
                      { 
                        while ($rows = $rs->fetch_assoc())
                          {
                             $sn = $sn + 1;
                            echo"
                              <tr>
                                <td>".$sn."</td>
                                <td>".$rows['name']."</td>
                                <td>".$rows['nameclass'].'  '.'-'.'  '.$rows['section']."</td>
                                <td>".$rows12['yearschool'].'  '.'-'.'  '.$rows12['endyear']."</td>
                                <td>".$rows12['sectionname']."</td>
                                <td>". $rows1['namemonth']."</td>
                                
                                <td><input name='attendnumbers[]' type='number'  class='form-control'></td>
                                <td><input name='absencenumbers[]' type='number' class='form-control'></td>
                                <td><input name='vacationnumbers[]' type='number' class='form-control'></td>
                              </tr>";
                              echo "<input name='idstudint[]' value=".$rows['id']." type='hidden' class='form-control'>";
                              echo "<input name='idclass[]' value=".$rows['classid']." type='hidden' class='form-control'>";
                              echo "<input name='idyear[]' value=".$year." type='hidden' class='form-control'>";
                              echo "<input name='idsection[]' value=".$section." type='hidden' class='form-control'>";
                              echo "<input name='idmonth[]' value=".$month." type='hidden' class='form-control'>";
                          }
                      }
                      else
                      {
                           echo   
                           "<div class='alert alert-danger' role='alert'>
                            لا يوجد بيانات!
                            </div>";
                      }
                      
                      ?>
                    </tbody>
                    <tfoot>
                          <tr>
                        <td colspan="9" align="center"><i class="icon-doc fa fas-print fa-2x" aria-hidden="true" style="cursor:pointer" OnClick="CallPrint(this.value)" ></i></td>
                          </tr>
                        </tfoot>
                  </table>
                  <br>
                  <button type="submit" name="save" class="btn btn-primary">اخذ الحضور</button>
                  </div>
              </div>
            </div>
            </div>
       </form>
       <?php }?>
                  </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         <?php include_once('includes/footer.php');?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/select2/select2.min.js"></script>

    <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/typeahead.js"></script>
    <script src="js/select2.js"></script>
    <!-- End custom js for this page -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
    
 
    <script>

    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
    <script>
            $(function($) {
                $('#example').DataTable();

                $('#example2').DataTable( {
                    "scrollY":        "300px",
                    "scrollCollapse": true,
                    "paging":         false
                } );

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
<?php }?>