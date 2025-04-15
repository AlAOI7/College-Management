<?php require "inc/security.php"; ?>
<link rel="stylesheet" href="css/stylestyle.css" />
 <?php require "nav.php"; ?>
<?php require "sidemenu.php"; ?>
<?php
//------------------------SAVE--------------------------------------------------
$query30 = "SELECT id,max(id) FROM level";
$rs30 = $conn->query($query30);
$num30 = $rs30->num_rows;
 $rowm = $rs30->fetch_assoc();
    
$maxclssid1 = $rowm['max(id)'];
$maxclssid2 = $maxclssid1-1;

//------------------------SAVE--------------------------------------------------

if(isset($_POST['save'])){
$levelnameadd = $_POST['levelname'];
$sectiondd = $_POST['sectionid'];

$query=mysqli_query($conn,"SELECT * from level where levelname='$levelnameadd' and sectionid='$sectiondd' ");
$ret=mysqli_fetch_array($query);


if($ret > 0){ 

    $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>العام موجود مسبقا!</div>";
}

else{
  $query=mysqli_query($conn,"INSERT into level (levelname,sectionid)  value ('$levelnameadd','$sectiondd')");

if ($query) {
 
$number=3;
if( $sectiondd == $number){
$statusMsg = "<div class='alert alert-success'  style='margin-right:700px;'> تم اضافة العام الدراسي للفصل الدراسي الاول بنجاح  </div>";
//عرض نتائج الطلاب من جدول النتائج  للتحقق ممن المواد هل ناجح ام راسب

$query3 = "SELECT studresulte.id,level.id,level.levelname,level.sectionid,course.namecourse,students.id,students.name,students.levelid,
collegyear.id,collegyear.levelname,collegyear.sectionid,sectionyear.id,sectionyear.sectionid,sectionyear.id 
AS id,studresulte.id,studresulte.levelid,studresulte.studid,studresulte.avregtotal,studresulte.id
FROM studresulte
INNER JOIN level ON level.id = studresulte.levelid
INNER JOIN course ON course.id = studresulte.courseid
INNER JOIN students ON students.id = studresulte.studid
INNER JOIN collegyear ON collegyear.id = studresulte.levelname
INNER JOIN sectionyear ON sectionyear.id = studresulte.sectionid
where studresulte.levelid < '$maxclssid2' studresulte.avregtotal <50";
      
     $rs3 = $conn->query($query3);
     $num3 = $rs3->num_rows;
     $sn=0;
 
     if($num3 > 0)
     { 
       while ($rows3 = $rs3->fetch_assoc())
         {
            $sn = $sn + 1;
            $sstudid=$rows3['studid'];
            $query5 = mysqli_query($conn,"DELETE FROM studresulte WHERE studid='$sstudid'");
     
     }}
     $query9 = "SELECT studresulte.id,level.id,level.levelname,level.sectionid,course.namecourse,students.id,students.name,students.levelid,
     collegyear.id,collegyear.levelname,collegyear.sectionid,sectionyear.id,sectionyear.sectionid,sectionyear.id 
     AS id,studresulte.id,studresulte.levelid,studresulte.studid,studresulte.avregtotal,studresulte.id
     FROM studresulte
     INNER JOIN level ON level.id = studresulte.levelid
     INNER JOIN course ON course.id = studresulte.courseid
     INNER JOIN students ON students.id = studresulte.studid
     INNER JOIN collegyear ON collegyear.id = studresulte.levelname
     INNER JOIN sectionyear ON sectionyear.id = studresulte.sectionid
     where studresulte.levelid < '$maxclssid2' and studresulte.avregtotal <=100 and studresulte.avregtotal >=50";
   
  $rs9 = $conn->query($query9);
  $num9 = $rs9->num_rows;

  if($num9 > 0)
  { 
    while ($rows9 = $rs9->fetch_assoc())
      {
       
           $sstudid1=$rows9['studid'];
           $levelids1=$rows9['levelid'];

       $qry11= "SELECT * FROM level where id='$levelids1' ";
       $result11 = $conn->query($qry11);
       $num11 = $result11->num_rows;		
       if ($num11 > 0){
       
         while ($rows11 = $result11->fetch_assoc()){

          $levelidsstud= $rows11['id'];
          $levelidsstud= $levelidsstud +2;
         
          $query21=mysqli_query($conn,"UPDATE students set levelid='$levelidsstud' where id='$sstudid1'");
          $query22 = mysqli_query($conn,"DELETE FROM studresulte WHERE studid='$sstudid1'");
      }}
  }
}



      
  }
  else
  {
    $statusMsg = "<div class='alert alert-success'  style='margin-right:700px;'>  تم اضافة الفصل الدراسي الثاني  بنجاح </div>";
  }


//jhbj
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

      $query=mysqli_query($conn,"SELECT * from level where id ='$id'");
      $row=mysqli_fetch_array($query);

      //------------UPDATE-----------------------------

      if(isset($_POST['update'])){
  
          $tlclasName = $_POST['levelName'];
      $levelection = $_POST['sectionid'];
      
          $query=mysqli_query($conn,"UPDATE level set levelname='$tlclasName',sectionid='$levelection' where id='$id'");

          if ($query) {
              
              echo "<script type = \"text/javascript\">
              window.location = (\"add-level.php\")
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
 
      $query = mysqli_query($conn,"DELETE FROM level WHERE id='$id'");

      if ($query == TRUE) {

              echo "<script type = \"text/javascript\">
              window.location = (\"add-level.php\")
              </script>";  
      }
      else{

          $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>لم يتم الحذف!</div>"; 
       }
    
}


?>

<div class="page-wrapper">
           <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                          <div class="main-panel">
                            <div class="content-wrapper">
                              <div class="page-header">
                                <h3 class="page-title"> ادارة المستويات </h3>
                                <nav aria-label="breadcrumb">
                                  <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">الرئيسية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> اضافة  مستوى </li>
                                  </ol>
                                </nav>
                              </div>
                              <div class="row">
                            
                                <div class="col-12 grid-margin stretch-card">
                                  <div class="card">
                                    <div class="card-body">
                                      <h4 class="card-title" style="text-align: center;"> اضافة مستوى </h4>
                                      <!-- <?php echo $statusMsg; ?> -->
                                      <form class="forms-sample" action="" enctype="multipart/form-data" method="POST" >
                                        
                                
                                      <div class="form-group  row mb-3">
                                      <div class="col-xl-6">
                                
                                          <label for="exampleInputName1"> اسم المستوى</label>
                                          <input id="stuName" type="text" class="form-control"  name="levelname" >
                                        </div>
                                        
                                        <div class="col-xl-6">
                                                   <label for="exampleInputEmail3"> الفصل الدراسي</label>
                                                    <select  name="sectionid" class="form-control" required="required" >

                                                    <?php

                                                    $qry1= "SELECT * FROM sectionyear ORDER BY id ASC";
                                                    $result1 = $conn->query($qry1);
                                                    $num1 = $result1->num_rows;		
                                                    if ($num1 > 0){

                                                    
                                                        while ($rows1 = $result1->fetch_assoc()){?>
                                                        <option value="<?php echo $rows1['id'];?>" ><?php echo $rows1['sectionname']; ?></option>
                                                        <?php
                                                            }
                                                            
                                                            }
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
                                    <!-- Input Group -->
                              <div class="row">
                                  <div class="col-lg-12">
                                    <div class="card mb-4">
                                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">جميع المستوبات</h6>
                                
                                      </div>
                                      <div class="table-responsive p-3">
                                          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                                    <thead class="thead-light">
                                                          <tr>
                                                        
                                                            <th class="font-weight-bold">#</th>
                                                            <th class="font-weight-bold">اسم المستوى</th>
                                                            <th class="font-weight-bold">الفصل الدراسي</th>
                                                            <th class="font-weight-bold"> عمليات </th>
                                                          
                                                            
                                                          </tr>
                                                        </thead>
                                                    
                                                        
                                                        <tbody>
                                                        <?php
                                                
                                                
                                                $query12 = "SELECT level.id,sectionyear.sectionname,sectionyear.id 
                                                as id,level.id,level.sectionid,level.levelname,level.id
                                                FROM level
                                                INNER JOIN sectionyear ON sectionyear.id = level.sectionid";
                                
                                                    $rs12 = $conn->query($query12);
                                                    $num12 = $rs12->num_rows;
                                                    $sn=0;
                                                    if($num12 > 0)
                                                    { 
                                                        while ($rows12 = $rs12->fetch_assoc())
                                                        {
                                                            $sn = $sn + 1;
                                                            echo"
                                                            <tr>
                                                                <td>".$sn."</td>
                                                                <td>".$rows12['levelname']."</td>
                                                                <td>".$rows12['sectionname']."</td>
                                                              <td width='170'> 
                                                              
                                                                <a class='btn btn-primary' href='?action=edit&id=".$rows12['id']."'>edit</a> 
                                                                  <a class='btn btn-danger' href='?action=delete&id=".$rows12['id']."'>Delete</a> 
                                                              
                                                              </td>
                                                                </tr>";
                                                        }
                                                    }
                                                    else
                                                    {
                                                        echo   
                                                        "<div class='alert alert-danger' role='alert'>
                                                            لايوجد بيانات!
                                                            </div>";
                                                    }
                                                    
                                                      
                                                    ?>
                                                        </tbody>
                                                        <tfoot>
                                                          <tr>
                                                
                                                      
                                                        <td colspan="5" align="center"><i class="icon-printer fa fas-print fa-2x" aria-hidden="true" style="cursor:pointer" OnClick="CallPrint(this.value)" ></i></td>
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
                      </div>
                      </div>
                    
    <?php require "footer.php"; ?>