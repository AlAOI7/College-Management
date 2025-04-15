<?php  
require "db.php";

	if(isset($_POST['submit'])) {
		 $target = "../Images/".basename($_FILES['image']['name']);
         $image = $_FILES['image']['name'];
       
     
	}
	$sql = "UPDATE logo SET  image = '$image' " ;
	
	// move_uploaded_file($_FILES['image']['tmp_name'], $target);
	move_uploaded_file($_FILES['image']['tmp_name'], $target);

	
	    if($sql){
			echo"<script> alert(' تعديل ايقونة الموقع.')</script>";
	    	echo"<script> location='../logo.php'</script>";
	    }
	
	
?>