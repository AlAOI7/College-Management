     
<?php
 require "db.php";
    
if (isset($_POST['update'])) {

  $id = $_POST['id'];
  $namecourse = mysqli_escape_string($conn, $_POST['namecourse']);
  $codecours = mysqli_escape_string($conn, $_POST['codecours']);
  $doctorcours = mysqli_escape_string($conn, $_POST['doctorcours']);
  
  $date = mysqli_escape_string($conn, $_POST['date']);
  

    $sql = "UPDATE course SET namecourse = '$namecourse'AND codecours='$codecours'AND doctorcours = '$doctorcours'AND date = '$date' WHERE id = '$id'";
   
 } $run_sql = mysqli_query($conn, $sql);


  if ($run_sql) {
            echo "<script> alert('تم التعديل.')</script>";
            echo "<script> location='../index_course.php'</script>";
        } else {
            echo "<script> alert('حدث خطأ أثناء التحديث.')</script>";
        }    




?>