<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{header('location:../login/login.php');}
    require_once "../connection/connection.php";

if (empty($_GET['id'])) {
    echo "<script> alert('please select a viewexamschedule first...!!!') </script>";
    echo "<script> location = 'viewexamschedule.php' </script>";
  }else{
    $id = mysqli_escape_string($conn, $_GET['id']);
    $prosql = mysqli_query($conn, "DELETE FROM examschedule WHERE id = '$id' ");
  	
  	if ($prosql) {
  		echo "<script> alert('تم حذف الاختبار...!!!') </script>";
    	echo "<script> location = 'viewexamschedule.php' </script>";
  	}
  }

?>