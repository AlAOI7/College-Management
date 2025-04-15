<?php  
	// session_start();
	// if (!$_SESSION["LoginAdmin"])
	// {header('location:../login/login.php');}
    // require_once "../connection/connection.php";
?>
<?php  
session_start();
if (empty($_SESSION['LoginAdmin'])) {
	echo "<script> alert(' الرجا تسجيل الدخول...!!!!') </script>";
	echo "<script> location = 'location:../login/login.php' </script>";
}
?>