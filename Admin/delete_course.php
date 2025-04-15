<?php  
session_start();
if (!$_SESSION["LoginAdmin"])
{header('location:../login/login.php');}
require_once "../connection/connection.php";

if (empty($_GET['id'])) {
echo "<script> alert('please select a index_course first...!!!') </script>";
echo "<script> location = 'index_course.php' </script>";
}else{
$id = mysqli_escape_string($conn, $_GET['id']);

$query7 = mysqli_query($conn,"DELETE FROM studresulte WHERE courseid='$id'");
$prosql = mysqli_query($conn, "DELETE FROM course WHERE id = '$id' ");
  
  if ($prosql) {
    echo "<script> alert('  حذف المادة...!!!') </script>";
    echo "<script> location = 'index_course.php' </script>";
  }
}

?>