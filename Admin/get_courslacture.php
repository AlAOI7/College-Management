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
   ?><option value=""> تحديد مادة </option><?php
  
  $query2 = "SELECT levelcourse.id,level.id,level.levelname,level.section,course.id,course.namecourse,levelcourse.coursid,levelcourse.id 
  FROM levelcourse
  INNER JOIN level ON level.id = levelcourse.levelid
  INNER JOIN course ON course.id = levelcourse.coursid
   where levelcourse.levelid ='$cid'";
  
    $result = $conn->query($query2);
    $num = $result->num_rows;		

 while ($rows = $result->fetch_assoc())
 {
  ?>
  <option value="<?php echo $rows['coursid']; ?>"><?php echo $rows['namecourse']; ?></option>
  <?php
 }
}

}



?>
