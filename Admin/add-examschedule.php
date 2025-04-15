<!---------------- Session starts form here ----------------------->
<?php require "inc/security.php"; ?>
<!---------------- Session Ends form here ------------------------>
<link rel="stylesheet" href="css/stylestyle.css" />
<?php require "nav.php" ; ?>
<?php require "sidemenu.php" ; ?>



<?php
if(isset($_POST['save'])){
  
  $examsexamdate = $_POST['examscheduleexamdate'];
  $examexamtime = $_POST['examscheduletime'];
  $examcourseid = $_POST['examschedulecourseid'];
  $examslevelid = $_POST['examschedulelevelid'];
  $yearidd = $_POST['yearidd'];
  $Lecturesdayes = $_POST['Lecturesday'];

  $query2=mysqli_query($conn,"SELECT * from examsch edule WHERE levelid='$examslevelid' and courseid='$examcourseid' and yearid='$yearidd'  and dayeid='$Lecturesdayes'");
  $ret=mysqli_fetch_array($query2);
 
  if($ret > 0){ 

      $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>! تم اضافة موعد اختبار المادة مسبقاً</div>";
  }
  else{

      $query=mysqli_query($conn,"INSERT into examschedule (examdate,time,courseid,levelid,yearid,dayeid)  
      value('$examsexamdate','$examexamtime','$examcourseid','$examslevelid','$yearidd','$Lecturesdayes')");

  if ($query) {
      
      $statusMsg = "<div class='alert alert-success'  style='margin-right:700px;'>تم الاضافة بنجاح</div>";
  }
  else
  {
       $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>لم تتم الاضافة هناك خطاء!</div>";
  }
}}


//---------------------------------------EDIT-------------------------------------------------------------

 
//--------------------EDIT------------------------------------------------------------

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
              window.location = (\"add-examschedule.php\")
              </script>";  
      }
      else{

          $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>لم يتم الحذف!</div>"; 
       }
    
}


?>


<script>
function getStudent(val) {
    $.ajax({
        type: "POST",
        url: "get_courslacture.php",
        data: 'levelid=' + val,
        success: function(data) {
            $("#coursid").html(data);

        }
    });

}
</script>


<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
    <div class="sub-main">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> ادارة الاختبارات </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> اضافة جدول اختبار </li>
                    </ol>
                </nav>
            </div>
            <div class="row">

                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title" style="text-align: center;"> اضافة جدول اختبار </h4>

                            <!-- <?php echo $statusMsg; ?> -->
                            <form class="forms-sample" action="" enctype="multipart/form-data" method="POST">
                                <div class="form-group  row mb-3">

                                    <div class="col-xl-6">
                                        <label for="exampleInputEmail3"> العام الدراسي</label>
                                        <select name="yearidd" class="form-control" required="required">
                                            <?php
                                                    
                                                                    $qry20= "SELECT * FROM collegyear ORDER BY id desc";
                                                                    $result20 = $conn->query($qry20);
                                                                    $num20 = $result20->num_rows;		
                                                                    if ($num20 > 0){
                                                                    while ($rows20 = $result20->fetch_assoc()){?>
                                            <option value="<?php echo $rows20['id'];?>">
                                                <?php echo $rows20['yearcolleg'].'  '.'-'.'  '.$rows20['endyear'];?>
                                            </option>
                                            <?php
                                                                        }}
                                                                        ?>
                                        </select>
                                    </div>

                                    <div class="col-xl-6">
                                        <label for="exampleInputEmail3"> الفصل الدراسي</label>
                                        <select name="sectionid" class="form-control" required="required">

                                            <?php
                                        $qry1= "SELECT * FROM sectionyear ORDER BY id ASC";
                                        $result1 = $conn->query($qry1);
                                        $num1 = $result1->num_rows;		
                                        if ($num1 > 0){
                                            while ($rows1 = $result1->fetch_assoc()){?>
                                            <option value="<?php echo $rows1['id'];?>">
                                                <?php echo $rows1['sectionname']; ?></option>
                                            <?php   }   }  ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group  row mb-3">
                                    <div class="col-xl-6">
                                        <label for="exampleInputEmail3">المستوى</label>
                                        <select required name="examschedulelevelid" id="levelid" class="form-control"
                                            onChange="getStudent(this.value);">
                                            <option value="">--تحديد المستوى--</option>
                                            <?php
                                            $qry1= "SELECT * FROM level ORDER BY id ASC";
                                            $result1 = $conn->query($qry1);
                                            $num1 = $result1->num_rows;		
                                            if ($num1 > 0){
                                        
                                            
                                            while ($rows1 = $result1->fetch_assoc()){?>
                                            <option value="<?php echo $rows1['id'];?>">
                                                <?php echo $rows1['levelname'].'  '.'-'.'  '.$rows1['section']; ?>
                                            </option>
                                            <?php
                                                }
                                                    
                                                }
                                                ?>
                                        </select>
                                    </div>

                                    <div class="col-xl-6">
                                        <label for="exampleInputEmail3">المادة</label>
                                        <select name="examschedulecourseid" class="form-control"
                                            onChange="getStudent(this.value);" required="required">
                                            <option value="">--تحديد مادة--</option>
                                            <?php

                                                $qry1= "SELECT * FROM course ORDER BY id ASC";
                                                $result1 = $conn->query($qry1);
                                                $num1 = $result1->num_rows;		
                                                if ($num1 > 0){ while ($rows1 = $result1->fetch_assoc()){?>
                                            <option value="<?php echo $rows1['id'];?>">
                                                <?php echo $rows1['namecourse']; ?></option>
                                            <?php
                                                        }
                                                        
                                            }
                                                    ?>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group  row mb-3">

                                    <div class="col-xl-6">
                                        <label for="exampleInputName1"> تاريخ الاختبار</label>

                                        <input id="stuDOB" type="date" class="form-control" name="examscheduleexamdate"
                                            value="<?php echo $row['examdate']; ?>" placeholder="Enter DOB(yyyy-mm-dd)">
                                    </div>

                                    <div class="col-xl-6">
                                        <label for="exampleInputName1"> وقت الاختبار </label>
                                        <input id="stuPhone" type="text" class="form-control" value=""
                                            name="examscheduletime">
                                    </div>
                                </div>
                                <div class="form-group  row mb-3">
                                    <div class="col-xl-6">
                                        <label for="exampleInputEmail3">اليوم</label>
                                        <select name="Lecturesday" class="form-control" required="required">
                                            <option value="">--تحديد اليوم--</option>
                                            <?php

                                        $qry1= "SELECT * FROM tbldayes ORDER BY id ASC";
                                        $result1 = $conn->query($qry1);
                                        $num1 = $result1->num_rows;		
                                        if ($num1 > 0){
                                    
                                        
                                        while ($rows1 = $result1->fetch_assoc()){?>
                                            <option value="<?php echo $rows1['id'];?>">
                                                <?php echo $rows1['namedayes']; ?></option>
                                            <?php
                                            }}
                                            ?>
                                        </select>
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
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary"> جميع جداول الاختبارات</h6>

                                    </div>
                                    <div class="table-responsive p-3">
                                        <table class="table align-items-center table-flush table-hover"
                                            id="dataTableHover">
                                            <thead class="thead-light">

                                                <tr>
                                                    <th class="font-weight-bold">#</th>
                                                    <th class="font-weight-bold">الفصل</th>
                                                    <th class="font-weight-bold">المادة</th>
                                                    <th class="font-weight-bold">اليوم</th>
                                                    <th class="font-weight-bold">العام الدراسي </th>
                                                    <th class="font-weight-bold">الفصل الدراسي </th>
                                                    <th class="font-weight-bold">تاريخ الاختبار</th>
                                                    <th class="font-weight-bold"> وقت الاختبار </th>
                                                    <th class="font-weight-bold">تعديل</th>
                                                    <th class="font-weight-bold">حذف</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                

                                            $query30 = "SELECT id,max(id) FROM level";
                                            $rs30 = $conn->query($query30);
                                            $num30 = $rs30->num_rows;
                                            $rowm = $rs30->fetch_assoc();
                                                
                                        $maxclssid1=$rowm['max(id)'];
                                        $maxclssid2=$rowm['max(id)']-2;

                              
                                        $query = "SELECT examschedule.id,level.levelname,level.section,level.id,course.namecourse,tbldayes.id,tbldayes.namedayes,
                                        collegyear.id,collegyear.yearcolleg,collegyear.endyear,sectionyear.id,sectionyear.sectionname,sectionyear.id 
                                        AS id,examschedule.id,examschedule.examdate,examschedule.time,examschedule.levelid,examschedule.courseid,examschedule.dayeid,examschedule.secid
                                        FROM examschedule
                                        INNER JOIN level ON level.id = examschedule.levelid
                                        INNER JOIN course ON course.id = examschedule.courseid
                                        INNER JOIN tbldayes ON tbldayes.id = examschedule.dayeid
                                        INNER JOIN collegyear ON collegyear.id = examschedule.yearid
                                        INNER JOIN sectionyear ON sectionyear.id = examschedule.secid";
                                    
                                    $rs = $conn->query($query);
                                    $num = $rs->num_rows;
                                    $sn=0;
                                  
                                        while ($rows = $rs->fetch_assoc())
                                        {
                                            $sn = $sn + 1;
                                            echo"
                                            <tr>
                                                <td>".$sn."</td>
                                                <td>".$rows['levelname'].'  '.'-'.'  '.$rows['section']."</td>
                                                <td>".$rows['namecourse']."</td>
                                                <td>".$rows['namedayes']."</td>
                                                <td>".$rows['yearcolleg']."</td>
                                                <td>".$rows['sectionname']."</td>
                                                <td>".$rows['examdate']."</td>
                                                <td>".$rows['time']."</td>
                                        
                                                <td><a href='?action=edit&id=".$rows['id']."'><i class='fa fa-eye'></i></a></td>
                                                <td><a href='?action=delete&id=".$rows['id']."'> <i class='fa fa-trash'></i></a></td>
                                            </tr>";
                                        }
                                    
                               
                                    ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="10" align="center"><i
                                                            class="icon-printer fa fas-print fa-2x" aria-hidden="true"
                                                            style="cursor:pointer" OnClick="CallPrint(this.value)"></i>
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
        </div>

    </div>
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