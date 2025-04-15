<?php
session_start();
error_reporting(0);
require "inc/security.php"; ?>
<link rel="stylesheet" href="css/stylestyle.css" /> 
<?php require "nav.php" ; ?>
<?php require "sidemenu.php" ; ?>
<?php  
  if (isset($_POST['submit'])) {
    $name = mysqli_escape_string($conn, $_POST['name']);
    $link = mysqli_escape_string($conn, $_POST['link']);
    $sql = mysqli_query($conn, "INSERT INTO link (name, link)VALUES ('$name', '$link')");

    if ($sql) {
      echo "<script> alert('New link added...!!!') </script>";
      echo "<script> location = 'link.php' </script>";
    }
 }

 
//  if (empty($_GET['id'])) {
//     echo "<script> alert('please select a link first...!!!') </script>";
//     echo "<script> location = 'link.php' </script>";
//   }else{
//     $id = mysqli_escape_string($conn, $_GET['id']);
//     $prosql = mysqli_query($conn, "DELETE FROM link WHERE id = '$id' ");
  	
//   	if ($prosql) {
//   		echo "<script> alert('تم حذف link...!!!') </script>";
//     	echo "<script> location = 'link.php' </script>";
//   	}
//   }
?>
<div class="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="card-body">
                        <h4 class="card-title">روابط</h4>

                        <div class="form-group row">
                            <label for="name" class="col-sm-3 text-right control-label col-form-label">  اسم الرابط </label>
                            <div class="col-sm-9">
                                <input name="name" type="text" class="form-control" id="name" placeholder="اسم الرابط">
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="link" class="col-sm-3 text-right control-label col-form-label">  الرابط  </label>
                            <div class="col-sm-9">
                                <input name="link" type="text" class="form-control" id="link" placeholder=" الرابط">
                            </div>
                        </div>

                     
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button name="submit" type="submit" class="btn btn-primary">اضافة</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">جميع المراجع</h6>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                <thead class="thead-light">
                                        <tr>
                                        <th class="font-weight-bold">#</th>
                                        <th class="font-weight-bold">اسم الرابط</th>
                                        <th class="font-weight-bold"> الرابط</th>
                                        <th class="font-weight-bold"> عمليات </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  
                                        $prosql = mysqli_query($conn, "SELECT * FROM link");
                                        while ($prorow = mysqli_fetch_assoc($prosql)) { ?>
                                    <tr>
                                    <td><?= $prorow['id'] ;?></td>
                                <td><?= $prorow['name'] ;?></td>
                                <td><?= $prorow['link'] ;?></td>    
                                <td width='170'>  
                                    
                                    <a class='btn btn-danger' href="link.php?id=<?= $prorow['id'] ;?>">حذف</a> 
                                </td>
                                            </tr>
                                    <?php } ?>
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
<?php require "footer.php"; ?>
