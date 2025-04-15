<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
        require_once "../connection/connection.php";
	

?>
<link rel="stylesheet" href="css/stylestyle.css" />

<?php require "nav.php"; ?>
<?php require "sidemenu.php"; ?>

<?php 
if(isset($_POST['save'])){
  $leveliid = $_POST['levelid'];
  $coursiid = $_POST['coursid'];

     
  $query=mysqli_query($conn,"SELECT * from levelcourse WHERE  levelid='$leveliid' AND coursid='$coursiid'");
  $ret=mysqli_fetch_array($query);

  if($ret > 0){ 

      $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>! تم اضافة المادة مسبقاً</div>";
  }
  else{

      $query=mysqli_query($conn,"INSERT into levelcourse (levelid,coursid)  value('$leveliid','$coursiid')");

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

      $query=mysqli_query($conn,"SELECT * from levelcourse where id ='$id'");
      $row=mysqli_fetch_array($query);

      //------------UPDATE-----------------------------

      if(isset($_POST['update'])){
        $classiid = $_POST['levelid'];
        $coursiid = $_POST['coursid'];

                  
                      $query=mysqli_query($conn,"UPDATE levelcourse set levelid='$classiid' and coursid='$coursiid' where id='$id'");

          if ($query) {
              
              echo "<script type = \"text/javascript\">
              window.location = (\"add-courslevel.php\")
              </script>"; 
          }
          else
          {
              $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>لم يتم التعديل!</div>";
          }
      }
  }


//--------------------------------DELETE------------------------------------------------------------------

if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == "delete")
{
      $id= $_GET['id'];
     
      $query5 = mysqli_query($conn,"DELETE FROM levelcourse WHERE id='$id'");

      if ($query5 == TRUE) {

              echo "<script type = \"text/javascript\">
              window.location = (\"add-courslevel.php\")
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
                            <h3 class="page-title"> اضافة مادة الى صف </h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">الرئيسية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> اضافة مادة الى صف </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="row">

                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title" style="text-align: center;"> اضافة مادة الى صف </h4>
                                        <!-- <?php echo $statusMsg; ?> -->
                                        <form class="forms-sample" action="" enctype="multipart/form-data"
                                            method="POST">


                                            <div class="form-group  row mb-3">
                                                <div class="col-xl-6">
                                                    <label for="exampleInputEmail3">الفصل</label>
                                                    <select name="levelid" class="form-control"
                                                        onChange="getStudent(this.value);" required="required">
                                                        <option value="">--تحديد الفصل--</option>
                                                        <?php

                                                  $qry1= "SELECT * FROM level ORDER BY id ASC";
                                                  $result1 = $conn->query($qry1);
                                                  $num1 = $result1->num_rows;		
                                                  if ($num1 > 0){
                                                
                                                  
                                                    while ($rows1 = $result1->fetch_assoc()){?>
                                                        <option value="<?php echo $rows1['id'];?>">
                                                            <?php echo $rows1['levelname'].'-'.$rows1['section']; ?>
                                                        </option>
                                                        <?php
                                                        }
                                                          
                                                        }
                                                      ?>
                                                    </select>
                                                </div>

                                                <div class="col-xl-6">
                                                    <label for="exampleInputEmail3">المواد</label>
                                                    <select name="coursid" class="form-control"
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
                                            <?php
                                                if (isset($id))
                                                {
                                                ?>
                                            <button type="submit" name="update"
                                                class="btn btn-primary mr-2">تعديل</button>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <?php
                                                } else {           
                                                ?>
                                            <button type="submit" name="save"
                                                class="btn btn-primary mr-2">اضافة</button>
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
                                                    <h6 class="m-0 font-weight-bold text-primary">جميع مواد كل فصل</h6>

                                                </div>
                                                <div class="table-responsive p-3">
                                                    <table class="table align-items-center table-flush table-hover"
                                                        id="dataTableHover">
                                                        <thead class="thead-light">


                                                            <tr>

                                                                <th class="font-weight-bold"># </th>
                                                                <th class="font-weight-bold"> الصف</th>
                                                                <th class="font-weight-bold"> المادة</th>
                                                                <th class="font-weight-bold">تعديل</th>
                                                                <th class="font-weight-bold">حذف</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                        
                                                        $query1 ="SELECT levelcourse.id,level.id,level.levelname,level.section,course.id ,course.namecourse,course.id  as id,levelcourse.id
                                                        FROM levelcourse
                                                        INNER JOIN level ON level.id = levelcourse.levelid
                                                        INNER JOIN course ON course.id = levelcourse.coursid
                                                        ORDER BY levelcourse.id ASC ";
                                                        $rs1 = $conn->query($query1);
                                                        $num1 = $rs1->num_rows;
                                                        $sn=0;
                                                        if($num1 > 0)
                                                        { 
                                                          while ($rows1 = $rs1->fetch_assoc())
                                                            {
                                                              $sn = $sn + 1;
                                                              echo"
                                                                <tr>
                                                                  <td>".$sn."</td>
                                                                  <td>".$rows1['levelname'].'__'.$rows1['section']."</td>
                                                                  <td>".$rows1['namecourse']."</td>
                                                                  <td><a href='?action=edit&id=".$rows1['id']."' >  <span><i class='fa fa-edit'></i></span></a></td>
                                                                  <td><a href='?action=delete&id=".$rows1['id']."'> <span><i class='fa fa-trash'></i></span></a></td> 
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


                                                                <td colspan="5" align="center"><i
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
    </div>

</div>
<?php require "footer.php"; ?>