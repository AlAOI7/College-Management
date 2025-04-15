 <!---------------- Session starts form here ----------------------->
 <?php
	session_start();
	if (!$_SESSION["LoginAdmin"]) {
		header('location:../login/login.php');
	}
	require_once "../connection/connection.php";
	?>
 <!---------------- Session Ends form here ------------------------>
 <title>لوحة تحكم علوم البيانات</title>


 <?php require "nav.php"; ?>

 <?php require "sidemenu.php"; ?>


 <div class="page-wrapper">
     <div class="row1">
         <div class="col-md-12">
             <div class="card">
                 <form action="inc/logofun.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                     <div class="card-body">
                         <h4 class="card-title"> تعديل ايقونة الموقع </h4>

                         <?php  
                            if (isset($_POST['submit'])) {
                                $target = "../Images/".basename($_FILES['image']['name']);
                                $image = $_FILES['image']['name'];
                                $sql = mysqli_query($conn, "INSERT INTO logo (image) VALUES ('$image')");

                                move_uploaded_file($_FILES['image']['tmp_name'], $target);
                            }
                        ?>
                         <div class="form-group ">
                             <label for="image" class="col-sm-3 text-right control-label col-form-label">الصوره </label>

                             <div class="col-sm-9">
                                 <input name="image" type="file" class="form-control" id="image"
                                     value="<?php echo $row['image']; ?>" />
                             </div>
                         </div>




                     </div>
                     <div class="border-top">
                         <div class="card-body">
                             <button name="submit" type="submit" class="btn btn-primary">اضافة</button>
                         </div>
                     </div>
                 </form>
                 <?php 
                 $prosql = mysqli_query($conn, "SELECT * FROM logo");
                $pr = mysqli_fetch_assoc($prosql)
?>
                 <img width="60px" src="../Images/<?= $pr['image'] ;?>">


             </div>
         </div>
     </div>
 </div>



 <?php require "footer.php"; ?>