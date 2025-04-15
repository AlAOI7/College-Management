
<?php require "inc/db.php"; ?>
<?php
//code course
if(!empty($_POST["levelid"])) 
{
 $cid=intval($_POST['levelid']);
 if(!is_numeric($cid)){
 
   echo "invalid Class";exit;
 }
else{

  $query1= "SELECT levelcourse.id,level.id,level.`levelname`,level.section,course.id ,course.namecourse 
  FROM levelcourse
  INNER JOIN level ON level.id = levelcourse.levelid
  INNER JOIN course ON course.id = levelcourse.coursid
   where levelcourse.levelid ='$cid'";
 
    $result = $conn->query($query1);
    $num = $result->num_rows;		

 while ($rows = $result->fetch_assoc())
 {
  ?>
    <p> <?php echo $rows['namecourse']; ?><input type="text"  name="marks[]" value="" class="form-control" required="" placeholder="ادخل الدرجه من 100" autocomplete="off"></p>

  <?php
 }
}

}

//code student

if(!empty($_POST["levelid1"])) 
{
 $cid1=intval($_POST['levelid1']);
 if(!is_numeric($cid1)){
 
 	echo "invalid Class";exit;
 }


 else{
   ?><option value=""> تحديد طالب </option><?php
  
  $query2 = "SELECT * FROM students where levelid ='$cid1'";
  
    $result = $conn->query($query2);
    $num = $result->num_rows;		

 while ($rows = $result->fetch_assoc())
 {
  ?>
  <option value="<?php echo $rows['id']; ?>"><?php echo $rows['studentName']; ?></option>
  <?php
 }
}

}



?>
