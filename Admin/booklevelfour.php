<?php
session_start();
error_reporting(0);
require "inc/security.php"; ?>

<link rel="stylesheet" href="css/stylestyle.css" /> 
<?php require "nav.php" ; ?>
<?php require "sidemenu.php" ; ?>

<?php  
  if (isset($_POST['submit'])) {
    $target = "book/booklevelfour/".basename($_FILES['book']['name']);
    $namebook = mysqli_escape_string($conn, $_POST['namebook']);
    $levelid = mysqli_escape_string($conn, $_POST['levelid']);
    $image = $_FILES['book']['name'];
    $sql = mysqli_query($conn, "INSERT INTO booklevelfour (namebook, book, levelid)VALUES ('$namebook', '$book', '$levelid')");
    move_uploaded_file($_FILES['book']['tmp_name'], $target);

    if ($sql) {
      echo "<script> alert('New booklevelfour added...!!!') </script>";
      echo "<script> location = 'booklevelfour.php' </script>";
    }
 }
?>

<div class="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="card-body">
                        <h4 class="card-title">كتب المستوى الرابع</h4>

                        <div class="form-group row">
                            <label for="namebook" class="col-sm-3 text-right control-label col-form-label">  اسم الكتاب </label>
                            <div class="col-sm-9">
                                <input name="namebook" type="text" class="form-control" id="namebook" placeholder="اسم الكتاب">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="book" class="col-sm-3 text-right control-label col-form-label">الكتاب</label>
                            <div class="col-sm-9">
                                <input name="book" type="file" class="form-control" id="file">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="levelid" class="col-sm-3 text-right control-label col-form-label"> المستوى الرابع</label>
                            <div class="col-sm-9">
                                <select name="levelid" class="form-control" id="levelid">
                                    <option value="">اختار المستوى</option>

                                    <?php

                                    $qry1= "SELECT * FROM level ORDER BY id ASC";
                                    $result1 = $conn->query($qry1);
                                    $num1 = $result1->num_rows;		
                                    if ($num1 > 0){


                                        while ($rows1 = $result1->fetch_assoc()){?>
                                        <option value="<?php echo $rows1['id'];?>" ><?php  echo $rows1['levelname'].'  '.'-'.'  '.$rows1['section'];?></option>
                                        <?php
                                            }
                                            
                                            }
                                        ?>  
                               
                                </select>
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
                                        <h6 class="m-0 font-weight-bold text-primary">جميع الكتب</h6>
                                      </div>
                                      <div class="table-responsive p-3">
                                          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                                    <thead class="thead-light">
                                                          <tr>
                                                            <th class="font-weight-bold">#</th>
                                                            <th class="font-weight-bold">اسم الكتاب</th>
                                                            <th class="font-weight-bold">الفصل الدراسي</th>
                                                            <th class="font-weight-bold"> عمليات </th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                
                                                
                                                $query12 = "SELECT booklevelfour.id,level.levelname,level.section,level.id 
                                                as id,booklevelfour.id,booklevelfour.levelid,booklevelfour.namebook,booklevelfour.id
                                                FROM booklevelfour
                                                INNER JOIN level ON level.id = booklevelfour.levelid";
                                
                                                    $rs12 = $conn->query($query12);
                                                    $num12 = $rs12->num_rows;
                                                    $sn=0;
                                                    if($num12 > 0)
                                                    { 
                                                        while ($rows12 = $rs12->fetch_assoc())
                                                        {
                                                            $sn = $sn + 1;
                                                            echo"
                                                                <td>".$sn."</td>
                                                                <td>".$rows12['levelname'].  '-'  .$rows12['section']."</td>
                                                                <td>".$rows12['namebook']."</td>
                                                              <td width='170'> 
                                                                <a class='btn btn-primary' href='?action=edit&id=".$rows12['id']."'>edit</a> 
                                                                  <a class='btn btn-danger' href='?action=delete&id=".$rows12['id']."'>Delete</a> 
                                                              
                                                              </td>
                                                                </tr>";
                                                        }
                                                    }
                                                    else
                                                    {
                                                        echo   
                                                        "<div class='alert alert-danger' role='alert'>
                                                            لايوجد بيانات!
                                                            </div>";
                                                    }
                                                    
                                                      
                                                    ?>
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
