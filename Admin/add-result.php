<!---------------- Session starts form here ----------------------->
<?php
session_start();
error_reporting(0);
require "inc/security.php"; ?>
<!---------------- Session Ends form here ------------------------>
<link rel="stylesheet" href="css/stylestyle.css" />
<?php require "nav.php" ; ?>
<?php require "sidemenu.php" ; ?>

<?php 

    //------------------------SAVE--------------------------------------------------
      
      if(isset($_POST['save'])){
        $marks=array();
        $resultlevelida = $_POST['resultlevelid'];
        $resultecoursa = $_POST['resultecours'];
        $resultstudida = $_POST['resultstudid'];
        $resultavga =  $_POST['resultexcutend'] ;
        $yearidd = $_POST['yearsid'];
        $sectioniddd = $_POST['sectionid'];
        $mark=$_POST['marks'];
        $query=mysqli_query($conn,"SELECT * from studresulte WHERE levelid='$resultlevelida' and studid='$resultstudida' and yearid='$yearidd' and secid='$sectioniddd' ");
        $ret=mysqli_fetch_array($query);
        if($ret > 0){ 
            $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>تم اضافة النتيجة مسبقا!</div>";
        }
        else{
            $query1 ="SELECT levelcourse.id,level.id,level.levelname,level.section,course.id,course.namecourse,course.id 
            FROM levelcourse
            INNER JOIN level ON level.id = levelcourse.levelid
            INNER JOIN course ON course.id = levelcourse.coursid
            where levelcourse.levelid='$resultlevelida' ";
            $rs1 = $conn->query($query1);
            $num1 = $rs1->num_rows;
            $sid1=array();
              while ($rows1 = $rs1->fetch_assoc())
                {
                  array_push($sid1,$rows1['id']);
                }
          for($i=0;$i<count($mark);$i++){
            $mar=$mark[$i];
            $sid=$sid1[$i];
              $query=mysqli_query($conn,"INSERT into studresulte (levelid,courseid,studid,avregtotal,yearid,secid)  
              value('$resultlevelida','$sid','$resultstudida','$mar','$yearidd','$sectioniddd')");
                $query=mysqli_query($conn,"INSERT into tblresulte (levelid,courseid,studid,avregtotal,yearid,secid)  
                value('$resultlevelida','$sid','$resultstudida','$mar','$yearidd','$sectioniddd')");
        if ($query) {
          echo "<script> alert('New add-result added...!!!') </script>";
          echo "<script> location = 'add-result.php' </script>";
                              $statusMsg = "<div class='alert alert-success'  style='margin-right:700px;'>تم الاضافة بنجاح</div>";
                    }
                    else
                    {
                      echo "<script> alert('New add-result added...!!!') </script>";
          echo "<script> location = 'add-result.php' </script>";
                        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;' >! لم تتم الاضافة هناك خطاء</div>";
                    }
          }
      
        }
      }
      
      //--------------------EDIT------------------------------------------------------------
      
      if (isset($_GET['studid']) && isset($_GET['action']) && $_GET['action'] == "edit")
      {
            $id= $_GET['studid'];
            $clas=$_GET['levelid'];
            $years=$_GET['yearid'];
            $sect=$_GET['secid'];
            $query=mysqli_query($conn,"SELECT studresulte.id,level.id,level.levelname,level.section,course.namecourse,students.id,students.name,students.levelid,
            collegyear.id,collegyear.yearcolleg,collegyear.endyear,sectionyear.id,sectionyear.sectionname,sectionyear.id AS id,studresulte.id,studresulte.levelid,studresulte.studid,studresulte.avregtotal
            FROM studresulte
            INNER JOIN level ON level.id = studresulte.levelid
            INNER JOIN course ON course.id = studresulte.courseid
            INNER JOIN students ON students.id = studresulte.studid
            INNER JOIN collegyear ON collegyear.id = studresulte.yearid
            INNER JOIN sectionyear ON sectionyear.id = studresulte.secid
            where studresulte.studid ='$id' and studresulte.levelid='$clas' and studresulte.yearid='$years' and studresulte.secid='$sect'");
            $row=mysqli_fetch_array($query);
      
            //------------UPDATE-----------------------------
      
            if(isset($_POST['update'])){
              $rowid=$_POST['id'];
              $marks=$_POST['marks']; 
              foreach($_POST['id'] as $count => $id){
                $mrks=$marks[$count];
                $iid=$rowid[$count];
                for($i=0;$i<=$count;$i++) {
      $query=mysqli_query($conn,"UPDATE studresulte set avregtotal='$mrks' where id='$iid' and levelid='$clas' and yearid='$years' and secid='$sect' ");
      $query2=mysqli_query($conn,"UPDATE tblresulte set avregtotal='$mrks' where id='$iid' and levelid='$clas' and yearid='$years' and secid='$sect'");
      
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
            $id= $_GET['studid'];
            $clas=$_GET['levelid'];
            $years=$_GET['yearid'];
            $sect=$_GET['secid'];
            $query7 = mysqli_query($conn,"DELETE FROM studresulte WHERE studid='$id' and levelid='$clas' and yearid='$years' and secid='$sect'");
            $query = mysqli_query($conn,"DELETE FROM tblresulte WHERE studid='$id'and levelid='$clas' and yearid='$years' and secid='$sect'");
      
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

<script>
function getStudent(val) {
    $.ajax({
        type: "POST",
        url: "get_cours.php",
        data: 'levelid=' + val,
        success: function(data) {
            $("#coursid").html(data);

        }
    });
    $.ajax({
        type: "POST",
        url: "get_cours.php",
        data: 'levelid1=' + val,
        success: function(data) {
            $("#studentid").html(data);

        }
    });
}
</script>

<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> ادارة النتائج </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">الرئيسية</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> اضافة نتيجة الطلاب </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">

                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <?php
                   $yearcollegadd = date('Y');
                   $endyearadd = date('Y')+1;
                $query12 = "SELECT * FROM collegyear where yearcolleg='$yearcollegadd' and endyear='$endyearadd'";
                $rs12 = $conn->query($query12);
                $num12 = $rs12->num_rows;
                $sn=0;
                if($num12 > 0)
                { 
                  while ($rows12 = $rs12->fetch_assoc())
                    {
                       $sn = $sn + 1;
                 ?>

                                    <h4 class="card-title" style="text-align: center;"> اضافة نتائج الطلاب للعام الدراسي
                                        <?php   echo $rows12['yearcolleg'].'-'.$rows12['endyear'];?> </h4>
                                    <?php  
                  } } 
                   echo $statusMsg; 
                  $query30 = "SELECT id,max(id) FROM level";
                  $rs30 = $conn->query($query30);
                  $num30 = $rs30->num_rows;
                    $rowm = $rs30->fetch_assoc();
                      
                    $maxclssid1 = $rowm['max(id)'];
                    $maxclssid2 = $maxclssid1-1;

                    if (isset($id))
                                  {
                                  ?>
                                    <form class="forms-sample" action="" enctype="multipart/form-data" method="POST">
                                        <div class="form-group  row mb-3">
                                            <label for="default" class="col-sm-2 control-label"> العام الدراسي </label>
                                            <div class="col-xl-10">
                                                <?php   echo $row['yearcolleg'].'  '.'-'.'  '.$row['endyear'];?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group  row mb-3">
                                            <label for="default" class="col-sm-2 control-label"> الفصل الدراسي</label>
                                            <div class="col-xl-10">
                                                <?php echo $row['sectionname']; ?>
                                            </div>
                                        </div>
                                        <div class="form-group  row mb-3">
                                            <label for="default" class="col-sm-2 control-label">المستوى</label>
                                            <div class="col-xl-10">
                                                <?php echo $row['levelname'].'  '.'-'.'  '.$row['section']; ?>
                                            </div>
                                        </div>
                                        <div class="form-group  row mb-3">
                                            <label for="default" class="col-sm-2 control-label">الطلاب</label>
                                            <div class="col-xl-10">
                                                <?php echo $row['studentName']; ?>
                                            </div>
                                        </div>
                                        <?php
                    
                            $query11 = "SELECT studresulte.id,level.id,level.levelname,level.section,course.namecourse,students.id,students.studentName,students.levelid,
                            collegyear.id,collegyear.yearcolleg,collegyear.endyear,sectionyear.id,sectionyear.sectionname,sectionyear.id AS id,studresulte.id,studresulte.levelid,studresulte.studid,studresulte.avregtotal
                            FROM studresulte
                            INNER JOIN level ON level.id = studresulte.levelid
                            INNER JOIN course ON course.id = studresulte.courseid
                            INNER JOIN students ON students.id = studresulte.studid
                            INNER JOIN collegyear ON collegyear.id = studresulte.yearid
                            INNER JOIN sectionyear ON sectionyear.id = studresulte.secid
                            where studresulte.studid ='$id' and studresulte.levelid='$clas' and studresulte.yearid='$years' and studresulte.secid='$sect'";
                          
                              $rs11 = $conn->query($query11);
                              $num11 = $rs11->num_rows;
                                while ($rows11 = $rs11->fetch_assoc())
                                  {?>
                                        <div class="form-group  row mb-3">
                                            <label for="default" class="col-sm-2 control-label">
                                                <?php echo $rows11['namecourse']; ?></label>
                                            <div class="col-xl-10">
                                                <input type="hidden" name="id[]" value="<?php echo $rows11['id']; ?>">
                                                <input type="text" name="marks[]" class="form-control" id="marks"
                                                    value="<?php echo $rows11['avregtotal'];?>" maxlength="5"
                                                    required="" placeholder="ادخل الدرجه من 100" autocomplete="off">
                                            </div>
                                        </div>
                                        <?php 
                                  }?>
                                        <button type="submit" name="update" class="btn btn-primary mr-2">تعديل</button>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                    </form>

                                    <?php   } else {          ?>
                                    <form class="forms-sample" action="add-result.php" enctype="multipart/form-data"
                                        method="POST">
                                        <div class="form-group  row mb-3">
                                            <!-- العام الدراسي -->
                                            <div class="col-xl-6">
                                                <label for="exampleInputName1"> العام الدراسي </label>
                                                <select name="yearsid" class="form-control" required="required">
                                                    <?php
                                    $qry1= "SELECT * FROM collegyear ORDER BY id desc";
                                    $result1 = $conn->query($qry1);
                                    $num1 = $result1->num_rows;		
                                    if ($num1 > 0){
                                    while ($rows1 = $result1->fetch_assoc()){?>
                                                    <option value="<?php echo $rows1['id'];?>">
                                                        <?php   echo $rows1['yearcolleg'].'  '.'-'.'  '.$rows1['endyear'];?>
                                                    </option>
                                                    <?php
                                        } }
                                      ?>
                                                </select>
                                            </div>
                                            <!-- الفصل  -->
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
                                                    <?php
                                          }  
                                          }
                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group  row mb-3">
                                            <!-- المستوى -->
                                            <div class="col-xl-6">
                                                <label for="exampleInputEmail3">المستواى</label>
                                                <select name="resultlevelid" class="form-control"
                                                    onChange="getStudent(this.value);" required="required">
                                                    <option value="">--تحديد المستواى--</option>
                                                    <?php
                                          $qry1= "SELECT * FROM level where id < '$maxclssid2' ORDER BY id ASC";
                                          $result1 = $conn->query($qry1);
                                          $num1 = $result1->num_rows;		
                                          if ($num1 > 0){
                                            while ($rows1 = $result1->fetch_assoc()){?>
                                                    <option value="<?php echo $rows1['id'];?>">
                                                        <?php echo $rows1['levelname'].'  '.'-'.'  '.$rows1['section']; ?>
                                                    </option>
                                                    <?php
                                                }}
                                              ?>
                                                </select>
                                            </div>
                                            <!-- الطلاب         -->
                                            <div class="col-xl-6">
                                                <label for="exampleInputEmail3">الطلاب</label>
                                                <select required name="resultstudid" id="studentid"
                                                    class="form-control">
                                                </select>
                                            </div>

                                        </div>
                                        <!-- المواد -->
                                        <div class="form-group  row mb-3">
                                            <label for="exampleInputEmail3">المواد</label>
                                            <div class="col-xl-6">
                                                <div id="coursid">

                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="save" class="btn btn-primary mr-2">اضافة</button>
                                    </form>
                                    <?php   }        ?>

                                </div>





                                <!-- Input Group -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card mb-4">
                                            <div
                                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text-primary">جميع الطلاب</h6>

                                            </div>
                                            <div class="table-responsive p-3">
                                                <table class="table align-items-center table-flush table-hover"
                                                    id="dataTableHover">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th class="font-weight-bold">#</th>
                                                            <th class="font-weight-bold">اسم الطالب</th>
                                                            <th class="font-weight-bold">الفصل</th>
                                                            <th class="font-weight-bold">المادة</th>
                                                            <th class="font-weight-bold">الدرجة النهائي</th>
                                                            <th class="font-weight-bold">الحالة </th>
                                                            <th class="font-weight-bold">العام الدراسي </th>
                                                            <th class="font-weight-bold">الفصل الدراسي </th>
                                                            <th class="font-weight-bold">تعديل </th>
                                                            <th class="font-weight-bold">حذف </th>
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

                              $query3 = "SELECT studresulte.id,level.id,level.levelname,level.section,course.namecourse,students.id,students.studentName,students.levelid,
                              collegyear.id,collegyear.yearcolleg,collegyear.endyear,sectionyear.id,sectionyear.sectionname,sectionyear.id 
                              AS id,studresulte.id,studresulte.levelid,studresulte.studid,studresulte.yearid,studresulte.secid,studresulte.avregtotal
                              FROM studresulte
                              INNER JOIN level ON level.id = studresulte.levelid
                              INNER JOIN course ON course.id = studresulte.courseid
                              INNER JOIN students ON students.id = studresulte.studid
                              INNER JOIN collegyear ON collegyear.id = studresulte.yearid
                              INNER JOIN sectionyear ON sectionyear.id = studresulte.secid";
                            
                            $rs3 = $conn->query($query3);
                            $num3 = $rs3->num_rows;
                            $sn=0;
                            if($num3 > 0)
                            { 
                              while ($rows3 = $rs3->fetch_assoc())
                                {
                                  if(  $rows3['avregtotal']<50){
                                    $statee="راسب"; 
                                  $sn = $sn + 1;
                                  echo"
                                    <tr>
                              
                                      <td>".$sn."</td>
                                      <td>".$rows3['studentName']."</td>
                                      <td>".$rows3['levelname'].'  '.'-'.'  '.$rows3['section']."</td>
                                      <td>".$rows3['namecourse']."</td>
                                      <td>".$rows3['avregtotal']."</td>
                                      <td>". $statee."</td>
                                      <td>".$rows3['yearcolleg'].'  '.'-'.'  '.$rows3['endyear']."</td>
                                      <td>".$rows3['sectionname']."</td>
                                    
                                      <td><a href='add-result.php?action=edit&studid=".$rows3['studid']."&levelid=".$rows3['levelid']."&yearid=".$rows3['yearid']."&secid=".$rows3['secid']."'><i class='fa fa-eye'></i></a></td>
                                      <td><a href='add-result.php?action=delete&studid=".$rows3['studid']."&levelid=".$rows3['levelid']."&yearid=".$rows3['yearid']."&secid=".$rows3['secid']."'> <i class='fa fa-trash'></i></a></td>
                                    </tr>";
                                }
                              else{
                                $statee="ناجح"; 
                                $sn = $sn + 1;
                              echo"
                                <tr>
                            
                                <td>".$sn."</td>
                                <td>".$rows3['studentName']."</td>
                                <td>".$rows3['levelname'].'  '.'-'.'  '.$rows3['section']."</td>
                                <td>".$rows3['namecourse']."</td>
                                <td>".$rows3['avregtotal']."</td>
                                <td>". $statee."</td>
                                <td>".$rows3['yearcolleg'].'  '.'-'.'  '.$rows3['endyear']."</td>
                                <td>".$rows3['sectionname']."</td>
                                  
                                  <td><a href='add-result.php?action=edit&studid=".$rows3['studid']."&levelid=".$rows3['levelid']."&yearid=".$rows3['yearid']."&secid=".$rows3['secid']."'><i class='fa fa-eye'></i></a></td>
                                  <td><a href='add-result.php?action=delete&studid=".$rows3['studid']."&levelid=".$rows3['levelid']."&yearid=".$rows3['yearid']."&secid=".$rows3['secid']."'> <i class='fa fa-trash'></i></a></td>
                                  
                                </tr>";

                              }
                              
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



                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
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