<?php
session_start();
error_reporting(0);
include('includes/mysqlcon.php');
if (strlen($_SESSION['uidd']==0)) {
  header('location:logout.php');
  } else{


//------------------------SAVE--------------------------------------------------

if(isset($_POST['save'])){
  $tlclasName = $_POST['tlclassName'];
      $tlclassection = $_POST['tlclasssection'];
     
 
  $query=mysqli_query($conn,"select * from tlclass where nameclass ='$tlclasName' and section ='$tlclassection'");
  $ret=mysqli_fetch_array($query);

  if($ret > 0){ 

      $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>الفصل موجود مسبقا!</div>";
  }
  else{

      $query=mysqli_query($conn,"insert into tlclass (nameclass,section)  value('$tlclasName','$tlclassection')");

  if ($query) {
      
      $statusMsg = "<div class='alert alert-success'  style='margin-right:700px;'>تم الاضافة بنجاح</div>";
  }
  else
  {
       $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>لم تتم الاضافة هناك خطاء!</div>";
  }
}
}

//---------------------------------------EDIT-------------------------------------------------------------

 
//--------------------EDIT------------------------------------------------------------

if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == "edit")
{
      $id= $_GET['id'];

      $query=mysqli_query($conn,"select * from tlclass where id ='$id'");
      $row=mysqli_fetch_array($query);

      //------------UPDATE-----------------------------

      if(isset($_POST['update'])){
  
          $tlclasName = $_POST['tlclassName'];
      $tlclassection = $_POST['tlclasssection'];
      
          $query=mysqli_query($conn,"update tlclass set nameclass='$tlclasName',section='$tlclassection' where id='$id'");

          if ($query) {
              
              echo "<script type = \"text/javascript\">
              window.location = (\"add-classs.php\")
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
 
      $query = mysqli_query($conn,"DELETE FROM tlclass WHERE id='$id'");

      if ($query == TRUE) {

              echo "<script type = \"text/javascript\">
              window.location = (\"add-classs.php\")
              </script>";  
      }
      else{

          $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>لم يتم الحذف!</div>"; 
       }
    
}


?>
<!DOCTYPE html>
<html >
  <head>
   
    <title>  م.ش/محمد علي عثمان </title>
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
              <h3 class="page-title"> ادارة الفصول </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">الرئيسية</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> اضافة  فصل </li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
               
                  <!-- Input Group -->
                  <div class="row">
              <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">جميع الصفوف</h6>
           
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                          <tr>
                        
                            <th class="font-weight-bold">#</th>
                            <th class="font-weight-bold">#</th>
                            <th class="font-weight-bold">اسم الصف</th>
                            
                            <th class="font-weight-bold">الشعبة</th>
                            <th class="font-weight-bold"> تعديل </th>
                            <th class="font-weight-bold"> حذف </th>
                           
                            
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                      $query = "SELECT id,max(id),nameclass,section FROM tlclass";
                      $rs = $conn->query($query);
                      $num = $rs->num_rows;
                      $sn=0;
                      if($num > 0)
                      { 
                        while ($rows = $rs->fetch_assoc())
                          {
                             $sn = $sn + 1;
                            echo"
                              <tr>
                             
                        
                              <td>".$sn."</td>
                              <td>".$rows['max(id)']."</td>
                              <td>".$rows['nameclass']."</td>
                              <td>".$rows['section']."</td>
                           
                              <td><a href='?action=edit&id=".$rows['id']."'><i class='icon-eye'></i></a></td>
                              <td><a href='?action=delete&id=".$rows['id']."'> <i class='icon-trash'></i></a></td>
                            </tr>";
                          }
                      }
                      else
                      {
                           echo   
                           "<div class='alert alert-danger' role='alert'>
                            No Record Found!
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