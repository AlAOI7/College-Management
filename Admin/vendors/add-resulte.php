

<?php
session_start();
error_reporting(0);
include('includes/mysqlcon.php');



//------------------------SAVE--------------------------------------------------

if(isset($_POST['save'])){
  
  $resultclassida = $_POST['resultclassid'];
  $resultecoursa = $_POST['resultecours'];
  $resultstudida = $_POST['resultstudid'];
  $resultmonthonea = $_POST['resultmonthone'];
  $resultemontheseca = $_POST['resultemonthesec'];
  $resultemonththrea = $_POST['resultemonththre'];
  $resultexcutenda = $_POST['resultexcutend'];
  
  $resultavga = $_POST['resultmonthone'] +  $_POST['resultemonthesec'] + $_POST['resultemonththre'] +  $_POST['resultexcutend'] ;
  $resultyear = $_POST['yearid'];
if ($resultavga<=100){


  $query=mysqli_query($con,"SELECT * from resultestudasase WHERE classid='$resultclassida' and courseid='$resultecoursa' and studid='$resultstudida' ");
  $ret=mysqli_fetch_array($query);

  if($ret > 0){ 

      $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>! تم اضافة النتيجة مسبقاً</div>";
  }
  else{
    
    $query1=mysqli_query($con,"INSERT into tblresultestudasase (classid,courseid,studid,month1,month2,month3,excutend,avgtotal,yearid)  
    value('$resultclassida','$resultecoursa','$resultstudida','$resultmonthonea','$resultemontheseca','$resultemonththrea','$resultexcutenda','$resultavga','$resultyear')");
      $query=mysqli_query($con,"INSERT into resultestudasase (classid,courseid,studid,month1,month2,month3,excutend,avgtotal,yearid)  
      value('$resultclassida','$resultecoursa','$resultstudida','$resultmonthonea','$resultemontheseca','$resultemonththrea','$resultexcutenda','$resultavga','$resultyear')");

  if ($query) {
      
      $statusMsg = "<div class='alert alert-success'  style='margin-right:700px;'>تم الاضافة بنجاح</div>";
  }
  else
  {
       $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;' >! لم تتم الاضافة هناك خطاء</div>";
  }
}}
else {
  $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>المجموع اكبر من 100!</div>";
 
}
}


//---------------------------------------EDIT-------------------------------------------------------------

 
//--------------------EDIT------------------------------------------------------------

if (isset($_GET['studid']) && isset($_GET['action']) && $_GET['action'] == "edit")
{
      $id= $_GET['studid'];

      $query=mysqli_query($con,"select * from resultestudasase where id ='$id'");
      $row=mysqli_fetch_array($query);

      //------------UPDATE-----------------------------

      if(isset($_POST['update'])){
        $resultclassida = $_POST['resultclassid'];
        $resultecoursa = $_POST['resultecours'];
        $resultstudida = $_POST['resultstudid'];
        $resultmonthonea = $_POST['resultmonthone'];

        $resultemontheseca = $_POST['resultemonthesec'];
        $resultemonththrea = $_POST['resultemonththre'];
        $resultexcutenda = $_POST['resultexcutend'];
        $resultavga = $_POST['resultmonthone'] +  $_POST['resultemonthesec'] + $_POST['resultemonththre'] +  $_POST['resultexcutend'] ;
        $resultyear = $_POST['yearid'];
        if ($resultavga<=100){
        

          $query=mysqli_query($con,"update resultestudasase set classid='$resultclassida',courseid='$resultecoursa',studid='$resultstudida',month1='$resultmonthonea',month2='$resultemontheseca',month3='$resultemonththrea',excutend='$resultexcutenda',avgtotal='$resultavga',yearid='$resultyear' where studid='$resultstudida'");
          $query4=mysqli_query($con,"update tblresultestudasase set classid='$resultclassida',courseid='$resultecoursa',studid='$resultstudida',month1='$resultmonthonea',month2='$resultemontheseca',month3='$resultemonththrea',excutend='$resultexcutenda',avgtotal='$resultavga',yearid='$resultyear' where studid='$resultstudida'");

          if ($query) {
              
              echo "<script type = \"text/javascript\">
              window.location = (\"add-resulte.php\")
              </script>"; 
          }
          else
          {
              $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'لم يتم التعديل!</div>";
          }
      }
    }
    else {
      
      $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>المجموع اكبر من 100!</div>";
    } 
  }


//--------------------------------DELETE------------------------------------------------------------------

if (isset($_GET['studid']) && isset($_GET['action']) && $_GET['action'] == "delete")
{
      $id= $_GET['studid'];
     
      $query = mysqli_query($con,"DELETE FROM resultestudasase WHERE studid='$id'");
      $query7 = mysqli_query($con,"DELETE FROM tblresultestudasase WHERE studid='$id'");

      if ($query == TRUE) {

              echo "<script type = \"text/javascript\">
              window.location = (\"add-resulte.php\")
              </script>";  
      }
      else{

          $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>لم يتم الحذف!</div>"; 
       }
    
}


?>

<!DOCTYPE html>
<html lang="">
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
    <script>
function getStudent(val) {
    $.ajax({
    type: "POST",
    url: "get_studentsase.php",
    data:'classid='+val,
    success: function(data){
        $("#coursid").html(data);
        
    }
    });
$.ajax({
        type: "POST",
        url: "get_studentsase.php",
        data:'classid1='+val,
        success: function(data){
            $("#studentid").html(data);
            
        }
        });
}
    </script>
    
  </head>
  <body>
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
              <h3 class="page-title"> اضافة نتائج الطلاب </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">الرئيسية</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> اضافة نتائج الطلاب </li>
                </ol>
              </nav>
            </div>


            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">

                 <?php 
                           $startyear = date('Y');
                           $endyear = date('Y')+1;
              
                 
            $query1 = "SELECT * FROM schoolyear where yearschool='$startyear' and endyear='$endyear'";
            $rs2 = $con->query($query1);
            $num2 = $rs2->num_rows;
        while ($rows2 = $rs2->fetch_assoc())
                {
                 
                 ?>
                  <div class="card-body">
           
                    <h4 class="card-title" style="text-align: center;">  <?php echo $rows2['yearschool'].'-'.$rows2['endyear']; ?> اضافة نتائج الطلاب للعام الدراسي  </h4>
                   
                    <?php 
           echo $statusMsg; ?>
                    <form class="forms-sample" action="" enctype="multipart/form-data" method="POST" >

                           
               
                    <div class="form-group  row mb-3">
                    <div class="col-xl-6">
    <label for="exampleInputEmail3">العام الدراسي</label>
    <select  name="yearid" class="form-control"  required="required" >
    <option value="">--تحديد العام الدراسي--</option>
    
   
      <option value="<?php echo $rows2['id'];?>" > <?php echo $rows2['yearschool'].'-'.$rows2['endyear']; ?></option>
     
         </select>
    </div>    </div>  

                    <div class="form-group  row mb-3">
                    <div class="col-xl-6">
    <label for="exampleInputEmail3">الفصل</label>
    <select  name="resultclassid" class="form-control" onChange="getStudent(this.value);" required="required" >
    <option value="">--تحديد الفصل--</option>
     <?php

    $qry1= "SELECT * FROM tlclass ORDER BY nameclass ASC";
    $result1 = $con->query($qry1);
    $num1 = $result1->num_rows;		
    if ($num1 > 0){
  
     
      while ($rows1 = $result1->fetch_assoc()){?>
      <option value="<?php echo $rows1['id'];?>" ><?php echo $rows1['nameclass'].'-'.$rows1['section']; ?></option>
      <?php
          }
             
          }
        ?>  
         </select>
    </div>  
                      
    <div class="col-xl-6">
    <label for="exampleInputEmail3">الطلاب</label>
<select required name="resultstudid" id="studentid"  class="form-control">

</select>
 
    </div>

    </div>

 
  <div class="form-group  row mb-3">

    <div class="col-xl-6">

<label for="exampleInputEmail3">المادة</label>
<select required name="resultecours" id="coursid"   class="form-control">

</select>

             </div>
    <div class="col-xl-6">
 
                          <label for="exampleInputName1"> اختبار الشهر الاول</label>
                       
                          <input id="stuDOB"type="number" class="form-control" name="resultmonthone"  value="<?php echo $row['month1']; ?>">
                        </div>
                        
  </div>

  <div class="form-group  row mb-3">
                      
                
                        <div class="col-xl-6">
                          <label for="exampleInputName1">  اختبار الشهر الثاني </label>
                          <input id="stuPhone" type="number" class="form-control" name="resultemonthesec"  value="<?php echo $row['month2']; ?>">
                        </div>
                        <div class="col-xl-6">
                          <label for="exampleInputName1"> اختبار الشهر الثالث</label>
                       
                          <input id="stuDOB"type="number" class="form-control" name="resultemonththre"  value="<?php echo $row['month3']; ?>">
                        </div>
                        
                        </div>

                        <div class="form-group  row mb-3">
                      
                   
                        <div class="col-xl-6">
                          <label for="exampleInputName1">  الاختبار النهائي </label>
                          <input id="stuPhone" type="number" class="form-control" name="resultexcutend"  value="<?php echo $row['excutend']; ?>">
                        </div>
                        <div class="col-xl-6">
                          <label for="exampleInputName1">   المجموع </label>
                          <input id="stuPhone" type="number" class="form-control" name="resultavg"  value="<?php echo $row['avgtotal']; ?>">
                        </div>
                        </div>
  <?php
                    if (isset($id))
                    {
                    ?>
                    <button type="submit" name="update" class="btn btn-primary mr-2">تعديل</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php
                    } else {           
                    ?>
                    <button type="submit" name="save" class="btn btn-primary mr-2">اضافة</button>
                    <?php
                    }         
                    ?>
                     
                    </form>
                    <?php }
       ?>
                  </div>

                  <div class="table-responsive border rounded p-1">


                      <table class="table">
                        <thead>
                          <tr>
                          <th class="font-weight-bold">الرقم</th>
                          <th class="font-weight-bold">الطالب</th>
                        <th class="font-weight-bold">الفصل</th>
                        <th class="font-weight-bold">المادة</th>
                        
                        <th class="font-weight-bold">درجة الشهر الاول</th>
                        <th class="font-weight-bold">درجة الشهر الثاني</th>
                      
                        <th class="font-weight-bold">درجة الشهر الثالث</th>
                        <th class="font-weight-bold">درجة الاختبار النهائي</th>
                        <th class="font-weight-bold">المجموع</th>
                        <th class="font-weight-bold">العام الدراسي</th>
                      
                
                          </tr>
                        </thead>
                        <tbody>
                        <?php
              
                         $query3 = "SELECT resultestudasase.id,tlclass.nameclass,tlclass.section,course.namecourse,studenasase.name,schoolyear.yearschool,schoolyear.endyear,schoolyear.id AS id,
                         resultestudasase.id,resultestudasase.month1,resultestudasase.month2,resultestudasase.month3,resultestudasase.excutend,resultestudasase.avgtotal
                         FROM resultestudasase
                         INNER JOIN tlclass ON tlclass.id = resultestudasase.classid
                         INNER JOIN course ON course.id = resultestudasase.courseid
                         INNER JOIN studenasase ON studenasase.id = resultestudasase.studid
                         INNER JOIN schoolyear ON schoolyear.id = resultestudasase.yearid
                         where tlclass.id = studenasase.classid";
                       
                      $rs3 = $con->query($query3);
                      $num3 = $rs3->num_rows;
                      $sn=0;
                      if($num3 > 0)
                      { 
                        while ($rows3 = $rs3->fetch_assoc())
                          {
                             $sn = $sn + 1;
                            echo"
                              <tr>
                         
                                <td>".$sn."</td>
                                <td>".$rows3['name']."</td>
                                <td>".$rows3['nameclass'].'  '.'-'.'  '.$rows3['section']."</td>
                                <td>".$rows3['namecourse']."</td>
                            
                                <td>".$rows3['month1']."</td>
                                <td>".$rows3['month2']."</td>
                                <td>".$rows3['month3']."</td>
                                <td>".$rows3['excutend']."</td>
                                <td>".$rows3['avgtotal']."</td>
                                <td>".$rows3['yearschool'].'  '.'-'.'  '.$rows3['endyear']."</td>
                                <td><a href='?action=edit&id=".$rows3['id']."'><i class='icon-eye'></i></a></td>
                                <td><a href='?action=delete&id=".$rows3['id']."'> <i class='icon-trash'></i></a></td>
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
                     
                      </table>
                     
                    </div>

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
  </body>
</html>
