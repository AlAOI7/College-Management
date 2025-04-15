<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{header('location:../login/login.php');}
    require_once "../connection/connection.php";

if (empty($_GET['id'])) {
    echo "<script> alert('please select a serves first...!!!') </script>";
    echo "<script> location = 'index_serves.php' </script>";
  }else{
    $id = mysqli_escape_string($conn, $_GET['id']);
    $prosql = mysqli_query($conn, "DELETE FROM serves WHERE id = '$id' ");
  	
  	if ($prosql) {
  		echo "<script> alert('تم حذف serves...!!!') </script>";
    	echo "<script> location = 'index_serves.php' </script>";
  	}
  }

?>