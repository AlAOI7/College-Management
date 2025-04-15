<?php require "inc/security.php"; ?>
<link rel="stylesheet" href="css/stylestyle.css" />
 <?php require "nav.php"; ?>
<?php require "sidemenu.php"; ?>

<?php 
    $query30 = "SELECT id,max(id) FROM level";
    $rs30 = $conn->query($query30);
    $num30 = $rs30->num_rows;
     $rowm = $rs30->fetch_assoc();
        
$maxclssid1 = $rowm['max(id)'];
$maxclssid2 = $maxclssid1-1;

//------------------------SAVE--------------------------------------------------

if(isset($_POST['save'])){
    $yearcollegadd = $_POST['yearidd'];
    $sectioniddd = $_POST['sectionid'];
    
    $query=mysqli_query($conn,"SELECT * from yearcollegsection where yearid='$yearcollegadd' and secid='$sectioniddd' ");
    $ret=mysqli_fetch_array($query);

   
    if($ret > 0){ 
  
        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>العام موجود مسبقا!</div>";
    }
    
  else{
      $query=mysqli_query($conn,"INSERT into yearcollegsection (yearid,secid)  value ('$yearcollegadd','$sectioniddd')");

    if ($query) {
     
$number=3;
   if( $sectioniddd == $number){
    $statusMsg = "<div class='alert alert-success'  style='margin-right:700px;'> تم اضافة العام الدراسي للفصل الدراسي الاول بنجاح  </div>";
    //عرض نتائج الطلاب من جدول النتائج  للتحقق ممن المواد هل ناجح ام راسب

    $query3 = "SELECT tblresulte.id,level.id,level.levelname,level.section,course.namecourse,students.id,students.name,students.levelid,
    collegyear.id,collegyear.yearcolleg,collegyear.endyear,sectionyear.id,sectionyear.sectionname,sectionyear.id 
    AS id,tblresulte.id,tblresulte.classid,tblresulte.studid,tblresulte.avgtotal,tblresulte.id
    FROM tblresulte
    INNER JOIN level ON level.id = tblresulte.classid
    INNER JOIN course ON course.id = tblresulte.courseid
    INNER JOIN students ON students.id = tblresulte.studid
    INNER JOIN collegyear ON collegyear.id = tblresulte.yearid
    INNER JOIN sectionyear ON sectionyear.id = tblresulte.secid
    where tblresulte.classid < '$maxclssid2' tblresulte.avgtotal <50";
          
         $rs3 = $conn->query($query3);
         $num3 = $rs3->num_rows;
         $sn=0;
     
         if($num3 > 0)
         { 
           while ($rows3 = $rs3->fetch_assoc())
             {
              
                 
                $sn = $sn + 1;
                $sstudid=$rows3['studid'];
                
                $query5 = mysqli_query($conn,"DELETE FROM tblresulte WHERE studid='$sstudid'");
         
         }}


         $query9 = "SELECT tblresulte.id,level.id,level.levelname,level.section,course.namecourse,students.id,students.name,students.classid,
         collegyear.id,collegyear.yearcolleg,collegyear.endyear,sectionyear.id,sectionyear.sectionname,sectionyear.id 
         AS id,tblresulte.id,tblresulte.classid,tblresulte.studid,tblresulte.avgtotal,tblresulte.id
         FROM tblresulte
         INNER JOIN level ON level.id = tblresulte.classid
         INNER JOIN course ON course.id = tblresulte.courseid
         INNER JOIN students ON students.id = tblresulte.studid
         INNER JOIN collegyear ON collegyear.id = tblresulte.yearid
         INNER JOIN sectionyear ON sectionyear.id = tblresulte.secid
         where tblresulte.classid < '$maxclssid2' and tblresulte.avgtotal <=100 and tblresulte.avgtotal >=50";
       
      $rs9 = $conn->query($query9);
      $num9 = $rs9->num_rows;
   
      if($num9 > 0)
      { 
        while ($rows9 = $rs9->fetch_assoc())
          {
           
               $sstudid1=$rows9['studid'];
               $classids1=$rows9['classid'];
   
           $qry11= "SELECT * FROM level where id='$classids1' ";
           $result11 = $conn->query($qry11);
           $num11 = $result11->num_rows;		
           if ($num11 > 0){
           
             while ($rows11 = $result11->fetch_assoc()){
   
              $classidsstud= $rows11['id'];
              $classidsstud= $classidsstud +2;
             
              $query21=mysqli_query($conn,"UPDATE students set classid='$classidsstud' where id='$sstudid1'");
              $query22 = mysqli_query($conn,"DELETE FROM tblresulte WHERE studid='$sstudid1'");
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

//--------------------------------DELETE------------------------------------------------------------------

if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == "delete")
{
      $id= $_GET['id'];

     

      $query = mysqli_query($conn,"DELETE FROM yearcollegsection WHERE id='$id'");

      if ($query == TRUE) {

              echo "<script type = \"text/javascript\">
              window.location = (\"add-sectionandyear.php\")
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
                                <h3 class="page-title"> اضافة عام دراسي جديد </h3>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">الرئيسية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> اضافة عام دراسي جديد </li>
                                    </ol>
                                </nav>
                                </div>
                                <div class="row">
                            
                                <div class="col-12 grid-margin stretch-card">
                                    <div class="card">
                                    <div class="card-body">
                            
                                        <h4 class="card-title" style="text-align: center;"> اضافة عام دراسي جديد </h4>
                                        <!-- <?php echo $statusMsg; ?> -->
                                        <form class="forms-sample" action="" enctype="multipart/form-data" method="POST" >
                                        <div class="form-group  row mb-3">
                                        
                                        <div class="col-xl-6">
                                                    <label for="exampleInputEmail3"> العام الدراسي</label>
                                                    <select  name="yearidd" class="form-control" required="required" >
                                                        <?php

                                                        $qry20= "SELECT * FROM collegyear ORDER BY id desc";
                                                        $result20 = $conn->query($qry20);
                                                        $num20 = $result20->num_rows;		
                                                        if ($num20 > 0){
                                                            while ($rows20 = $result20->fetch_assoc()){?>
                                                            <option value="<?php echo $rows20['id'];?>" > <?php echo $rows20['yearcolleg'].'  '.'-'.'  '.$rows20['endyear'];?> </option>
                                                            <?php
                                                                }}
                                                            ?>  
                                    </select>
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
                                        <button type="submit" name="save" class="btn btn-primary mr-2"> اضافة عام جديد</button>
                                        <?php
                                        }         
                                        ?>
                                        
                                        
                                        </form >
                                    </div>
                                    <div class="row">
                                <div class="col-lg-12">
                                <div class="card mb-4">
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">جميع الطلاب</h6>
                            
                                    </div>
                                    <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                        <thead class="thead-light">



                                            <tr>
                                            
                                                <th class="font-weight-bold"># </th>
                                                <th class="font-weight-bold"> بداية العام الجديد  </th>
                                                <th class="font-weight-bold">نهاية العام الجديد</th>
                                                <th class="font-weight-bold"> الفصل الدراسي </th>
                                                <th class="font-weight-bold">تعديل </th>
                                                <th class="font-weight-bold">حذف </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                    
                                        $query12 = "SELECT yearcollegsection.id,collegyear.yearcolleg,collegyear.endyear,collegyear.id,sectionyear.sectionname,sectionyear.id 
                                        as id,yearcollegsection.id,yearcollegsection.secid,yearcollegsection.yearid,yearcollegsection.id
                                        FROM yearcollegsection
                                        INNER JOIN collegyear ON collegyear.id = yearcollegsection.yearid
                                        INNER JOIN sectionyear ON sectionyear.id = yearcollegsection.secid";
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
                                                    <td>".$rows12['yearcolleg']."</td>
                                                    <td>".$rows12['endyear']."</td>
                                                    <td>".$rows12['sectionname']."</td>
                                                    <td><a href='?action=edit&id=".$rows12['id']."'><i class='icon-eye'></i></a></td>
                                                    <td><a href='?action=delete&id=".$rows12['id']."'> <i class='icon-trash'></i></a></td>
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
                                            <td colspan="6" align="center"><i class="icon-doc fa fas-print fa-2x" aria-hidden="true" style="cursor:pointer" OnClick="CallPrint(this.value)" ></i></td>
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