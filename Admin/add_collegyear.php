
<?php  require "inc/security.php"; ?>

 <?php require "nav.php"; ?>

<?php require "sidemenu.php"; ?>

<?php
//------------------------SAVE--------------------------------------------------
error_reporting(E_ALL ^ E_NOTICE);

if(isset($_POST['save'])){
    $yearcollegadd = date('Y')+2;
    $endyearadd = date('Y')+3;
   
    
    $query=mysqli_query($conn,"SELECT * from collegyear where yearcolleg='$yearcollegadd' and endyear='$endyearadd' ");
    $ret=mysqli_fetch_array($query);
    $query=mysqli_query($conn,"INSERT into collegyear (yearcolleg,endyear)  value ('$yearcollegadd','$endyearadd')");

   
    if($ret > 0){ 
  
        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>العام موجود مسبقا!</div>";
    }
    
  else{
    
   
    }}

//--------------------------------DELETE------------------------------------------------------------------

if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == "delete")
{
      $id= $_GET['id'];

     

      $query = mysqli_query($conn,"DELETE FROM collegyear WHERE id='$id'");

      if ($query == TRUE) {

              echo "<script type = \"text/javascript\">
              window.location = (\"add_collegyear.php\")
              </script>";  
      }
      else{

          $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>لم يتم الحذف!</div>"; 
       }
    
}

?>
 <link rel="stylesheet" href="css/stylestyle.css" />
        
		<div class="page-wrapper">
           <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                    <div class="page-header">
                      <h3 class="page-title"> اضافة عام دراسي جديد </h3>
                      <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="admin-index.php">الرئيسية</a></li>
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
                            <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                                          <div class="card-body">
                                              <h4 class="card-title">اضافة عام جديد </h4>

                                                            <div class="form-group row">
                                                                <div class="col-sm-9">
                                                                    <input name="yearcolleg" type="text" class="form-control" id="yearcolleg" placeholder=" بداية العام">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-9">
                                                                    <input name="endyear" type="text" class="form-control" id="endyear" placeholder=" نهابة العام">
                                                                </div>
                                                            </div>
                                              
                                                <button type="submit" name="save" class="btn btn-primary mr-2"> اضافة عام جديد</button>
                                              
                                                
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
                                            
                                                  <th class="font-weight-bold">تعديل </th>
                                                  <th class="font-weight-bold">حذف </th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              <?php
                                      
                                            $query12 = "SELECT * FROM collegyear";
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
                                                      <td><a href='?action=edit&id=".$rows12['id']."'><i class='fa fa-eye'></i></a></td>
                                                      <td><a href='?action=delete&id=".$rows12['id']."'> <i class='fa fa-trash'></i></a></td>
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
                                              <td colspan="5" align="center"><i class="icon-doc fa fas-print fa-2x" aria-hidden="true" style="cursor:pointer" OnClick="CallPrint(this.value)" ></i></td>
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
        
          <!-- partial -->
        </div>
   
 
 <?php require "footer.php"; ?>